<?php
    $announcements              = $__announcements;
    $announcement_section       = $__website_sections->where('key',Str::slug(site_section_const()::ANNOUNCEMENT_SECTION))->first();

    $app_local_lang             = get_default_language_code();
?>

<section class="blog pt-80">
    <div class="container mx-auto">
        <div class="text-content text-center">
            <span class="sub-title"><?php echo e($announcement_section?->value?->language?->$app_local_lang?->heading ?? ""); ?></span>
            <h3><?php echo e($announcement_section?->value?->language?->$app_local_lang?->sub_heading ?? ""); ?></h3>
        </div>
        <div class="row g-5 ptb-40">
            <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="<?php echo e(get_image($item?->data?->image ?? null,'site-section')); ?>" class="img-fluid main-img" alt="image">
                        </div>
                        <div class="card-body py-4">
                            <a href="<?php echo e(setRoute('frontend.announcement.details',$item?->slug)); ?>">
                                <h5 class="text-capitalize fw-bold fs-4 title"><?php echo e(Str::words($item?->data?->language?->$app_local_lang?->title ?? "", 8, '...')); ?></h5>
                            </a>
                            <a href="<?php echo e(setRoute('frontend.announcement.details',$item?->slug)); ?>" class="btn--base w-100 mt-3"><?php echo e(__("Read More")); ?> <i class="las la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section><?php /**PATH /home/prosnluk/public_html/resources/views/frontend/sections/announcements.blade.php ENDPATH**/ ?>