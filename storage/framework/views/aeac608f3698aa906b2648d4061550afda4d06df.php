

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo $__env->make('admin.components.page-title',['title' => __($page_title)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Investment Plan")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title"><?php echo e(__("Create new investment plan")); ?></h6>
        </div>
        <div class="card-body">
            <form class="card-form" method="POST" action="<?php echo e(setRoute('admin.invest.plan.update',$invest_plan->slug)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field("PUT"); ?>

                <div class="row">
                    <div class="col-6 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Plan Name*",
                            'type'          => "text",
                            'placeholder'   => "Write Name...",
                            'name'          => "name",
                            'value'         => old('name',$invest_plan->name),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-6 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Plan Title (Optional)",
                            'type'          => "text",
                            'placeholder'   => "Write Title...",
                            'name'          => "title",
                            'value'         => old('title',$invest_plan->title),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-6 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Plan Duration (Day)*",
                            'type'          => "text",
                            'class'         => "number-input",
                            'placeholder'   => "Write Plan Duration...",
                            'name'          => "duration",
                            'value'         => old('duration',$invest_plan->duration),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-6 form-group">
                        <?php
                            $old_prt = old('profit_return_type',$invest_plan->profit_return_type);
                        ?>
                        <label for="profit-return-type" class="form-label"><?php echo e(__("Profit Return Type*")); ?></label>
                        <select name="profit_return_type" id="profit-return-type" class="form--control nice-select <?php $__errorArgs = ['profit_return_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="" selected disabled>Choose One</option>
                            <option value="<?php echo e(global_const()::INVEST_PROFIT_DAILY_BASIS); ?>" <?php if($old_prt == global_const()::INVEST_PROFIT_DAILY_BASIS): ?> selected <?php endif; ?>>Day</option>
                            <option value="<?php echo e(global_const()::INVEST_PROFIT_ONE_TIME); ?>" <?php if($old_prt == global_const()::INVEST_PROFIT_ONE_TIME): ?> selected <?php endif; ?>>One Time</option>
                        </select>
                        <?php $__errorArgs = ['profit_return_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-6 form-group">
                        <label><?php echo e(__("Minimum investment*")); ?></label>
                        <div class="input-group">
                            <input type="text" class="form--control number-input <?php $__errorArgs = ['min_invest'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('min_invest',$invest_plan->min_invest)); ?>" name="min_invest" placeholder="Write Minimum Invest Amount...">
                            <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                        </div>
                        <?php $__errorArgs = ['min_invest'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-6 form-group">
                        <label><?php echo e(__("Minimum investment Offer (Optional)")); ?></label>
                        <div class="input-group">
                            <input type="text" class="form--control number-input <?php $__errorArgs = ['min_invest_offer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('min_invest_offer',$invest_plan->min_invest_offer)); ?>" name="min_invest_offer" placeholder="Write Minimum Invest Offer Amount...">
                            <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                        </div>
                        <?php $__errorArgs = ['min_invest_offer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-6 form-group">
                        <label><?php echo e(__("Maximum investment*")); ?></label>
                        <div class="input-group">
                            <input type="text" class="form--control number-input <?php $__errorArgs = ['max_invest'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('max_invest',$invest_plan->max_invest)); ?>" name="max_invest" placeholder="Write Maximum Invest Amount...">
                            <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                        </div>
                        <?php $__errorArgs = ['max_invest'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-6 form-group">
                        <label><?php echo e(__("Profit (Fixed)*")); ?></label>
                        <div class="input-group">
                            <input type="text" class="form--control number-input <?php $__errorArgs = ['profit_fixed'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('profit_fixed',$invest_plan->profit_fixed)); ?>" name="profit_fixed" placeholder="Write Fixed Profit...">
                            <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                        </div>
                        <?php $__errorArgs = ['profit_fixed'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-6 form-group">
                        <label><?php echo e(__("Profit (Percentage)*")); ?></label>
                        <div class="input-group">
                            <input type="text" class="form--control number-input <?php $__errorArgs = ['profit_percent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('profit_percent',$invest_plan->profit_percent)); ?>" name="profit_percent" placeholder="Write Percentage Profit...">
                            <span class="input-group-text">%</span>
                        </div>
                        <?php $__errorArgs = ['profit_percent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <?php echo $__env->make('admin.components.button.form-btn',[
                        'class'         => "w-100 btn-loading",
                        'text'          => "Update",
                        'permission'    => "admin.invest.plan.update",
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/invest-plan/edit.blade.php ENDPATH**/ ?>