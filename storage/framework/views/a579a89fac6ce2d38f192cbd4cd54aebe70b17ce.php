<?php if(isset($logs)): ?>
    <?php $__currentLoopData = $logs ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($item->type == payment_gateway_const()::TYPETRANSFERMONEY): ?>
            <?php echo $__env->make('user.components.transaction.money-transfer',[
                'transaction'   => $item,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($item->type == payment_gateway_const()::TYPEADDMONEY): ?>
            <?php echo $__env->make('user.components.transaction.add-money',[
                'transaction'   => $item,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($item->type == payment_gateway_const()::TYPEWITHDRAW): ?>
            <?php echo $__env->make('user.components.transaction.withdraw',[
                'transaction'   => $item,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($item->type == payment_gateway_const()::TYPECAPITALRETURN): ?>
            <?php echo $__env->make('user.components.transaction.capital-return',[
                'transaction'   => $item,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($item->type == payment_gateway_const()::TYPEADDSUBTRACTBALANCE): ?>
            <?php echo $__env->make('user.components.transaction.balance-update',[
                'transaction'   => $item,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($item->type == payment_gateway_const()::TYPEBONUS): ?>
            <?php echo $__env->make('user.components.transaction.bonus',[
                'transaction'   => $item,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($item->type == payment_gateway_const()::TYPEREFERBONUS): ?>
            <?php echo $__env->make('user.components.transaction.refer-bonus',[
                'transaction'   => $item,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/components/transaction/log.blade.php ENDPATH**/ ?>