
<!-- jquery -->
<script src="<?php echo e(asset('public/frontend/js/jquery-3.6.0.min.js')); ?>"></script>
<!-- bootstrap js -->
<script src="<?php echo e(asset('public/frontend/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- swipper js -->
<script src="<?php echo e(asset('public/frontend/js/swiper.min.js')); ?>"></script>
<!-- lightcase js-->
<script src="<?php echo e(asset('public/frontend/js/lightcase.js')); ?>"></script>
<!-- smooth scroll js -->
<script src="<?php echo e(asset('public/frontend/js/smoothscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontend/js/jquery.nice-select.js')); ?>"></script>

<script src="<?php echo e(asset('public/frontend/js/apexcharts.min.js')); ?>"></script>

<!-- Select 2 JS -->
<script src="<?php echo e(asset('public/backend/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/library/popup/jquery.magnific-popup.js')); ?>"></script>

<?php echo $__env->make('admin.partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- main -->
<script src="<?php echo e(asset('public/frontend/js/main.js')); ?>"></script><?php /**PATH /home/prosnluk/public_html/resources/views/partials/footer-asset.blade.php ENDPATH**/ ?>