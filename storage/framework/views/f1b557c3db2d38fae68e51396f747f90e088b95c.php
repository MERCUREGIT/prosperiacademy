<?php
    $app_local = get_default_language_code();
?>


<?php $__env->startPush('css'); ?>
    <style>
        .switch-toggles{
            margin-left: auto;
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
    ], 'active' => __("Useful Links")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title"><?php echo e(__($page_title)); ?></h5>
                <?php echo $__env->make('admin.components.link.add-default',[
                    'text'          => "Add Link",
                    'href'          => "#link-add",
                    'class'         => "modal-btn",
                    'permission'    => "admin.useful.links.store", 
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $useful_links ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr data-item="<?php echo e(json_encode($item->only(['id']))); ?>">
                                <td><?php echo e($item->title->language?->$app_local?->title ?? ""); ?></td>
                                <td><?php echo e($item->slug); ?></td>
                                <td>
                                    <?php echo $__env->make('admin.components.form.switcher',[
                                        'name'          => 'status',
                                        'value'         => $item->status,
                                        'options'       => ['Enable' => 1,'Disable' => 0],
                                        'onload'        => true,
                                        'data_target'   => $item->id,
                                        'permission'    => "admin.useful.links.status.update",
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                                <td>
                                    <?php echo $__env->make('admin.components.link.edit-default',[
                                        'href'          => setRoute('admin.useful.links.edit',$item->slug),
                                        'class'         => "edit-modal-button",
                                        'permission'    => "admin.useful.links.edit",
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php if($item->editable == true): ?>
                                        <?php echo $__env->make('admin.components.link.delete-default',[
                                            'href'          => "javascript:void(0)",
                                            'class'         => "delete-modal-button",
                                            'permission'    => "admin.useful.links.delete",
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php echo $__env->make('admin.components.alerts.empty',['colspan' => 4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    
    <?php if(admin_permission_by_name("admin.useful.links.store")): ?>
        <div id="link-add" class="mfp-hide large">
            <div class="modal-data">
                <div class="modal-header px-0">
                    <h5 class="modal-title"><?php echo e(__("Add link")); ?></h5>
                </div>
                <div class="modal-form-data">
                    <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.useful.links.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-10-none">
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
                                                <?php echo $__env->make('admin.components.form.input',[
                                                    'label'         => "Title",
                                                    'label_after'   => "*",
                                                    'name'          => $lang_code . "_title",
                                                    'value'         => old($lang_code . "_title")
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                            <div class="form-group">
                                                <?php echo $__env->make('admin.components.form.input-text-rich',[
                                                    'label'         => "Content",
                                                    'label_after'   => "*",
                                                    'name'          => $lang_code . "_content",
                                                    'value'         => old($lang_code . "_content"),
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 form-group">
                                <?php echo $__env->make('admin.components.form.input',[
                                    'label'         => "Slug",
                                    'label_after'   => "* (Use for make page link (URL))",
                                    'name'          => "slug",
                                    'value'         => old("slug"),
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                                <button type="button" class="btn btn--danger modal-close"><?php echo e(__("Close")); ?></button>
                                <button type="submit" class="btn btn--base"><?php echo e(__("Add")); ?></button>
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

        $(document).ready(function(){
            openModalWhenError('link-add','#link-add');
        });

        // Switcher
        switcherAjax("<?php echo e(setRoute('admin.useful.links.status.update')); ?>");


        $(".delete-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));

            var actionRoute =  "<?php echo e(setRoute('admin.useful.links.delete')); ?>";
            var target      = oldData.id;
            var message     = `Are you sure to delete this link?`;

            openDeleteModal(actionRoute,target,message);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/useful-links/index.blade.php ENDPATH**/ ?>