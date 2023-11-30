@extends('user.layouts.master')

@section('content')

    <div class="table-content">
        <div class="row">
            <div class="header-title">

                <div class="top-title">
                    <h3> <span>{{ __("Welcome Back,") }}</span> {{ auth()->user()->full_name }}</h3>
                </div>

                <div class="row g-4">
                    @foreach ($wallets as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="dashbord-user dCard-1">
                                <div class="dashboard-content">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <div class="top-content">
                                                <h3>{{ __("Current Balance") }}</h3>
                                            </div>
                                            <div class="user-count">
                                                <span class="text-uppercase">{{ $item->currency->symbol . get_amount($item->balance,null,4) }}</span>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="las la-dollar-sign"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ setRoute('user.add.money.index') }}" class="icon-bottom">
                                            <p class="text-center">{{ __("Add") }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="dashbord-user dCard-1">
                            <div class="dashboard-content">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <div class="top-content">
                                            <h3>{{ __("Investment Amount") }}</h3>
                                        </div>
                                        <div class="user-count">
                                            <span class="text-uppercase">{{ $default_currency->symbol . get_amount($total_invest,null,4) }}</span>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <i class="las la-cloud-upload-alt"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ setRoute('user.my.invest.index') }}" class="icon-bottom">
                                        <p class="text-center">{{ __("View") }}</p>
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
                                            <h3>{{ __("Total Profit") }}</h3>
                                        </div>
                                        <div class="user-count">
                                            <span class="text-uppercase">{{ $default_currency->symbol . get_amount($total_profit,null,4) }}</span>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <i class="las la-spinner"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ setRoute('user.withdraw.index') }}" class="icon-bottom">
                                        <p class="text-center">{{ __("Withdraw") }}</p>
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
                                            <h3>{{ __("Total Plan Invest") }}</h3>
                                        </div>
                                        <div class="user-count">
                                            <span class="text-uppercase">{{ $default_currency->symbol . get_amount($total_invest,null,4) }}</span>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <i class="las la-arrow-circle-right"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ setRoute('user.my.invest.index') }}" class="icon-bottom">
                                        <p class="text-center">{{ __("View") }}</p>
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
                    <h4>{{ __('Latest Transactions') }}</h4>
                </div>

                @include('user.components.transaction.log',[
                    'logs'      => $transaction_logs,
                ])

                @if (count($transaction_logs) == 0)
                    <div class="alert alert-warning text-center">{{ __("No data found!") }}</div>
                @endif

            </div>
            
        </div>
    </div>

@endsection


@push('script')
    <script>

        let times = '@json($times)';
        let addMoneyChart = '@json($add_money_chart)';
        let withdrawChart = '@json($money_out_chart)';

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
@endpush