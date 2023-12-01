<?php
    $current_route = Route::currentRouteName();
?>
<?php if(isset($route) && $route != ""): ?>
    <?php if(admin_permission_by_name($route)): ?>
        <li class="sidebar-menu-item <?php if($current_route == $route): ?> active <?php endif; ?>">
            <a href="<?php echo e(setRoute($route)); ?>">
                <i class="<?php echo e($icon ?? ""); ?>"></i>
                <?php
                    $title = $title ?? "";
                ?>
                <span class="menu-title"><?php echo e(__($title)); ?></span>
            </a>
        </li>
    <?php endif; ?>
<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/side-nav/link.blade.php ENDPATH**/ ?>