<?php if(admin_permission_by_name("admin.subscriber.send.mail")): ?>
    <div id="send-mail-subscribers" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title"><?php echo e(__("Send mail to all subscribers")); ?></h5>
            </div>
            <div class="modal-form-data">
                <form class="card-form" action="<?php echo e(setRoute('admin.subscriber.send.mail')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row mb-10-none">
                        <div class="col-xl-12 col-lg-12 form-group">
                            <?php echo $__env->make('admin.components.form.input',[
                                'label'         => "Subject*",
                                'name'          => "subject",
                                'data_limit'    => 150,
                                'placeholder'   => "Write Subject...",
                                'value'         => old('subject'),
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            <?php echo $__env->make('admin.components.form.input-text-rich',[
                                'label'         => "Details*",
                                'name'          => "message",
                                'value'         => old('message'),
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            <?php echo $__env->make('admin.components.button.form-btn',[
                                'class'         => "w-100 btn-loading",
                                'permission'    => "admin.subscriber.send.mail",
                                'text'          => "Send Email",
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $__env->startPush("script"); ?>

    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/modals/subsciber-send-mail.blade.php ENDPATH**/ ?>