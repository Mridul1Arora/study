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
            <span class="align-middle">Roles and Data Setting</span>
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



<div class="col-md-6 col-12">
<a href="{{ route('roles.data-sharing') }}" class="custom-spacing btn btn-primary waves-effect waves-light" id="data-sharing-btn">
    Data Sharing settings
</a>

<a href="#" 
    class="open-modal custom-inline-spacing btn btn-primary waves-effect waves-light" 
    data-bs-toggle="modal" 
    data-bs-target="#modelTopRole">
    <span class="fw-medium">Add New Role</span>
</a>

<a href="{{ route('roles.role-permission') }}" class="custom-inline-spacing btn btn-primary waves-effect waves-light" id="data-sharing-btn">
   Add New Role-Permission
</a>


    <div class="card mb-6">
        <h5 class="card-header">Roles Hierarchy</h5>
        <div class="card-body">
            <div id="jstree-context-menu" class="overflow-auto jstree jstree-3 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j3_6" aria-busy="false">
                <ul class="jstree-container-ul jstree-children jstree-contextmenu" role="presentation">
                    @php
                        function renderRoleHierarchyWithContextMenu($role, $level = 1) {
                            $id = 'j3_' . uniqid();
                            $url = url('roles/show', ['id' => $role['role']->id]);
                            $state = empty($role['children']) ? 'jstree-leaf' : 'jstree-open';

                            // Select icons based on level
                            $iconClass = match ($level) {
                                1 => 'ri-folder-3-line text-primary',
                                2 => 'ri-folder-line text-warning',
                                default => 'ri-file-list-2-fill text-success'
                            };

                            // Output the list item
                            echo '<li role="none" id="' . $id . '" class="jstree-node ' . $state . '">';
                            echo '<i class="jstree-icon jstree-ocl" role="presentation"></i>';
                            echo '<a class="jstree-anchor" href="' . $url . '" tabindex="-1" role="treeitem" aria-selected="false" aria-level="' . $level . '" aria-expanded="true" id="' . $id . '_anchor">';
                            echo '<i class="jstree-icon jstree-themeicon ' . $iconClass . ' jstree-themeicon-custom" role="presentation"></i>' . $role['role']->name . '</a>';

                            // Recursively render child roles if any
                            if (!empty($role['children'])) {
                                echo '<ul role="group" class="jstree-children">';
                                foreach ($role['children'] as $child) {
                                    renderRoleHierarchyWithContextMenu($child, $level + 1);
                                }
                                echo '</ul>';
                            }

                            echo '</li>';
                        }

                        // Render the top-level role hierarchy with context menu
                        renderRoleHierarchyWithContextMenu($hierarchy);
                    @endphp
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modelTopRole" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addNewRole">Add New Role</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addNewRoleForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="roleName" name="role_name" class="form-control" placeholder="Enter Role Name" required>
                                <label for="roleName">Role Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating form-floating-outline">
                                <select id="reportingRole" name="reporting_role" class="form-select" required>
                                    <option value="">Select Reporting Role</option>
                                    @if(!empty($roles))
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    @endif    
                                </select>
                                <label for="reportingRole">Report To</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating form-floating-outline">
                                <textarea id="roleDesc" name="description" class="form-control" placeholder="Enter Description" rows="3"></textarea>
                                <label for="roleDesc">Description</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light" id="saveRoleButton">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#addNewRoleForm').on('submit', function(e) {
        e.preventDefault(); 

        var formData = $(this).serialize();
        $.ajax({
            url: '/roles/add-role',
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#modelTopRole').modal('hide');
            },
            error: function(xhr) {
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
});
</script>






@endsection
