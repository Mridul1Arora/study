@extends('layout.app')

@section('title', 'Create Role')

@section('content')
<div class="row">
    <form id="addNewRolePermissios">
    @csrf
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

                <button type="button" id="openPermissions" class="btn btn-primary" disabled>Next: Assign Permissions</button>
            
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

                <button type="submit" id="submitRole" class="btn btn-primary" disabled>Save Role with Permissions</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</form>
</div>

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
