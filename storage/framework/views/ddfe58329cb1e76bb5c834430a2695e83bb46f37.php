<?php
    $brand_sections    = $__website_sections->where('key',Str::slug(site_section_const()::BRAND_SECTION))->first();
    $app_local_lang     = get_default_language_code();
?>

<?php if(isset($brand_sections)): ?>
    <section class="brand ptb-50">
        <div class="container mx-auto">
            <div class="brand-slider overflow-hidden">
                <div class="swiper-wrapper">

                    <?php $__currentLoopData = $brand_sections?->value?->items ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="<?php echo e(get_image($item?->image,'site-section')); ?>" alt="brand">
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /home/prosnluk/public_html/resources/views/frontend/sections/brand.blade.php ENDPATH**/ ?>