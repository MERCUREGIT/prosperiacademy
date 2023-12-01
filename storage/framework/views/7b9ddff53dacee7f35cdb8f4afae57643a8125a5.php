<?php
    $feature_section    = $__website_sections->where('key',Str::slug(site_section_const()::FEATURE_SECTION))->first();
    $app_local_lang     = get_default_language_code();
?>

<?php if(isset($feature_section)): ?>
    <section class="feature ptb-60">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 my-auto">
                    <div class="text-content">
                        <span class="sub-title"><?php echo e($feature_section?->value?->language?->$app_local_lang?->heading ?? ""); ?></span>
                        <h3><?php echo e($feature_section?->value?->language?->$app_local_lang?->sub_heading ?? ""); ?></h3>
                    </div>
                    <div>
                        <p><?php echo e($feature_section?->value?->language?->$app_local_lang?->description ?? ""); ?></p>
                    </div>
                    <?php if($feature_section?->value?->language?->$app_local_lang?->button_name ?? false): ?>
                        <div class="mt-30">
                            <a href="<?php echo e($feature_section?->value?->language?->$app_local_lang?->button_link ?? "javascript:void(0)"); ?>" class="btn--base"><?php echo e($feature_section?->value?->language?->$app_local_lang?->button_name ?? ""); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-12 col-12 mt-4 mt-lg-0 mt-md-0">
                    <div>
                        <img src="<?php echo e(get_image($feature_section?->value?->image ?? null, 'site-section')); ?>" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/frontend/sections/feature.blade.php ENDPATH**/ ?>