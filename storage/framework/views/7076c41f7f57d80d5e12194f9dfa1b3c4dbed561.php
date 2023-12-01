<?php
    $contact_section            = $__website_sections->where('key',Str::slug(site_section_const()::CONTACT_US_SECTION))->first();
    $app_local_lang             = get_default_language_code();
?>



<?php $__env->startSection('content'); ?>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Contact
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="contact pt-150 pb-60">
        <div class="container mx-auto">
            <div class="text-content text-center">
                <span class="sub-title"><?php echo e($contact_section?->value?->language?->$app_local_lang?->heading ?? ""); ?></span>
                <h3><?php echo e($contact_section?->value?->language?->$app_local_lang?->sub_heading ?? ""); ?></h3>
            </div>
            <div class="row g-5 ptb-60">
                <div class="col-lg-6 col-md-12 col-12 thumb-left mb-lg-0 mb-md-0 mb-4">
                    <div>
                        <img src="<?php echo e(get_image($contact_section?->value?->image ?? null, 'site-section')); ?>" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mt-md-5 my-auto mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="">

                                <form class="contact-form" action="<?php echo e(setRoute('frontend.contact.message.send')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row justify-content-center mb-10-none">
                                        <div class="col-xl-6 col-lg-6 col-md-12 form-group pb-3">
                                            <label for="name"><?php echo e(__("Full Name")); ?></label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter your name*">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                            <label for="email"><?php echo e(__("Email")); ?></label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter your email*">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 form-group pb-3">
                                            <label for="phone"><?php echo e(__("Phone")); ?></label>
                                            <input type="number" name="phone" class="form-control"
                                                placeholder="Enter your number*">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                            <label for="subject"><?php echo e(__("Subject")); ?></label>
                                            <input type="text" name="subject" class="form-control" placeholder="Subject*">
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <label for="message"><?php echo e(__("Message")); ?></label>
                                            <textarea class="form-control text-area" name="message" placeholder="Enter your message*"
                                                rows="3"></textarea>
                                        </div>
                                        <div class="col-lg-12 form-group text-center">
                                            <button type="submit" class="btn--base mt-30 w-100"><?php echo e(__("Send Message")); ?></button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Contact
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->



    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Subscribe
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <?php echo $__env->make('frontend.sections.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Subscribe
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/frontend/pages/contact.blade.php ENDPATH**/ ?>