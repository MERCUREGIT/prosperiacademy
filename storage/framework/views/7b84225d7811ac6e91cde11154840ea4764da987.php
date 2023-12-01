

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
        'active' => __('Contact Messages'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title"><?php echo e(__($page_title)); ?></h5>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Reply</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $contact_requests ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr data-item="<?php echo e(json_encode($item->only(['id']))); ?>">
                                <td><?php echo e($key + $contact_requests->firstItem()); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->email); ?></td>
                                <td><?php echo e($item->message); ?></td>
                                <td>
                                    <?php if($item->reply == true): ?>
                                        <span class="badge badge--success"><?php echo e(__("Replyed")); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge--warning"><?php echo e(__("Not Replyed")); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item->created_at->format("d-m-Y H:i:s")); ?></td>
                                <td>
                                    <?php echo $__env->make('admin.components.link.custom',[
                                        'href'          => "#send-reply",
                                        'class'         => "btn btn--base reply-button modal-btn",
                                        'icon'          => "las la-reply-all",
                                        'permission'    => "admin.contact.messages.reply",
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
        <?php echo e(get_paginate($contact_requests)); ?>

    </div>

    
    <?php if(admin_permission_by_name("admin.contact.messages.reply")): ?>
        <div id="send-reply" class="mfp-hide large">
            <div class="modal-data">
                <div class="modal-header px-0">
                    <h5 class="modal-title"><?php echo e(__("Send Reply")); ?></h5>
                </div>
                <div class="modal-form-data">
                    <form class="card-form" action="<?php echo e(setRoute('admin.contact.messages.reply')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="target" value="<?php echo e(old('target')); ?>">
                        <div class="row mb-10-none">
                            <div class="col-xl-12 col-lg-12 form-group">
                                <?php echo $__env->make('admin.components.form.input',[
                                    'label'         => "Subject*",
                                    'name'          => "subject",
                                    'data_limit'    => 150,
                                    'placeholder'   => "Write Subject...",
                                    'value'         => old('subject'),
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <?php echo $__env->make('admin.components.form.input-text-rich',[
                                    'label'         => "Details*",
                                    'name'          => "message",
                                    'value'         => old('message'),
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <?php echo $__env->make('admin.components.button.form-btn',[
                                    'class'         => "w-100 btn-loading",
                                    'permission'    => "admin.subscriber.send.mail",
                                    'text'          => "Send Email",
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        openModalWhenError("send-reply","#send-reply");

        $(".reply-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            $("#send-reply").find("input[name=target]").val(oldData.id);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/contact-request/index.blade.php ENDPATH**/ ?>