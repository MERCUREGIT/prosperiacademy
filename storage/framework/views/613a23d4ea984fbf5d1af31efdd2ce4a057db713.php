<div id="client-feedback-add" class="mfp-hide large">
    <div class="modal-data">
        <div class="modal-header px-0">
            <h5 class="modal-title"><?php echo e(__("Add Feedback")); ?></h5>
        </div>
        <div class="modal-form-data">
            <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.setup.sections.section.item.store',$slug)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row mb-10-none mt-3">
                    <div class="language-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button class="nav-link <?php if(get_default_language_code() == $item->code): ?> active <?php endif; ?>" id="modal-<?php echo e($item->name); ?>-tab" data-bs-toggle="tab" data-bs-target="#modal-<?php echo e($item->name); ?>" type="button" role="tab" aria-controls="modal-<?php echo e($item->name); ?>" aria-selected="true"><?php echo e($item->name); ?></button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $lang_code = $item->code;
                                ?>
                                <div class="tab-pane <?php if(get_default_language_code() == $item->code): ?> fade show active <?php endif; ?>" id="modal-<?php echo e($item->name); ?>" role="tabpanel" aria-labelledby="modal-<?php echo e($item->name); ?>-tab">
                                    <div class="form-group">
                                        <?php echo $__env->make('admin.components.form.textarea',[
                                            'label'         => "Comment",
                                            'label_after'   => "*",
                                            'name'          => $lang_code . "_comment",
                                            'value'         => old($lang_code . "_comment",$data->value->language->$lang_code->comment ?? "")
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Name",
                            'label_after'   => "*",
                            'name'          => "name",
                            'value'         => old("name",$data->value->language->$lang_code->name ?? "")
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Designation",
                            'label_after'   => "*",
                            'name'          => "designation",
                            'value'         => old("designation",$data->value->language->$lang_code->designation ?? "")
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.form.input-file',[
                            'label'             => "Image",
                            'name'              => "image",
                            'class'             => "file-holder",
                            'old_files_path'    => files_asset_path("site-section"),
                            'old_files'         => old("old_image"),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'             => "Star",
                            'label_after'       => " (Max 5)",
                            'type'              => "number",
                            'name'              => "star",
                            'value'             => old("star"),
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
</div><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/modals/site-section/add-client-feedback-item.blade.php ENDPATH**/ ?>