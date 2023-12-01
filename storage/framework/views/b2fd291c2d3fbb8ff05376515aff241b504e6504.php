

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="table-content">
        <div class="row">
            <div class="header-title">
                <!-- table -->
                <div class="table-area pt-20 pb-30">
                    <div class="dash-section-title mb-30">
                        <h4><?php echo e(__("Latest Transactions History")); ?></h4>
                    </div>

                    <?php echo $__env->make('user.components.transaction.log',[
                        'logs'      => $transaction_logs,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if(count($transaction_logs) == 0): ?>
                        <div class="alert alert-warning text-center"><?php echo e(__("No data found!")); ?></div>
                    <?php endif; ?>

                    <!-- pagination -->
                    <?php echo e(get_paginate($transaction_logs)); ?>

                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/sections/transaction/index.blade.php ENDPATH**/ ?>