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
                  <label>
                    <input type="search" class="form-control form-control-sm" placeholder="Search Permissions" aria-controls="DataTables_Table_0">
                  </label>
                </div>
              </div>
              <div class="dt-buttons btn-group flex-wrap">
                <button class="btn add-new btn-primary mb-5 mb-md-0 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#addPermissionModal">
                  <span>
                    <i class="ri-add-line me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Add Permission</span>
                  </span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <table class="datatables-permissions table dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
          <thead>
            <tr>
              <th>Permission ID</th>
              <th>Name</th>
              <th>Created Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($role['permission_list'] as $permission)
            <tr>
              <td>{{ $permission['id'] }}</td>
              <td>{{ $permission['name'] }}</td>
              <td>{{ \Carbon\Carbon::parse($permission['created_at'])->format('d M Y, h:i A') }}</td>
              <td>
                <div class="d-flex align-items-center">
                  <!-- Edit Button -->
                  <button class="btn btn-sm btn-icon btn-text-secondary text-body rounded-pill waves-effect waves-light" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal">
                    <i class="ri-edit-box-line ri-20px"></i>
                  </button>
                  
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row mx-2">
          <!-- Pagination info -->
        </div>
      </div>
    </div>
  </div>
</div>






<!--/ Permission Table -->
<meta name="csrf-token" content="{{ csrf_token() }}">

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

  $(document).ready(function() {
    const form = $('#addPermissionForm');
    
    form.on('submit', function(event) {
      event.preventDefault();

      const permissionName = $('#modalPermissionName').val();

      const formData = new FormData();
      formData.append('permissionName', permissionName);

      $.ajax({
        url: '{{ route("per.create") }}',
        method: 'POST',
        data: formData,
        processData: false, 
        contentType: false,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          if (response.success) {
            alert('Permission created successfully!');
            $('#addPermissionModal').modal('hide');
          } else {
            alert('Error creating permission.');
          }
        },
        error: function(xhr, status, error) {
          console.error('Error:', error);
          alert('Error creating permission.');
        }
      });
    });
  });

</script>
@endsection