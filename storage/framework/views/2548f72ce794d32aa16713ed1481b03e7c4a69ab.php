

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="table-content">
        <div class="row">
            <div class="header-title">
                <!-- table -->
                <div class="table-area pt-20 pb-30">
                    <div class="d-flex justify-content-between">
                        <div class="dash-section-title">
                            <h4><?php echo e(__("Investment")); ?></h4>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="table-area table-responsive">
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>Plan</th>
                                            <th>Duration</th>
                                            <th>Invest Amount</th>
                                            <th>Profit (Percent)</th>
                                            <th>Proft (Fixed)</th>
                                            <th>Current Balance</th>
                                            <th>Profit Return Type</th>
                                            <th>Status</th>
                                            <th>Purchase At</th>
                                            <th>Expire At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $investments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td data-label="Name"><?php echo e($item->investPlan->name); ?></td>
                                                <td data-label="Duration"><?php echo e($item->investPlan->duration . " Day"); ?></td>
                                                <td data-label="Invest Amount"><?php echo e(get_amount($item->invest_amount,$default_currency->symbol,4)); ?></td>
                                                <td data-label="Profit (Percent)"><?php echo e(get_amount($item->investPlan->profit_percent,"%",1)); ?></td>
                                                <td data-label="Profit (Fixed)"><?php echo e(get_amount($item->investPlan->profit_fixed,$default_currency->symbol,4)); ?></td>
                                                <td data-label="Current Balance"><?php echo e(get_amount($user->wallets->first()->balance,$default_currency->symbol,4)); ?></td>
                                                <td data-label="Profit Return Type"><?php echo e($item->investPlan->profit_return_type); ?></td>
                                                <td data-label="Status"> 
                                                    <?php if($item->status == global_const()::RUNNING): ?>
                                                        <span class="badge badge--warning"><?php echo e(__("Running")); ?></span>
                                                    <?php elseif($item->status == global_const()::COMPLETE): ?>
                                                        <span class="badge badge--success"><?php echo e(__("Completed")); ?></span>
                                                    <?php elseif($item->status == global_const()::CANCEL): ?>
                                                        <span class="badge badge--danger"><?php echo e(__("Cancel")); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td data-label="Purchase At"><?php echo e($item->created_at->format("d-m-Y H:i")); ?></td>
                                                <td data-label="Expire At"><?php echo e(\Carbon\Carbon::parse($item->exp_at)->subMinute()->format("d-m-Y H:i")); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php echo $__env->make('admin.components.alerts.empty',['colspan' => 10 , 'class' => "alert-warning"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php echo e(get_paginate($investments)); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/sections/my-invest/index.blade.php ENDPATH**/ ?>