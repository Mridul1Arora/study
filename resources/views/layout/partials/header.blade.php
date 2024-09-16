
    <!-- Main Container -->
    <div class="container-fluid">
        <!-- Row for Navbar -->
        <div class="row">
            <!-- Navbar -->
            <nav class="col-md-12 navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="container-xxl">
                    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-6">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo"></span>
                            <span class="app-brand-text demo menu-text fw-semibold">Collegedunia</span>
                        </a>

                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                            <i class="ri-close-fill align-middle"></i>
                        </a>
                    </div>

                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="ri-menu-fill ri-22px"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Search -->
                            <li class="nav-item navbar-search-wrapper me-1 me-xl-0">
                                <a class="nav-link btn btn-text-secondary rounded-pill search-toggler fw-normal" href="javascript:void(0);">
                                    <i class="ri-search-line ri-22px scaleX-n1-rtl"></i>
                                </a>
                            </li>

                            <!-- Notifications -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-4 me-xl-1">
                                <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow waves-effect waves-light" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="ri-notification-2-line ri-22px"></i>
                                    <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end py-0">
                                    <!-- Notifications content -->
                                    <li class="dropdown-notifications-list scrollable-container">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read waves-effect">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-warning">
                                                                <i class="ri-error-warning-line"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 small">CPU is running high</h6>
                                                        <small class="mb-1 d-block text-body">CPU Utilization Percent is currently at 88.63%,</small>
                                                        <small class="text-muted">5 days ago</small>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="border-top">
                                        <div class="d-grid p-4">
                                            <a class="btn btn-primary btn-sm d-flex waves-effect waves-light" href="javascript:void(0);">
                                                <small class="align-middle">View all notifications</small>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            
                            <!-- User Profile Dropdown -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../../assets/img/avatars/1.png" alt="" class="rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item waves-effect" href="{{ route('my-profile') }}">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar avatar-online">
                                                        <img src="../../assets/img/avatars/1.png" alt="" class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block small">{{auth()->user()->name}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="ri-logout-box-r-line ms-2 ri-16px"></i><span class="align-middle">Logout</span>
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Row for Sidebar and Main Content -->
        <div class="row">
            <!-- Sidebar -->
            <aside id="layout-menu" class="col-md-2 layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
                <div class="container-xxl d-flex h-100">
                    <div class="menu-horizontal-wrapper">
                        <ul class="menu-inner">
                            <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                                <a href="{{ url('/dashboard') }}" class="menu-link">
                                    <i class="menu-icon tf-icons ri-home-smile-line"></i>
                                    <div>Dashboards</div>
                                </a>
                            </li>
                            @can('view lead')
                            <li class="menu-item {{ request()->is('lead*') ? 'active' : '' }}">
                                <a href="{{ url('/lead') }}" class="menu-link">
                                    <i class="menu-icon tf-icons ri-layout-2-line"></i>
                                    <div>Lead</div>
                                </a>
                            </li>
                            @endcan
                            <li class="menu-item {{ request()->is('contact*') ? 'active' : '' }}">
                                <a href="{{ url('/contact') }}" class="menu-link">
                                    <i class="menu-icon tf-icons ri-article-line"></i>
                                    <div>Contact</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('deal*') ? 'active' : '' }}">
                                <a href="{{ url('/deal') }}" class="menu-link">
                                    <i class="menu-icon tf-icons ri-archive-line"></i>
                                    <div>Deal</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('calls*') ? 'active' : '' }}">
                                <a href="{{ url('/calls') }}" class="menu-link">
                                    <i class="menu-icon tf-icons ri-archive-line"></i>
                                    <div>Calls</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="col-md-10">
                <div class="container-fluid">
                    <!-- Main Content Goes Here -->
                </div>
            </main>
        </div>
    </div>