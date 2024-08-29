@extends('layout.app')

@section('title', 'User')

@section('content')


<div class="container-fluid custom-css-container-fluid">
        <div class="col-lg-2 col-12">
    <div class="d-flex justify-content-between flex-column mb-4 mb-md-0">
      <h5 class="mb-4">Getting Started</h5>
      <ul class="nav nav-align-left nav-pills flex-column">
        <li class="nav-item mb-1">
          <a class="nav-link  waves-effect waves-light" href="{{ route('users') }}">
            <i class="ri-store-2-line me-2"></i>
            <span class="align-middle">User</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link active waves-effect waves-light" href="{{ route('role-setting') }}">
            <i class="ri-bank-card-line me-2"></i>
            <span class="align-middle">Roles</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link  waves-effect waves-light" href="{{ route('permission-setting') }}">
            <i class="ri-shopping-cart-line me-2"></i>
            <span class="align-middle">Permission</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link waves-effect waves-light" href="{{ route('module-field-setting') }}">
            <i class="ri-car-line me-2"></i>
            <span class="align-middle">Module and Field</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link waves-effect waves-light" href="app-ecommerce-settings-locations.html">
            <i class="ri-map-pin-2-line me-2"></i>
            <span class="align-middle">Locations</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="app-ecommerce-settings-notifications.html">
            <i class="ri-notification-4-line me-2"></i>
            <span class="align-middle">Notifications</span>
          </a>
        </li>
      </ul>
    </div>
  </div>


<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
                  <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body p-0">
                      <div class="text-center mb-6">
                        <h4 class="role-title mb-2 pb-0">Add New Role</h4>
                        <p>Set role permissions</p>
                      </div>
                      <!-- Add role form -->
                      <form id="addRoleForm" class="row g-3" onsubmit="return false">
                        <div class="col-12 mb-3">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalRoleName"
                              name="modalRoleName"
                              class="form-control"
                              placeholder="Enter a role name"
                              tabindex="-1" />
                            <label for="modalRoleName">Role Name</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <h5 class="mb-6">Role Permissions</h5>
                          <!-- Permission table -->
                          <div class="table-responsive">
                            <table class="table table-flush-spacing">
                              <tbody>
                                <tr>
                                  <td class="text-nowrap fw-medium">
                                    Administrator Access
                                    <i
                                      class="ri-information-line"
                                      data-bs-toggle="tooltip"
                                      data-bs-placement="top"
                                      title="Allows a full access to the system"></i>
                                  </td>
                                  <td>
                                    <div class="d-flex justify-content-end">
                                      <div class="form-check mb-0 mt-1">
                                        <input class="form-check-input" type="checkbox" id="selectAll" />
                                        <label class="form-check-label" for="selectAll"> Select All </label>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-nowrap fw-medium">User Management</td>
                                  <td>
                                    <div class="d-flex justify-content-end">
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                        <label class="form-check-label" for="userManagementRead"> Read </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                        <label class="form-check-label" for="userManagementWrite"> Write </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1">
                                        <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                        <label class="form-check-label" for="userManagementCreate"> Create </label>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-nowrap fw-medium">Content Management</td>
                                  <td>
                                    <div class="d-flex justify-content-end">
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="contentManagementRead" />
                                        <label class="form-check-label" for="contentManagementRead"> Read </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="contentManagementWrite" />
                                        <label class="form-check-label" for="contentManagementWrite"> Write </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1">
                                        <input class="form-check-input" type="checkbox" id="contentManagementCreate" />
                                        <label class="form-check-label" for="contentManagementCreate"> Create </label>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-nowrap fw-medium">Disputes Management</td>
                                  <td>
                                    <div class="d-flex justify-content-end">
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="dispManagementRead" />
                                        <label class="form-check-label" for="dispManagementRead"> Read </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="dispManagementWrite" />
                                        <label class="form-check-label" for="dispManagementWrite"> Write </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1">
                                        <input class="form-check-input" type="checkbox" id="dispManagementCreate" />
                                        <label class="form-check-label" for="dispManagementCreate"> Create </label>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-nowrap fw-medium">Database Management</td>
                                  <td>
                                    <div class="d-flex justify-content-end">
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="dbManagementRead" />
                                        <label class="form-check-label" for="dbManagementRead"> Read </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="dbManagementWrite" />
                                        <label class="form-check-label" for="dbManagementWrite"> Write </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1">
                                        <input class="form-check-input" type="checkbox" id="dbManagementCreate" />
                                        <label class="form-check-label" for="dbManagementCreate"> Create </label>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-nowrap fw-medium">Financial Management</td>
                                  <td>
                                    <div class="d-flex justify-content-end">
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="finManagementRead" />
                                        <label class="form-check-label" for="finManagementRead"> Read </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="finManagementWrite" />
                                        <label class="form-check-label" for="finManagementWrite"> Write </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1">
                                        <input class="form-check-input" type="checkbox" id="finManagementCreate" />
                                        <label class="form-check-label" for="finManagementCreate"> Create </label>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-nowrap fw-medium">Reporting</td>
                                  <td>
                                    <div class="d-flex justify-content-end">
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="reportingRead" />
                                        <label class="form-check-label" for="reportingRead"> Read </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="reportingWrite" />
                                        <label class="form-check-label" for="reportingWrite"> Write </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1">
                                        <input class="form-check-input" type="checkbox" id="reportingCreate" />
                                        <label class="form-check-label" for="reportingCreate"> Create </label>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-nowrap fw-medium">API Control</td>
                                  <td>
                                    <div class="d-flex justify-content-end">
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="apiRead" />
                                        <label class="form-check-label" for="apiRead"> Read </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="apiWrite" />
                                        <label class="form-check-label" for="apiWrite"> Write </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1">
                                        <input class="form-check-input" type="checkbox" id="apiCreate" />
                                        <label class="form-check-label" for="apiCreate"> Create </label>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-nowrap fw-medium">Repository Management</td>
                                  <td>
                                    <div class="d-flex justify-content-end">
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="repoRead" />
                                        <label class="form-check-label" for="repoRead"> Read </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="repoWrite" />
                                        <label class="form-check-label" for="repoWrite"> Write </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1">
                                        <input class="form-check-input" type="checkbox" id="repoCreate" />
                                        <label class="form-check-label" for="repoCreate"> Create </label>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-nowrap fw-medium">Payroll</td>
                                  <td>
                                    <div class="d-flex justify-content-end">
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="payrollRead" />
                                        <label class="form-check-label" for="payrollRead"> Read </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1 me-4 me-lg-12">
                                        <input class="form-check-input" type="checkbox" id="payrollWrite" />
                                        <label class="form-check-label" for="payrollWrite"> Write </label>
                                      </div>
                                      <div class="form-check mb-0 mt-1">
                                        <input class="form-check-input" type="checkbox" id="payrollCreate" />
                                        <label class="form-check-label" for="payrollCreate"> Create </label>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!-- Permission table -->
                        </div>
                        <div class="col-12 d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button
                            type="reset"
                            class="btn btn-outline-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                          </button>
                        </div>
                      </form>
                      <!--/ Add role form -->
                    </div>
                  </div>
                </div>
              </div>

  <div class="col-10">
    <!-- Role Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row mx-1"><div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start gap-4 mt-5 mt-md-0"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div><div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start"><div class="dt-buttons btn-group flex-wrap"><div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle btn-outline-secondary me-4 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="ri-download-line ri-16px me-1"></i> <span class="d-none d-sm-inline-block">Export</span></span></button></div> </div></div></div><div class="col-sm-12 col-md-7"><div class="dt-action-buttons d-flex align-items-center justify-content-md-end justify-content-center flex-column flex-sm-row flex-nowrap"><div class="me-sm-4"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search User" aria-controls="DataTables_Table_0"></label></div></div><div class="user_role w-px-200 mb-5 mb-sm-0">
              <a
                  href="javascript:;"
                  data-bs-toggle="modal"
                  data-bs-target="#addRoleModal"
                  class="role-edit-modal">
                  <p class="mb-0 btn btn-sm btn-primary">Add Role</p>
                </a>
              </div><div class="user_role w-px-200 mb-5 mb-sm-0"><select id="UserRole" class="form-select text-capitalize form-select-sm"><option value=""> Select Role </option><option value="Admin" class="text-capitalize">Admin</option><option value="Author" class="text-capitalize">Author</option><option value="Editor" class="text-capitalize">Editor</option><option value="Maintainer" class="text-capitalize">Maintainer</option><option value="Subscriber" class="text-capitalize">Subscriber</option></select></div></div></div></div><table class="datatables-users table dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1135px;">
          <thead>
            <tr><th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th><th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th><th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 207px;" aria-label="User: activate to sort column ascending" aria-sort="descending">User</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 246px;" aria-label="Email: activate to sort column ascending">Email</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 105px;" aria-label="Role: activate to sort column ascending">Role</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 72px;" aria-label="Plan: activate to sort column ascending">Plan</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 64px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 117px;" aria-label="Actions">Actions</th></tr>
          </thead><tbody><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading"><span class="fw-medium text-truncate">Yoko Pottie</span></a><small>ypottiec</small></div></div></td><td><span>ypottiec@privacy.gov.au</span></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="ri-user-line ri-22px text-primary me-2"></i>Subscriber</span></td><td><span class="text-heading">Basic</span></td><td><span class="badge rounded-pill bg-label-secondary" text-capitalized="">Inactive</span></td><td><div class="d-flex align-items-center gap-50"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record waves-effect waves-light"><i class="ri-delete-bin-7-line ri-20px"></i></button><a href="app-user-view-account.html" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ri-eye-line ri-20px"></i></a><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown"><i class="ri-more-2-fill ri-20px"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading"><span class="fw-medium text-truncate">Wesley Burland</span></a><small>wburlandj</small></div></div></td><td><span>wburlandj@uiuc.edu</span></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="ri-edit-box-line ri-22px text-info me-2"></i>Editor</span></td><td><span class="text-heading">Team</span></td><td><span class="badge rounded-pill bg-label-secondary" text-capitalized="">Inactive</span></td><td><div class="d-flex align-items-center gap-50"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record waves-effect waves-light"><i class="ri-delete-bin-7-line ri-20px"></i></button><a href="app-user-view-account.html" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ri-eye-line ri-20px"></i></a><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown"><i class="ri-more-2-fill ri-20px"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-warning">VK</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading"><span class="fw-medium text-truncate">Vladamir Koschek</span></a><small>vkoschek17</small></div></div></td><td><span>vkoschek17@abc.net.au</span></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="ri-vip-crown-line ri-22px text-warning me-2"></i>Author</span></td><td><span class="text-heading">Team</span></td><td><span class="badge rounded-pill bg-label-success" text-capitalized="">Active</span></td><td><div class="d-flex align-items-center gap-50"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record waves-effect waves-light"><i class="ri-delete-bin-7-line ri-20px"></i></button><a href="app-user-view-account.html" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ri-eye-line ri-20px"></i></a><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown"><i class="ri-more-2-fill ri-20px"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-info">TW</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading"><span class="fw-medium text-truncate">Tyne Widmore</span></a><small>twidmore12</small></div></div></td><td><span>twidmore12@bravesites.com</span></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="ri-user-line ri-22px text-primary me-2"></i>Subscriber</span></td><td><span class="text-heading">Team</span></td><td><span class="badge rounded-pill bg-label-warning" text-capitalized="">Pending</span></td><td><div class="d-flex align-items-center gap-50"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record waves-effect waves-light"><i class="ri-delete-bin-7-line ri-20px"></i></button><a href="app-user-view-account.html" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ri-eye-line ri-20px"></i></a><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown"><i class="ri-more-2-fill ri-20px"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-info">TB</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading"><span class="fw-medium text-truncate">Travus Bruntjen</span></a><small>tbruntjeni</small></div></div></td><td><span>tbruntjeni@sitemeter.com</span></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="ri-computer-line ri-22px text-danger me-2"></i>Admin</span></td><td><span class="text-heading">Enterprise</span></td><td><span class="badge rounded-pill bg-label-success" text-capitalized="">Active</span></td><td><div class="d-flex align-items-center gap-50"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record waves-effect waves-light"><i class="ri-delete-bin-7-line ri-20px"></i></button><a href="app-user-view-account.html" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ri-eye-line ri-20px"></i></a><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown"><i class="ri-more-2-fill ri-20px"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading"><span class="fw-medium text-truncate">Stu Delamaine</span></a><small>sdelamainek</small></div></div></td><td><span>sdelamainek@who.int</span></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="ri-vip-crown-line ri-22px text-warning me-2"></i>Author</span></td><td><span class="text-heading">Basic</span></td><td><span class="badge rounded-pill bg-label-warning" text-capitalized="">Pending</span></td><td><div class="d-flex align-items-center gap-50"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record waves-effect waves-light"><i class="ri-delete-bin-7-line ri-20px"></i></button><a href="app-user-view-account.html" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ri-eye-line ri-20px"></i></a><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown"><i class="ri-more-2-fill ri-20px"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-info">SO</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading"><span class="fw-medium text-truncate">Saunder Offner</span></a><small>soffner19</small></div></div></td><td><span>soffner19@mac.com</span></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="ri-pie-chart-line ri-22px text-success me-2"></i>Maintainer</span></td><td><span class="text-heading">Enterprise</span></td><td><span class="badge rounded-pill bg-label-warning" text-capitalized="">Pending</span></td><td><div class="d-flex align-items-center gap-50"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record waves-effect waves-light"><i class="ri-delete-bin-7-line ri-20px"></i></button><a href="app-user-view-account.html" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ri-eye-line ri-20px"></i></a><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown"><i class="ri-more-2-fill ri-20px"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-info">SM</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading"><span class="fw-medium text-truncate">Stephen MacGilfoyle</span></a><small>smacgilfoyley</small></div></div></td><td><span>smacgilfoyley@bigcartel.com</span></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="ri-pie-chart-line ri-22px text-success me-2"></i>Maintainer</span></td><td><span class="text-heading">Company</span></td><td><span class="badge rounded-pill bg-label-warning" text-capitalized="">Pending</span></td><td><div class="d-flex align-items-center gap-50"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record waves-effect waves-light"><i class="ri-delete-bin-7-line ri-20px"></i></button><a href="app-user-view-account.html" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ri-eye-line ri-20px"></i></a><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown"><i class="ri-more-2-fill ri-20px"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading"><span class="fw-medium text-truncate">Skip Hebblethwaite</span></a><small>shebblethwaite10</small></div></div></td><td><span>shebblethwaite10@arizona.edu</span></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="ri-computer-line ri-22px text-danger me-2"></i>Admin</span></td><td><span class="text-heading">Company</span></td><td><span class="badge rounded-pill bg-label-secondary" text-capitalized="">Inactive</span></td><td><div class="d-flex align-items-center gap-50"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record waves-effect waves-light"><i class="ri-delete-bin-7-line ri-20px"></i></button><a href="app-user-view-account.html" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ri-eye-line ri-20px"></i></a><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown"><i class="ri-more-2-fill ri-20px"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-primary">SH</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading"><span class="fw-medium text-truncate">Silvain Halstead</span></a><small>shalstead5</small></div></div></td><td><span>shalstead5@shinystat.com</span></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="ri-vip-crown-line ri-22px text-warning me-2"></i>Author</span></td><td><span class="text-heading">Company</span></td><td><span class="badge rounded-pill bg-label-success" text-capitalized="">Active</span></td><td><div class="d-flex align-items-center gap-50"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record waves-effect waves-light"><i class="ri-delete-bin-7-line ri-20px"></i></button><a href="app-user-view-account.html" class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ri-eye-line ri-20px"></i></a><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown"><i class="ri-more-2-fill ri-20px"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr></tbody>
        </table><div class="row mx-1"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 49 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="ri-arrow-left-s-line"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="2" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="3" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="4" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0" class="page-link"><i class="ri-arrow-right-s-line"></i></a></li></ul></div></div></div><div style="width: 1%;"></div></div>
      </div>
    </div>
    <!--/ Role Table -->
  </div>


  @endsection