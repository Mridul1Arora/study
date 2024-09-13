@extends('layout.app')

@section('title', 'Add New User')

@section('content')

@php
$data = [
    'roles' => [
        (object)[ 'id' => 1, 'name' => 'Manager' ],
        (object)[ 'id' => 2, 'name' => 'Admin' ],
        (object)[ 'id' => 3, 'name' => 'User' ]
    ],
    'permissions' => [
        (object)[ 'id' => 1, 'name' => 'Create Role' ],
        (object)[ 'id' => 2, 'name' => 'Update Role' ],
        (object)[ 'id' => 3, 'name' => 'Edit Role' ]
    ]
];

@endphp

<div class="custom-spacing row">
    <div class="col-xl">
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add New User</h5>
                <small class="text-body float-end">Please fill in the details below</small>
            </div>

            <div class="card-body">
                <form action="{{ route('users.user-added') }}" method="POST">
                    @csrf
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" class="form-control" id="basic-default-fullname" name="name" placeholder="John Doe" required />
                        <label for="basic-default-fullname">Full Name</label>
                    </div>

                    <div class="mb-6">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input
                                    type="email"
                                    id="basic-default-email"
                                    name="email"
                                    class="form-control"
                                    placeholder="john.doe@example.com"
                                    required />
                                <label for="basic-default-email">Email</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input
                            type="text"
                            id="basic-default-phone"
                            name="mobile_no"
                            class="form-control"
                            placeholder="Mobile Number" />
                        <label for="basic-default-phone">Phone No</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <select id="basicActive" name="active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <label for="basicActive">Active Status</label>
                    </div>

                    <!-- Toggle to switch between "Assign Role" and "Create New Role" -->
                    <div class="switches-stacked mb-6">
                        <label class="switch">
                            <input type="radio" class="switch-input" name="role_action_toggle" value="assign_role" checked>
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Assign Role</span>
                        </label>

                        <label class="switch">
                            <input type="radio" class="switch-input" name="role_action_toggle" value="create_role">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Create New Role</span>
                        </label>
                    </div>

                    <!-- Assign Role Form -->
                    <div id="assignRoleForm" class="role-form-section">
                        <div class="form-floating form-floating-outline mb-6">
                            <select id="roleSelect" class="form-control" name="role_id" required>
                                <!-- Dummy roles -->
                                <option value="1">Admin</option>
                                <option value="2">Manager</option>
                                <option value="3">Team Leader</option>
                            </select>
                            <label for="roleSelect">Assign Role</label>
                        </div>
                    </div>

                    <!-- Create New Role Form -->
<div id="createNewRoleForm" class="role-form-section row" style="display: none;">

    <div class="col-md mb-6 mb-md-0">
        <div class="accordion accordion-popout mt-4" id="accordionPopout">
        <div class="accordion-item active">
            <h2 class="accordion-header" id="headingPopoutOne">
            <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionPopoutOne" aria-expanded="true" aria-controls="accordionPopoutOne">
                Create New Role
            </button>
            </h2>

            <div id="accordionPopoutOne" class="accordion-collapse collapse show" aria-labelledby="headingPopoutOne" data-bs-parent="#accordionPopout">
            <div class="accordion-body">
                
                <div class="mb-3">
                    <label for="role_name" class="form-label">Role Name</label>
                    <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Enter Role Name" required>
                </div>
                <div class="mb-3">
                    <label for="role_reporting" class="form-label">Role Reporting</label>
                    <select class="form-select" id="role_reporting" name="role_reporting" required>
                    <option value="">Select Role Reporting</option>
                    @if($data['roles'])
                        @foreach($data['roles'] as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    @endif    
                    </select>
                </div>
                <div class="mb-3">
                    <label for="role_desc" class="form-label">Role Description</label>
                    <textarea class="form-control" id="role_desc" name="role_desc" placeholder="Enter Role Description" required></textarea>
                </div>

                <button type="button" id="openPermissions" class="btn btn-label-dark waves-effect" disabled>Assign Permissions</button>
            
            </div>
            </div>
        </div>

        <div class="accordion-item" id="permissionsAccordion" style="display: none;">
            <h2 class="accordion-header" id="headingPopoutTwo">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionPopoutTwo" aria-expanded="false" aria-controls="accordionPopoutTwo">
                Assign Permissions
            </button>
            </h2>
            <div id="accordionPopoutTwo" class="accordion-collapse collapse" aria-labelledby="headingPopoutTwo" data-bs-parent="#accordionPopout">
            <div class="accordion-body">
                <div class="mb-3">
                    @if($data['permissions'])
                        @foreach($data['permissions'] as $perm)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $perm->id }}" id="perm_{{ $perm->id }}" name="permissions[]">
                            <label class="form-check-label" for="perm_{{ $perm->id }}">
                            {{ $perm->name }}
                            </label>
                        </div>
                        @endforeach
                    @endif    
                </div>

            </div>
            </div>
        </div>
        </div>
    </div>
</div>
                   

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Toggle Between Assign Role and Create New Role Forms -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleActionRadios = document.querySelectorAll('input[name="role_action_toggle"]');
        const assignRoleForm = document.getElementById('assignRoleForm');
        const createNewRoleForm = document.getElementById('createNewRoleForm');

        roleActionRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'assign_role') {
                    assignRoleForm.style.display = 'block';
                    createNewRoleForm.style.display = 'none';
                } else {
                    assignRoleForm.style.display = 'none';
                    createNewRoleForm.style.display = 'block';
                }
            });
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleForm = document.getElementById('addNewRolePermissios');
        const roleName = document.getElementById('role_name');
        const roleReporting = document.getElementById('role_reporting');
        const roleDesc = document.getElementById('role_desc');
        const openPermissionsBtn = document.getElementById('openPermissions');
        const permissionsAccordion = document.getElementById('permissionsAccordion');
        const submitRoleBtn = document.getElementById('submitRole');
        const permissionsCheckboxes = document.querySelectorAll('#permissionsAccordion .form-check-input');

        function checkFormFields() {
            if (roleName.value.trim() !== '' && roleReporting.value !== '' && roleDesc.value.trim() !== '') {
                openPermissionsBtn.disabled = false;
            } else {
                openPermissionsBtn.disabled = true;
            }
        }

        function checkPermissionsSelection() {
            const atLeastOneChecked = Array.from(permissionsCheckboxes).some(checkbox => checkbox.checked);
            submitRoleBtn.disabled = !atLeastOneChecked;
        }

        roleName.addEventListener('input', checkFormFields);
        roleReporting.addEventListener('change', checkFormFields);
        roleDesc.addEventListener('input', checkFormFields);

        openPermissionsBtn.addEventListener('click', function() {
            permissionsAccordion.style.display = 'block'; 
            const accordionCollapse = new bootstrap.Collapse(document.getElementById('accordionPopoutTwo'), {
                toggle: true
            });
            openPermissionsBtn.disabled = true;
        });

        permissionsCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', checkPermissionsSelection);
        });
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#addNewRolePermissios').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: '/roles/add-role-permission',
            method: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
            },
            error: function(xhr) {
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
});

</script>

@endsection
