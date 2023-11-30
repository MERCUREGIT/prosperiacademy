<?php

namespace App\Http\Controllers\User;

use App\Constants\GlobalConst;
use Exception;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use App\Models\TemporaryData;
use App\Models\Admin\Currency;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\PaymentGateway;
use Illuminate\Http\RedirectResponse;
use App\Constants\PaymentGatewayConst;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\PaymentGatewayCurrency;
use App\Http\Helpers\PaymentGateway as PaymentGatewayHelper;
use App\Models\Transaction;
use App\Traits\ControlDynamicInputFields;
use Illuminate\Support\Facades\URL;

class AddMoneyController extends Controller
{

    use ControlDynamicInputFields;

    public function index() {

        $page_title = "Add Money";
        $user_wallets = UserWallet::auth()->get();
        $user_currencies = Currency::whereIn('id',$user_wallets->pluck('currency_id')->toArray())->get();

        $payment_gateways = PaymentGateway::addMoney()->active()->with('currencies')->has("currencies")->get();

        return view('user.sections.add-money.index',compact('page_title','payment_gateways'));
    }

    public function submit(Request $request, PaymentGatewayCurrency $gateway_currency) {

        $validated = Validator::make($request->all(),[
            'amount'    => 'required|numeric|gt:0',
            'gateway_currency'  => 'required|string|exists:'.$gateway_currency->getTable().',alias',
        ])->validate();
        $request->merge(['currency' => $validated['gateway_currency']]);

        try{
            $instance = PaymentGatewayHelper::init($request->all())->type(PaymentGatewayConst::TYPEADDMONEY)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->gateway()->render();

            if($instance instanceof RedirectResponse === false && isset($instance['gateway_type']) && $instance['gateway_type'] == PaymentGatewayConst::MANUAL) {
                $manual_handler = $instance['distribute'];
                return $this->$manual_handler($instance);
            }
        }catch(Exception $e) {
            return back()->with(['error' => [$e->getMessage()]]);
        }
        return $instance;
    }

    public function success(Request $request, $gateway){
        try{
            $token = PaymentGatewayHelper::getToken($request->all(),$gateway);
            $temp_data = TemporaryData::where("type",PaymentGatewayConst::TYPEADDMONEY)->where("identifier",$token)->first();

            if(Transaction::where('callback_ref', $token)->exists()) {
                if(!$temp_data) return redirect()->route('user.add.money.index')->with(['success' => ['Transaction request sended successfully!']]);;
            }else {
                if(!$temp_data) return redirect()->route('user.add.money.index')->with(['error' => ['Transaction failed. Record didn\'t saved properly. Please try again.']]);
            }

            $update_temp_data = json_decode(json_encode($temp_data->data),true);
            $update_temp_data['callback_data']  = $request->all();
            $temp_data->update([
                'data'  => $update_temp_data,
            ]);
            $temp_data = $temp_data->toArray();
            $instance = PaymentGatewayHelper::init($temp_data)->type(PaymentGatewayConst::TYPEADDMONEY)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->responseReceive();
            if($instance instanceof RedirectResponse) return $instance;
        }catch(Exception $e) {
            return back()->with(['error' => [$e->getMessage()]]);
        }
        return redirect()->route("user.add.money.index")->with(['success' => ['Successfully added money']]);
    }

    public function cancel(Request $request, $gateway) {
        return redirect()->route('user.add.money.index');
    }

    public function callback(Request $request,$gateway) {

        $callback_token = $request->get('token');
        $callback_data = $request->all();

        try{
            PaymentGatewayHelper::init([])->type(PaymentGatewayConst::TYPEADDMONEY)->setProjectCurrency(PaymentGatewayConst::PROJECT_CURRENCY_SINGLE)->handleCallback($callback_token,$callback_data,$gateway);
        }catch(Exception $e) {
            // handle Error
            logger($e);
        }
    }

    public function handleManualPayment($payment_info) {

        // Insert temp data
        $data = [
            'type'          => PaymentGatewayConst::TYPEADDMONEY,
            'identifier'    => generate_unique_string("temporary_datas","identifier",16),
            'data'          => [
                'gateway_currency_id'    => $payment_info['currency']->id,
                'amount'                 => $payment_info['amount'],
                'wallet_id'              => $payment_info['wallet']->id,
            ],
        ];

        try{
            TemporaryData::create($data);
        }catch(Exception $e) {
            return redirect()->route('user.add.money.index')->with(['error' => ['Failed to save data. Please try again']]);
        }
        return redirect()->route('user.add.money.manual.form',$data['identifier']);
    }

    public function showManualForm($token) {
        $tempData = TemporaryData::search($token)->first();
        if(!$tempData || $tempData->data == null || !isset($tempData->data->gateway_currency_id)) return redirect()->route('user.add.money.index')->with(['error' => ['Invalid request']]);
        $gateway_currency = PaymentGatewayCurrency::find($tempData->data->gateway_currency_id);
        if(!$gateway_currency || !$gateway_currency->gateway->isManual()) return redirect()->route('user.add.money.index')->with(['error' => ['Selected gateway is invalid']]);
        $gateway = $gateway_currency->gateway;
        if(!$gateway->input_fields || !is_array($gateway->input_fields)) return redirect()->route('user.add.money.index')->with(['error' => ['This payment gateway is under constructions. Please try with another payment gateway']]);
        $amount = $tempData->data->amount;

        $page_title = "Payment Instructions";
        return view('user.sections.add-money.manual.instruction',compact("gateway","page_title","token","amount"));
    }

    public function manualSubmit(Request $request,$token) {
        $request->merge(['identifier' => $token]);
        $tempDataValidate = Validator::make($request->all(),[
            'identifier'        => "required|string|exists:temporary_datas",
        ])->validate();

        $tempData = TemporaryData::search($tempDataValidate['identifier'])->first();
        if(!$tempData || $tempData->data == null || !isset($tempData->data->gateway_currency_id)) return redirect()->route('user.add.money.index')->with(['error' => ['Invalid request']]);
        $gateway_currency = PaymentGatewayCurrency::find($tempData->data->gateway_currency_id);
        if(!$gateway_currency || !$gateway_currency->gateway->isManual()) return redirect()->route('user.add.money.index')->with(['error' => ['Selected gateway is invalid']]);
        $gateway = $gateway_currency->gateway;
        $amount = $tempData->data->amount ?? null;
        if(!$amount) return redirect()->route('user.add.money.index')->with(['error' => ['Transaction Failed. Failed to save information. Please try again']]);
        $wallet = UserWallet::find($tempData->data->wallet_id ?? null);
        if(!$wallet) return redirect()->route('user.add.money.index')->with(['error' => ['Your wallet is invalid!']]);

        $this->file_store_location = "transaction";
        $dy_validation_rules = $this->generateValidationRules($gateway->input_fields);

        $validated = Validator::make($request->all(),$dy_validation_rules)->validate();
        $get_values = $this->placeValueWithFields($gateway->input_fields,$validated);

        // Make Transaction
        DB::beginTransaction();
        try{
            $id = DB::table("transactions")->insertGetId([
                'type'                          => PaymentGatewayConst::TYPEADDMONEY,
                'trx_id'                        => generate_unique_string('transactions','trx_id',16),
                'user_type'                     => GlobalConst::USER,
                'user_id'                       => $wallet->user->id,
                'wallet_id'                     => $wallet->id,
                'payment_gateway_currency_id'   => $gateway_currency->id,
                'request_amount'                => $amount->requested_amount,
                'request_currency'              => $wallet->currency->code,
                'exchange_rate'                 => $gateway_currency->rate,
                'percent_charge'                => $amount->percent_charge,
                'fixed_charge'                  => $amount->fixed_charge,
                'total_charge'                  => $amount->total_charge,
                'total_payable'                 => $amount->total_amount,
                'receive_amount'                => $amount->will_get,
                'receiver_type'                 => GlobalConst::USER,
                'receiver_id'                   => $wallet->user->id,
                'available_balance'             => $wallet->balance,
                'payment_currency'              => $gateway_currency->currency_code,
                'details'                       => json_encode(['input_values' => $get_values]),
                'status'                        => PaymentGatewayConst::STATUSPENDING,
                'created_at'                    => now(),
            ]);

            DB::table("temporary_datas")->where("identifier",$token)->delete();
            DB::commit();
        }catch(Exception $e) {
            DB::rollBack();
            return redirect()->route('user.add.money.manual.form',$token)->with(['error' => ['Something went wrong! Please try again']]);
        }
        return redirect()->route('user.add.money.index')->with(['success' => ['Transaction Success. Please wait for admin confirmation']]);
    }


}
