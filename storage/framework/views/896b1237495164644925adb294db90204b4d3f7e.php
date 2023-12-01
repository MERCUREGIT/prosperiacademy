<?php if(admin_permission_by_name("admin.languages.update")): ?>
    <div id="language-edit" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title"><?php echo e(__("Edit Language")); ?></h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.languages.update')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("PUT"); ?>
                    <input type="hidden" name="target">
                    <div class="row mb-10-none mt-2">
                        <div class="col-xl-6 col-lg-6 form-group">
                            <?php echo $__env->make('admin.components.form.input',[
                                'label'         => 'Language Name*',
                                'name'          => 'edit_name',
                                'value'         => old('edit_name')
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 form-group">
                            <?php echo $__env->make('admin.components.form.input',[
                                'label'         => 'Language Code*',
                                'name'          => 'edit_code',
                                'value'         => old('edit_code')
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            <?php echo $__env->make('admin.components.form.switcher',[
                                'label'         => 'Direction*',
                                'name'          => 'edit_dir',
                                'value'         => old('edit_dir'),
                                'options'       => ['LTR' => 'ltr','RTL' => 'rtl'],
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <button type="button" class="btn btn--danger modal-close"><?php echo e(__("Cancel")); ?></button>
                            <button type="submit" class="btn btn--base"><?php echo e(__("Update")); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $__env->startPush("script"); ?>
        <script>
            openModalWhenError("language-edit","#language-edit");
            $(".edit-modal-button").click(function(){
                var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
                var editModal = $("#language-edit");

                editModal.find("form").first().find("input[name=target]").val(oldData.id);
                editModal.find("input[name=edit_name]").val(oldData.name);
                editModal.find("input[name=edit_code]").val(oldData.code);
                editModal.find("input[name=edit_dir]").val(oldData.dir);

                refreshSwitchers("#language-edit");
                openModalBySelector("#language-edit");
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/modals/language/edit.blade.php ENDPATH**/ ?>