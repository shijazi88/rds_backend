<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?php echo e(url('client-dashboard')); ?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-dark.png')); ?>" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="<?php echo e(url('client-dashboard')); ?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt="" height="67">
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
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard')): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-dashboard-2-line"></i> <span><?php echo app('translator')->get('global.dashboards'); ?></span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDashboards">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <?php if(Auth::guard('web')->check()): ?>
                                        <a href="<?php echo e(url('dashboard')); ?>" class="nav-link">
                                            <i class='bx bx-bar-chart-alt-2'></i>
                                            <?php echo app('translator')->get('global.analytics'); ?></a>
                                    <?php endif; ?>

                                </li>

                            </ul>
                        </div>
                    </li> <!-- end Dashboard Menu -->
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_access')): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#clients" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="clients">
                            <i class="ri-user-2-line"></i>
                            <span><?php echo app('translator')->get('cruds.client.title'); ?></span>
                        </a>
                        <div class="collapse menu-dropdown" id="clients">
                            <ul class="nav nav-sm flex-column">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_access')): ?>
                                    <?php if(Auth::guard('web')->check()): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(url('admin/clients')); ?>" class="nav-link">
                                                <i class="ri-user-2-line"></i> <?php echo app('translator')->get('cruds.client.title'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('box_access')): ?>
                                    <?php if(Auth::guard('web')->check()): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(url('admin/boxes')); ?>" class="nav-link">
                                                <i class="ri-archive-line"></i> <?php echo app('translator')->get('cruds.box.title'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company_access')): ?>
                                    <?php if(Auth::guard('web')->check()): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(url('admin/companies')); ?>" class="nav-link">
                                                <i class="ri-building-line"></i> <?php echo app('translator')->get('cruds.company.title'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('driver_access')): ?>
                                    <?php if(Auth::guard('web')->check()): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(url('admin/drivers')); ?>" class="nav-link">
                                                <i class="ri-user-3-line"></i> <?php echo app('translator')->get('cruds.driver.title'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_access')): ?>
                                    <?php if(Auth::guard('web')->check()): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(url('admin/orders')); ?>" class="nav-link">
                                                <i class="ri-shopping-cart-line"></i> <?php echo app('translator')->get('cruds.order.title'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_address_access')): ?>
                                    <?php if(Auth::guard('web')->check()): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(url('admin/client-addresses')); ?>" class="nav-link">
                                                <i class="ri-map-pin-line"></i> <?php echo app('translator')->get('cruds.clientAddress.title'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('command_log_access')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(url('admin/command-logs')); ?>" class="nav-link">
                                            <i class="ri-map-pin-line"></i> <?php echo app('translator')->get('cruds.commandLog.title'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>




                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                    <?php if(Auth::guard('web')->check()): ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarUsers">
                                <i class="ri-group-line"></i><span><?php echo app('translator')->get('cruds.user.title'); ?></span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarUsers">
                                <ul class="nav nav-sm flex-column">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(url('admin/users')); ?>" class="nav-link"><i class="bx bx-user"></i>
                                                <?php echo app('translator')->get('cruds.user.title'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(url('admin/roles')); ?>" class="nav-link"><i
                                                    class="bx bx-user-check"></i>
                                                <?php echo app('translator')->get('cruds.role.title'); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(url('admin/permissions')); ?>" class="nav-link"><i
                                                    class="bx bx-shield"></i> <?php echo app('translator')->get('cruds.permission.title'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>