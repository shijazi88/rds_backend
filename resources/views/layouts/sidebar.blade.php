<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ url('client-dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ url('client-dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="67">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                {{-- <li class="menu-title"><span>@lang('translation.menu')</span></li> --}}
                @can('dashboard')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-dashboard-2-line"></i> <span>@lang('global.dashboards')</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDashboards">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    @if (Auth::guard('web')->check())
                                        <a href="{{ url('dashboard') }}" class="nav-link">
                                            <i class='bx bx-bar-chart-alt-2'></i>
                                            @lang('global.analytics')</a>
                                    @endif

                                </li>

                            </ul>
                        </div>
                    </li> <!-- end Dashboard Menu -->
                @endcan
                @can('client_access')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#clients" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="clients">
                            <i class="ri-user-2-line"></i>
                            <span>@lang('cruds.client.title')</span>
                        </a>
                        <div class="collapse menu-dropdown" id="clients">
                            <ul class="nav nav-sm flex-column">
                                @can('client_access')
                                    @if (Auth::guard('web')->check())
                                        <li class="nav-item">
                                            <a href="{{ url('admin/clients') }}" class="nav-link">
                                                <i class="ri-user-2-line"></i> @lang('cruds.client.title')</a>
                                        </li>
                                    @endif
                                @endcan
                                @can('box_access')
                                    @if (Auth::guard('web')->check())
                                        <li class="nav-item">
                                            <a href="{{ url('admin/boxes') }}" class="nav-link">
                                                <i class="ri-archive-line"></i> @lang('cruds.box.title')</a>
                                        </li>
                                    @endif
                                @endcan
                                @can('company_access')
                                    @if (Auth::guard('web')->check())
                                        <li class="nav-item">
                                            <a href="{{ url('admin/companies') }}" class="nav-link">
                                                <i class="ri-building-line"></i> @lang('cruds.company.title')</a>
                                        </li>
                                    @endif
                                @endcan
                                @can('driver_access')
                                    @if (Auth::guard('web')->check())
                                        <li class="nav-item">
                                            <a href="{{ url('admin/drivers') }}" class="nav-link">
                                                <i class="ri-user-3-line"></i> @lang('cruds.driver.title')</a>
                                        </li>
                                    @endif
                                @endcan
                                @can('order_access')
                                    @if (Auth::guard('web')->check())
                                        <li class="nav-item">
                                            <a href="{{ url('admin/orders') }}" class="nav-link">
                                                <i class="ri-shopping-cart-line"></i> @lang('cruds.order.title')</a>
                                        </li>
                                    @endif
                                @endcan
                                @can('client_address_access')
                                    @if (Auth::guard('web')->check())
                                        <li class="nav-item">
                                            <a href="{{ url('admin/client-addresses') }}" class="nav-link">
                                                <i class="ri-map-pin-line"></i> @lang('cruds.clientAddress.title')</a>
                                        </li>
                                    @endif
                                @endcan
                                @can('command_log_access')
                                    <li class="nav-item">
                                        <a href="{{ url('admin/command-logs') }}" class="nav-link">
                                            <i class="ri-map-pin-line"></i> @lang('cruds.commandLog.title')</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan




                @can('user_access')
                    @if (Auth::guard('web')->check())
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarUsers">
                                <i class="ri-group-line"></i><span>@lang('cruds.user.title')</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarUsers">
                                <ul class="nav nav-sm flex-column">
                                    @can('user_access')
                                        <li class="nav-item">
                                            <a href="{{ url('admin/users') }}" class="nav-link"><i class="bx bx-user"></i>
                                                @lang('cruds.user.title')</a>
                                        </li>
                                    @endcan
                                    @can('role_access')
                                        <li class="nav-item">
                                            <a href="{{ url('admin/roles') }}" class="nav-link"><i
                                                    class="bx bx-user-check"></i>
                                                @lang('cruds.role.title')</a>
                                        </li>
                                    @endcan
                                    @can('permission_access')
                                        <li class="nav-item">
                                            <a href="{{ url('admin/permissions') }}" class="nav-link"><i
                                                    class="bx bx-shield"></i> @lang('cruds.permission.title')</a>
                                        </li>
                                    @endcan

                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
                    @endif
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
