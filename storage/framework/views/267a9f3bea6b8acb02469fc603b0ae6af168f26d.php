<?php if(admin_permission_by_name("admin.users.send.mail")): ?>
    <div id="email-send" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title"><?php echo e(__("Send Email")); ?></h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.users.send.mail',$user->username)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row mb-10-none">
                        <div class="col-xl-12 col-lg-12 form-group">
                            <?php echo $__env->make('admin.components.form.input',[
                                'label'         => 'Subject*',
                                'name'          => 'subject',
                                'value'         => old('subject'),
                                'placeholder'   => "Write Here...",
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            <?php echo $__env->make('admin.components.form.input-text-rich',[
                                'label'         => 'Message*',
                                'name'          => 'message',
                                'value'         => old('message'),
                                'placeholder'   => "Write Here...",
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <button type="button" class="btn btn--danger modal-close"><?php echo e(__("Close")); ?></button>
                            <button type="submit" class="btn btn--base"><?php echo e(__("Send")); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/modals/send-mail-user.blade.php ENDPATH**/ ?>