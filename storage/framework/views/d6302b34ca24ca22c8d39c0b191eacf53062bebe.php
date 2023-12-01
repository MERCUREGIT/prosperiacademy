<?php
    $client_feedback_section    = $__website_sections->where('key',Str::slug(site_section_const()::CLIENT_FEEDBACK_SECTION))->first();
    $app_local_lang             = get_default_language_code();
?>

<?php if($client_feedback_section): ?>

    <section class="client ptb-60">
        <div class="container mx-auto">
            <div class="text-content text-center">
                <span class="sub-title"><?php echo e($client_feedback_section?->value?->language?->$app_local_lang?->heading ?? ""); ?></span>
                <h3><?php echo e($client_feedback_section?->value?->language?->$app_local_lang?->sub_heading ?? ""); ?></h3>
            </div>

            <div class="row pt-40">
                <div class="col-12">
                    <div class="client-slider mt-2 overflow-hidden">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $client_feedback_section?->value?->items ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="d-flex flex-wrap card">
                                        <div class="small-ratings">
                                            <?php if($item?->star ?? false): ?>
                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                    <?php if($i > $item?->star): ?>
                                                        <i class="fa fa-star un-rating"></i>
                                                    <?php else: ?>
                                                        <i class="fa fa-star"></i>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="client-content">
                                            <p><?php echo e($item?->language?->$app_local_lang?->comment ?? ""); ?></p>
                                        </div>
                                        <div class="client-thumb d-flex mt-5">
                                            <div class="client-thumb-wrapper me-3">
                                                <img src="<?php echo e(get_image($item?->image ?? null,"site-section")); ?>" alt="client">
                                            </div>
                                            <div>
                                                <h3><?php echo e($item?->name ?? ""); ?></h3>
                                                <p class="sub"><?php echo e($item?->designation ?? ""); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?><?php /**PATH /home/prosnluk/public_html/resources/views/frontend/sections/client-feedback.blade.php ENDPATH**/ ?>