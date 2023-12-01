

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo $__env->make('admin.components.page-title', ['title' => __($page_title)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __('Dashboard'),
                'url' => setRoute('admin.dashboard'),
            ],
        ],
        'active' => __('User Care'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="dashboard-area">
        <div class="dashboard-item-area">
            <div class="row">
                <?php
                    $success_pending_add_money = ($user_success_add_money + $user_pending_add_money);
                    $one_percent_of_add_Money = (($success_pending_add_money / 100) == 0) ? 1 : ($success_pending_add_money / 100);
                ?>

                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title"><?php echo e(__("Current Balance")); ?></h6>
                                <div class="user-info">
                                    <h2 class="user-count"><?php echo e($default_currency->symbol); ?> <?php echo e(numeric_unit_converter(get_amount($user_wallet?->balance ?? 0,null,4))->number . numeric_unit_converter($user_wallet?->balance ?? 0,null,4)->unit); ?></h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success"><?php echo e(__("Success")); ?> <?php echo e(numeric_unit_converter(get_amount($user_success_add_money,null,4))->number . numeric_unit_converter(get_amount($user_success_add_money,null,4))->unit); ?></span>
                                    <span class="badge badge--warning"><?php echo e(__("Pending")); ?> <?php echo e(numeric_unit_converter(get_amount($user_pending_add_money,null,4))->number . numeric_unit_converter(get_amount($user_pending_add_money,null,4))->unit); ?></span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart6" data-percent="<?php echo e(floor($user_pending_add_money / $one_percent_of_add_Money)); ?>"><span><?php echo e(floor($user_pending_add_money / $one_percent_of_add_Money)); ?>%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <?php
                        $total_send_receive = ($user_send_total + $user_receive_total);
                        $one_percent_of_send_receive = (($total_send_receive / 100) == 0) ? 1 : ($total_send_receive / 100);
                    ?>
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title"><?php echo e(__("Total Transactions")); ?></h6>
                                <div class="user-info">
                                    <h2 class="user-count"><?php echo e($default_currency->symbol); ?> <?php echo e(numeric_unit_converter(get_amount($user_total_transactions,null,4))->number . numeric_unit_converter(get_amount($user_total_transactions,null,4))->unit); ?></h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--danger"><?php echo e(__("Send")); ?> <?php echo e(numeric_unit_converter(get_amount($user_send_total,null,4))->number . numeric_unit_converter($user_send_total)->unit); ?></span>
                                    <span class="badge badge--success"><?php echo e(__("Receive")); ?> <?php echo e(numeric_unit_converter(get_amount($user_receive_total,null,4))->number . numeric_unit_converter($user_receive_total)->unit); ?></span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart7" data-percent="<?php echo e(floor($user_receive_total / $one_percent_of_send_receive)); ?>"><span><?php echo e(floor($user_receive_total / $one_percent_of_send_receive)); ?>%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <?php
                        $total_money_out_cancel_pending = ($user_pending_money_out + $user_reject_money_out);
                        $one_percent_of_money_out = (($total_money_out_cancel_pending / 100) == 0) ? 1 : ($total_money_out_cancel_pending / 100);
                    ?>
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title"><?php echo e(__("Total Money Out")); ?></h6>
                                <div class="user-info">
                                    <h2 class="user-count"><?php echo e($default_currency->symbol); ?> <?php echo e(numeric_unit_converter(get_amount($user_money_out,null,4))->number . numeric_unit_converter(get_amount($user_money_out,null,4))->unit); ?></h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--danger"><?php echo e(__("Canceled")); ?> <?php echo e(numeric_unit_converter(get_amount($user_reject_money_out,null,4))->number . numeric_unit_converter(get_amount($user_reject_money_out,null,4))->unit); ?></span>
                                    <span class="badge badge--warning"><?php echo e(__("Pending")); ?> <?php echo e(numeric_unit_converter(get_amount($user_pending_money_out,null,4))->number . numeric_unit_converter(get_amount($user_pending_money_out,null,4))->unit); ?></span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart8" data-percent="<?php echo e(floor($user_pending_money_out / $one_percent_of_money_out)); ?>"><span><?php echo e(floor($user_pending_money_out / $one_percent_of_money_out)); ?>%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <?php
                        $total_pending_solved_support_ticket = ($pending_support_ticket + $solved_support_ticket);
                        $one_percent_of_support_ticket = (($total_pending_solved_support_ticket / 100) == 0) ? 1 : ($total_pending_solved_support_ticket / 100);
                    ?>
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title"><?php echo e(__('Active Tickets')); ?></h6>
                                <div class="user-info">
                                    <h2 class="user-count"><?php echo e($active_support_ticket); ?></h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--danger"><?php echo e(__("Pending")); ?> <?php echo e($pending_support_ticket); ?></span>
                                    <span class="badge badge--success"><?php echo e(__("Solved")); ?> <?php echo e($solved_support_ticket); ?></span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart9" data-percent="<?php echo e(floor($pending_support_ticket / $one_percent_of_support_ticket)); ?>"><span><?php echo e(floor($pending_support_ticket / $one_percent_of_support_ticket)); ?>%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <?php
                        $total_invest_plan_complete_ongoing = ($ongoing_invest_plans + $complete_invest_plans);
                        $one_percent_of_invest_plan = (($total_invest_plan_complete_ongoing / 100) == 0) ? 1 : ($total_invest_plan_complete_ongoing / 100);
                    ?>
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title"><?php echo e(__("Total Invest Plan")); ?></h6>
                                <div class="user-info">
                                    <h2 class="user-count"><?php echo e(numeric_unit_converter($total_invest_plans)->number . numeric_unit_converter($total_invest_plans)->unit); ?></h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success"><?php echo e(__("Complete")); ?> <?php echo e(numeric_unit_converter(get_amount($complete_invest_plans,null,4))->number . numeric_unit_converter(get_amount($complete_invest_plans,null,4))->unit); ?></span>
                                    <span class="badge badge--warning"><?php echo e(__("Ongoing")); ?> <?php echo e(numeric_unit_converter(get_amount($ongoing_invest_plans,null,4))->number . numeric_unit_converter(get_amount($ongoing_invest_plans,null,4))->unit); ?></span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart13" data-percent="<?php echo e(floor($ongoing_invest_plans / $one_percent_of_invest_plan)); ?>"><span><?php echo e(floor($ongoing_invest_plans / $one_percent_of_invest_plan)); ?>%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <?php
                        $total_invest_complete_ongoing = ($complete_invest_amount + $ongoing_invest_amount);
                        $one_percent_of_invest = (($total_invest_complete_ongoing / 100) == 0) ? 1 : ($total_invest_complete_ongoing / 100);
                    ?>
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title"><?php echo e(__("Total Invest Amount")); ?></h6>
                                <div class="user-info">
                                    <h2 class="user-count"><?php echo e($default_currency->symbol); ?> <?php echo e(numeric_unit_converter(get_amount($total_invest_amount,null,4))->number . numeric_unit_converter(get_amount($total_invest_amount,null,4))->unit); ?></h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success"><?php echo e(__("Complete")); ?> <?php echo e(numeric_unit_converter(get_amount($complete_invest_amount,null,4))->number . numeric_unit_converter(get_amount($complete_invest_amount,null,4))->unit); ?></span>
                                    <span class="badge badge--warning"><?php echo e(__("Ongoing")); ?> <?php echo e(numeric_unit_converter(get_amount($ongoing_invest_amount,null,4))->number . numeric_unit_converter(get_amount($ongoing_invest_amount,null,4))->unit); ?></span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart10" data-percent="<?php echo e(floor($complete_invest_amount / $one_percent_of_invest)); ?>"><span><?php echo e(floor($complete_invest_amount / $one_percent_of_invest)); ?>%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title"><?php echo e(__("Total Profit Amount")); ?></h6>
                                <div class="user-info">
                                    <h2 class="user-count"><?php echo e($default_currency->symbol); ?> <?php echo e(numeric_unit_converter(get_amount($total_profit_amount,null,4))->number . numeric_unit_converter(get_amount($total_profit_amount,null,4))->unit); ?></h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success"><?php echo e(__("Success")); ?></span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart11" data-percent="100"><span>100%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <?php
                        $total_money_transfer_complete_pending = ($pending_money_transfer + $success_money_transfer);
                        $one_percent_of_money_transfer = (($total_money_transfer_complete_pending / 100) == 0) ? 1 : ($total_money_transfer_complete_pending / 100);
                    ?>
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title"><?php echo e(__("Total Money Transfer")); ?></h6>
                                <div class="user-info">
                                    <h2 class="user-count"><?php echo e($default_currency->symbol); ?> <?php echo e(numeric_unit_converter(get_amount($total_money_transfer,null,4))->number . numeric_unit_converter(get_amount($total_money_transfer,null,4))->unit); ?></h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success"><?php echo e(__("Complete")); ?> <?php echo e(numeric_unit_converter(get_amount($success_money_transfer,null,4))->number . numeric_unit_converter(get_amount($success_money_transfer,null,4))->unit); ?></span>
                                    <span class="badge badge--warning"><?php echo e(__("Pending")); ?> <?php echo e(numeric_unit_converter(get_amount($pending_money_transfer,null,4))->number . numeric_unit_converter(get_amount($pending_money_transfer,null,4))->unit); ?></span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart12" data-percent="<?php echo e(floor($pending_money_transfer / $one_percent_of_money_transfer)); ?>"><span><?php echo e(floor($pending_money_transfer / $one_percent_of_money_transfer)); ?>%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title"><?php echo e(__("Refer Level")); ?></h6>
                                <div class="user-info">
                                    <h5 class="user-count"><?php echo e($user->referLevel?->title ?? "-"); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title"><?php echo e(__("Total Refers")); ?></h6>
                                <div class="user-info">
                                    <h2 class="user-count"><?php echo e($user->refer_users_count); ?></h2>
                                </div>
                            </div>
                            <div class="right">
                                <a href="<?php echo e(setRoute('admin.users.refers',$user->username)); ?>" class="btn--base bg--primary"><?php echo e(__("View All")); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-card mt-15">
        <div class="card-header">
            <h6 class="title"><?php echo e(__("User Overview")); ?></h6>
        </div>
        <div class="card-body">
            <form class="card-form">
                <div class="row align-items-center mb-10-none">
                    <div class="col-xl-4 col-lg-4 form-group">
                        <div class="user-action-btn-area">
                            <div class="user-action-btn">
                                <?php echo $__env->make('admin.components.button.custom',[
                                    'type'          => "button",
                                    'class'         => "wallet-balance-update-btn bg--danger one",
                                    'text'          => "Add/Subtract Balance",
                                    'icon'          => "las la-wallet me-1",
                                    'permission'    => "admin.users.wallet.balance.update",
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="user-action-btn">
                                <?php echo $__env->make('admin.components.link.custom',[
                                    'href'          => setRoute('admin.users.login.logs',$user->username),
                                    'class'         => "bg--base two",
                                    'icon'          => "las la-sign-in-alt me-1",
                                    'text'          => "Login Logs",
                                    'permission'    => "admin.users.login.logs",
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="user-action-btn">
                                <?php echo $__env->make('admin.components.link.custom',[
                                    'href'          => "#email-send",
                                    'class'         => "bg--base three modal-btn",
                                    'icon'          => "las la-mail-bulk me-1",
                                    'text'          => "Send Email",
                                    'permission'    => "admin.users.send.mail",
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="user-action-btn">
                                <?php echo $__env->make('admin.components.link.custom',[
                                    'class'         => "bg--base four login-as-member",
                                    'icon'          => "las la-user-check me-1",
                                    'text'          => "Login as Member",
                                    'permission'    => "admin.users.login.as.member",
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="user-action-btn">
                                <?php echo $__env->make('admin.components.link.custom',[
                                    'href'          => setRoute('admin.users.mail.logs',$user->username),
                                    'class'         => "bg--base five",
                                    'icon'          => "las la-history me-1",
                                    'text'          => "Email Logs",
                                    'permission'    => "admin.users.mail.logs",
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <div class="user-profile-thumb">
                            <img src="<?php echo e($user->userImage); ?>" alt="user">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <ul class="user-profile-list">
                            <li class="bg--base one"><?php echo e(__("Full Name:")); ?> <span><?php echo e($user->fullname); ?></span></li>
                            <li class="bg--info two"><?php echo e(__("Username:")); ?> <span><?php echo e("@".$user->username); ?></span></li>
                            <li class="bg--success three"><?php echo e(__("Email:")); ?> <span><?php echo e($user->email); ?></span></li>
                            <li class="bg--warning four"><?php echo e(__("Status:")); ?> <span><?php echo e($user->stringStatus->value); ?></span></li>
                            <li class="bg--danger five"><?php echo e(__("Last Login:")); ?> <span><?php echo e($user->lastLogin); ?></span></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="custom-card mt-15">
        <div class="card-header">
            <h6 class="title"><?php echo e(__("Information of User")); ?></h6>
        </div>
        <div class="card-body">
            <form class="card-form" method="POST" action="<?php echo e(setRoute('admin.users.details.update',$user->username)); ?>">
                <?php echo csrf_field(); ?>
                <div class="row mb-10-none">
                    <div class="col-xl-6 col-lg-6 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "First Name*",
                            'name'          => "firstname",
                            'value'         => old("firstname",$user->firstname),
                            'attribute'     => "required",
                            'placeholder'   => "Write Here...",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Last Name*",
                            'name'          => "lastname",
                            'value'         => old("lastname",$user->lastname),
                            'attribute'     => "required",
                            'placeholder'   => "Write Here...",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        <label><?php echo e(__("Country")); ?><span>*</span></label>
                        <select name="country" class="form--control select2-auto-tokenize country-select" data-placeholder="Select Country" data-old="<?php echo e(old('country',$user->address->country ?? "")); ?>"></select>
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        <label><?php echo e(__("Phone Number")); ?><span>*</span></label>
                        <div class="input-group">
                            <div class="input-group-text phone-code">+<?php echo e($user->mobile_code); ?></div>
                            <input class="phone-code" type="hidden" name="mobile_code" value="<?php echo e($user->mobile_code); ?>" />
                            <input type="text" class="form--control" placeholder="Write Here..." name="mobile" value="<?php echo e(old('mobile',$user->mobile)); ?>">
                        </div>
                        <?php $__errorArgs = ["mobile"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        <?php
                            $old_state = old('state',$user->address->state ?? "");
                        ?>
                        <label><?php echo e(__("State")); ?></label>
                        <select name="state" class="form--control select2-auto-tokenize state-select" data-placeholder="Select State" data-old="<?php echo e($old_state); ?>">
                            <?php if($old_state): ?>
                                <option value="<?php echo e($old_state); ?>" selected><?php echo e($old_state); ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        <?php
                            $old_city = old('city',$user->address->city ?? "");
                        ?>
                        <label><?php echo e(__("City")); ?></label>
                        <select name="city" class="form--control select2-auto-tokenize city-select" data-placeholder="Select City" data-old="<?php echo e($old_city); ?>">
                            <?php if($old_city): ?>
                                <option value="<?php echo e($old_city); ?>" selected><?php echo e($old_city); ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Zip/Postal",
                            'name'          => "zip_code",
                            'placeholder'   => "Write Here...",
                            'value'         => old('zip_code',$user->address->zip ?? "")
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        <?php echo $__env->make('admin.components.form.input',[
                            'label'         => "Address",
                            'name'          => 'address',
                            'value'         => old("address",$user->address->address ?? ""),
                            'placeholder'   => "Write Here...",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                        <?php echo $__env->make('admin.components.form.switcher', [
                            'label'         => 'User Status',
                            'value'         => old('status',$user->status),
                            'name'          => "status",
                            'options'       => ['Active' => 1, 'Banned' => 0],
                            'permission'    => "admin.users.details.update",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                        <?php echo $__env->make('admin.components.form.switcher', [
                            'label'         => 'Email Verification',
                            'value'         => old('email_verified',$user->email_verified),
                            'name'          => "email_verified",
                            'options'       => ['Verified' => 1, 'Unverified' => 0],
                            'permission'    => "admin.users.details.update",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                        <?php echo $__env->make('admin.components.form.switcher', [
                            'label'     => '2FA Verification',
                            'value'     => old('two_factor_status',$user->two_factor_status),
                            'name'      => "two_factor_status",
                            'options'   => ['Verified' => 1, 'Unverified' => 0],
                            'permission'    => "admin.users.details.update",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                        <?php echo $__env->make('admin.components.form.switcher', [
                            'label'     => 'KYC Verification',
                            'value'     => old('kyc_verified',$user->kyc_verified),
                            'name'      => "kyc_verified",
                            'options'   => ['Verified' => 1, 'Unverified' => 0],
                            'permission'    => "admin.users.details.update",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    
                    <div class="col-xl-12 col-lg-12 form-group mt-4">
                        <?php echo $__env->make('admin.components.button.form-btn',[
                            'text'          => "Update",
                            'permission'    => "admin.users.details.update",
                            'class'         => "w-100 btn-loading",
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <?php echo $__env->make('admin.components.modals.send-mail-user',compact("user"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php if(admin_permission_by_name("admin.users.wallet.balance.update")): ?>
        <div id="wallet-balance-update-modal" class="mfp-hide large">
            <div class="modal-data">
                <div class="modal-header px-0">
                    <h5 class="modal-title"><?php echo e(__("Add/Subtract Balance")); ?></h5>
                </div>
                <div class="modal-form-data">
                    <form class="modal-form" method="POST" action="<?php echo e(setRoute('admin.users.wallet.balance.update',$user->username)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-10-none">
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label for="balance"><?php echo e(__("Type")); ?><span>*</span></label>
                                <select name="type" id="balance" class="form--control nice-select">
                                    <option disabled selected>Select Type</option>
                                    <option value="add">Balance Add</option>
                                    <option value="subtract">Balance Subtract</option>
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label for="wallet"><?php echo e(__("User Wallet")); ?><span>*</span></label>
                                <select name="wallet" id="wallet" class="form--control select2-auto-tokenize">
                                    <option disabled selected>Select User Wallet</option>
                                    <?php $__currentLoopData = $user->wallets()->get() ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->currency->code); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <?php echo $__env->make('admin.components.form.input',[
                                    'label'         => 'Amount',
                                    'label_after'   => "<span>*</span>",
                                    'name'          => 'amount',
                                    'value'         => old("amount"),
                                    'class'         => "number-input",
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <?php echo $__env->make('admin.components.form.input',[
                                    'label'         => "Remark",
                                    'name'          => "remark",
                                    'value'         => old("remark"),
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                                <button type="button" class="btn btn--danger modal-close"><?php echo e(__("Close")); ?></button>
                                <button type="submit" class="btn btn--base"><?php echo e(__("Action")); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        getAllCountries("<?php echo e(setRoute('global.countries')); ?>");
        $(document).ready(function() {

            openModalWhenError("email-send","#email-send");
            openModalWhenError("wallet-balance-update-modal","#wallet-balance-update-modal");
            
            $("select[name=country]").change(function(){
                var phoneCode = $("select[name=country] :selected").attr("data-mobile-code");
                placePhoneCode(phoneCode);
            });

            setTimeout(() => {
                var phoneCodeOnload = $("select[name=country] :selected").attr("data-mobile-code");
                placePhoneCode(phoneCodeOnload);
            }, 400);

            countrySelect(".country-select",$(".country-select").siblings(".select2"));
            stateSelect(".state-select",$(".state-select").siblings(".select2"));


            $(".login-as-member").click(function() {
                var action  = "<?php echo e(setRoute('admin.users.login.as.member',$user->username)); ?>";
                var target  = "<?php echo e($user->username); ?>";
                postFormAndSubmit(action,target);
            });

            $(".wallet-balance-update-btn").click(function(){
                openModalBySelector("#wallet-balance-update-modal");
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prosnluk/public_html/resources/views/admin/sections/user-care/details.blade.php ENDPATH**/ ?>