<div id="brand-add" class="mfp-hide large">
    <div class="modal-data">
        <div class="modal-header px-0">
            <h5 class="modal-title"><?php echo e(__("Add Brand")); ?></h5>
        </div>
        <div class="modal-form-data">
            <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.setup.sections.section.item.store',$slug)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row mb-10-none mt-3">
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.form.input-file',[
                            'label'             => "Image:",
                            'name'              => "image",
                            'class'             => "file-holder",
                            'old_files_path'    => files_asset_path("site-section"),
                            'old_files'         => $data->value->items->image ?? "",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                        <button type="button" class="btn btn--danger modal-close"><?php echo e(__("Cancel")); ?></button>
                        <button type="submit" class="btn btn--base"><?php echo e(__("Add")); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/modals/site-section/add-brand-item.blade.php ENDPATH**/ ?>