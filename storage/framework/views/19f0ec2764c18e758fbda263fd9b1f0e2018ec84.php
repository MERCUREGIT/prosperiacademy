

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="send-add-form row g-4">
        <div class="col-xxl-8 col-lg-12 col-12 form-area mb-40">
            <div class="add-money-text pb-20">
                <h4><?php echo e(__("Money Transfer")); ?></h4>
            </div>
            <form class="row g-4 bounce-safe" method="POST" action="<?php echo e(setRoute('user.money.transfer.submit')); ?>">
                <?php echo csrf_field(); ?>
                <div class="col-sm-6 col-12">
                    <div class="row">
                        <h3 class="fs-6"><?php echo e(__("Sender Amount")); ?></h3>
                        <div class="col-lg-12">
                            <div class="input-group">
                                <input type="text" class="form-control sender-amount number-input" placeholder="Enter Amount" name="sender_amount" value="<?php echo e(old('sender_amount')); ?>">
                                <span class="input-group-text"><?php echo e(get_default_currency_code()); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-12">
                    <div class="row">
                        <h3 class="fs-6"><?php echo e(__("Reciver Email")); ?></h3>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" placeholder="Enter Email" name="receiver">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="ps-4">
                        <h3 class="fs-6 fw-lighter py-1 text-capitalize limit-show">--</h3>
                        <h3 class="fs-6 fw-lighter text-capitalize fees-show">--</h3>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn--base w-100 text-center"><?php echo e(__("Proceed")); ?></button>
                </div>
            </form>
        </div>

        <div class="col-xxl-4 col-lg-12 col-12">
            <div class="col-12 preview">
                <div class="row">
                    <h3><?php echo e(__("Preview")); ?></h3>

                    <div class="py-3">
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h4><?php echo e(__("Sending Amount")); ?></h4>
                            <h4 class="sending-amount">--</h4>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h4><?php echo e(__("Fees")); ?></h4>
                            <h4 class="fees">--</h4>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h4><?php echo e(__("Recipient's Will Get")); ?></h4>
                            <h4 class="will-get">--</h4>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h4><?php echo e(__("Pay In Total")); ?></h4>
                            <h4 class="payable">--</h4>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>

        let fixedCharge = "<?php echo e($money_transfer_settings->fixed_charge ?? 0); ?>";
        let percentCharge = "<?php echo e($money_transfer_settings->percent_charge ?? 0); ?>";
        let minLimit = "<?php echo e($money_transfer_settings->min_limit ?? 0); ?>";
        let maxLimit = "<?php echo e($money_transfer_settings->max_limit ?? 0); ?>";
        let defaultCurrency = "<?php echo e(get_default_currency_code()); ?>";

        $(document).ready(function() {
            run();
        });

        $(".sender-amount").keyup(function() {
            run();
        });

        function run() {
            let senderAmountInput = $(".sender-amount");
            let senderAmount = senderAmountInput.val();

            (senderAmount == null || senderAmount == "") ? senderAmount = 0 : senderAmount = senderAmount;

            if(!$.isNumeric(senderAmount)) return false;

            $(".limit-show").text(`• Limit ${parseFloat(minLimit).toFixed(4)} ${defaultCurrency} -  ${parseFloat(maxLimit).toFixed(4)} ${defaultCurrency} `);
            $(".fees-show").text(`• Charge ${parseFloat(fixedCharge).toFixed(4)} ${defaultCurrency} = ${parseFloat(percentCharge).toFixed(4)}% `);

            $('.sending-amount').text(`${senderAmount} ${defaultCurrency}`);

            let percentChargeCalc = (parseFloat(senderAmount) / 100) * parseFloat(percentCharge);

            let totatCharge = parseFloat(percentChargeCalc) + parseFloat(fixedCharge);

            $(".fees").text(`${parseFloat(totatCharge).toFixed(4)} ${defaultCurrency}`);

            $(".will-get").text(`${parseFloat(senderAmount).toFixed(4)} ${defaultCurrency}`);

            let totalPayable = parseFloat(senderAmount) + parseFloat(totatCharge);

            $(".payable").text(`${parseFloat(totalPayable).toFixed(4)} ${defaultCurrency}`);

        }

        var timeOut;
        $("input[name=receiver]").bind("keyup",function(){
            clearTimeout(timeOut);
            timeOut = setTimeout(getUser, 500,$(this).val(),"<?php echo e(setRoute('user.info')); ?>",$(this));
        });

        function getUser(string,URL,errorPlace = null) {
            if(string.length < 3) {
                return false;
            }

            var CSRF = laravelCsrf();
            var data = {
                _token      : CSRF,
                text        : string,
            };

            $.post(URL,data,function() {
                // success
            }).done(function(response){
                if(response.data == null) {
                    if(errorPlace != null) {
                        $(errorPlace).css('border','1px solid rgba(153, 153, 153, 0.2)');
                        if($(errorPlace).parent().find(".get-user-error").length > 0) {
                            $(errorPlace).parent().find(".get-user-error").text("User doesn't exists");
                        }else {
                            $(`<span class="text--danger get-user-error mt-1" style="font-size:14px">User doesn't exists!</span>`).insertAfter($(errorPlace));
                        }
                    }

                }else {
                    if(errorPlace != null) { 
                        $(errorPlace).parent().find(".get-user-error").remove();
                        $(errorPlace).css('border','1px solid green');
                    }
                }
            }).fail(function(response) {
                var response = JSON.parse(response.responseText);
                throwMessage(response.type,response.message.error);
            });
        }

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/sections/money-transfer/index.blade.php ENDPATH**/ ?>