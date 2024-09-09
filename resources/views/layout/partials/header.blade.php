<link rel="stylesheet" href="../../assets/css/custom-css.css" />

<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme navbar-background-color" id="layout-navbar">
          <div class="container-xxl">
            <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-6">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  
                </span>
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
                <!-- <li class="nav-item navbar-search-wrapper me-1 me-xl-0">
                  <a class="nav-link btn btn-text-secondary rounded-pill search-toggler fw-normal waves-effect waves-light" href="javascript:void(0);">
                    <i class="ri-search-line ri-22px scaleX-n1-rtl"></i>
                  </a>
                </li> -->
                <li class="nav-item navbar-search-wrapper me-1 me-xl-0">
                  <a
                    class="nav-link btn btn-text-secondary rounded-pill search-toggler fw-normal"
                    href="javascript:void(0);">
                    <i class="ri-search-line ri-22px scaleX-n1-rtl"></i>
                  </a>
                </li>
                <div class="navbar-search-wrapper search-input-wrapper d-none">
                  <input
                    type="text"
                    class="form-control search-input container-xxl border-0"
                    placeholder="Search..."
                    aria-label="Search..." />
                  <i class="ri-close-fill search-toggler cursor-pointer"></i>
                </div>
                <!-- /Search -->             

                <!-- Notification -->
                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-4 me-xl-1">
                  <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow waves-effect waves-light" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class="ri-notification-2-line ri-22px"></i>
                    <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom py-50">
                      <div class="dropdown-header d-flex align-items-center py-2">
                        <h6 class="mb-0 me-auto">Notification</h6>
                        <div class="d-flex align-items-center">
                          <span class="badge rounded-pill bg-label-primary fs-xsmall me-2">8 New</span>
                          <a href="javascript:void(0)" class="btn btn-text-secondary rounded-pill btn-icon dropdown-notifications-all waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark all as read" data-bs-original-title="Mark all as read"><i class="ri-mail-open-line text-heading ri-20px"></i></a>
                        </div>
                      </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container ps">
                      <ul class="list-group list-group-flush">
                        

                        
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read waves-effect">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <span class="avatar-initial rounded-circle bg-label-warning"><i class="ri-error-warning-line"></i></span>
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1 small">CPU is running high</h6>
                              <small class="mb-1 d-block text-body">CPU Utilization Percent is currently at 88.63%,</small>
                              <small class="text-muted">5 days ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                              <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line ri-20px"></span></a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></li>
                    <li class="border-top">
                      <div class="d-grid p-4">
                        <a class="btn btn-primary btn-sm d-flex waves-effect waves-light" href="javascript:void(0);">
                          <small class="align-middle">View all notifications</small>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                <!--/ Notification -->
                
      
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../../assets/img/avatars/1.png" alt="" class="rounded-circle">
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item waves-effect"  href="{{ route('my-profile') }}">
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
                      <a class="dropdown-item waves-effect"  href="{{ route('my-profile') }}">
                        <i class="ri-user-3-line ri-22px me-3"></i><span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item waves-effect" href="{{ route('users') }}">
                        <i class="ri-settings-4-line ri-22px me-3"></i><span class="align-middle">Settings</span>
                      </a>
                    </li>
          
                    <li>
                    <div class="d-grid px-4 pt-2 pb-1">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <a class="btn btn-sm btn-danger d-flex waves-effect waves-light" 
                            href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); 
                                      this.closest('form').submit();">
                              <small class="align-middle">Logout</small>
                              <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
                          </a>
                      </form>
                  </div>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
           
          </div>
        </nav>

   <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0" data-bg-class="bg-menu-theme">
    <div class="container-xxl d-flex h-100">
        <a href="#" class="menu-horizontal-prev d-none"></a>
        <div class="menu-horizontal-wrapper">
            <ul class="menu-inner" style="margin-left: 0px;" id="menu-items">
                <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('/dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons ri-home-smile-line"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                
                @php
                    $corePermissions = session('permissions_data.core_permission', []);
                    $sharingPermissions = session('permissions_data.data_sharing_permission', []);
                    $modulePrivateView = \App\Constant\PermissionConstant::MODULE_PRIVATE_VIEW;
                @endphp

                @foreach($corePermissions as $module)
                    @if ($module->permission_name !== $modulePrivateView || 
                         collect($sharingPermissions)->some(fn($sp) => $sp->module_id == $module->module_id && $sp->permission_name !== $modulePrivateView))
                        <li class="menu-item {{ request()->is(strtolower($module->module_name)) ? 'active' : '' }}">
                            <a href="{{ url('/' . strtolower($module->module_name)) }}" class="menu-link">
                                <i class="menu-icon tf-icons ri-layout-2-line"></i>
                                <div>{{ $module->module_name }}</div>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <a href="#" class="menu-horizontal-next d-none"></a>
    </div>
</aside>
