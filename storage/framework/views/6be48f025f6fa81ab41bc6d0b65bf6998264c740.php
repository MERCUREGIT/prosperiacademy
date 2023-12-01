

<?php $__env->startPush('css'); ?>
    <style>
        .fileholder,.fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,.fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view{
            min-height: 300px !important;
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
    ], 'active' => __("Web Settings")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title"><?php echo e(__("Search Engine Optimization (SEO)")); ?></h6>
        </div>
        <div class="card-body">
            <form class="card-form" action="<?php echo e(setRoute('admin.web.settings.setup.seo.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field("PUT"); ?>
                <div class="row mb-10-none">
                    <div class="col-xl-4 col-lg-4 form-group">
                        <?php echo $__env->make('admin.components.form.input-file',[
                            'label'             => "Thumbnail Image:",
                            'class'             => "file-holder",
                            'name'              => "image",
                            'old_files'         => $setup_seo->image,
                            'old_files_path'    => files_asset_path('seo'),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="form-group">
                            <?php echo $__env->make('admin.components.form.input',[
                                'label'         => "Social Title*",
                                'type'          => "text",
                                'class'         => "form--control",
                                'placeholder'   => "Title Here...",
                                'name'          => "title",
                                'attribute'     => "data-limit=120",
                                'value'         => old('title',$setup_seo->title)
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $__env->make('admin.components.form.textarea',[
                                'label'         => "Social Description*",
                                'class'         => "form--control",
                                'value'         => "Write Here...",
                                'name'          => "desc",
                                'attribute'     => "data-limit=255",
                                'value'         => old('desc',$setup_seo->desc)
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <label><?php echo e(__("Tags*")); ?></label>
                        <select name="tags[]" class="form-control select2-auto-tokenize"  multiple="multiple" required>
                            <?php $__currentLoopData = $setup_seo->tags ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item); ?>" selected><?php echo e($item); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <?php echo $__env->make('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => "Update",
                            'permission'    => "admin.web.settings.setup.seo.update",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/web-settings/setup-seo.blade.php ENDPATH**/ ?>