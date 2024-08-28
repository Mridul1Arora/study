<!doctype html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="horizontal-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Roles - Apps | Materialize - Material Design HTML Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & ri-computer-linee config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
  </head>

@extends('layout.app')

@section('title', 'Dashboard')

@section('content')




<div class="col-12">
                  <h4 class="mt-6 mb-1">Roles</h4>
                </div>
  <!-- Role Table -->
  <div class="card">
    <div class="card-datatable table-responsive">
      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
        <div class="row mx-1">
          <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start gap-4 mt-5 mt-md-0">
            <div class="dataTables_length" id="DataTables_Table_0_length">
              <label>Show 
                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select form-select-sm">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
              </label>
            </div>
            <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start">
              <div class="dt-buttons btn-group flex-wrap">
                <div class="btn-group">
                  <button class="btn btn-secondary buttons-collection dropdown-toggle btn-outline-secondary me-4 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                    <span><i class="ri-download-line ri-16px me-1"></i> <span class="d-none d-sm-inline-block">Export</span></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="dt-action-buttons d-flex align-items-center justify-content-md-end justify-content-center flex-column flex-sm-row flex-nowrap">
              <div class="me-sm-4">
                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                  <label><input type="search" class="form-control form-control-sm" placeholder="Search User" aria-controls="DataTables_Table_0"></label>
                </div>
              </div>
              <div class="user_role w-px-200 mb-5 mb-sm-0"></div>
            </div>
          </div>
        </div>
        <table class="datatables-users table dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
          <thead>
            <tr>
              <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 52.2969px; display: none;" aria-label=""></th>
              <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 52.2969px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th>
              <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 141.109px;" aria-sort="descending" aria-label="User: activate to sort column ascending">User</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 154.344px;" aria-label="Email: activate to sort column ascending">Email</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 139.484px;" aria-label="Role: activate to sort column ascending">Role</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 142.156px;" aria-label="Plan: activate to sort column ascending">Plan</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 178.969px;" aria-label="Status: activate to sort column ascending">Status</th>
              <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 185.344px;" aria-label="Actions">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample Data Row -->
            <tr>
              <td><input type="checkbox" class="form-check-input"></td>
              <td>John Doe</td>
              <td>john.doe@example.com</td>
              <td>Admin</td>
              <td>Premium</td>
              <td>Active</td>
              <td>
              <a
                  href="javascript:;"
                  data-bs-toggle="modal"
                  data-bs-target="#addRoleModal"
                  class="role-edit-modal">
                  <p class="mb-0 btn btn-sm btn-primary">Edit Role</p>
                </a>
              </td>
            </tr>
            <tr>
              <td><input type="checkbox" class="form-check-input"></td>
              <td>Jane Smith</td>
              <td>jane.smith@example.com</td>
              <td>User</td>
              <td>Basic</td>
              <td>Inactive</td>
              <td>
              <a
                  href="javascript:;"
                  data-bs-toggle="modal"
                  data-bs-target="#addRoleModal"
                  class="role-edit-modal">
                  <p class="mb-0 btn btn-sm btn-primary">Edit Role</p>
                </a>              </td>
            </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
        <div class="row mx-1">
          <div class="col-sm-12 col-md-6">
            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
              <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                  <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link">
                    <i class="ri-arrow-left-s-line"></i>
                  </a>
                </li>
                <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
                  <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1" class="page-link">
                    <i class="ri-arrow-right-s-line"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Role Table -->
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



@endsection



