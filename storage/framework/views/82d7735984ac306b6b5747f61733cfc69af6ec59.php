<?php
    $app_local = get_default_language_code();
?>


<?php $__env->startPush('css'); ?>
    <style>
        .fileholder {
            min-height: 194px !important;
        }

        .fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,.fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view{
            height: 150px !important;
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
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title"><?php echo e(__("Categories")); ?></h5>
                <div class="table-btn-area">
                    <?php echo $__env->make('admin.components.link.add-default',[
                        'text'          => "Add Category",
                        'href'          => "#category-add",
                        'class'         => "modal-btn",
                        'permission'    => "admin.setup.sections.announcement.category.store",
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $categories ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr data-item="<?php echo e(json_encode($item)); ?>">
                                <td><?php echo e($item->name?->language?->$app_local?->name ?? null); ?></td>
                                <td>
                                    <?php echo $__env->make('admin.components.form.switcher',[
                                        'name'          => 'status',
                                        'value'         => $item->status,
                                        'options'       => ['Active' => 1,'Deactive' => 0],
                                        'onload'        => true,
                                        'data_target'   => $item->id,
                                        'permission'    => "admin.setup.sections.announcement.category.status.update",
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                                <td><?php echo e($item->created_at->format("d-m-y h:i:s")); ?></td>
                                <td>
                                    <?php echo $__env->make('admin.components.link.edit-default',[
                                        'href'          => "javascript:void(0)",
                                        'class'         => "edit-modal-button",
                                        'permission'    => "admin.setup.sections.announcement.category.update",
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('admin.components.link.delete-default',[
                                        'href'          => "javascript:void(0)",
                                        'class'         => "delete-modal-button",
                                        'permission'    => "admin.setup.sections.announcement.category.delete",
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

    
    <?php if(admin_permission_by_name("admin.setup.sections.announcement.category.store")): ?>
        <div id="category-add" class="mfp-hide large">
            <div class="modal-data">
                <div class="modal-header px-0">
                    <h5 class="modal-title"><?php echo e(__("Add Category")); ?></h5>
                </div>
                <div class="modal-form-data">
                    <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.setup.sections.announcement.category.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-10-none">
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
                                                <div class="col-xl-12 col-lg-12 form-group">
                                                    <?php echo $__env->make('admin.components.form.input',[
                                                        'label'         => 'Name',
                                                        'label_after'   => '*',
                                                        'name'          => $item->code . "_name",
                                                        'value'         => old($item->code . "_name")
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                                <button type="button" class="btn btn--danger modal-close"><?php echo e(__("Cancel")); ?></button>
                                <button type="submit" class="btn btn--base"><?php echo e(__("Add")); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if(admin_permission_by_name("admin.setup.sections.announcement.category.update")): ?>
        <div id="category-update" class="mfp-hide large">
            <div class="modal-data">
                <div class="modal-header px-0">
                    <h5 class="modal-title"><?php echo e(__("Update Category")); ?></h5>
                </div>
                <div class="modal-form-data">
                    <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.setup.sections.announcement.category.update')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="target" value="<?php echo e(old('target')); ?>">
                        <div class="row mb-10-none">
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
                                                <div class="col-xl-12 col-lg-12 form-group">
                                                    <?php echo $__env->make('admin.components.form.input',[
                                                        'label'         => 'Name',
                                                        'label_after'   => '*',
                                                        'name'          => $item->code . "_name_edit",
                                                        'value'         => old($item->code . "_name_edit")
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
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
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>

        var languages = "<?php echo e($__languages); ?>";
        languages = JSON.parse(languages.replace(/&quot;/g,'"'));
        var appLocal = "<?php echo e($app_local); ?>";

        $(document).ready(function(){
            // Switcher
            switcherAjax("<?php echo e(setRoute('admin.setup.sections.announcement.category.status.update')); ?>");

            openModalWhenError("category-update","#category-update");
        })

        $(".delete-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));

            var actionRoute =  "<?php echo e(setRoute('admin.setup.sections.announcement.category.delete')); ?>";
            var target      = oldData.id;
            var message     = `Are you sure to delete <strong>${oldData?.name?.language[appLocal]?.name}</strong> category?`;

            openDeleteModal(actionRoute,target,message);
        });

        $(document).on("click",".edit-modal-button",function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var editModal = $("#category-update");

            editModal.find(".invalid-feedback").remove();
            editModal.find(".form--control").removeClass("is-invalid");

            editModal.find("form").first().find("input[name=target]").val(oldData.id);

            $.each(languages,function(index,item) {
                editModal.find("input[name="+item.code+"_name_edit]").val(oldData?.name.language[item.code]?.name);
            });

            openModalBySelector("#category-update");
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/setup-sections/announcement/category/index.blade.php ENDPATH**/ ?>