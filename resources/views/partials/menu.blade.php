<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('booking_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.bookings.index") }}" class="nav-link {{ request()->is("admin/bookings") || request()->is("admin/bookings/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-receipt">

                            </i>
                            <p>
                                {{ trans('cruds.booking.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('status_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.statuses.index") }}" class="nav-link {{ request()->is("admin/statuses") || request()->is("admin/statuses/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-eye">

                            </i>
                            <p>
                                {{ trans('cruds.status.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('review_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.reviews.index") }}" class="nav-link {{ request()->is("admin/reviews") || request()->is("admin/reviews/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-star">

                            </i>
                            <p>
                                {{ trans('cruds.review.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('category_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-wrench">

                            </i>
                            <p>
                                {{ trans('cruds.category.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('service_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.services.index") }}" class="nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-paint-roller">

                            </i>
                            <p>
                                {{ trans('cruds.service.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('commission_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.commissions.index") }}" class="nav-link {{ request()->is("admin/commissions") || request()->is("admin/commissions/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-money-bill-alt">

                            </i>
                            <p>
                                {{ trans('cruds.commission.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('payment_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.payments.index") }}" class="nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-dollar-sign">

                            </i>
                            <p>
                                {{ trans('cruds.payment.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('earning_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.earnings.index") }}" class="nav-link {{ request()->is("admin/earnings") || request()->is("admin/earnings/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                            </i>
                            <p>
                                {{ trans('cruds.earning.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('payout_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.payouts.index") }}" class="nav-link {{ request()->is("admin/payouts") || request()->is("admin/payouts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-file-invoice-dollar">

                            </i>
                            <p>
                                {{ trans('cruds.payout.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.settings.index") }}" class="nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>