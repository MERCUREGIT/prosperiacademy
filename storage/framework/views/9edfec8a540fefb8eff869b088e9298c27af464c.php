<?php
    $default_lang_code = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();
    $languages_for_js_use = $languages->toJson();
?>



<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backend/css/fontawesome-iconpicker.min.css')); ?>">
    <style>
        .fileholder {
            min-height: 374px !important;
        }

        .fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,.fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view{
            height: 330px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo $__env->make('admin.components.page-title',['title' => __($page_title)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Setup Section")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title"><?php echo e(__("Contact Section")); ?></h6>
        </div>
        <div class="card-body">
            <form class="card-form" action="<?php echo e(setRoute('admin.setup.sections.section.update',$slug)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row justify-content-center mb-10-none">
                    <div class="col-xl-12 col-lg-12">
                        <div class="product-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button class="nav-link <?php if(get_default_language_code() == $item->code): ?> active <?php endif; ?>" id="<?php echo e($item->name); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo e($item->name); ?>" type="button" role="tab" aria-controls="<?php echo e($item->name); ?>" aria-selected="true"><?php echo e($item->name); ?></button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $lang_code = $item->code;
                                    ?>
                                    <div class="tab-pane <?php if(get_default_language_code() == $item->code): ?> fade show active <?php endif; ?>" id="<?php echo e($item->name); ?>" role="tabpanel" aria-labelledby="english-tab">
                                        <div class="form-group">
                                            <?php echo $__env->make('admin.components.form.input',[
                                                'label'         => "Heading",
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_contact_heading",
                                                'value'         => old($item->code . "_contact_heading",$data->value->contact->language->$lang_code->contact_heading ?? "")
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $__env->make('admin.components.form.textarea',[
                                                'label'         => "Description",
                                                'label_after'   => "*",
                                                'name'          => $item->code . "_contact_desc",
                                                'value'         => old($item->code . "_contact_desc",$data->value->contact->language->$lang_code->contact_desc ?? "")
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="border-bottom my-3"></div>

                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Address",
                            'label_after'   => "*",
                            'name'          => "contact_address",
                            'value'         => old("contact_address",$data->value->contact->address ?? "")
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Phone",
                            'label_after'   => "*",
                            'name'          => "contact_phone",
                            'value'         => old("contact_phone",$data->value->contact->phone ?? "")
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Email",
                            'label_after'   => "*",
                            'name'          => "contact_email",
                            'value'         => old("contact_email",$data->value->contact->email ?? "")
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="border-bottom my-3"></div>

                    <div class="col-xl-12 col-lg-12 form-group">
                        <div class="custom-inner-card input-field-generator" data-source="setup_section_footer_social_link_input">
                            <div class="card-inner-header">
                                <h6 class="title"><?php echo e(__("Social Links")); ?></h6>
                                <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i> <?php echo e(__("Add")); ?></button>
                            </div>
                            <div class="card-inner-body">
                                <div class="results">
                                    <?php
                                        $social_links = $data->value->contact->social_links ?? [];
                                    ?>

                                    <?php $__empty_1 = true; $__currentLoopData = $social_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="row align-items-end">
                                            <div class="col-xl-3 col-lg-3 form-group">
                                                <?php echo $__env->make('admin.components.form.input',[
                                                    'label'         => "Icon",
                                                    'label_after'   => "*",
                                                    'name'          => "icon[]",
                                                    'class'         => "form--control icp icp-auto iconpicker-element iconpicker-input",
                                                    'value'         => $item->icon ?? "",
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 form-group">
                                                <?php echo $__env->make('admin.components.form.input',[
                                                    'label'         => "Link",
                                                    'label_after'   => "*",
                                                    'name'          => "link[]",
                                                    'value'         => $item->link ?? "",
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                            <div class="col-xl-1 col-lg-1 form-group">
                                                <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="row align-items-end">
                                            <div class="col-xl-3 col-lg-3 form-group">
                                                <?php echo $__env->make('admin.components.form.input',[
                                                    'label'         => "Icon",
                                                    'label_after'   => "*",
                                                    'name'          => "icon[]",
                                                    'class'         => "form--control icp icp-auto iconpicker-element iconpicker-input",
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 form-group">
                                                <?php echo $__env->make('admin.components.form.input',[
                                                    'label'         => "Link",
                                                    'label_after'   => "*",
                                                    'name'          => "link[]",
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                            <div class="col-xl-1 col-lg-1 form-group">
                                                <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => "Update",
                            'permission'    => "admin.setup.sections.section.update"
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/backend/js/fontawesome-iconpicker.js')); ?>"></script>

    <script>
        // icon picker
        $('.icp-auto').iconpicker();


        $(".input-field-generator .add-row-btn").click(function(){
            // alert();
            setTimeout(() => {
                $('.icp-auto').iconpicker();
            }, 500);
        });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/setup-sections/footer-section.blade.php ENDPATH**/ ?>