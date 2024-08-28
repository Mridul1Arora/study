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

    <title>Permission - Apps | Materialize - Material Design HTML Admin Template</title>

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
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
  </head>

@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="col-12">
    <h4 class="mt-6 mb-1">Permission</h4>
</div>
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-simple">
                  <div class="modal-content p-4 p-md-12">
                    <button
                      type="button"
                      class="btn-close btn-pinned"
                      data-bs-dismiss="modal"
                      aria-label="Close"></button>
                    <div class="modal-body p-md-0">
                      <div class="text-center mb-6">
                        <h3 class="mb-2 pb-1">Add New Permission</h3>
                        <p>Permissions you may use and assign to your users.</p>
                      </div>
                      <form id="addPermissionForm" class="row" onsubmit="return false">
                        <div class="col-12 mb-4">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalPermissionName"
                              name="modalPermissionName"
                              class="form-control"
                              placeholder="Permission Name"
                              autofocus />
                            <label for="modalPermissionName">Permission Name</label>
                          </div>
                        </div>
                        <div class="col-12 mb-2">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="corePermission" />
                            <label class="form-check-label" for="corePermission"> Set as core permission </label>
                          </div>
                        </div>
                        <div class="col-12 text-center demo-vertical-spacing">
                          <button type="submit" class="btn btn-primary me-sm-4 me-1">Create Permission</button>
                          <button
                            type="reset"
                            class="btn btn-outline-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            Discard
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Edit Permission Modal -->
              <div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-simple">
                  <div class="modal-content p-4 p-md-12">
                    <button
                      type="button"
                      class="btn-close btn-pinned"
                      data-bs-dismiss="modal"
                      aria-label="Close"></button>
                    <div class="modal-body p-md-0">
                      <div class="text-center mb-6">
                        <h3 class="mb-2 pb-1">Edit Permission</h3>
                        <p>Edit permission as per your requirements.</p>
                      </div>
                      <div class="alert alert-warning" role="alert">
                        <h6 class="alert-heading mb-2">Warning</h6>
                        <p class="mb-0">
                          By editing the permission name, you might break the system permissions functionality. Please
                          ensure you're absolutely certain before proceeding.
                        </p>
                      </div>
                      <form id="editPermissionForm" class="row pt-2" onsubmit="return false">
                        <div class="col-sm-9 mb-4">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="editPermissionName"
                              name="editPermissionName"
                              class="form-control"
                              placeholder="Permission Name"
                              tabindex="-1" />
                            <label for="editPermissionName">Permission Name</label>
                          </div>
                        </div>
                        <div class="col-sm-3 mb-4">
                          <button type="submit" class="btn btn-primary mt-1 mt-sm-0">Update</button>
                        </div>
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="editCorePermission" />
                            <label class="form-check-label" for="editCorePermission"> Set as core permission </label>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Edit Permission Modal -->

<div class="card">
  <div class="card-datatable table-responsive">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
      <div class="row mx-1">
        <div class="col-sm-12 col-md-3 mt-5 mt-md-0">
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
        </div>
        <div class="col-sm-12 col-md-9">
          <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1">
            <div class="me-4">
              <div id="DataTables_Table_0_filter" class="dataTables_filter">
                <label><input type="search" class="form-control form-control-sm" placeholder="Search Permissions" aria-controls="DataTables_Table_0"></label>
              </div>
            </div>
            <div class="dt-buttons btn-group flex-wrap">
              <button class="btn add-new btn-primary mb-5 mb-md-0 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#addPermissionModal">
                <span><i class="ri-add-line me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Permission</span></span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <table class="datatables-permissions table dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1395px;">
        <thead>
          <tr>
            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 74px; display: none;" aria-label=""></th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 197px;" aria-label="Name: activate to sort column ascending">Name</th>
            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 330px;" aria-label="Assigned To">Assigned To</th>
            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 355px;" aria-label="Created Date">Created Date</th>
            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 237px;" aria-label="Actions">Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Sample Permission Rows -->
          <tr>
            <td>View Dashboard</td>
            <td>Admin, Manager</td>
            <td>2024-08-01</td>
            <td>
            <button class="btn add-new btn-primary mb-5 mb-md-0 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#editPermissionModal">
            <span class="d-none d-sm-inline-block">Edit</span>
              <!-- <span class="d-none d-sm-inline-block">Edit</span> -->
            
            </td>
          </tr>
          <tr>
            <td>Edit Users</td>
            <td>Admin</td>
            <td>2024-08-02</td>
            <td>
            <button class="btn add-new btn-primary mb-5 mb-md-0 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#editPermissionModal">
              <span class="d-none d-sm-inline-block">Edit</span>
             
            </td>
          </tr>
          <tr>
            <td>Manage Roles</td>
            <td>Admin</td>
            <td>2024-08-03</td>
            <td>
            <button class="btn add-new btn-primary mb-5 mb-md-0 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#editPermissionModal">
              <span class="d-none d-sm-inline-block">Edit</span>
             
            </td>
          </tr>
          <tr>
            <td>View Reports</td>
            <td>Admin, Manager, User</td>
            <td>2024-08-04</td>
            <td>
            <button class="btn add-new btn-primary mb-5 mb-md-0 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#editPermissionModal">
              <span class="d-none d-sm-inline-block">Edit</span>
             
            </td>
          </tr>
          <tr>
            <td>Manage Settings</td>
            <td>Admin</td>
            <td>2024-08-05</td>
            <td>
            <button class="btn add-new btn-primary mb-5 mb-md-0 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#editPermissionModal">
              <span class="d-none d-sm-inline-block">Edit</span>
             
            </td>
          </tr>
          <tr>
            <td>Delete Users</td>
            <td>Admin</td>
            <td>2024-08-06</td>
            <td>
            <button class="btn add-new btn-primary mb-5 mb-md-0 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#editPermissionModal">
            <span class="d-none d-sm-inline-block">Edit</span>
             
            </td>
          </tr>
        </tbody>
      </table>
      <div class="row mx-2">
        <div class="col-sm-12 col-md-6">
          <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 6 of 6 entries</div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            <ul class="pagination">
              <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="ri-arrow-left-s-line"></i></a>
              </li>
              <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
                <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1" class="page-link"><i class="ri-arrow-right-s-line"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/app-access-permission.js"></script>
    <script src="../../assets/js/modal-add-permission.js"></script>
    <script src="../../assets/js/modal-edit-permission.js"></script>

              @endsection