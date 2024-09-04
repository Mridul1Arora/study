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
                                <!-- Add data attributes to pass the module data -->
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
</div>




<div class="modal modal-top fade" id="modalTop" tabindex="-1">
    <div class="modal-dialog">
    <form class="modal-content" method="POST" action="{{ route('role.updateCorePermission') }}">
    @csrf
            <!-- Modal Header with a Single Heading -->
            <div class="modal-header">
                <h4 class="modal-title" id="modalTopTitle"></h4>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Modal Body with a Dropdown -->
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <div class="form-floating form-floating-outline">
                        <input type="hidden" id="moduleIdInput" name="module_id" value="{{ $item->module_id }}">
                            <select name="permission_id" id="dropdownSlideTop" class="form-select">
                               
                            </select>
                            <label for="dropdownSlideTop">Select an Option</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer with Two Buttons -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
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

<script>
$(document).ready(function() {
    $('#updatePermissionForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('role.updateCorePermission') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if(response.success) {
                    alert(response.message);
                    $('#updatePermissionModal').modal('hide'); // Hide the modal
                    location.reload(); // Reload the page
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




@endsection