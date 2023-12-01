

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="table-content">
        <div class="row">
            <div>
                <div class="row justify-content-center mb-30-none">
                    <div class="col-xxl-5 col-xl-4 col-md-12 mb-30">
                        <div class="p-4 card-user h-100">
                            <div class="account-avatar-wrapper">
                                <div class="account-avatar">
                                    <img class=" d-block mx-auto avater" src="<?php echo e(get_image($auth_user->image,'user-profile')); ?>" alt="" height="200" width="200">
                                    <div class="avatar-level-badge">
                                        <span><?php echo e($auth_user->referLevel?->title ?? ""); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="d-flex justify-content-between mt-4 rounded-2 p-2 user-card">
                                    <p class=" m-0 fw-bold"><?php echo e(__("Total Refers")); ?>:</p>
                                    <p class=" m-0 text--base"><?php echo e($auth_user->referUsers->count()); ?></p>
                                </div>
                                <div
                                    class="d-flex justify-content-between mt-4 rounded-2 p-2 user-card">
                                    <p class=" m-0 fw-bold"><?php echo e(__("Total Invested")); ?>:</p>
                                    <p class=" m-0 text--base"><?php echo e(get_amount($auth_user->investPlans->sum('invest_amount'), $default_currency?->code ?? "")); ?></p>
                                </div>
                                <div
                                    class="d-flex justify-content-between mt-4 rounded-2 p-2 user-card">
                                    <p class=" m-0 fw-bold"><?php echo e(__("Current Position")); ?>:</p>
                                    <p class=" m-0"><?php echo e($auth_user->referLevel?->title ?? ""); ?></p>
                                </div>
                                <div
                                    class="d-flex justify-content-between mt-4 rounded-2 p-2 user-card">
                                    <p class=" m-0 fw-bold"><?php echo e(__("Refer code")); ?>:</p>
                                    <div class="refer-code-area">
                                        <p class=" m-0 copiable"><?php echo e($auth_user->referral_id); ?></p> 
                                        <button class="copy-button"><i class="las la-copy"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="refer-link-wrapper">
                                <h4 class="title"><?php echo e(__("Refer Link")); ?>:</h4>
                                <span class="refer-link"><?php echo e(setRoute('user.register',$auth_user->referral_id)); ?></span>
                                <ul class="refer-btn-list">
                                    <li>
                                        <button class="refer-btn copy-button">
                                            <i class="las la-link"></i>
                                        </button>
                                        <span class="d-none copiable"><?php echo e(setRoute('user.register',$auth_user->referral_id)); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="level-progress-area">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-8 col-md-12 mb-30">
                        <div class="account-level-wrapper h-100">
                            <h3 class="title"><?php echo e(__("Account Level")); ?></h3>
                            <div class="row mb-30-none">
                                <?php
                                    $auth_user_earned_levels_ids = $auth_user->earnedLevels->pluck("referral_level_package_id")->toArray();
                                ?>

                                <?php $__currentLoopData = $referral_levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        $current_refer_id = $auth_user->referLevel?->id ?? "";
                                    ?>

                                    <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                                        <div class="account-level-item 
                                        <?php if($current_refer_id == $item->id): ?>
                                            curent
                                        <?php endif; ?>
                                        
                                        <?php if(!in_array($item->id,$auth_user_earned_levels_ids) && $current_refer_id != $item->id): ?>
                                            off
                                        <?php endif; ?>
                                        ">
                                            <div class="account-level-header">
                                                <span><?php echo e($item->title); ?></span>
                                            </div>
                                            <div class="content">
                                                <h6 class="level-title"><?php echo e(__("Requirement")); ?></h6>
                                                <ul>
                                                    <li><?php echo e(__("Refer")); ?>: <span><?php echo e($item->refer_user); ?></span></li>
                                                    <li><?php echo e(__("Invest")); ?>: <span><?php echo e(get_amount($item->invested_amount,$default_currency?->code ?? "")); ?></span></li>
                                                </ul>
                                                <h6 class="level-title"><?php echo e(__("Commission")); ?></h6>
                                                <ul>
                                                <li><?php echo e(__("Per Refer")); ?>: <span><?php echo e(get_amount($item->commission, $default_currency?->code ?? "")); ?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- table -->
                <div class="table-area pt-40 pb-30">
                    <div class="d-flex justify-content-between align-items-center my-escrow">
                        <div class="dash-section-title">
                            <h4><?php echo e(__("Referral Users")); ?></h4>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="table-area">
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Refer Code</th>
                                            <th>Joined Date</th>
                                            <th>Referred Users</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $refer_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td data-label="User Name"><?php echo e($item->user->fullname); ?></td>
                                                <td data-label="Refer Code"><?php echo e($item->user->referral_id); ?></td>
                                                <td data-label="Joined Date"><?php echo e($item->user->created_at->format('d-m-Y')); ?></td>
                                                <td data-label="Referred Users"><?php echo e($item->user->referUsers->count()); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php echo $__env->make('admin.components.alerts.empty',['colspan' => 4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php echo e(get_paginate($refer_users)); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/sections/refer-level/index.blade.php ENDPATH**/ ?>