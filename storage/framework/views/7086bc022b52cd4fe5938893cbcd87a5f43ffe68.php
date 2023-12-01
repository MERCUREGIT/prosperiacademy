    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Header
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <header class="header-section">
        <div class="header">
            <div class="header-bottom-area">
                <div class="container">
                    <div class="header-menu-content">
                        <nav class="navbar navbar-expand-lg p-0">
                            <a class="site-logo site-title" href="<?php echo e(setRoute('frontend.index')); ?>"><img src="<?php echo e(get_logo()); ?>"
                                    alt="site-logo"></a>
                            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fas fa-bars"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav main-menu ms-auto">

                                    <?php $__currentLoopData = $__setup_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(setRoute($item->route_name)); ?>" class="<?php echo e(Route::is($item->route_name) ? "active" : ""); ?>"><?php echo e(__($item->title)); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".bd-example-modal-app"><?php echo e(__("Download App")); ?></a></li>
                                </ul>
                                <div class="header-action  ms-lg-3 ms-0">
                                    <?php if(auth()->guard()->check()): ?>
                                        <a href="<?php echo e(setRoute('user.dashboard')); ?>" class="btn--base"><?php echo e(__("Dashboard")); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(setRoute('user.login')); ?>" class="btn--base"><?php echo e(__("Login")); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Header
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--><?php /**PATH /home/prosnluk/public_html/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>