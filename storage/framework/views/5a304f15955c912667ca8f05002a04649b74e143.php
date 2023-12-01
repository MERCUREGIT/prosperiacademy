<?php
    $app_local_lang     = get_default_language_code();  
?>



<?php $__env->startSection('content'); ?>

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start About
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <?php if(isset($about_page_section->value->items)): ?>
        <section class="about pt-150 pb-80">
            <div class="container mx-auto">
                <div class="row g-5">
                    <?php $__currentLoopData = $about_page_section?->value?->items ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card-side">
                                <h3><?php echo e($item?->language?->$app_local_lang?->title ?? ""); ?></h3>
                                <p><?php echo e($item?->language?->$app_local_lang?->description ?? ""); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(isset($about_page_section)): ?>
        <section class="about ptb-60">
            <div class="container mx-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-4 mt-lg-0 mt-md-0">
                        <div class="page-item-ele">
                            <img src="<?php echo e(get_image($about_page_section?->value?->image ?? null,'site-section')); ?>" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 my-auto">
                        <div class="text-content">
                            <span class="sub-title"><?php echo e($about_page_section?->value?->language?->$app_local_lang?->heading ?? ""); ?></span>
                            <h3><?php echo e($about_page_section?->value?->language?->$app_local_lang?->sub_heading ?? ""); ?></h3>
                        </div>
                        <div>
                            <p><?php echo e($about_page_section?->value?->language?->$app_local_lang?->desc ?? ""); ?></p>
                        </div>

                        <?php if($about_page_section?->value?->language?->$app_local_lang?->button_name ?? false): ?>
                            <div class="mt-4">
                                <a href="<?php echo e($about_page_section?->value?->language?->$app_local_lang?->button_link ?? "javascript:void(0)"); ?>" class="btn--base"><?php echo e($about_page_section?->value?->language?->$app_local_lang?->button_name ?? ""); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End About
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Subscribe
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <?php echo $__env->make('frontend.sections.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Subscribe
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/frontend/pages/about.blade.php ENDPATH**/ ?>