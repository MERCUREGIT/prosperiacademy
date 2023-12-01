

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($money_out_settings?->c_balance == false && $money_out_settings?->p_balance == false): ?>
        <div class="form-error text-warning mb-4 text-center"> <?php echo e(__("Withdraw service is temporary unavailable. If you have any queries, feel free to contact support. Thanks")); ?> </div>
    <?php else: ?>

        <div class="send-add-form row g-4">
            <div class="col-lg-8 col-md-8 col-12 form-area">
                <div class="add-money-text pb-20">
                    <h4><?php echo e(__("Withdraw")); ?></h4>
                </div>
                <form class="row g-4" method="POST" action="<?php echo e(setRoute('user.withdraw.submit')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="col-12">
                        <h3 class="fs-6 p-0"><?php echo e(__("Balance Type")); ?></h3>
                        <div class="">
                            <?php
                                $old_wallet_type = old('wallet_type');
                            ?>
                            <select class="form-control select-item-2 py-0 w-100 nice-select" name="wallet_type">
                                <option selected disabled>Choose One</option>

                                <?php if($money_out_settings?->c_balance == true): ?>
                                    <option value="c_balance" <?php if($old_wallet_type == 'c_balance'): ?> <?php if(true): echo 'selected'; endif; ?> <?php endif; ?>><?php echo e(__("Wallet Balance")); ?></option>
                                <?php endif; ?>

                                <?php if($money_out_settings?->p_balance == true): ?>
                                    <option value="p_balance" <?php if($old_wallet_type == 'p_balance'): ?> <?php if(true): echo 'selected'; endif; ?> <?php endif; ?>><?php echo e(__("Profit Balance")); ?></option>
                                <?php endif; ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <h3 class="fs-6 p-0"><?php echo e(__("Payment Gateway")); ?></h3>
                        <div class="">
                            <?php
                                $old_payment_gateway = old('payment_gateway');
                            ?>
                            <select class="form-control select-item-2 py-0 w-100 nice-select" name="payment_gateway">
                                <option selected disabled>Select Gateway</option>
                                <?php $__currentLoopData = $payment_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->alias); ?>" data-item="<?php echo e(json_encode($item->currencies()->select(['name','rate','currency_code','percent_charge','fixed_charge','min_limit','max_limit'])->first())); ?>" <?php if($old_payment_gateway == $item->alias): ?> <?php if(true): echo 'selected'; endif; ?> <?php endif; ?>><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <h3 class="fs-6"><?php echo e(__('Amount')); ?></h3>
                            <div class="col-lg-12">
                                <input type="text" class="form-control number-input" maxlength="20" id="input1" name="amount" placeholder="Enter Amount" value="<?php echo e(old('amount')); ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn--base w-100 text-center"><?php echo e(__("Proceed")); ?></button>
                    </div>
                </form>
            </div>

            <div class="col-lg-4 col-md-4 col-12">
                <div class="col-12 preview">
                    <div class="row">
                        <h3><?php echo e(__("Preview")); ?></h3>

                        <div class="py-3">
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h4><?php echo e(__("Withdraw Amount")); ?></h4>
                                <h4 class="withdraw-amount">--</h4>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h4><?php echo e(__("Exchange Rate")); ?></h4>
                                <h4 class="exchange-rate">--</h4>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h4><?php echo e(__("Fees")); ?></h4>
                                <h4 class="total-charges">--</h4>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h4><?php echo e(__("Will Get")); ?></h4>
                                <h4 class="will-get">--</h4>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h4><?php echo e(__("Total Payable")); ?></h4>
                                <h4 class="payable">--</h4>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>

        let default_currency_code = "<?php echo e(get_default_currency_code()); ?>";

        $("select[name=payment_gateway]").change(function() {
            run();
        });

        $("input[name=amount]").keyup(function() {
            run();
        });

        function run() {
            let paymentGatewaySelect = $("select[name=payment_gateway]");
            let gatewaySelectedValue = paymentGatewaySelect.val();

            if(gatewaySelectedValue == null || gatewaySelectedValue == "") return false;

            let amount = $("input[name=amount]").val();

            let gatewayCurrency = JSON.parse(paymentGatewaySelect.find(":selected").attr("data-item"));

            (amount == null || amount == "" || !$.isNumeric(amount)) ? amount = 0 : amount = amount;

            $(".withdraw-amount").text(`${amount} ${default_currency_code}`);

            let fixedCharge         = gatewayCurrency.fixed_charge ?? 0;
            let percentCharge       = gatewayCurrency.percent_charge ?? 0;
            let minLimit            = gatewayCurrency.min_limit ?? 0;
            let maxLimit            = gatewayCurrency.max_limit ?? 0;
            let rate                = gatewayCurrency.rate ?? 1;
            let gatewayCurrencyCode = gatewayCurrency.currency_code ?? "-";

            $(".exchange-rate").text(`1 ${default_currency_code} = ${parseFloat(rate).toFixed(4)} ${gatewayCurrencyCode}`);

            let fixedChargeCalc = (parseFloat(fixedCharge) / parseFloat(rate)); // default currency fixed charge
            let percentChargeCalc = ((((parseFloat(amount) * parseFloat(rate)) / 100) * parseFloat(percentCharge)) / parseFloat(rate));

            let totalCharge = parseFloat(fixedChargeCalc) + parseFloat(percentChargeCalc) // total charge in default currency
            $(".total-charges").text(`${parseFloat(totalCharge).toFixed(4)} ${default_currency_code}`);

            let willGet = parseFloat(amount) * parseFloat(rate); // get amount with gateway currency

            $('.will-get').text(`${willGet} ${gatewayCurrencyCode}`);

            let totalPayable = parseFloat(amount) + parseFloat(totalCharge);
            $(".payable").text(`${totalPayable} ${default_currency_code}`);

        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/sections/withdraw/index.blade.php ENDPATH**/ ?>