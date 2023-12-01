<?php
    $current_route = Route::currentRouteName();
?>
<?php if(isset($group_links) && is_array($group_links)): ?>

    <?php
        $collect_routes = [];
        $d_routes = data_get($group_links,"dropdown.*.links.*.route") ?? [];
        $l_routes = data_get($group_links,"links.*.route") ?? [];
        $n_routes = data_get($group_links,"*.route") ?? [];
        $collect_routes = array_merge($collect_routes,$d_routes,$l_routes,$n_routes);
        $t_access_permission = admin_permission_by_name_array($collect_routes);
    ?>

    <?php if($t_access_permission === true): ?>
        <li class="sidebar-menu-header"><?php echo e(__($group_title ?? "")); ?></li>
    <?php endif; ?>

    <?php $__currentLoopData = $group_links ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if($key == "dropdown"): ?>
            <?php
                $dropdown_items = [];
            ?>
            <?php $__currentLoopData = $group_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item['links']) && count($item['links']) > 0): ?>
                    <?php
                        $routes = Arr::pluck($item['links'],"route");
                        $access_permission = admin_permission_by_name_array($routes);
                        if($access_permission == true) {

                            $dropdown_items[] = [
                                'title'     => $item['title'],
                                'links'     => $item['links'],
                                'routes'    => $routes,
                                'icon'      => $item['icon'] ?? "",
                            ];
                        }
                    ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $dropdown_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="sidebar-menu-item sidebar-dropdown <?php if(in_array($current_route,$item['routes'])): ?> active <?php endif; ?>">
                    <a href="javascript:void(0)">
                        <i class="<?php echo e($item['icon'] ?? ""); ?>"></i>
                        <span class="menu-title"><?php echo e(__($item['title'] ?? "")); ?></span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-menu-item">
                            <?php $__currentLoopData = $item['links']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('admin.components.side-nav.dropdown-link',[
                                    'title'         => $nav_item['title'],
                                    'route'         => $nav_item['route'],
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                    </ul>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php elseif($key == "links"): ?>
            <?php $__currentLoopData = $group_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $access_permission = admin_permission_by_name($link['route']);
                ?>

                <?php if(isset($access_permission) && $access_permission === true): ?>
                    <?php echo $__env->make('admin.components.side-nav.link',[
                        'title'     => $link['title'],
                        'route'     => $link['route'],
                        'icon'      => $link['icon'],
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php
                $access_permission = admin_permission_by_name($group_item['route']);
            ?>

            <?php if(isset($access_permission) && $access_permission === true): ?>
                <?php echo $__env->make('admin.components.side-nav.link',[
                    'title'     => $group_item['title'],
                    'route'     => $group_item['route'],
                    'icon'      => $group_item['icon'],
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>   
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/components/side-nav/link-group.blade.php ENDPATH**/ ?>