@extends('layout.app')

@section('title', 'role-info')

@section('content')


<div class="sharing-setting custom-spacing" id="data-sharing"> 
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
                @if(!empty($modulepermission))
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
                @endif    
            </table>
        </div>
    </div>




@if(!empty($modulepermission))
    @foreach($modulepermission->toArray() as $item)  
        <div class="card custom-spacing">
            <div class="card-header flex-column flex-md-row border-bottom">
                <div class="head-label text-center">
                    <h5 class="card-title mb-0">{{ $item->module_name }}</h5>
                </div>
                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                    <div class="dt-buttons btn-group flex-wrap">
                        <button type="button" class="btn model-btn btn-primary waves-effect waves-light" 
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
    
                                    <button type="button" class="btn model-btn btn-sm btn-info" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#basicModal"
                                            data-rule-name="{{ $rule['rule_name'] }}"
                                            data-from-role="{{ $rule['from_role'] }}"
                                            data-to-role="{{ $rule['to_role'] }}"
                                            data-permission="{{ $rule['permission_name'] }}"
                                            data-rule_id="{{ $rule['rule_id'] }}"
                                            data-module-id="{{ $item->module_id }}">
                                        Edit
                                    </button>
                                        <button class="btn btn-sm btn-danger"
                                        data-rule_id="{{ $rule['rule_id'] }}"
                                        data-action="delete">
                                        Delete</button>
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
    @endif
</div>





<div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="updateDataSharingRule">
        @csrf
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Sharing Rule</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" id="ruleId" name="ruleId">
        <input type="hidden" id="moduleId" name="moduleId">
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
        <button type="button" id="saveButton" class="btn btn-primary waves-effect waves-light">Save</button>
      </div>
</form>
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
    $(document).on('click', '.model-btn[data-bs-target="#basicModal"]', function() {
        let moduleId = $(this).data('module-id'); 

        if ($(this).data('rule-name')) {
            let ruleName = $(this).data('rule-name');
            let fromRole = $(this).data('from-role');
            let toRole = $(this).data('to-role');
            let permission = $(this).data('permission');

            console.log('Edit Mode:', ruleName, fromRole, toRole, permission);

            // Populate form fields with the data
            $('#sharingRuleName').val(ruleName);
            $('#dataSharedFrom').val(fromRole);
            $('#dataSharedTo').val(toRole);
            $('#permission').val(permission);
        } else {
            console.log('Add Mode');
            $('#sharingRuleName').val('');
            $('#dataSharedFrom').val('');
            $('#dataSharedTo').val('');
            $('#permission').val('');
        }

        $.ajax({
            url: "{{ route('role.getPermissionsByModule') }}",
            type: "GET",
            data: { module_id: moduleId },
            success: function(response) {
                if (response) {
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
$(document).ready(function() {
    $(document).on('click', '.model-btn', function() {
        let ruleId = $(this).data('rule_id') || '';
        let moduleId = $(this).data('module-id') || ''; 
        let ruleName = $(this).data('rule-name') || '';
        let fromRole = $(this).data('from-role') || '';
        let toRole = $(this).data('to-role') || '';
        let permission = $(this).data('permission') || '';

        $('#ruleId').val(ruleId); 
        $('#moduleId').val(moduleId);
        $('#sharingRuleName').val(ruleName);
        $('#dataSharedFrom').val(fromRole);
        $('#dataSharedTo').val(toRole);
        $('#permission').val(permission);

        if (ruleId) {
            $('#exampleModalLabel').text('Edit Sharing Rule');
        } else {
            $('#exampleModalLabel').text('Add New Sharing Rule');
        }
    });

    $(document).on('click', '#saveButton', function() {
        let ruleId = $('#ruleId').val(); 
        let moduleId = $('#moduleId').val(); 
        let ruleName = $('#sharingRuleName').val();
        let fromRole = $('#dataSharedFrom').val();
        let toRole = $('#dataSharedTo').val();
        let permission = $('#permission').val();

        if (ruleName && fromRole && toRole && permission) {
            let ajaxData = {
                _token: "{{ csrf_token() }}",
                rule_name: ruleName,
                from_role: fromRole,
                to_role: toRole,
                permission: permission
            };

            if (ruleId) {
                ajaxData.rule_id = ruleId;
            }

            if (moduleId) {
                ajaxData.module_id = moduleId;
            }

            $.ajax({
                url: "{{ route('role.updateDataSharingRule') }}",  
                type: "POST",
                data: ajaxData,
                success: function(response) {
                    if (response.success) {
                        location.reload(); 
                    } else {
                        alert('Failed to update rule: ' + response.message);
                    }
                },
                error: function(xhr) {
                    console.error('An error occurred:', xhr.responseText);
                }
            });
        } else {
            alert('Please fill out all fields');
        }
    });

    $(document).on('click', '.btn-danger', function() {
        let ruleId = $(this).data('rule_id');
        
        if (confirm('Are you sure you want to delete this rule?')) {
            $.ajax({
                url: "{{ route('role.deleteDataSharingRule') }}",  
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    rule_id: ruleId
                },
                success: function(response) {
                    if (response.success) {
                        location.reload(); 
                    } else {
                        alert('Failed to delete rule: ' + response.message);
                    }
                },
                error: function(xhr) {
                    console.error('An error occurred:', xhr.responseText);
                }
            });
        }
    });
});
</script>



    </script>






@endsection