
<?php if(isset($permission)): ?>
    <?php if(admin_permission_by_name($permission)): ?>
        <a href="<?php echo e($href ?? ""); ?>" class="btn--base <?php echo e($class ?? ""); ?>"><i class="fas fa-plus me-1"></i> <?php echo e(__($text ?? "")); ?></a>
    <?php endif; ?>
<?php else: ?>
    <a href="<?php echo e($href ?? ""); ?>" class="btn--base <?php echo e($class ?? ""); ?>"><i class="fas fa-plus me-1"></i> <?php echo e(__($text ?? "")); ?></a>
<?php endif; ?>
<?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/link/add-default.blade.php ENDPATH**/ ?>