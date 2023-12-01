<?php
    $investment_plans       = $__invest_plans;
    $app_local_lang         = get_default_language_code();
?>


<?php if($investment_plans->count() > 0): ?>
    <section class="pricing <?php echo e($section_class ?? "ptb-60"); ?>">
        <div class="container mx-auto">
            <div class="text-content text-center">
                <span class="sub-title"><?php echo e(__("pricing plan")); ?></span>
                <h3><?php echo e(__('Best Plan for you')); ?></h3>
            </div>

            <div class="row g-5 ptb-40 justify-content-center">

                <?php $__currentLoopData = $investment_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12">
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
                                <a href="<?php echo e(setRoute('user.invest.plan.index')); ?>" class="btn--base choose-plan-btn"><?php echo e(__("Choose Plan")); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>
<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/frontend/sections/invest-plan.blade.php ENDPATH**/ ?>