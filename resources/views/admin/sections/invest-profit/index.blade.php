@extends('admin.layouts.master')

@push('css')

@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Invest Profit")])
@endsection

@section('content')
    <div class="table-area">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __("All Logs") }}</h5>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Investment Plan</th>
                            <th>Invest Amount</th>
                            <th>Profit Amount</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $item)
                            <tr>
                                <td>
                                    <ul class="user-list">
                                        <li><img src="{{ get_image($item->user->image,'user-profile') }}" alt="user"></li>
                                    </ul>
                                </td>
                                <td><span>{{ $item->user->full_name }}</span></td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->user->username }}</td>
                                <td>{{ $item->invest->investPlan->name }}</td>
                                <td>{{ get_amount($item->invest->invest_amount,$item->userWallet->currency->code,4) }}</td>
                                <td><span class="text--info">{{ get_amount($item->profit_amount,$item->userWallet->currency->code,4) }}</span></td>
                                <td>{{ $item->created_at->format("d-m-Y H:i") }}</td>
                                <td>
                                    {{-- <a href="{{ setRoute('admin.money.out.details',$item->trx_id) }}" class="btn btn--base"><i class="las la-expand"></i></a> --}}
                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty',['colspan' => 9])
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ get_paginate($logs) }}
        </div>
    </div>
@endsection

@push('script')
    
@endpush