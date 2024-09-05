@extends('layout.app')

@section('title', 'Data Sharing Settings')

@section('content')
<button type="button" class="custom-inline-spacing btn btn-primary waves-effect waves-light" id="role-details-btn">Role Details</button>
<button type="button" class="custom-inline-spacing btn btn-primary waves-effect waves-light active" id="data-sharing-btn">Data Sharing Settings</button>

<div id="data-sharing-section">
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
                <tbody>
                    @foreach($modulepermission as $item)
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
</div>

<!-- Include Modal and other JS functionalities here if needed -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleDetailsBtn = document.getElementById('role-details-btn');
        roleDetailsBtn.addEventListener('click', function () {
            window.location.href = "{{ route('role.details') }}"; // Load Role Details page
        });
    });
</script>
@endsection
