<div class="sidebar">
    <div class="sidebar__inner">
        <div class="sidebar-top-inner">
            <div class="sidebar__logo">
                <a href="{{ setRoute('frontend.index') }}" class="sidebar__main-logo">
                    <img src="{{ get_logo() }}" alt="logo">
                </a>
                <div class="navbar__left">
                    <button class="navbar__expand">
                        <i class="las la-bars"></i>
                    </button>
                    <button class="sidebar-mobile-menu text-white">
                        <i class="las fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar__menu-wrapper">
                <ul class="sidebar__menu p-0">

                    <li class="sidebar-menu-item {{ Route::is('user.dashboard') ? 'active' : '' }}">
                        <a href="{{ setRoute('user.dashboard') }}">
                            <i class="menu-icon las la-home"></i>
                            <span class="menu-title">{{ __("Dashboard") }}</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-hand-holding-usd"></i>
                            <span class="menu-title">{{ __("Investment") }}</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="{{ setRoute('user.invest.plan.index') }}" class="nav-link {{ Route::is('user.invest.plan.index') ? 'active' : '' }}">
                                    <i class="menu-icon las la-file"></i>
                                    <span class="menu-title">{{ __("Plan") }}</span>
                                </a>
                                <a href="{{ setRoute('user.my.invest.index') }}" class="nav-link {{ Route::is('user.my.invest.index') ? 'active' : '' }}">
                                    <i class="menu-icon las la-hand-holding-usd"></i>
                                    <span class="menu-title">{{ __("My invest") }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-menu-item {{ Route::is('user.add.money.index') ? 'active' : '' }}">
                        <a href="{{ setRoute('user.add.money.index') }}">
                            <i class="menu-icon las la-coins"></i>
                            <span class="menu-title">{{ __("Add Money") }}</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ Route::is('user.money.transfer.index') ? 'active' : '' }}">
                        <a href="{{ setRoute('user.money.transfer.index') }}">
                            <i class="menu-icon las la-paper-plane"></i>
                            <span class="menu-title">{{ __("Money Transfer") }}</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ Route::is('user.withdraw.index') ? 'active' : '' }}">
                        <a href="{{ setRoute('user.withdraw.index') }}">
                            <i class="menu-icon las la-share-alt"></i>
                            <span class="menu-title">{{ __("Withdraw") }}</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-clock"></i>
                            <span class="menu-title">{{ __("History") }}</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="{{ setRoute('user.profit.log.index') }}" class="nav-link {{ Route::is('user.profit.log.index') ? 'active' : '' }}">
                                    <i class="menu-icon las las la-chart-area"></i>
                                    <span class="menu-title">{{ __("Profit Log") }}</span>
                                </a>
                                <a href="{{ setRoute('user.transaction.index') }}" class="nav-link {{ Route::is('user.transaction.index') ? 'active' : '' }}">
                                    <i class="menu-icon las la-cloud-upload-alt"></i>
                                    <span class="menu-title">{{ __("Transaction") }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-shield-alt"></i>
                            <span class="menu-title">{{ __("Security") }}</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">

                                <a href="{{ setRoute('user.kyc.index') }}" class="nav-link {{ Route::is('user.kyc.index') ? 'active' : '' }}">
                                    <i class="menu-icon las fa-solid fa-user-check"></i>
                                    <span class="menu-title">{{ __("KYC Verification") }}</span>
                                </a>

                                <a href="{{ setRoute('user.security.google.2fa') }}" class="nav-link {{ Route::is('user.security.google.2fa') ? 'active' : '' }}">
                                    <i class="menu-icon las la-shield-alt"></i>
                                    <span class="menu-title">{{ __("2FA Security") }}</span>
                                </a>

                                <a href="{{ setRoute('user.profile.change.password.index') }}" class="nav-link {{ Route::is('user.profile.change.password.index') ? 'active' : '' }}">
                                    <i class="menu-icon las la-key"></i>
                                    <span class="menu-title">{{ __("Change Password") }}</span>
                                </a>

                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-menu-item {{ Route::is('user.refer.level.index') ? 'active' : '' }}">
                        <a href="{{ setRoute('user.refer.level.index') }}">
                            <i class="menu-icon las la-user-circle"></i>
                            <span class="menu-title">{{ __("My Status") }}</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ Route::is('user.support.ticket.index') ? 'active' : '' }}">
                        <a href="{{ setRoute('user.support.ticket.index') }}">
                            <i class="menu-icon las la-question-circle"></i>
                            <span class="menu-title">{{ __("Support") }}</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a href="javascript:void(0)" class="logout-btn">
                            <i class="menu-icon las la-sign-out-alt"></i>
                            <span class="menu-title">{{ __("Logout") }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright-wrapper">
            <div class="copyright-area">
                <p>{{ __("Copyright") }} © {{ date("Y") }} <a href="javascript:void(0)">{{ $basic_settings->site_name }}</a></p>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(".logout-btn").click(function(){
            var actionRoute =  "{{ setRoute('user.logout') }}";
            var target      = 1;
            var message     = `Are you sure to <strong>Logout</strong>?`;

            openAlertModal(actionRoute,target,message,"Logout","POST");
        });
    </script>
@endpush