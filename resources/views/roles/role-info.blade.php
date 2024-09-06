@extends('layout.app')

@section('title', 'role-info')

@section('content')
<a href="{{ route('roles.data-sharing') }}" class="custom-spacing btn btn-primary waves-effect waves-light" id="data-sharing-btn">
    Data Sharing settings
</a>

    <div class="card  role-details-table mb-6">
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





@endsection