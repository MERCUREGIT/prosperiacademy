

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
    ], 'active' => __("Money Out Setting")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="custom-card">

        <div class="card-header">
            <h6 class="title"><?php echo e(__("Enable/Disable Money Out Features")); ?></h6>
        </div>

        <div class="card-body">
            <form class="card-form" method="POST" action="<?php echo e(setRoute('admin.settings.money.out.update')); ?>">
                <?php echo csrf_field(); ?>
                <div class="title mb-3 fw-bold"><?php echo e(__('Accessibale wallet for money out')); ?></div>

                <div class="row">
                    <div class="col-3 mb-4">
                        <?php echo $__env->make('admin.components.form.switcher',[
                            'label'         => 'Current Balance',
                            'name'          => 'c_balance',
                            'value'         => old('c_balance',$money_out_settings->c_balance ?? 0),
                            'options'       => ['Enable' => 1,'Disable' => 0],
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-3 mb-4">
                        <?php echo $__env->make('admin.components.form.switcher',[
                            'label'         => 'Profit Balance',
                            'name'          => 'p_balance',
                            'value'         => old('p_balance',$money_out_settings->p_balance ?? 0),
                            'options'       => ['Enable' => 1,'Disable' => 0],
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12">
                    <?php echo $__env->make('admin.components.button.form-btn',[
                        'class'         => "w-100 btn-loading",
                        'text'          => "Update",
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </form>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/settings/money-out/index.blade.php ENDPATH**/ ?>