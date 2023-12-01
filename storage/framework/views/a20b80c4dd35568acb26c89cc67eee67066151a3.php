

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
    ], 'active' => __("Referral Settings")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="custom-card">

        <div class="card-header">
            <h6 class="title"><?php echo e(__("New Registration Bonus")); ?></h6>
        </div>

        <div class="card-body">

            <div class="card-title mb-2">
                <p class="f-sm fw-bold text--info"><?php echo e(__("Please click update button to make any changes")); ?></p>
            </div>

            <form class="card-form" method="POST" action="<?php echo e(setRoute('admin.settings.referral.update')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-3 mb-4 form-group">
                        <label><?php echo e(__("Bonus")); ?> (<?php echo e(__("Amount")); ?>)<span>*</span></label>
                        <div class="input-group">
                            <input type="text" class="form--control number-input" name="bonus" value="<?php echo e(old('bonus',$referral_settings->bonus ?? "")); ?>" placeholder="Enter New User Bonus">
                            <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                        </div>

                    </div>
                    <div class="col-3 mb-4">
                        <?php echo $__env->make('admin.components.form.switcher',[
                            'label'         => 'Balance added to',
                            'name'          => 'wallet_type',
                            'value'         => old('wallet_type', $referral_settings->wallet_type ?? "c_balance"),
                            'options'       => ['Wallet Balance' => 'c_balance','Profit Balance' => 'p_balance'],
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-3 mb-4">
                        <?php echo $__env->make('admin.components.form.switcher',[
                            'label'         => 'Mail Notification',
                            'name'          => 'mail',
                            'value'         => old('mail', $referral_settings->mail ?? 1),
                            'options'       => ['Enable' => 1,'Disable' => 0],
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-3 mb-4">
                        <?php echo $__env->make('admin.components.form.switcher',[
                            'label'         => 'Status',
                            'name'          => 'status',
                            'value'         => old('status', $referral_settings->status ?? 0),
                            'options'       => ['Enable' => 1,'Disable' => 0],
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12">
                    <?php echo $__env->make('admin.components.button.form-btn',[
                        'class'         => "w-100 btn-loading",
                        'text'          => "Update",
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </form>
        </div>

    </div>


    
    <div class="table-area mt-5">
        <div class="table-wrapper">
            
            <div class="table-header">
                <h5 class="title"><?php echo e(__("Level Packages")); ?></h5>
                <div class="table-btn-area">
                    <?php echo $__env->make('admin.components.link.add-default',[
                        'text'          => "Add New",
                        'href'          => "#package-add",
                        'class'         => "modal-btn",
                        'permission'    => "admin.settings.referral.package.store", 
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Title</th>
                            <th>Require Refers</th>
                            <th>Require Invested Amount</th>
                            <th>Commission</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $referral_level_packages ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr data-item='<?php echo json_encode($item, 15, 512) ?>'>
                                <td><?php echo e($key + 1); ?></td>
                                <td>
                                    <?php echo e($item->title); ?>

                                    <?php if($item->default): ?>
                                        <span class="badge badge--success ms-1"><?php echo e(__("Default")); ?></span> 
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item->refer_user); ?>

                                <td><?php echo e(get_amount($item->invested_amount, $default_currency->code)); ?></td>
                                <td>
                                    <?php echo e(get_amount($item->commission, $default_currency->code)); ?>

                                </td>
                                <td>
                                    <?php echo $__env->make('admin.components.link.edit-default',[
                                        'href'          => "javascript:void(0)",
                                        'class'         => "edit-modal-button",
                                        'permission'    => "admin.settings.referral.package.update",
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php echo $__env->make('admin.components.alerts.empty',['colspan' => 7], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <?php if(admin_permission_by_name("admin.settings.referral.package.store")): ?>

        <div id="package-add" class="mfp-hide large">
            <div class="modal-data">
                <div class="modal-header px-0">
                    <h5 class="modal-title"><?php echo e(__("Add New Package For")); ?> <?php echo e(__("Level ")); ?> <?php echo e($referral_level_packages->count() . " - " . $referral_level_packages->count() + 1); ?> </h5>
                </div>
                <div class="modal-form-data">
                    <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.settings.referral.package.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-10-none">

                            <div class="col-6 form-group">
                                <?php echo $__env->make('admin.components.form.input',[
                                    'label'         => 'Title',
                                    'label_after'   => '<span>*</span>',
                                    'name'          => 'title',
                                    'value'         => old('title'),
                                    'placeholder'   => 'ex: Level One',
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-6 form-group">
                                <label><?php echo e(__("Refer Commission")); ?><span>*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form--control number-input" value="<?php echo e(old('commission')); ?>" name="commission" placeholder ='ex: 2'>
                                    <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                                </div>
                                <?php $__errorArgs = ['commission'];
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
                                <label><?php echo e(__("Require Refers")); ?><span>*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form--control number-input" value="<?php echo e(old('refers')); ?>" placeholder ='ex: 50', name="refers">
                                    <span class="input-group-text"><?php echo e(__("Users")); ?></span>
                                </div>
                                <?php $__errorArgs = ['refers'];
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
                                <label><?php echo e(__("Require Invested Amount")); ?><span>*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form--control number-input" value="<?php echo e(old('invested_amount')); ?>" placeholder ='ex: 1000', name="invested_amount">
                                    <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                                </div>
                                <?php $__errorArgs = ['invested_amount'];
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

                            <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                                <button type="submit" class="btn btn--base w-100"><?php echo e(__("Add")); ?></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php endif; ?>

    
    <?php if(admin_permission_by_name("admin.settings.referral.package.update")): ?>

        <div id="package-edit" class="mfp-hide large">
            <div class="modal-data">
                <div class="modal-header px-0">
                    <h5 class="modal-title"><?php echo e(__("Update Package Information")); ?></h5>
                </div>
                <div class="modal-form-data">
                    <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.settings.referral.package.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="target" value="<?php echo e(old('target')); ?>">
                        <div class="row mb-10-none">

                            <div class="col-6 form-group">
                                <?php echo $__env->make('admin.components.form.input',[
                                    'label'         => 'Title',
                                    'label_after'   => '<span>*</span>',
                                    'name'          => 'edit_title',
                                    'value'         => old('edit_title'),
                                    'placeholder'   => 'ex: Level One',
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-6 form-group">
                                <label><?php echo e(__("Refer Commission")); ?><span>*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form--control number-input" value="<?php echo e(old('edit_commission')); ?>" name="edit_commission" placeholder ='ex: 2'>
                                    <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                                </div>
                                <?php $__errorArgs = ['edit_commission'];
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
                                <label><?php echo e(__("Require Refers")); ?><span>*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form--control number-input" value="<?php echo e(old('edit_refers')); ?>" placeholder ='ex: 50', name="edit_refers">
                                    <span class="input-group-text"><?php echo e(__("Users")); ?></span>
                                </div>
                                <?php $__errorArgs = ['edit_refers'];
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
                                <label><?php echo e(__("Require Invested Amount")); ?><span>*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form--control number-input" value="<?php echo e(old('edit_invested_amount')); ?>" placeholder ='ex: 1000', name="edit_invested_amount">
                                    <span class="input-group-text"><?php echo e(get_default_currency_code($default_currency)); ?></span>
                                </div>
                                <?php $__errorArgs = ['edit_invested_amount'];
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

                            <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                                <button type="submit" class="btn btn--base w-100"><?php echo e(__("Update")); ?></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        openModalWhenError('package-add','#package-add');

        $(".edit-modal-button").click(function() {
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var editModal = $("#package-edit");

            editModal.find(".invalid-feedback").remove();
            editModal.find(".form--control").removeClass("is-invalid");

            editModal.find("form").first().find("input[name=target]").val(oldData.id);
            editModal.find("input[name=edit_title]").val(oldData.title);
            editModal.find("input[name=edit_commission]").val(oldData.commission);
            editModal.find("input[name=edit_refers]").val(oldData.refer_user);
            editModal.find("input[name=edit_invested_amount]").val(oldData.invested_amount);

            openModalBySelector("#package-edit");
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/settings/referral/index.blade.php ENDPATH**/ ?>