<?php

use App\Constants\PaymentGatewayConst;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('type');
        });


        Schema::table('transactions', function (Blueprint $table) {
            $table->enum("type",[
                PaymentGatewayConst::TYPEADDMONEY,
                PaymentGatewayConst::TYPEMONEYOUT,
                PaymentGatewayConst::TYPEWITHDRAW,
                PaymentGatewayConst::TYPECOMMISSION,
                PaymentGatewayConst::TYPEBONUS,
                PaymentGatewayConst::TYPETRANSFERMONEY,
                PaymentGatewayConst::TYPEMONEYEXCHANGE,
                PaymentGatewayConst::TYPEADDSUBTRACTBALANCE,
                PaymentGatewayConst::TYPEMAKEPAYMENT,
                PaymentGatewayConst::TYPECAPITALRETURN,
                
                PaymentGatewayConst::TYPEREFERBONUS, // update value
            ])->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
