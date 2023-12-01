

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row g-5 ptb-40">

        <?php $__empty_1 = true; $__currentLoopData = $investment_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-12">
                <div class="pricing-card text-center">
                    <div class="top-text">
                        <h3><?php echo e($item->name); ?></h3>
                    </div>
                    <div class="amount">
                        <?php if($item->min_invest_offer > 0): ?>
                            
                            <p>
                                <span><?php echo e(__("from")); ?> /</span>
                                <del><?php echo e($default_currency->symbol . get_amount($item->min_invest,null,4)); ?></del>
                                <span><?php echo e($default_currency->symbol . get_amount($item->min_invest_offer,null,4)); ?></span>
                            </p>
                        <?php else: ?>
                            <p><span><?php echo e(__("from")); ?> /</span><?php echo e($default_currency->symbol . get_amount($item->min_invest,null,4)); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="details">
                        <p><i class="la la-check"></i> <?php echo e(__("Duration")); ?> <span><?php echo e($item->duration); ?> <?php echo e(__("Days")); ?></span></p>
                        <p><i class="la la-check"></i> <?php echo e(__("Profit Return Type")); ?> <span><?php echo e(ucwords(strtolower(remove_speacial_char($item->profit_return_type," ")))); ?></span></p>
                        <p><i class="la la-check"></i><?php echo e(__("Maximum Investment")); ?> <?php echo e($default_currency->symbol . get_amount($item->max_invest,null,4)); ?></p>
                        <p><i class="la la-check"></i> <?php echo e(__("Fixed Profit")); ?> <?php echo e($default_currency->symbol . get_amount($item->profit_fixed,null,4)); ?></p>
                        <p><i class="la la-check"></i> <?php echo e(__("Percentage Profit")); ?> <?php echo e(get_amount($item->profit_percent,"%",4)); ?></p>
                        <p><i class="la la-check"></i> <?php echo e(__("Just Click to Try This")); ?></p>
                    </div>
                    <div class="mt-4">
                        <button class="btn--base choose-plan-btn" data-item='<?php echo e(json_encode($item->only(['name','duration','min_invest_requirement','profit_fixed','profit_percent','max_invest']))); ?>' data-target="<?php echo e($item->slug); ?>" data-invest-required="<?php echo e($item->min_invest_requirement); ?>"><?php echo e(__("Choose Plan")); ?></button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="no-data-found alert alert-warning text-center"><?php echo e(__("No data found!")); ?></div>
        <?php endif; ?>

    </div>

    
    <div id="purchase-step" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("Purchase Plan")); ?></h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row mb-10-none mt-3">

                        <div class="mb-4">
                            <div class="d-flex justify-content-between info">
                                <h3><?php echo e(__("Plan")); ?></h3>
                                <h3 class="plan-name"></h3>
                            </div>
                            <div class="d-flex justify-content-between info">
                                <h3><?php echo e(__("Duration")); ?></h3>
                                <h3 class="plan-duration"></h3>
                            </div>
                            <div class="d-flex justify-content-between info">
                                <h3><?php echo e(__("Maximum Invest Amount")); ?></h3>
                                <h3 class="plan-max-invest"></h3>
                            </div>
                            <div class="d-flex justify-content-between info">
                                <h3><?php echo e(__("Fixed Profit")); ?></h3>
                                <h3 class="plan-fixed-profit"></h3>
                            </div>
                            <div class="d-flex justify-content-between info">
                                <h3><?php echo e(__("Percent Profit")); ?></h3>
                                <h3 class="plan-percent-profit"></h3>
                            </div>
                        </div>
                        
                        <div class="col-12 form-group">
                            <label for="invest_amount"><?php echo e(__("Invest Amount*")); ?></label>
                            <input type="text" class="form-control number-input" id="invest_amount" placeholder="Enter Invest Amount" name="invest_amount" value="<?php echo e(old('invest_amount')); ?>">
                        </div>
                        <div class="col-12 form-group">
                            <div class="form-check">
                                <?php
                                    $privacy_policy_link = ($__website_privacy_policy) ?  route('frontend.useful.links',$__website_privacy_policy->slug) : "javascript:void(0)";
                                ?>
                                <input type="checkbox" class="form-check-input p-2" id="exampleCheck1" name="agree" />
                                <label class="form-check-label ms-2 text-light" for="exampleCheck1"><?php echo e(__("I Have Agree With")); ?> <a href="<?php echo e($privacy_policy_link); ?>" class="text--base"><?php echo e(__("Terms and Conditions")); ?></a></label>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <button type="button" class="btn--base btn-danger bg-danger modal-close border-0"><?php echo e(__("Cancel")); ?></button>
                            <button type="submit" class="btn--base bg--info border-0"><?php echo e(__("Purchase")); ?></button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>

        $(document).ready(function() {
            // openModalWhenError('purchase-step','#purchase-step');
        });

        let defaultCurrency = "<?php echo e(get_default_currency_code()); ?>";

        $(".choose-plan-btn").click(function() {
            let actionURL = "<?php echo e(setRoute('user.invest.plan.purchase')); ?>";
            let slug = $(this).data('target');
            actionURL = actionURL + `/${slug}`;
            $("#purchase-step").find("form").first().attr("action",actionURL).find("input[name=invest_amount]").val($(this).data("invest-required"));

            let data = $(this).data('item');

            $("#purchase-step").find(".plan-name").text(data?.name);
            $("#purchase-step").find(".plan-duration").text(data?.duration + " Days");
            $("#purchase-step").find(".plan-max-invest").text(removeTrailingZeros(parseFloat(data?.max_invest ?? 0).toString()) + " " + defaultCurrency);
            $("#purchase-step").find(".plan-fixed-profit").text(removeTrailingZeros(parseFloat(data?.profit_fixed ?? 0).toString()) + " " + defaultCurrency);
            $("#purchase-step").find(".plan-percent-profit").text(removeTrailingZeros(parseFloat(data?.profit_percent ?? 0).toString()) + "%");

            openModalBySelector("#purchase-step");
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/sections/invest-plan/index.blade.php ENDPATH**/ ?>