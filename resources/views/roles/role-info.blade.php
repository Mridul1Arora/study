@extends('layout.app')

@section('title', 'role-info')

@section('content')

<button type="button" class="custom-inline-spacing btn btn-primary waves-effect waves-light" id="role-details-btn">Role Details</button>
<button type="button" class="custom-inline-spacing btn btn-primary waves-effect waves-light active" id="data-sharing-btn">Data Sharing settings</button>

<div class="sharing-setting" id="data-sharing"> 
    <div class="card">
        <h5 class="card-header">Default Organization Permissions</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Module</th>
                        <th>Default Access</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($modulepermission->toArray() as $item) 
                        <tr>
                            <td>
                                <a href="#" 
                                   class="open-modal" 
                                   data-bs-toggle="modal" 
                                   data-bs-target="#modalTop"
                                   data-module-name="{{ $item->module_name }}"
                                   data-module-id="{{ $item->module_id }}">
                                    <span class="fw-medium">{{ $item->module_name }}</span>
                                </a>
                            </td>
                            <td>{{ ucfirst($item->permission_name) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>





@foreach($modulepermission->toArray() as $item)  
    <div class="card custom-spacing">
        <div class="card-header flex-column flex-md-row border-bottom">
            <div class="head-label text-center">
                <h5 class="card-title mb-0">{{ $item->module_name }}</h5>
            </div>
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <button type="button" class="btn btn-primary waves-effect waves-light" 
                            data-bs-toggle="modal" 
                            data-bs-target="#basicModal" 
                            data-module-id="{{ $item->module_id }}">
                        Add New Rule
                    </button>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table table-bordered dataTable no-footer">
                <thead>
                    <tr>
                        <th>Rule Name</th>
                        <th>Shared From</th>
                        <th>Shared To</th>
                        <th>Permission</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dataSharingRules as $module_id => $module)
                    @if(!empty($module && $module_id === $item->module_id))
                        @foreach($module as $rule)
                            <tr>
                                <td>{{ $rule['rule_name'] }}</td>
                                <td>{{ $rule['from_role'] }}</td>
                                <td>{{ $rule['to_role'] }}</td>
                                <td>{{ $rule['permission_name'] }}</td>
                                <td>
                                <button class="btn btn-sm btn-info" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#basicModal"
                                        data-rule-name="{{ $rule['rule_name'] }}"
                                        data-from-role="{{ $rule['from_role'] }}"
                                        data-to-role="{{ $rule['to_role'] }}"
                                        data-permission="{{ $rule['permission_name'] }}">
                                    Edit
                                </button>

                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif    
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>



<div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Sharing Rule</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
              <input type="text" id="sharingRuleName" class="form-control" placeholder="Enter Sharing Rule Name">
              <label for="sharingRuleName">Sharing Rule Name</label>
            </div>
          </div>
        </div>

        <div class="row g-4">
          <div class="col mb-2">
            <div class="form-floating form-floating-outline">
              <select id="dataSharedFrom" class="form-select">
                <option value="" disabled selected>Select an option</option>
              </select>
              <label for="dataSharedFrom">Data Shared From</label>
            </div>
          </div>

          <div class="col mb-2">
            <div class="form-floating form-floating-outline">
              <select id="dataSharedTo" class="form-select">
                <option value="" disabled selected>Select an option</option>
              </select>
              <label for="dataSharedTo">Data Shared To</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="row g-4">
            <div class="col mb-2">
              <div class="form-floating form-floating-outline">
                <select id="permission" class="form-select">
                  <option value="" disabled selected>Select permission</option>
                </select>
                <label for="permission">Permission</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary waves-effect waves-light">Save</button>
      </div>
    </div>
  </div>
</div>






<div class="modal modal-top fade" id="modalTop" tabindex="-1">
    <div class="modal-dialog">
        <form id="updatePermissionForm" class="modal-content">
        @csrf
            <div class="modal-header">
                <h4 class="modal-title" id="modalTopTitle"></h4>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <div class="form-floating form-floating-outline">
                            <input type="hidden" id="moduleIdInput" name="module_id" value="{{ $item->module_id }}">
                            <select name="permission_id" id="dropdownSlideTop" class="form-select"></select>
                            <label for="dropdownSlideTop">Select an Option</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
        </form>
    </div>
</div>
       












<div class="role-info" id="role-info" style="display:none;">
    <div class="card role-details-table mb-6">
        <div class="card-body">
            <h5 class="card-header">Role Details:</h5>
            <ul class="list-unstyled my-3 py-1">
                @if(isset($userRole))
                    <li class="d-flex align-items-center mb-4">
                        <i class="ri-star-smile-line ri-24px"></i><span class="fw-medium mx-2">Role Name:</span>
                        <span>{{ $userRole->name }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-4">
                        <i class="ri-user-3-line ri-24px"></i><span class="fw-medium mx-2">Reports To:</span>
                        <span>{{ $parentRoleName }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-4">
                        <i class="ri-check-line ri-24px"></i><span class="fw-medium mx-2">Desc:</span>
                    </li>
                @endif   
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <h5 class="card-header">Associated Users:</h5>
        <div class="card-datatable table-responsive pb-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <table class="table datatable-project table-border-bottom-0 dataTable no-footer dtr-column" id="DataTables_Table_0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['active'] ? 'Yes' : 'No' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleDetailsBtn = document.getElementById('role-details-btn');
        const dataSharingBtn = document.getElementById('data-sharing-btn');
        const roleInfoDiv = document.getElementById('role-info');
        const dataSharingDiv = document.getElementById('data-sharing');

        roleDetailsBtn.addEventListener('click', function () {
            roleDetailsBtn.classList.add('active');
            dataSharingBtn.classList.remove('active');
            roleInfoDiv.style.display = 'block';
            dataSharingDiv.style.display = 'none';
        });

        dataSharingBtn.addEventListener('click', function () {
            dataSharingBtn.classList.add('active');
            roleDetailsBtn.classList.remove('active');
            dataSharingDiv.style.display = 'block';
            roleInfoDiv.style.display = 'none';
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modalTriggerElements = document.querySelectorAll('.open-modal');

    modalTriggerElements.forEach(element => {
        element.addEventListener('click', function (event) {
            event.preventDefault();

            const moduleName = this.getAttribute('data-module-name');
            const moduleId = this.getAttribute('data-module-id');

            document.getElementById('modalTopTitle').textContent = `Permissions for ${moduleName}`;

            document.getElementById('moduleIdInput').value = moduleId;

            const moduleSpecificPermissions = @json($moduleSpecificPermissions);
            const dropdown = document.getElementById('dropdownSlideTop');

            dropdown.innerHTML = '';

            moduleSpecificPermissions.forEach(permission => { 
                const option = document.createElement('option');
                option.value = permission.id;
                option.textContent = permission.name;
                dropdown.appendChild(option);
            });
        });
    });
});
</script>



<script>
$(document).ready(function() {
    $('#updatePermissionForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('role.updateCorePermission') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                console.log(response);
                if(response.success) {
                    $('#updatePermissionModal').modal('hide');
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                alert("An error occurred: " + xhr.responseText);
            }
        });
    });
});
</script>


<script>

$(document).ready(function() {
    $('.btn-primary[data-bs-target="#basicModal"]').on('click', function() {
        let moduleId = $(this).data('module-id'); 

        $.ajax({
            url: "{{ route('role.getPermissionsByModule') }}",
            type: "GET",
            data: { module_id: moduleId },
            success: function(response) {
                if(response) {
                    populateRoles(response.roles);
                    populatePermissions(response.core_permission);
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr.responseText);
            }
        });
    });

    function populateRoles(roles) {
        let $dataSharedFrom = $('#dataSharedFrom');
        let $dataSharedTo = $('#dataSharedTo');

        $dataSharedFrom.empty();
        $dataSharedTo.empty();
        $dataSharedFrom.append('<option value="" disabled selected>Select an option</option>');
        $dataSharedTo.append('<option value="" disabled selected>Select an option</option>');

        roles.forEach(role => {
            let option = `<option value="${role.id}">${role.name}</option>`;
            $dataSharedFrom.append(option);
            $dataSharedTo.append(option);
        });

        $dataSharedFrom.on('change', function() {
            let selectedRoleId = $(this).val();
            $dataSharedTo.find('option').each(function() {
                if ($(this).val() == selectedRoleId) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    }

    function populatePermissions(permissions) {
        let $permission = $('#permission');
        $permission.empty();
        $permission.append('<option value="" disabled selected>Select permission</option>');

        permissions.forEach(permission => {
            let option = `<option value="${permission.id}">${permission.name}</option>`;
            $permission.append(option);
        });
    }
});
</script>

<script>

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('basicModal');
    
    // Listen for clicks on Edit buttons
    document.querySelectorAll('.btn-info').forEach(button => {
        button.addEventListener('click', function () {
            // Get rule data from button attributes
            const ruleName = this.getAttribute('data-rule-name');
            const fromRole = this.getAttribute('data-from-role');
            const toRole = this.getAttribute('data-to-role');
            const permission = this.getAttribute('data-permission');
            console.log(ruleName,fromRole,toRole,permission);
            // Populate modal fields
            document.getElementById('sharingRuleName').value = ruleName;
            document.getElementById('dataSharedFrom').value = fromRole;
            document.getElementById('dataSharedTo').value = toRole;
            document.getElementById('permission').value = permission;
        });
    });
});


</script>

@endsection