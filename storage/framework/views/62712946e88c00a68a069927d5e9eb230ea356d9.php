<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <a href="<?php echo e(setRoute('admin.dashboard')); ?>" class="sidebar-main-logo">
                <img src="<?php echo e(get_logo($basic_settings,'dark')); ?>" data-white_img="<?php echo e(get_logo($basic_settings,'white')); ?>"
                data-dark_img="<?php echo e(get_logo($basic_settings,'dark')); ?>" alt="logo">
            </a>
            <button class="sidebar-menu-bar">
                <i class="fas fa-exchange-alt"></i>
            </button>
        </div>
        <div class="sidebar-user-area">
            <div class="sidebar-user-thumb">
                <a href="<?php echo e(setRoute('admin.profile.index')); ?>"><img src="<?php echo e(get_image(Auth::user()->image,'admin-profile','profile')); ?>" alt="user"></a>
            </div>
            <div class="sidebar-user-content">
                <h6 class="title"><?php echo e(Auth::user()->fullname); ?></h6>
                <span class="sub-title"><?php echo e(Auth::user()->getRolesString()); ?></span>
            </div>
        </div>
        <?php
            $current_route = Route::currentRouteName();
        ?>
        <div class="sidebar-menu-wrapper">
            <ul class="sidebar-menu">

                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.dashboard',
                    'title'     => "Dashboard",
                    'icon'      => "menu-icon las la-rocket",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                
                <?php echo $__env->make('admin.components.side-nav.link-group',[
                    'group_title'       => "Default",
                    'group_links'       => [
                        [
                            'title'     => "Setup Currency",
                            'route'     => "admin.currency.index",
                            'icon'      => "menu-icon las la-coins",
                        ],
                        [
                            'title'     => "Fees & Charges",
                            'route'     => "admin.trx.settings.index",
                            'icon'      => "menu-icon las la-wallet",
                        ],
                        [
                            'title'     => "Subscribers",
                            'route'     => "admin.subscriber.index",
                            'icon'      => "menu-icon las la-bell",
                        ],
                        [
                            'title'     => "Contact Messages",
                            'route'     => "admin.contact.messages.index",
                            'icon'      => "menu-icon las la-sms",
                        ],
                        [
                            'title'     => "Investment Plan",
                            'route'     => "admin.invest.plan.index",
                            'icon'      => "menu-icon las la-hand-holding-usd",
                        ],
                    ]
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <?php echo $__env->make('admin.components.side-nav.link-group',[
                    'group_title'       => "Transactions & Logs",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Add Money Logs",
                                'icon'      => "menu-icon las la-calculator",
                                'links'     => [
                                    [
                                        'title'     => "Pending Logs",
                                        'route'     => "admin.add.money.pending",
                                    ],
                                    [
                                        'title'     => "Completed Logs",
                                        'route'     => "admin.add.money.complete",
                                    ],
                                    [
                                        'title'     => "Canceled Logs",
                                        'route'     => "admin.add.money.canceled", 
                                    ],
                                    [
                                        'title'     => "All Logs",
                                        'route'     => "admin.add.money.index", 
                                    ]
                                ],
                            ],
                            [
                                'title'             => "Money Out Logs",
                                'icon'              => "menu-icon las la-sign-out-alt",
                                'links'     => [
                                    [
                                        'title'     => "Pending Logs",
                                        'route'     => "admin.money.out.pending",
                                    ],
                                    [
                                        'title'     => "Completed Logs",
                                        'route'     => "admin.money.out.complete",
                                    ],
                                    [
                                        'title'     => "Canceled Logs",
                                        'route'     => "admin.money.out.canceled", 
                                    ],
                                    [
                                        'title'     => "All Logs",
                                        'route'     => "admin.money.out.index", 
                                    ]
                                ],
                            ],
                            [
                                'title'             => "Money Transfer Logs",
                                'icon'              => "menu-icon las la-exchange-alt",
                                'links'     => [
                                    [
                                        'title'     => "All Logs",
                                        'route'     => "admin.money.transfer.index", 
                                    ]
                                ],
                            ],
                            [
                                'title'             => "Invest Profit Logs",
                                'icon'              => "menu-icon las la-coins",
                                'links'     => [
                                    [
                                        'title'     => "All Logs",
                                        'route'     => "admin.invest.profit.index", 
                                    ]
                                ],
                            ],
                        ],

                    ]
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php echo $__env->make('admin.components.side-nav.link-group',[
                    'group_title'       => "Interface Panel",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "User Care",
                                'icon'      => "menu-icon las la-user-edit",
                                'links'     => [
                                    [
                                        'title'     => "Active Users",
                                        'route'     => "admin.users.active",
                                    ],
                                    [
                                        'title'     => "Email Unverified",
                                        'route'     => "admin.users.email.unverified",
                                    ],
                                    [
                                        'title'     => "KYC Unverified",
                                        'route'     => "admin.users.kyc.unverified", 
                                    ],
                                    [
                                        'title'     => "All Users",
                                        'route'     => "admin.users.index",
                                    ],
                                    [
                                        'title'     => "Email To Users",
                                        'route'     => "admin.users.email.users",
                                    ],
                                    [
                                        'title'     => "Banned Users",
                                        'route'     => "admin.users.banned",
                                    ]
                                ],
                            ],
                            [
                                'title'             => "Admin Care",
                                'icon'              => "menu-icon las la-user-shield",
                                'links'     => [
                                    [
                                        'title'     => "All Admin",
                                        'route'     => "admin.admins.index",
                                    ],
                                    [
                                        'title'     => "Admin Role",
                                        'route'     => "admin.admins.role.index",
                                    ],
                                    [
                                        'title'     => "Role Permission",
                                        'route'     => "admin.admins.role.permission.index", 
                                    ],
                                    [
                                        'title'     => "Email To Admin",
                                        'route'     => "admin.admins.email.admins",
                                    ]
                                ],
                            ],
                        ],

                    ]
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <?php echo $__env->make('admin.components.side-nav.link-group',[
                    'group_title'       => "Settings",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Web Settings",
                                'icon'      => "menu-icon lab la-safari",
                                'links'     => [
                                    [
                                        'title'     => "Basic Settings",
                                        'route'     => "admin.web.settings.basic.settings",
                                    ],
                                    [
                                        'title'     => "Image Assets",
                                        'route'     => "admin.web.settings.image.assets",
                                    ],
                                    [
                                        'title'     => "Setup SEO",
                                        'route'     => "admin.web.settings.setup.seo", 
                                    ]
                                ],
                            ],
                            [
                                'title'             => "App Settings",
                                'icon'              => "menu-icon las la-mobile",
                                'links'     => [
                                    [
                                        'title'     => "Splash Screen",
                                        'route'     => "admin.app.settings.splash.screen",
                                    ],
                                    [
                                        'title'     => "Onboard Screen",
                                        'route'     => "admin.app.settings.onboard.screens",
                                    ],
                                    [
                                        'title'     => "App URLs",
                                        'route'     => "admin.app.settings.urls", 
                                    ],
                                ],
                            ],
                        ],
                    ]
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.languages.index',
                    'title'     => "Languages",
                    'icon'      => "menu-icon las la-language",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.settings.money.out.index',
                    'title'     => "Money Out Settings",
                    'icon'      => "menu-icon las la-cog",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.settings.referral.index',
                    'title'     => "Referral Settings",
                    'icon'      => "menu-icon las la-network-wired",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <?php echo $__env->make('admin.components.side-nav.link-group',[
                    'group_title'       => "Verification Center",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Setup Email",
                                'icon'      => "menu-icon las la-envelope-open-text",
                                'links'     => [
                                    [
                                        'title'     => "Email Method",
                                        'route'     => "admin.setup.email.config",
                                    ],
                                    // [
                                    //     'title'     => "Default Template",
                                    //     'route'     => "admin.setup.email.template.default",
                                    // ]
                                ],
                            ]
                        ],

                    ]
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.setup.kyc.index',
                    'title'     => "Setup KYC",
                    'icon'      => "menu-icon las la-clipboard-list",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if(admin_permission_by_name("admin.setup.sections.section")): ?>
                    <li class="sidebar-menu-header"><?php echo e(__("Setup Web Content")); ?></li>
                    <?php
                        $current_url = URL::current();

                        $setup_section_childs  = [
                            setRoute('admin.setup.sections.section','banner'),
                            setRoute('admin.setup.sections.section','brand'),
                            setRoute('admin.setup.sections.section','about-us'),
                            setRoute('admin.setup.sections.section','services'),
                            setRoute('admin.setup.sections.section','feature'),
                            setRoute('admin.setup.sections.section','clients-feedback'),
                            setRoute('admin.setup.sections.section','announcement'),
                            setRoute('admin.setup.sections.section','how-it-work'),
                            setRoute('admin.setup.sections.section','contact-us'),
                            setRoute('admin.setup.sections.section','footer'),
                        ];
                    ?>

                    <li class="sidebar-menu-item sidebar-dropdown <?php if(in_array($current_url,$setup_section_childs)): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-terminal"></i>
                            <span class="menu-title"><?php echo e(__("Setup Section")); ?></span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','banner')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','banner')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("Banner Section")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','brand')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','brand')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("Brand Section")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','about-us')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','about-us')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("About Us Section")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','services')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','services')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("Services Section")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','feature')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','feature')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("Feature Section")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','clients-feedback')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','clients-feedback')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("Clients Feedback")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','announcement')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','announcement')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("Announcements")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','how-it-work')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','how-it-work')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("How It Work Section")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','about-page')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','about-page')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("About Page Section")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','contact-us')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','contact-us')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("Contact US Section")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.setup.sections.section','footer')); ?>" class="nav-link <?php if($current_url == setRoute('admin.setup.sections.section','footer')): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("Footer Section")); ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.setup.pages.index',
                    'title'     => "Setup Pages",
                    'icon'      => "menu-icon las la-file-alt",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.extensions.index',
                    'title'     => "Extensions",
                    'icon'      => "menu-icon las la-puzzle-piece",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.useful.links.index',
                    'title'     => "Useful Links",
                    'icon'      => "menu-icon las la-link",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if(admin_permission_by_name("admin.payment.gateway.view")): ?>
                    <li class="sidebar-menu-header"><?php echo e(__("Payment Methods")); ?></li>
                    <?php
                        $payment_add_money_childs  = [
                            setRoute('admin.payment.gateway.view',['add-money','automatic']),
                            setRoute('admin.payment.gateway.view',['add-money','manual']),
                        ]
                    ?>
                    <li class="sidebar-menu-item sidebar-dropdown <?php if(in_array($current_url,$payment_add_money_childs)): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)">
                            <i class="menu-icon las la-funnel-dollar"></i>
                            <span class="menu-title"><?php echo e(__("Add Money")); ?></span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-menu-item">
                                <a href="<?php echo e(setRoute('admin.payment.gateway.view',['add-money','automatic'])); ?>" class="nav-link <?php if($current_url == setRoute('admin.payment.gateway.view',['add-money','automatic'])): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("Automatic")); ?></span>
                                </a>
                                <a href="<?php echo e(setRoute('admin.payment.gateway.view',['add-money','manual'])); ?>" class="nav-link <?php if($current_url == setRoute('admin.payment.gateway.view',['add-money','manual'])): ?> active <?php endif; ?>">
                                    <i class="menu-icon las la-ellipsis-h"></i>
                                    <span class="menu-title"><?php echo e(__("Manual")); ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item <?php if($current_url == setRoute('admin.payment.gateway.view',['money-out','manual'])): ?> active <?php endif; ?>">
                        <a href="<?php echo e(setRoute('admin.payment.gateway.view',['money-out','manual'])); ?>">
                            <i class="menu-icon las la-print"></i>
                            <span class="menu-title"><?php echo e(__("Money Out")); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                
                <?php echo $__env->make('admin.components.side-nav.link-group',[
                    'group_title'       => "Notification",
                    'group_links'       => [
                        'dropdown'      => [
                            [
                                'title'     => "Push Notification",
                                'icon'      => "menu-icon las la-bell",
                                'links'     => [
                                    [
                                        'title'     => "Setup Notification",
                                        'route'     => "admin.push.notification.config",
                                    ],
                                    [
                                        'title'     => "Send Notification",
                                        'route'     => "admin.push.notification.index",
                                    ]
                                ],
                            ]
                        ],

                    ]
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php
                    $bonus_routes = [
                        'admin.cookie.index',
                        'admin.server.info.index',
                        'admin.cache.clear',
                    ];
                ?> 

                <?php if(admin_permission_by_name_array($bonus_routes)): ?>   
                    <li class="sidebar-menu-header"><?php echo e(__("Bonus")); ?></li>
                <?php endif; ?>

                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.cookie.index',
                    'title'     => "GDPR Cookie",
                    'icon'      => "menu-icon las la-cookie-bite",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.server.info.index',
                    'title'     => "Server Info",
                    'icon'      => "menu-icon las la-sitemap",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.components.side-nav.link',[
                    'route'     => 'admin.cache.clear',
                    'title'     => "Clear Cache",
                    'icon'      => "menu-icon las la-broom",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /home/prosnluk/public_html/resources/views/admin/partials/side-nav.blade.php ENDPATH**/ ?>