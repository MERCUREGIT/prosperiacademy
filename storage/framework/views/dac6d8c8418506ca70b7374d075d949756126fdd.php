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
            <h6 class="title"><?php echo e(__($page_title)); ?></h6>
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
                                                'label'     => "Heading*",
                                                'name'      => $item->code . "_heading",
                                                'value'     => old($item->code . "_heading",$data->value->language->$lang_code->heading ?? "")
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $__env->make('admin.components.form.input',[
                                                'label'     => "Sub Heading*",
                                                'name'      => $item->code . "_sub_heading",
                                                'value'     => old($item->code . "_sub_heading",$data->value->language->$lang_code->sub_heading ?? "")
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => "Submit",
                            'permission'    => "admin.setup.sections.section.update"
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="custom-card mt-5">
        <div class="card-header">
            <h6 class="title"><?php echo e(__("Announcement Dashboard")); ?></h6>
            <div class="button-link">
                <?php echo $__env->make('admin.components.link.custom',[
                    'text'          => 'Categories',
                    'class'         => 'btn btn--primary',
                    'href'          => setRoute('admin.setup.sections.announcement.category.index'),
                    'permission'    => 'admin.setup.sections.announcement.category.index',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.components.link.custom',[
                    'text'          => 'Announcements',
                    'class'         => 'btn btn--base',
                    'href'          => setRoute('admin.setup.sections.announcement.index'),
                    'permission'    => 'admin.setup.sections.announcement.index',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="card-body">
            <div class="dashboard-area">
                <div class="dashboard-item-area">
                    <div class="row">
                        <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                            <div class="dashbord-item border">
                                <div class="dashboard-content">
                                    <div class="left">
                                        <h6 class="title"><?php echo e(__("Total Category")); ?></h6>
                                        <div class="user-info">
                                            <h2 class="user-count"><?php echo e($total_categories); ?></h2>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="chart" id="chart6" data-percent="<?php echo e(get_percentage_from_two_number($total_categories,$total_categories)); ?>"><span><?php echo e(get_percentage_from_two_number($total_categories,$total_categories)); ?>%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                            <div class="dashbord-item border">
                                <div class="dashboard-content">
                                    <div class="left">
                                        <h6 class="title"><?php echo e(__("Active Category")); ?></h6>
                                        <div class="user-info">
                                            <h2 class="user-count"><?php echo e($active_categories); ?></h2>
                                        </div>
                                        
                                    </div>
                                    <div class="right">
                                        <div class="chart" id="chart7" data-percent="<?php echo e(get_percentage_from_two_number($total_categories,$active_categories)); ?>"><span><?php echo e(get_percentage_from_two_number($total_categories,$active_categories)); ?>%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                            <div class="dashbord-item border">
                                <div class="dashboard-content">
                                    <div class="left">
                                        <h6 class="title"><?php echo e(__("Total Announcement")); ?></h6>
                                        <div class="user-info">
                                            <h2 class="user-count"><?php echo e($total_announcements); ?></h2>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="chart" id="chart8" data-percent="<?php echo e(get_percentage_from_two_number($total_announcements,$total_announcements)); ?>"><span><?php echo e(get_percentage_from_two_number($total_announcements,$total_announcements)); ?>%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                            <div class="dashbord-item border">
                                <div class="dashboard-content">
                                    <div class="left">
                                        <h6 class="title"><?php echo e(__("Active Announcement")); ?></h6>
                                        <div class="user-info">
                                            <h2 class="user-count"><?php echo e($active_announcements); ?></h2>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="chart" id="chart9" data-percent="<?php echo e(get_percentage_from_two_number($total_announcements,$active_announcements)); ?>"><span><?php echo e(get_percentage_from_two_number($total_announcements,$active_announcements)); ?>%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/backend/js/fontawesome-iconpicker.js')); ?>"></script>
    <script>
        // icon picker
        $('.icp-auto').iconpicker();
    </script>
    <script>
        openModalWhenError("testimonial-add","#testimonial-add");

        var default_language = "<?php echo e($default_lang_code); ?>";
        var system_default_language = "<?php echo e($system_default_lang); ?>";
        var languages = "<?php echo e($languages_for_js_use); ?>";
        languages = JSON.parse(languages.replace(/&quot;/g,'"'));

        $(".delete-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));

            var actionRoute =  "<?php echo e(setRoute('admin.setup.sections.section.item.delete',$slug)); ?>";
            var target = oldData.id;
            var message     = `Are you sure to <strong>delete</strong> item?`;

            openDeleteModal(actionRoute,target,message);
        }); 
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/setup-sections/announcement-section.blade.php ENDPATH**/ ?>