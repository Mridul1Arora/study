@extends('layout.app')

@section('title', 'User')

@section('content')


<div class="container-fluid" style="
    gap: 30px;
    display: flex;
    padding-top: 30px;
">
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
          <a class="nav-link waves-effect waves-light" href="{{ route('role-setting') }}">
            <i class="ri-bank-card-line me-2"></i>
            <span class="align-middle">Role</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link active waves-effect waves-light"  href="{{ route('permission-setting') }}">
            <i class="ri-shopping-cart-line me-2"></i>
            <span class="align-middle">Permission</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link waves-effect waves-light"  href="{{ route('module-field-setting') }}">
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



  <div class="col-10">
            
            


<!-- Permission Table -->
<div class="card">
  <div class="card-datatable table-responsive">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row mx-1"><div class="col-sm-12 col-md-3 mt-5 mt-md-0"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-sm-12 col-md-9"><div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1"><div class="me-4"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search Permissions" aria-controls="DataTables_Table_0"></label></div></div><div class="dt-buttons btn-group flex-wrap"><button class="btn add-new btn-primary mb-5 mb-md-0 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#addPermissionModal"><span><i class="ri-add-line me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Permission</span></span></button> </div></div></div></div><table class="datatables-permissions table dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1134px;">
      <thead>
        <tr><th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 240px;" aria-label="Name: activate to sort column ascending">Name</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 365px;" aria-label="Assigned To">Assigned To</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 243px;" aria-label="Created Date">Created Date</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 124px;" aria-label="Actions">Actions</th></tr>
      </thead><tbody><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td><span class="text-nowrap text-heading">Management</span></td><td><span class="text-nowrap"><a href="app-user-list.html"><span class="badge rounded-pill bg-label-primary me-4">Administrator</span></a></span></td><td><span class="text-nowrap">14 Apr 2021, 8:43 PM</span></td><td><div class="d-flex align-items-center"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record text-body waves-effect waves-light me-1"><i class="ri-delete-bin-7-line ri-20px"></i></button><span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary text-body rounded-pill waves-effect waves-light" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ri-edit-box-line ri-20px"></i></button></span></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td><span class="text-nowrap text-heading">Manage Billing &amp; Roles</span></td><td><span class="text-nowrap"><a href="app-user-list.html"><span class="badge rounded-pill bg-label-primary me-4">Administrator</span></a></span></td><td><span class="text-nowrap">16 Sep 2021, 5:20 PM</span></td><td><div class="d-flex align-items-center"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record text-body waves-effect waves-light me-1"><i class="ri-delete-bin-7-line ri-20px"></i></button><span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary text-body rounded-pill waves-effect waves-light" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ri-edit-box-line ri-20px"></i></button></span></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td><span class="text-nowrap text-heading">Add &amp; Remove Users</span></td><td><span class="text-nowrap"><a href="app-user-list.html"><span class="badge rounded-pill bg-label-primary me-4">Administrator</span></a><a href="app-user-list.html"><span class="badge rounded-pill bg-label-warning me-4">Manager</span></a></span></td><td><span class="text-nowrap">14 Oct 2021, 10:20 AM</span></td><td><div class="d-flex align-items-center"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record text-body waves-effect waves-light me-1"><i class="ri-delete-bin-7-line ri-20px"></i></button><span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary text-body rounded-pill waves-effect waves-light" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ri-edit-box-line ri-20px"></i></button></span></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td><span class="text-nowrap text-heading">Project Planning</span></td><td><span class="text-nowrap"><a href="app-user-list.html"><span class="badge rounded-pill bg-label-primary me-4">Administrator</span></a><a href="app-user-list.html"><span class="badge rounded-pill bg-label-success me-4">Users</span></a><a href="app-user-list.html"><span class="badge rounded-pill bg-label-info me-4">Support</span></a></span></td><td><span class="text-nowrap">14 May 2021, 12:10 PM</span></td><td><div class="d-flex align-items-center"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record text-body waves-effect waves-light me-1"><i class="ri-delete-bin-7-line ri-20px"></i></button><span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary text-body rounded-pill waves-effect waves-light" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ri-edit-box-line ri-20px"></i></button></span></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td><span class="text-nowrap text-heading">Manage Email Sequences</span></td><td><span class="text-nowrap"><a href="app-user-list.html"><span class="badge rounded-pill bg-label-primary me-4">Administrator</span></a><a href="app-user-list.html"><span class="badge rounded-pill bg-label-success me-4">Users</span></a><a href="app-user-list.html"><span class="badge rounded-pill bg-label-info me-4">Support</span></a></span></td><td><span class="text-nowrap">23 Aug 2021, 2:00 PM</span></td><td><div class="d-flex align-items-center"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record text-body waves-effect waves-light me-1"><i class="ri-delete-bin-7-line ri-20px"></i></button><span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary text-body rounded-pill waves-effect waves-light" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ri-edit-box-line ri-20px"></i></button></span></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td><span class="text-nowrap text-heading">Client Communication</span></td><td><span class="text-nowrap"><a href="app-user-list.html"><span class="badge rounded-pill bg-label-primary me-4">Administrator</span></a><a href="app-user-list.html"><span class="badge rounded-pill bg-label-warning me-4">Manager</span></a></span></td><td><span class="text-nowrap">15 Apr 2021, 11:30 AM</span></td><td><div class="d-flex align-items-center"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record text-body waves-effect waves-light me-1"><i class="ri-delete-bin-7-line ri-20px"></i></button><span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary text-body rounded-pill waves-effect waves-light" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ri-edit-box-line ri-20px"></i></button></span></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td><span class="text-nowrap text-heading">Only View</span></td><td><span class="text-nowrap"><a href="app-user-list.html"><span class="badge rounded-pill bg-label-primary me-4">Administrator</span></a><a href="app-user-list.html"><span class="badge rounded-pill bg-label-danger me-4">Restricted User</span></a></span></td><td><span class="text-nowrap">04 Dec 2021, 8:15 PM</span></td><td><div class="d-flex align-items-center"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record text-body waves-effect waves-light me-1"><i class="ri-delete-bin-7-line ri-20px"></i></button><span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary text-body rounded-pill waves-effect waves-light" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ri-edit-box-line ri-20px"></i></button></span></div></td></tr><tr class="even"><td class="  control" tabindex="0" style="display: none;"></td><td><span class="text-nowrap text-heading">Financial Management</span></td><td><span class="text-nowrap"><a href="app-user-list.html"><span class="badge rounded-pill bg-label-primary me-4">Administrator</span></a><a href="app-user-list.html"><span class="badge rounded-pill bg-label-warning me-4">Manager</span></a></span></td><td><span class="text-nowrap">25 Feb 2021, 10:30 AM</span></td><td><div class="d-flex align-items-center"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record text-body waves-effect waves-light me-1"><i class="ri-delete-bin-7-line ri-20px"></i></button><span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary text-body rounded-pill waves-effect waves-light" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ri-edit-box-line ri-20px"></i></button></span></div></td></tr><tr class="odd"><td class="  control" tabindex="0" style="display: none;"></td><td><span class="text-nowrap text-heading">Manage Others’ Tasks</span></td><td><span class="text-nowrap"><a href="app-user-list.html"><span class="badge rounded-pill bg-label-primary me-4">Administrator</span></a><a href="app-user-list.html"><span class="badge rounded-pill bg-label-info me-4">Support</span></a></span></td><td><span class="text-nowrap">04 Nov 2021, 11:45 AM</span></td><td><div class="d-flex align-items-center"><button class="btn btn-sm btn-icon btn-text-secondary rounded-pill delete-record text-body waves-effect waves-light me-1"><i class="ri-delete-bin-7-line ri-20px"></i></button><span class="text-nowrap"><button class="btn btn-sm btn-icon btn-text-secondary text-body rounded-pill waves-effect waves-light" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ri-edit-box-line ri-20px"></i></button></span></div></td></tr></tbody>
    </table><div class="row mx-2"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 9 of 9 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="ri-arrow-left-s-line"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1" class="page-link"><i class="ri-arrow-right-s-line"></i></a></li></ul></div></div></div></div>
  </div>
</div>
<!--/ Permission Table -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-simple">
    <div class="modal-content p-4 p-md-12">
      <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body p-md-0">
        <div class="text-center mb-6">
          <h3 class="mb-2 pb-1">Add New Permission</h3>
          <p>Permissions you may use and assign to your users.</p>
        </div>
        <form id="addPermissionForm" class="row fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">
          <div class="col-12 mb-4 fv-plugins-icon-container">
            <div class="form-floating form-floating-outline">
              <input type="text" id="modalPermissionName" name="modalPermissionName" class="form-control" placeholder="Permission Name" autofocus="">
              <label for="modalPermissionName">Permission Name</label>
            </div>
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
          <div class="col-12 mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="corePermission">
              <label class="form-check-label" for="corePermission">
                Set as core permission
              </label>
            </div>
          </div>
          <div class="col-12 text-center demo-vertical-spacing">
            <button type="submit" class="btn btn-primary me-sm-4 me-1 waves-effect waves-light">Create Permission</button>
            <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">Discard</button>
          </div>
        <input type="hidden"></form>
      </div>
    </div>
  </div>
</div>
<!--/ Add Permission Modal -->

<!-- Edit Permission Modal -->
<div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-simple">
    <div class="modal-content p-4 p-md-12">
      <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body p-md-0">
        <div class="text-center mb-6">
          <h3 class="mb-2 pb-1">Edit Permission</h3>
          <p>Edit permission as per your requirements.</p>
        </div>
        <div class="alert alert-warning" role="alert">
          <h6 class="alert-heading mb-2">Warning</h6>
          <p class="mb-0">By editing the permission name, you might break the system permissions functionality. Please ensure you're absolutely certain before proceeding.</p>
        </div>
        <form id="editPermissionForm" class="row pt-2 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">
          <div class="col-sm-9 mb-4 fv-plugins-icon-container">
            <div class="form-floating form-floating-outline">
              <input type="text" id="editPermissionName" name="editPermissionName" class="form-control" placeholder="Permission Name" tabindex="-1">
              <label for="editPermissionName">Permission Name</label>
            </div>
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
          <div class="col-sm-3 mb-4">
            <button type="submit" class="btn btn-primary mt-1 mt-sm-0 waves-effect waves-light">Update</button>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="editCorePermission">
              <label class="form-check-label" for="editCorePermission">
                Set as core permission
              </label>
            </div>
          </div>
        <input type="hidden"></form>
      </div>
    </div>
  </div>
</div>
<!--/ Edit Permission Modal -->

<!-- /Modal -->
          </div>

@endsection