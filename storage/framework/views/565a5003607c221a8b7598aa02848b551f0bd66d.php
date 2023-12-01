<section class="subscribe-section pt-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <div class="subscribe-area">
                    <div class="subscribe-content">
                        <h2 class="title"><?php echo e(__("Stay connected with us for regular updates")); ?></h2>
                    </div>
                    <form class="subscribe-form bounce-safe" id="subscribe-form" action="<?php echo e(setRoute('frontend.subscribe')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="email" class="form--control" placeholder="Enter Your Email..." name="email" value="<?php echo e(old('email')); ?>">
                        <button type="submit"><i class="las la-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/prosnluk/public_html/resources/views/frontend/sections/newsletter.blade.php ENDPATH**/ ?>