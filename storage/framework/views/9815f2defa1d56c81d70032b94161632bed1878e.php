<?php if(isset($permission)): ?>
    <?php if(admin_permission_by_name($permission)): ?>
        <a href="<?php echo e($href ?? "javascript:void(0)"); ?>" class="btn btn--base  <?php echo e($class ?? ""); ?>"><i class="las la-info-circle"></i></a>
    <?php endif; ?>
<?php else: ?>
    <a href="<?php echo e($href ?? "javascript:void(0)"); ?>" class="btn btn--base  <?php echo e($class ?? ""); ?>"><i class="las la-info-circle"></i></a>
<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/link/info-default.blade.php ENDPATH**/ ?>