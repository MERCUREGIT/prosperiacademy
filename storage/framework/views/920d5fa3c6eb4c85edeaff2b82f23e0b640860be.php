<table class="custom-table transaction-search-table">
    <thead>
        <tr>
            <th></th>
            <th>Trx ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Amount</th>
            <th>Gateway</th>
            <th>Status</th>
            <th>Time</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td>
                    <ul class="user-list">
                        <li><img src="<?php echo e(get_image($item->creator->image,'user-profile')); ?>" alt="user"></li>
                    </ul>
                </td>
                <td><?php echo e($item->trx_id); ?></td>
                <td><?php echo e($item->creator->full_name); ?></td>
                <td><?php echo e($item->creator->email); ?></td>
                <td><?php echo e($item->creator->username); ?></td>
                <td><?php echo e($item->creator->full_mobile ?? ''); ?></td>
                <td><?php echo e(get_amount($item->request_amount,$item->request_currency)); ?></td>
                <td><span class="text--info"><?php echo e($item->gateway_currency->gateway->name); ?></span></td>
                <td>
                    <span class="<?php echo e($item->string_status->class); ?>"><?php echo e($item->string_status->value); ?></span>
                </td>
                <td><?php echo e($item->created_at->format('d-m-y h:i:s A')); ?></td>
                <td>
                    <?php if($item->status == payment_gateway_const()::STATUSSUCCESS): ?>
                        <button type="button" class="btn btn--base bg--success"><i class="las la-check-circle"></i></button>
                    <?php endif; ?>

                    <?php if($item->status == payment_gateway_const()::STATUSREJECTED): ?>
                        <button type="button" class="btn btn--base bg--danger"><i class="las la-times-circle"></i></button>
                    <?php endif; ?>

                    <a href="<?php echo e(setRoute('admin.add.money.details',$item->trx_id)); ?>" class="btn btn--base"><i class="las la-expand"></i></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php echo $__env->make('admin.components.alerts.empty',['colspan' => 11], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </tbody>
</table><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/data-table/add-money-table.blade.php ENDPATH**/ ?>