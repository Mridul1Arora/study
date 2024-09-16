@extends('layout.app')

@section('title', 'Create Role')

@section('content')


<html
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr">
  <body>

<div class="custom-spacing card mb-6">
    <form id="updateRoleandPermissions">
        @csrf
    <h5 class="card-header">Role With Permission</h5>
    <div class="card-body">
    <input type="hidden" name="role_id" value="{{ $data['roleData']->id }}">
    <div class="form-floating form-floating-outline mb-6">
    @if(!empty($data['roleData']->name))
        <input type="text" class="form-control" id="roleName" value="{{ $data['roleData']->name }}" disabled>
    @endif    
        <label for="html5-text-input">Role Name</label>
    </div>
    <div class="form-floating form-floating-outline mb-6">
    <div class="form-floating form-floating-outline">
        <div class="select2-primary">
            <select id="relatedPermissionSelect" class="select2 form-select" name="related_permissions[]" multiple>
                @if(!empty($data['relatedPermission']))
                    @foreach ($data['relatedPermission'] as $permission)
                        <option value="{{ $permission->id }}" selected>{{ $permission->name }}</option>
                    @endforeach
                @endif    
            </select>
        </div>
        <label for="relatedPermissionSelect">Already Given Permissions</label>
    </div>
</div>

    <div class="form-floating form-floating-outline mb-6">
        <div class="form-floating form-floating-outline">
            <div class="select2-primary">
                <select id="allPermissionsSelect" class="select2 form-select" name="new_permissions[]" multiple>
                @if(!empty($data['allPermissions']))
                    @foreach ($data['allPermissions'] as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                @endif    
                </select>
            </div>
            <label for="allPermissionsSelect">Add New Permission</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
    </div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#updateRoleandPermissions').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
        url: '/roles/update-role-permission',
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



<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../../assets/js/forms-selects.js"></script>
<script src="../../assets/js/forms-tagify.js"></script>
<script src="../../assets/js/forms-typeahead.js"></script>

</body>
</html>
@endsection