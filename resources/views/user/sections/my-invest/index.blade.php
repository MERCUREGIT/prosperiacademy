@extends('user.layouts.master')

@push('css')
    
@endpush

@section('content')

    <div class="table-content">
        <div class="row">
            <div class="header-title">
                <!-- table -->
                <div class="table-area pt-20 pb-30">
                    <div class="d-flex justify-content-between">
                        <div class="dash-section-title">
                            <h4>{{ __("Investment") }}</h4>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="table-area table-responsive">
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>Plan</th>
                                            <th>Duration</th>
                                            <th>Invest Amount</th>
                                            <th>Profit (Percent)</th>
                                            <th>Proft (Fixed)</th>
                                            <th>Current Balance</th>
                                            <th>Profit Return Type</th>
                                            <th>Status</th>
                                            <th>Purchase At</th>
                                            <th>Expire At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($investments as $item)
                                            <tr>
                                                <td data-label="Name">{{ $item->investPlan->name }}</td>
                                                <td data-label="Duration">{{ $item->investPlan->duration . " Day" }}</td>
                                                <td data-label="Invest Amount">{{ get_amount($item->invest_amount,$default_currency->symbol,4) }}</td>
                                                <td data-label="Profit (Percent)">{{ get_amount($item->investPlan->profit_percent,"%",1) }}</td>
                                                <td data-label="Profit (Fixed)">{{ get_amount($item->investPlan->profit_fixed,$default_currency->symbol,4) }}</td>
                                                <td data-label="Current Balance">{{ get_amount($user->wallets->first()->balance,$default_currency->symbol,4) }}</td>
                                                <td data-label="Profit Return Type">{{ $item->investPlan->profit_return_type }}</td>
                                                <td data-label="Status"> 
                                                    @if ($item->status == global_const()::RUNNING)
                                                        <span class="badge badge--warning">{{ __("Running") }}</span>
                                                    @elseif ($item->status == global_const()::COMPLETE)
                                                        <span class="badge badge--success">{{ __("Completed") }}</span>
                                                    @elseif ($item->status == global_const()::CANCEL)
                                                        <span class="badge badge--danger">{{ __("Cancel") }}</span>
                                                    @endif
                                                </td>
                                                <td data-label="Purchase At">{{  $item->created_at->format("d-m-Y H:i") }}</td>
                                                <td data-label="Expire At">{{  \Carbon\Carbon::parse($item->exp_at)->subMinute()->format("d-m-Y H:i") }}</td>
                                            </tr>
                                        @empty
                                            @include('admin.components.alerts.empty',['colspan' => 10 , 'class' => "alert-warning"])
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{ get_paginate($investments) }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

@endpush