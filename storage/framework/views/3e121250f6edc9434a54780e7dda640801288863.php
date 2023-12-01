<?php
    $services_section    = $__website_sections->where('key',Str::slug(site_section_const()::SERVICES_SECTION))->first();
    $app_local_lang     = get_default_language_code();
?>

<?php if(isset($services_section)): ?>
    <section class="services ptb-60">
        <div class="container mx-auto">
            <div class="text-content text-center">
                <span class="sub-title"><?php echo e($services_section?->value->language?->$app_local_lang?->heading ?? ""); ?></span>
                <h3><?php echo e($services_section?->value->language?->$app_local_lang?->sub_heading ?? ""); ?></h3>
            </div>
            <div class="row g-5 pt-40">
                <?php $__currentLoopData = $services_section?->value?->items ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="thumb">
                                <i class="<?php echo e($item?->icon ?? ""); ?>" style="color:#F26822; font-size: 30px; margin-bottom: 15px;"></i>
                            </div>
                            <div>
                                <h3><?php echo e($item?->language?->$app_local_lang?->title ?? ""); ?></h3>
                                <p><?php echo e($item?->language?->$app_local_lang?->description ?? ""); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /home/prosnluk/public_html/resources/views/frontend/sections/services.blade.php ENDPATH**/ ?>