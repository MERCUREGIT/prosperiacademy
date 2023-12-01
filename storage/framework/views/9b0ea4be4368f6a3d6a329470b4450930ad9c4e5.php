

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo $__env->make('admin.components.page-title', ['title' => __($page_title)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __('Dashboard'),
                'url' => setRoute('admin.dashboard'),
            ],
        ],
        'active' => __('Extensions'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title"><?php echo e(__("Extensions")); ?></h5>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr data-image="<?php echo e($item->support_image); ?>">
                                <td>
                                    <ul class="user-list">
                                        <li><img src="<?php echo e(get_image($item->image, 'extensions')); ?>" alt="image"></li>
                                    </ul>
                                </td>
                                <td><?php echo e($item->name ? $item->name : ''); ?></td>
                                <td>
                                    <?php echo $__env->make('admin.components.form.switcher', [
                                        'name' => 'status',
                                        'data_target' => $item->id,
                                        'value' => $item->status,
                                        'options' => ['Enable' => 1, 'Disabled' => 0],
                                        'onload' => true,
                                        'permission' => "admin.extension.status.update",
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                                <td>
                                    <?php if(admin_permission_by_name("admin.extension.update")): ?>
                                        <button type="button" class="btn btn--base edit-button" data-name="<?php echo e(__($item->name)); ?>"
                                            data-shortcode="<?php echo e(json_encode($item->shortcode)); ?>"
                                            data-action="<?php echo e(setRoute('admin.extension.update', $item->id)); ?>">
                                            <i class="las la-pencil-alt"></i>
                                        </button>
                                    <?php endif; ?>

                                    <button class="btn btn--base helpButton" data-description="<?php echo e(__($item->description)); ?>" data-support="<?php echo e(__($item->support)); ?>"><i class="las la-info-circle"></i></button>
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

    
    <?php echo $__env->make('admin.components.modals.extension-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div id="instruction-modal" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title"><?php echo e(__("Instructions")); ?></h5>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            
            $('.helpButton').on('click', function() {
                var modal = $('#instruction-modal');
                var image = $(this).parents("tr").attr('data-image');
                var path = "<?php echo e(files_asset_path('extensions')); ?>";
                var imgLink = path + "/" + image;
                modal.find('.modal-body').html(`<div class="mb-2">${$(this).data('description')}</div>`);
                if ($(this).data('support') != 'na') {
                    modal.find('.modal-body').append(`<img src="${imgLink}">`);
                }
                openModalBySelector("#instruction-modal");
            });

        })(jQuery);
        switcherAjax("<?php echo e(setRoute('admin.extension.status.update')); ?>");
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/extensions/index.blade.php ENDPATH**/ ?>