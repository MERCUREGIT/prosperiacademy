<?php
    $default_lang_code = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();
    $languages_for_js_use = $languages->toJson();
?>



<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/fontawesome-iconpicker.min.css')); ?>">
    <style>
        .fileholder {
            min-height: 374px !important;
        }

        .fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,.fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view{
            height: 330px !important;
        }
    </style>
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
    ], 'active' => __("Setup Section")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title"><?php echo e(__($page_title)); ?></h6>
        </div>
        <div class="card-body">
            <form class="card-form" action="<?php echo e(setRoute('admin.setup.sections.section.update',$slug)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row justify-content-center mb-10-none">
                    <div class="col-xl-12 col-lg-12">
                        <div class="product-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button class="nav-link <?php if(get_default_language_code() == $item->code): ?> active <?php endif; ?>" id="<?php echo e($item->name); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo e($item->name); ?>" type="button" role="tab" aria-controls="<?php echo e($item->name); ?>" aria-selected="true"><?php echo e($item->name); ?></button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $lang_code = $item->code;
                                    ?>
                                    <div class="tab-pane <?php if(get_default_language_code() == $item->code): ?> fade show active <?php endif; ?>" id="<?php echo e($item->name); ?>" role="tabpanel" aria-labelledby="english-tab">
                                        <div class="form-group">
                                            <?php echo $__env->make('admin.components.form.input',[
                                                'label'         => "Heading",
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_heading",
                                                'value'         => old($item->code . "_heading",$data->value->language->$lang_code->heading ?? "")
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $__env->make('admin.components.form.input',[
                                                'label'         => "Sub Heading",
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_sub_heading",
                                                'value'         => old($item->code . "_sub_heading",$data->value->language->$lang_code->sub_heading ?? "")
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => "Update",
                            'permission'    => "admin.setup.sections.section.update"
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-area mt-15">
        <div class="table-wrapper">
            <div class="table-header justify-content-end">
                <div class="table-btn-area">
                    <a href="#client-feedback-add" class="btn--base modal-btn"><i class="fas fa-plus me-1"></i> <?php echo e(__("Add Feedback")); ?></a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $data->value->items ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr data-item="<?php echo e(json_encode($item)); ?>">
                                <td>
                                    <ul class="user-list">
                                        <li><img src="<?php echo e(get_image($item->image ?? "","site-section")); ?>" alt="product"></li>
                                    </ul>
                                </td>
                                <td><span class="text--info"><?php echo e($item->name ?? ""); ?></span></td>
                                <td><span class="text--dark"><?php echo e($item->designation ?? ""); ?></span></td>
                                <td><span title="<?php echo e($item->language?->$system_default_lang?->comment ?? ""); ?>" class="text--dark"><?php echo e(Str::words($item->language?->$system_default_lang?->comment ?? "", 8, '...')); ?></span></td>
                                <td>
                                    <button class="btn btn--base edit-modal-button"><i class="las la-pencil-alt"></i></button>
                                    <button class="btn btn--base btn--danger delete-modal-button" ><i class="las la-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php echo $__env->make('admin.components.alerts.empty',['colspan' => 5], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.components.modals.site-section.add-client-feedback-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
    <div id="client-feedback-update" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title"><?php echo e(__("Update Feedback")); ?></h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.setup.sections.section.item.update',$slug)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="target" value="<?php echo e(old('target')); ?>">

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
                                                'name'          => $lang_code . "_comment_edit",
                                                'value'         => old($lang_code . "_comment_edit")
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
                                'name'          => "name_edit",
                                'value'         => old("name_edit")
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            <?php echo $__env->make('admin.components.form.input',[
                                'label'         => "Designation",
                                'label_after'   => "*",
                                'name'          => "designation_edit",
                                'value'         => old("designation_edit")
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <input type="hidden" name="old_image" value="<?php echo e(old('old_image')); ?>">
                        <div class="col-xl-12 col-lg-12 form-group">
                            <?php echo $__env->make('admin.components.form.input-file',[
                                'label'             => "Image",
                                'name'              => "image_edit",
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
                                'name'              => "star_edit",
                                'value'             => old("star_edit"),
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/backend/js/fontawesome-iconpicker.js')); ?>"></script>
    <script>
        // icon picker
        $('.icp-auto').iconpicker();
    </script>
    <script>
        openModalWhenError("client-feedback-add","#client-feedback-add");
        openModalWhenError("client-feedback-update","#client-feedback-update");

        var default_language = "<?php echo e($default_lang_code); ?>";
        var system_default_language = "<?php echo e($system_default_lang); ?>";
        var languages = "<?php echo e($languages_for_js_use); ?>";
        languages = JSON.parse(languages.replace(/&quot;/g,'"'));

        $(".delete-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));

            var actionRoute =  "<?php echo e(setRoute('admin.setup.sections.section.item.delete',$slug)); ?>";
            var target = oldData.id;
            var message     = `Are you sure to <strong>delete</strong> item?`;

            openDeleteModal(actionRoute,target,message);
        });

        $(".edit-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var editModal = $("#client-feedback-update");

            editModal.find("form").first().find("input[name=target]").val(oldData.id);

            $.each(languages,function(index,item) {
                editModal.find("textarea[name="+item.code+"_comment_edit]").val(oldData.language[item.code]?.comment);
            });

            editModal.find("input[name=name_edit").val(oldData.name);
            editModal.find("input[name=designation_edit").val(oldData.designation);
            editModal.find("input[name=star_edit").val(oldData.star);
            editModal.find("input[name=old_image]").val(oldData.image);
            editModal.find("input[name=image_edit]").attr("data-preview-name",oldData.image);

            fileHolderPreviewReInit("#client-feedback-update input[name=image_edit]");

            openModalBySelector("#client-feedback-update");

        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/setup-sections/clients-feedback-section.blade.php ENDPATH**/ ?>