<!-- favicon -->
<link rel="shortcut icon" href="<?php echo e(get_fav($basic_settings)); ?>" type="image/x-icon">

<!-- Select 2 CSS -->
<link rel="stylesheet" href="<?php echo e(asset('public/backend/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/library/popup/magnific-popup.css')); ?>">

<!-- fontawesome css link -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/fontawesome-all.min.css')); ?>">
<!-- bootstrap css link -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/bootstrap.min.css')); ?>">
<!-- swipper css link -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/swiper.min.css')); ?>">
<!-- lightcase css links -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/lightcase.css')); ?>">
<!-- line-awesome-icon css -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/line-awesome.min.css')); ?>">
<!-- animate.css -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/animate.css')); ?>">
<!-- main style css link -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/style.css')); ?>">
<!-- nice-select -->
<link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/nice-select.css')); ?>">

<?php
    $base_color = $basic_settings->base_color;
    $secondary_color = $basic_settings->secondary_color;
?>

<style>
    :root {
        --base_color: <?php echo e($base_color); ?>;
    }

    :root {
        --secondary_color: <?php echo e($secondary_color); ?>;
    }
</style><?php /**PATH /home/prosnluk/public_html/resources/views/partials/header-asset.blade.php ENDPATH**/ ?>