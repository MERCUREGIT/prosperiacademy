

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.scroll-to-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Register 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="login pt-150 pb-80">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-6 d-grid my-auto py-5 login-img">
                    <img src="<?php echo e(asset("public/frontend/images/element/login-signup.png")); ?>" alt="Image" class="img-fluid">
                </div>

                <div class="col-md-6 content">
                    <div class="my-4">
                        <h3 class="pb-2 text-capitalize fw-bold"><?php echo e(__("Sign Up")); ?></h3>
                    </div>
                    <form action="<?php echo e(setRoute('user.register.submit')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row g-4">
                            <div class="form-group col-lg-6 col-md-12 col-12">
                                <label for="firstname"><?php echo e(__("First Name")); ?></label>
                                <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="<?php echo e(old('firstname')); ?>">
                            </div>
                            <div class="form-group col-lg-6 col-md-12 col-12">
                                <label for="lastname"><?php echo e(__("Last Name")); ?></label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name" value="<?php echo e(old('lastname')); ?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email"><?php echo e(__("Email")); ?></label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="form-group mb-4 show_hide_password">
                            <label for="password"><?php echo e(__("Password")); ?></label>
                            <input type="password" required class="form-control" name="password" placeholder="Password">
                            <button type="button" class="btn show-pass p-0 pe-2"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                        </div>
                        <div class="form-group col-12">
                            <label for="referralId"><?php echo e(__("Referral Code")); ?> (<?php echo e(__("Optional")); ?>)</label>
                            <input type="text" class="form-control" name="refer" id="referralId" placeholder="Enter Referral Code" value="<?php echo e(old('refer', $refer)); ?>">
                        </div>
                        <button type="submit" class="btn--base w-100 text-center mt-2"><?php echo e(__("Register")); ?></button>

                        <p class="d-block text-center mt-5 create-acc">
                            &mdash; <?php echo e(__("Already an account?")); ?>

                            <a href="<?php echo e(setRoute('user.login')); ?>"><?php echo e(__("Login")); ?></a>
                            &mdash;
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Register 
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/auth/register.blade.php ENDPATH**/ ?>