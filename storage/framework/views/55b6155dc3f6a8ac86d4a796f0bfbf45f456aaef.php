<table class="custom-table currency-search-table">
    <thead>
        <tr>
            <th></th>
            <th>Name | Code</th>
            <th>Symbol</th>
            <th>Type</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $currencies ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr data-item="<?php echo e($item->editData); ?>">
                <td>
                    <ul class="user-list">
                        <li><img src="<?php echo e(get_image($item->flag,'currency-flag')); ?>" alt="flag"></li>
                    </ul>
                </td>
                <td><?php echo e($item->name); ?> 
                    <?php if($item->default): ?>
                        <span class="badge badge--success ms-1"><?php echo e(__("Default")); ?></span>
                    <?php endif; ?>
                    <br> <span><?php echo e($item->code); ?></span></td>
                <td><?php echo e($item->symbol); ?></td>
                <td>
                    <span class="text--info"><?php echo e($item->type); ?></span>
                </td>
                <td>
                    <?php echo $__env->make('admin.components.form.switcher',[
                        'name'          => 'currency_status',
                        'value'         => $item->status,
                        'options'       => ['Enable' => 1,'Disable' => 0],
                        'onload'        => true,
                        'data_target'   => $item->code,
                        'permission'    => "admin.currency.status.update",
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </td>
                <td>
                    <?php echo $__env->make('admin.components.link.edit-default',[
                        'href'          => "javascript:void(0)",
                        'class'         => "edit-modal-button",
                        'permission'    => "admin.currency.update",
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php echo $__env->make('admin.components.alerts.empty',['colspan' => 7], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </tbody>
</table>

<?php $__env->startPush("script"); ?>
    <script>
        $(document).ready(function(){
            // Switcher
            switcherAjax("<?php echo e(setRoute('admin.currency.status.update')); ?>");
        })
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/data-table/currency-table.blade.php ENDPATH**/ ?>