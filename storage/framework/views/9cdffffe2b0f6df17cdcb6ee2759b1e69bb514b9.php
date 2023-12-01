

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
    ], 'active' => __("Investment Plan")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title"><?php echo e(__("Investment Plan")); ?></h5>
                <div class="table-btn-area">
                    
                    <?php echo $__env->make('admin.components.link.add-default',[
                        'text'          => "Create Plan",
                        'href'          => setRoute('admin.invest.plan.create'),
                        'permission'    => "admin.invest.plan.create", 
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Duration</th>
                            <th>Profit Return Type</th>
                            <th>Min Invest</th>
                            <th>Min Invest (Offer)</th>
                            <th>Max Invest</th>
                            <th>Profit (Fixed)</th>
                            <th>Profit (%)</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $investment_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(($investment_plans->perPage() * ($investment_plans->currentPage() - 1)) + ($key + 1)); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td title="<?php echo e($item->title); ?>"><?php echo e(Str::words($item->title, 4, '...')); ?></td>
                                <td><?php echo e($item->duration); ?></td>
                                <td><?php echo e($item->profit_return_type); ?></td>
                                <td><?php echo e(get_amount($item->min_invest,$default_currency->code,4)); ?></td>
                                <td><?php echo e(get_amount($item->min_invest_offer,$default_currency->code,4)); ?></td>
                                <td><?php echo e(get_amount($item->max_invest,$default_currency->code,4)); ?></td>
                                <td><?php echo e(get_amount($item->profit_fixed,$default_currency->code,4)); ?></td>
                                <td><?php echo e(get_amount($item->profit_percent,"%")); ?></td>
                                <td>
                                    <?php echo $__env->make('admin.components.form.switcher',[
                                        'name'          => 'plan_status',
                                        'value'         => $item->status,
                                        'options'       => ['Enable' => 1,'Disable' => 0],
                                        'onload'        => true,
                                        'data_target'   => $item->id,
                                        'permission'    => "admin.plan.status.update",
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                                <td><?php echo e($item->created_at->format("d-m-Y H:i A")); ?></td>
                                <td>
                                    <?php echo $__env->make('admin.components.link.edit-default',[
                                        'href'          => setRoute('admin.invest.plan.edit',$item->slug),
                                        'class'         => "edit-modal-button",
                                        'permission'    => "admin.invest.plan.edit",
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php echo $__env->make('admin.components.alerts.empty',['colspan' => 13], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo e(get_paginate($investment_plans)); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            switcherAjax("<?php echo e(setRoute('admin.invest.plan.status.update')); ?>");
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/invest-plan/index.blade.php ENDPATH**/ ?>