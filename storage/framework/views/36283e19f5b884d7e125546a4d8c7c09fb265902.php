<?php
    $banner_sections    = $__website_sections->where('key',Str::slug(site_section_const()::BANNER_SECTION))->first();
    $app_local_lang     = get_default_language_code();
?>

<section class="banner bg_img bg-overlay-base-2" data-background="<?php echo e(asset('public/frontend/images/element/bg1.png')); ?>">
    <div class="container mx-auto">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 my-auto">
                <div class="top pb-3">
                    <h3 class="title"><?php echo e($banner_sections?->value?->language?->$app_local_lang?->heading ?? ""); ?></h3>
                    <p class="pe-5"><?php echo e($banner_sections?->value?->language?->$app_local_lang?->sub_heading ?? ""); ?></p>
                </div>
                <div class="d-flex pt-5">
                    <div class="banner-btn-area pe-5">
                        <a href="<?php echo e($banner_sections?->value?->language?->$app_local_lang?->button_link ?? "javascript:void(0)"); ?>" class="btn--base mt-2"><?php echo e($banner_sections?->value?->language?->$app_local_lang?->button_name ?? ""); ?></a>
                    </div>

                    <?php if($banner_sections?->value?->language?->$app_local_lang?->video_link ?? false): ?>
                        <div class="video-wrapper my-3">
                            <a class="video-icon" data-rel="lightcase:myCollection"
                                href="<?php echo e($banner_sections?->value?->language?->$app_local_lang?->video_link ?? "javascript:void(0)"); ?>">
                                <i class="las la-play"></i>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 banner-thumb">
                <div class="page-item-ele">
                    <img src="<?php echo e(get_image($banner_sections?->value?->image ?? null, 'site-section')); ?>" alt="image">
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/prosnluk/public_html/resources/views/frontend/sections/banner.blade.php ENDPATH**/ ?>