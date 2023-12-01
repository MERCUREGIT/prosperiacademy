

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
                            <h4><?php echo e(__('Profit Investment')); ?></h4>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="table-area">
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>Plan</th>
                                            <th>Duration</th>
                                            <th>Investment</th>
                                            <th>Profit</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $profit_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td data-label="Plan"><?php echo e($item->invest->investPlan->name); ?></td>
                                                <td data-label="Duration"><?php echo e($item->invest->investPlan->duration); ?> <?php echo e(__("Days")); ?></td>
                                                <td data-label="Investment"><?php echo e($item->userWallet->currency->symbol . "" . $item->invest->invest_amount); ?></td>
                                                <td data-label="Profit"><?php echo e($item->userWallet->currency->symbol . "" . $item->profit_amount); ?></td>
                                                <td data-label="Company"><?php echo e($item->created_at->format("d-m-Y H:i")); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php echo $__env->make('admin.components.alerts.empty',['colspan' => 10 , 'class' => "alert-warning"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php echo e(get_paginate($profit_logs)); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/sections/profit-log/index.blade.php ENDPATH**/ ?>