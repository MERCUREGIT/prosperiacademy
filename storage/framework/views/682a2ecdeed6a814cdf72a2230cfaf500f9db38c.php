<?php
    $footer_section       = $__website_sections->where('key',Str::slug(site_section_const()::FOOTER_SECTION))->first();
    $app_local_lang             = get_default_language_code();
?>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Footer 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <footer class="footer-section">
        <div class="container mx-auto">
            <div class="footer-content pt-100 pb-30">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-text">
                                <img src="<?php echo e(get_logo()); ?>" alt="image">
                                <p><?php echo e($footer_section?->value?->contact?->language?->$app_local_lang?->contact_desc ?? null); ?></p>

                                <div class="lang-select">

                                    <select class="form--control nice-select" name="lang_switcher">
                                        <?php $__currentLoopData = $__languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $__item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($__item->code); ?>" <?php if($app_local_lang == $__item->code): ?>
                                                <?php if(true): echo 'selected'; endif; ?>
                                            <?php endif; ?>><?php echo e($__item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3><?php echo e(__("Useful Links")); ?></h3>
                            </div>
                            <ul>
                                <?php $__currentLoopData = $__website_useful_link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('frontend.useful.links',$item->slug)); ?>"><?php echo e($item->title?->language?->$app_local_lang?->title ?? ""); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-sm-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3><?php echo e(__("Download App")); ?></h3>
                            </div>
                            <ul>
                                <li><a href="<?php echo e($__app_settings->android_url ?? "javascript:void(0)"); ?>" class="app-img"><img src="<?php echo e(asset('public/frontend/images/app/play_store.png')); ?>" alt="app"></a></li>
                                <li><a href="<?php echo e($__app_settings->iso_url ?? "javascript:void(0)"); ?>" class="app-img"><img src="<?php echo e(asset('public/frontend/images/app/app_store.png')); ?>" alt="app"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading contact">
                                <h3><?php echo e(__("Contact Us")); ?></h3>
                                <p><?php echo e($footer_section?->value?->contact?->address ?? ""); ?></p>
                                <p><?php echo e(__("Contact Us:")); ?> <?php echo e($footer_section?->value?->contact?->phone ?? ""); ?></p>
                            </div>
                            <div class="footer-social-icon mt-4">
                                <?php $__currentLoopData = $footer_section?->value?->contact?->social_links ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($item?->link ?? "javascript:void(0)"); ?>" target="_blank"><i class="facebook-bg <?php echo e($item?->icon ?? ""); ?>"></i></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-lg-left">
                        <div class="copyright-text">
                            <p><?php echo e(__("Copyright")); ?> &copy; <?php echo e(date("Y")); ?>, <?php echo e(__("All Right Reserved")); ?> <a href="<?php echo e(setRoute('frontend.index')); ?>" class="text--base"><?php echo e($basic_settings->site_name); ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Footer 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<?php $__env->startPush('script'); ?>
    <script>
        $("select[name=lang_switcher]").change(function(){
            var selected_value = $(this).val();
            var submitForm = `<form action="<?php echo e(setRoute('frontend.languages.switch')); ?>" id="local_submit" method="POST"> <?php echo csrf_field(); ?> <input type="hidden" name="target" value="${$(this).val()}" ></form>`;
            $("body").append(submitForm);
            $("#local_submit").submit();
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>