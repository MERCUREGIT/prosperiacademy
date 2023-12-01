<div class="sidebar">
    <div class="sidebar__inner">
        <div class="sidebar-top-inner">
            <div class="sidebar__logo">
                <a href="<?php echo e(setRoute('frontend.index')); ?>" class="sidebar__main-logo">
                    <img src="<?php echo e(get_logo()); ?>" alt="logo">
                </a>
                <div class="navbar__left">
                    <button class="navbar__expand">
                        <i class="las la-bars"></i>
                    </button>
                    <button class="sidebar-mobile-menu text-white">
                        <i class="las fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar__menu-wrapper">
                <ul class="sidebar__menu p-0">

                    <li class="sidebar-menu-item <?php echo e(Route::is('user.dashboard') ? 'active' : ''); ?>">
                        <a href="<?php echo e(setRoute('user.dashboard')); ?>">
                            <i class="menu-icon las la-home"></i>
                            <span class="menu-title"><?php echo e(__("Dashboard")); ?></span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-hand-holding-usd"></i>
                            <span class="menu-title"><?php echo e(__("Investment")); ?></span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="<?php echo e(setRoute('user.invest.plan.index')); ?>" class="nav-link <?php echo e(Route::is('user.invest.plan.index') ? 'active' : ''); ?>">
                                    <i class="menu-icon las la-file"></i>
                                    <span class="menu-title"><?php echo e(__("Plan")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('user.my.invest.index')); ?>" class="nav-link <?php echo e(Route::is('user.my.invest.index') ? 'active' : ''); ?>">
                                    <i class="menu-icon las la-hand-holding-usd"></i>
                                    <span class="menu-title"><?php echo e(__("My invest")); ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-menu-item <?php echo e(Route::is('user.add.money.index') ? 'active' : ''); ?>">
                        <a href="<?php echo e(setRoute('user.add.money.index')); ?>">
                            <i class="menu-icon las la-coins"></i>
                            <span class="menu-title"><?php echo e(__("Add Money")); ?></span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item <?php echo e(Route::is('user.money.transfer.index') ? 'active' : ''); ?>">
                        <a href="<?php echo e(setRoute('user.money.transfer.index')); ?>">
                            <i class="menu-icon las la-paper-plane"></i>
                            <span class="menu-title"><?php echo e(__("Money Transfer")); ?></span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item <?php echo e(Route::is('user.withdraw.index') ? 'active' : ''); ?>">
                        <a href="<?php echo e(setRoute('user.withdraw.index')); ?>">
                            <i class="menu-icon las la-share-alt"></i>
                            <span class="menu-title"><?php echo e(__("Withdraw")); ?></span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-clock"></i>
                            <span class="menu-title"><?php echo e(__("History")); ?></span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="<?php echo e(setRoute('user.profit.log.index')); ?>" class="nav-link <?php echo e(Route::is('user.profit.log.index') ? 'active' : ''); ?>">
                                    <i class="menu-icon las las la-chart-area"></i>
                                    <span class="menu-title"><?php echo e(__("Profit Log")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('user.transaction.index')); ?>" class="nav-link <?php echo e(Route::is('user.transaction.index') ? 'active' : ''); ?>">
                                    <i class="menu-icon las la-cloud-upload-alt"></i>
                                    <span class="menu-title"><?php echo e(__("Transaction")); ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-shield-alt"></i>
                            <span class="menu-title"><?php echo e(__("Security")); ?></span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">

                                <a href="<?php echo e(setRoute('user.kyc.index')); ?>" class="nav-link <?php echo e(Route::is('user.kyc.index') ? 'active' : ''); ?>">
                                    <i class="menu-icon las fa-solid fa-user-check"></i>
                                    <span class="menu-title"><?php echo e(__("KYC Verification")); ?></span>
                                </a>

                                <a href="<?php echo e(setRoute('user.security.google.2fa')); ?>" class="nav-link <?php echo e(Route::is('user.security.google.2fa') ? 'active' : ''); ?>">
                                    <i class="menu-icon las la-shield-alt"></i>
                                    <span class="menu-title"><?php echo e(__("2FA Security")); ?></span>
                                </a>

                                <a href="<?php echo e(setRoute('user.profile.change.password.index')); ?>" class="nav-link <?php echo e(Route::is('user.profile.change.password.index') ? 'active' : ''); ?>">
                                    <i class="menu-icon las la-key"></i>
                                    <span class="menu-title"><?php echo e(__("Change Password")); ?></span>
                                </a>

                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-menu-item <?php echo e(Route::is('user.refer.level.index') ? 'active' : ''); ?>">
                        <a href="<?php echo e(setRoute('user.refer.level.index')); ?>">
                            <i class="menu-icon las la-user-circle"></i>
                            <span class="menu-title"><?php echo e(__("My Status")); ?></span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item <?php echo e(Route::is('user.support.ticket.index') ? 'active' : ''); ?>">
                        <a href="<?php echo e(setRoute('user.support.ticket.index')); ?>">
                            <i class="menu-icon las la-question-circle"></i>
                            <span class="menu-title"><?php echo e(__("Support")); ?></span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a href="javascript:void(0)" class="logout-btn">
                            <i class="menu-icon las la-sign-out-alt"></i>
                            <span class="menu-title"><?php echo e(__("Logout")); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright-wrapper">
            <div class="copyright-area">
                <p><?php echo e(__("Copyright")); ?> © <?php echo e(date("Y")); ?> <a href="javascript:void(0)"><?php echo e($basic_settings->site_name); ?></a></p>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('script'); ?>
    <script>
        $(".logout-btn").click(function(){
            var actionRoute =  "<?php echo e(setRoute('user.logout')); ?>";
            var target      = 1;
            var message     = `Are you sure to <strong>Logout</strong>?`;

            openAlertModal(actionRoute,target,message,"Logout","POST");
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/partials/side-nav.blade.php ENDPATH**/ ?>