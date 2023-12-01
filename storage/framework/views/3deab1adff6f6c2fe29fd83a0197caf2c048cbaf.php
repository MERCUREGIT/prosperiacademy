<?php
    $about_us_sections    = $__website_sections->where('key',Str::slug(site_section_const()::ABOUT_US_SECTION))->first();
    $app_local_lang     = get_default_language_code();
?>

<?php if(isset($about_us_sections)): ?>
    <section class="about ptb-60">
        <div class="container mx-auto">
            <div class="row">

                <div class="col-lg-6 col-md-12 col-12 mt-4 mt-lg-0 mt-md-0">
                    <div class="page-item-ele">
                        <img src="<?php echo e(get_image($about_us_sections?->value?->image ?? null,'site-section')); ?>" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-12 my-auto">

                    <div class="text-content">
                        <span class="sub-title"><?php echo e($about_us_sections?->value?->language?->$app_local_lang?->heading ?? ""); ?></span>
                        <h3><?php echo e($about_us_sections?->value?->language?->$app_local_lang?->sub_heading ?? ""); ?></h3>
                    </div>

                    <div class="about-item-area">
                        <?php $__currentLoopData = $about_us_sections?->value?->items ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="about-item">
                                <div class="about-icon">
                                    <i class="<?php echo e($item?->icon ?? ""); ?>" style="font-size: 40px; color:#F26822"></i>
                                </div>
                                <div class="about-content">
                                    <h3 class="title"><?php echo e($item?->language?->$app_local_lang?->title ?? ""); ?></h3>
                                    <p><?php echo e($item?->language?->$app_local_lang?->description ?? ""); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /home/prosnluk/public_html/resources/views/frontend/sections/about.blade.php ENDPATH**/ ?>