<div class="custom-card mb-10">
    <div class="card-header">
        <h6 class="title"><?php echo e($title ?? ""); ?></h6>
    </div>
    <div class="card-body">
        <form class="card-form" method="POST" action="<?php echo e($route ?? ""); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field("PUT"); ?>
            <input type="hidden" value="<?php echo e($item->slug); ?>" name="slug">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-10">
                    <div class="custom-inner-card">
                        <div class="card-inner-header">
                            <h5 class="title"><?php echo e(__("Charges")); ?></h5>
                        </div>
                        <div class="card-inner-body">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                                    <label><?php echo e(__("Fixed Charge*")); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form--control number-input" value="<?php echo e(old($data->slug.'_fixed_charge',$data->fixed_charge)); ?>" name="<?php echo e($data->slug); ?>_fixed_charge">
                                        <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                                    <label><?php echo e(__("Percent Charge*")); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form--control number-input" value="<?php echo e(old($data->slug.'_percent_charge',$data->percent_charge)); ?>" name="<?php echo e($data->slug); ?>_percent_charge">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 mb-10">
                    <div class="custom-inner-card">
                        <div class="card-inner-header">
                            <h5 class="title"><?php echo e(__("Range")); ?></h5>
                        </div>
                        <div class="card-inner-body">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                                    <label><?php echo e(__("Minimum Amount")); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form--control number-input" value="<?php echo e(old($data->slug.'_min_limit',$data->min_limit)); ?>" name="<?php echo e($data->slug); ?>_min_limit">
                                        <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                                    <label><?php echo e(__("Maximum Amount")); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form--control number-input" value="<?php echo e(old($data->slug.'_max_limit',$data->max_limit)); ?>" name="<?php echo e($data->slug); ?>_max_limit">
                                        <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 mb-10">
                    <div class="custom-inner-card">
                        <div class="card-inner-header">
                            <h5 class="title"><?php echo e(__("Limit")); ?></h5>
                        </div>
                        <div class="card-inner-body">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                                    <label><?php echo e(__("Daily Transfer Limit")); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form--control number-input" value="<?php echo e(old($data->slug.'_daily_limit',$data->daily_limit)); ?>" name="<?php echo e($data->slug); ?>_daily_limit">
                                        <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                                    <label><?php echo e(__("Monthly Transfer Limit")); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form--control number-input" value="<?php echo e(old($data->slug.'_monthly_limit',$data->monthly_limit)); ?>" name="<?php echo e($data->slug); ?>_monthly_limit">
                                        <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-10-none">
                <div class="col-xl-12 col-lg-12 form-group">
                    <?php echo $__env->make('admin.components.button.form-btn',[
                        'text'          => "Update",
                        'class'         => "w-100 btn-loading",
                        'permission'    => "admin.trx.settings.charges.update",
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </form>
    </div>
</div><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/trx-settings-charge-block.blade.php ENDPATH**/ ?>