

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
    ], 'active' => __("Setup Email")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title"><?php echo e(__("Email Method")); ?></h6>
        </div>
        <div class="card-body">
            <form class="card-form" method="POST" action="<?php echo e(setRoute('admin.setup.email.config.update')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field("PUT"); ?>
                <div class="row mb-10-none">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row align-items-end">
                            <div class="col-xl-10 col-lg-10 form-group">
                                <label><?php echo e(__("Email Send Method*")); ?></label>
                                <select class="form--control nice-select" name="method">
                                    <option disabled selected>Select Method</option>
                                    <option value="smtp" <?php if(isset($email_config->method) && $email_config->method == "smtp"): ?>
                                        <?php if(true): echo 'selected'; endif; ?>
                                    <?php endif; ?>>SMTP</option>

                                    
                                </select>
                                <?php $__errorArgs = ["method"];
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
                            <div class="col-xl-2 col-lg-2 form-group">
                                <!-- Open Modal For Test Email Send -->
                                <?php echo $__env->make('admin.components.link.custom',[
                                    'class'         => "btn--base modal-btn w-100",
                                    'href'          => "#test-mail",
                                    'text'          => "Send Mail",
                                    'permission'    => "admin.setup.email.test.mail.send",
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'     => "Host*",
                            'name'      => 'host',
                            'value'     => old('host',$email_config->host ?? ""),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-5 col-lg-5 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'     => "Port*",
                            'name'      => 'port',
                            'type'      => 'number',
                            'value'     => old('port',$email_config->port ?? ""),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <?php echo $__env->make('admin.components.form.switcher',[
                            'label'     => "Encryption*",
                            'name'      => 'encryption',
                            'options'   => ['SSL' => "ssl",'TLS' => "tls"],
                            'value'     => old('encryption',$email_config->encryption ?? ""),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'     => "Username*",
                            'name'      => 'username',
                            'value'     => old('username',$email_config->username ?? ""),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group" id="show_hide_password">
                        <?php echo $__env->make('admin.components.form.input-password',[
                            'label'         => 'Password*',
                            'placeholder'   => 'Password' ,
                            'name'          => 'password',
                            'value'         => old('password',$email_config->password ?? ""),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => "Update",
                            'permission'    => "admin.setup.email.config.update",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <?php echo $__env->make('admin.components.modals.send-text-mail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/setup-email/config.blade.php ENDPATH**/ ?>