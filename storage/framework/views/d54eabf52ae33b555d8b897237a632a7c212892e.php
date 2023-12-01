

<?php $__env->startSection('content'); ?>

    <div class="table-content">
        <div class="row">
            <div class="header-title">

                <div class="top-title">
                    <h3> <span><?php echo e(__("Welcome Back,")); ?></span> <?php echo e(auth()->user()->full_name); ?></h3>
                </div>

                <div class="row g-4">
                    <?php $__currentLoopData = $wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="dashbord-user dCard-1">
                                <div class="dashboard-content">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <div class="top-content">
                                                <h3><?php echo e(__("Current Balance")); ?></h3>
                                            </div>
                                            <div class="user-count">
                                                <span class="text-uppercase"><?php echo e($item->currency->symbol . get_amount($item->balance,null,4)); ?></span>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="las la-dollar-sign"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="<?php echo e(setRoute('user.add.money.index')); ?>" class="icon-bottom">
                                            <p class="text-center"><?php echo e(__("Add")); ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="dashbord-user dCard-1">
                            <div class="dashboard-content">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <div class="top-content">
                                            <h3><?php echo e(__("Investment Amount")); ?></h3>
                                        </div>
                                        <div class="user-count">
                                            <span class="text-uppercase"><?php echo e($default_currency->symbol . get_amount($total_invest,null,4)); ?></span>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <i class="las la-cloud-upload-alt"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="<?php echo e(setRoute('user.my.invest.index')); ?>" class="icon-bottom">
                                        <p class="text-center"><?php echo e(__("View")); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="dashbord-user dCard-1">
                            <div class="dashboard-content">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <div class="top-content">
                                            <h3><?php echo e(__("Total Profit")); ?></h3>
                                        </div>
                                        <div class="user-count">
                                            <span class="text-uppercase"><?php echo e($default_currency->symbol . get_amount($total_profit,null,4)); ?></span>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <i class="las la-spinner"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="<?php echo e(setRoute('user.withdraw.index')); ?>" class="icon-bottom">
                                        <p class="text-center"><?php echo e(__("Withdraw")); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="dashbord-user dCard-1">
                            <div class="dashboard-content">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <div class="top-content">
                                            <h3><?php echo e(__("Total Plan Invest")); ?></h3>
                                        </div>
                                        <div class="user-count">
                                            <span class="text-uppercase"><?php echo e($default_currency->symbol . get_amount($total_invest,null,4)); ?></span>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <i class="las la-arrow-circle-right"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="<?php echo e(setRoute('user.my.invest.index')); ?>" class="icon-bottom">
                                        <p class="text-center"><?php echo e(__("View")); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card / Chart  -->
            <div class="row pe-0">
                <div class="col-12">
                    <div class="chart">
                        <div class="chart-bg">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- table -->
            <div class="table-area pt-20 pb-30">
                <div class="dash-section-title mb-30">
                    <h4><?php echo e(__('Latest Transactions')); ?></h4>
                </div>

                <?php echo $__env->make('user.components.transaction.log',[
                    'logs'      => $transaction_logs,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if(count($transaction_logs) == 0): ?>
                    <div class="alert alert-warning text-center"><?php echo e(__("No data found!")); ?></div>
                <?php endif; ?>

            </div>
            
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>

        let times = '<?php echo json_encode($times, 15, 512) ?>';
        let addMoneyChart = '<?php echo json_encode($add_money_chart, 15, 512) ?>';
        let withdrawChart = '<?php echo json_encode($money_out_chart, 15, 512) ?>';

        // console.log(times,addMoneyChart,withdrawChart);

        var options = {
            series: [{
                name: 'Add Money',
                color: "#F26822",
                data: JSON.parse(addMoneyChart)
            }, {
                name: 'Withdraw',
                color: "#F79420",
                data: JSON.parse(withdrawChart),
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: JSON.parse(times)
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/user/dashboard.blade.php ENDPATH**/ ?>