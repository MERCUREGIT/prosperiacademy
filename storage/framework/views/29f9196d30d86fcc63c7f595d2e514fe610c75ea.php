


<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.scroll-to-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Login 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="login pt-150 pb-80">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-6 d-grid my-auto py-5 login-img">
                    <img src="<?php echo e(asset("public/frontend/images/element/login-signup.png")); ?>" alt="Image" class="img-fluid">
                </div>

                <div class="col-md-6 my-auto">
                    <div class="content">
                        <div class="my-4">
                            <h3 class="pb-2 text-capitalize fw-bold"><?php echo e(__("Log in and Stay Connected")); ?></h3>
                            <p class="pb-2 text-light"><?php echo e(__("Our secure login process ensures the confidentiality of your information. Log in today and stay connected to your finances, anytime and anywhere.")); ?></p>
                        </div>
                        <form action="<?php echo e(setRoute('user.login.submit')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group ">
                                <label for="email"><?php echo e(__("Email")); ?></label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="credentials" value="<?php echo e(old('credentials')); ?>">
                            </div>
                            
                            <div class="form-group mb-4 show_hide_password">
                                <label for="password"><?php echo e(__("Password")); ?></label>
                                <input type="password" required class="form-control" name="password" placeholder="Password">
                                <span class="show-pass profile" role="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                            </div>

                            <a href="<?php echo e(setRoute('user.password.forgot')); ?>" class="account-forgot-btn"><?php echo e(__("Forgot Password?")); ?></a>

                            <button type="submit" class="btn--base w-100 text-center mt-2"><?php echo e(__("Login")); ?></button>

                            <p class="d-block text-center mt-5 create-acc">
                                &mdash; <?php echo e(__("Don't have an account?")); ?>

                                <a href="<?php echo e(route('user.register')); ?>"><?php echo e(__("Register")); ?></a>
                                &mdash;
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Login 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Subscribe
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <?php echo $__env->make('frontend.sections.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Subscribe
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/auth/login.blade.php ENDPATH**/ ?>