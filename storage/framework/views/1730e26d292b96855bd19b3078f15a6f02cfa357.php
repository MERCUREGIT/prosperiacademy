

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo $__env->make('admin.components.page-title',['title' => __($page_title)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Server Info")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="custom-table two">
                    <thead>
                        <tr>
                            <th></th>
                            <th><?php echo e(__("Name")); ?></th>
                            <th><?php echo e(__("Version")); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/laravel.png')); ?>" alt="laravel"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("App Name")); ?></td>
                            <td><span><?php echo e(env("APP_NAME","AppDevs")); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/app.png')); ?>" alt="app"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("App Environment")); ?></td>
                            <td><span><?php echo e(ucwords(env("APP_ENV","Local"))); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/debug.png')); ?>" alt="debug"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("App Debug")); ?></td>
                            <td><span><?php echo e(ucwords((env("APP_DEBUG","false") == true) ? "True" : "False")); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/app-mode.png')); ?>" alt="debug"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("App Mode")); ?></td>
                            <td><span><?php echo e(ucwords((env("APP_MODE","demo") != "live") ? "Demo" : "Live")); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/database.png')); ?>" alt="database"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("Database Connection")); ?></td>
                            <td><span><?php echo e(ucwords(env('DB_CONNECTION',"Mysql"))); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/host.jpeg')); ?>" alt="host"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("Database Host")); ?></td>
                            <td><span><?php echo e(env("DB_HOST","127.0.0.1")); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/port.png')); ?>" alt="port"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("Database Port")); ?></td>
                            <td><span><?php echo e(env("DB_PORT","3306")); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/sql.png')); ?>" alt="sql"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("Database Name")); ?></td>
                            <td><span><?php echo e(env("DB_DATABASE","Laravel")); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/protocol.png')); ?>" alt="protocol"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("Database Username")); ?></td>
                            <td><span><?php echo e(env("DB_USERNAME","root")); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/php.png')); ?>" alt="php"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("PHP Version")); ?></td>
                            <td><span><?php echo e(phpversion()); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/laravel.png')); ?>" alt="laravel"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("Laravel Version")); ?></td>
                            <td><span><?php echo e(app()->version()); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/apache.png')); ?>" alt="apache"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("Server Software")); ?></td>
                            <td><span><?php echo e($_SERVER['SERVER_SOFTWARE']); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/ip.png')); ?>" alt="user"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("Server IP Address")); ?></td>
                            <td><span><?php echo e($_SERVER['REMOTE_ADDR']); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/protocol.png')); ?>" alt="protocol"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("Server Protocol")); ?></td>
                            <td><span><?php echo e($_SERVER['SERVER_PROTOCOL']); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="<?php echo e(asset('public/backend/images/icon/timezone.png')); ?>" alt="timezone"></li>
                                </ul>
                            </td>
                            <td><?php echo e(__("Timezone")); ?></td>
                            <td><span><?php echo e(env("APP_TIMEZONE","Asia/Dhaka")); ?></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/server-info/index.blade.php ENDPATH**/ ?>