@extends('layout.app')

@section('title', 'User Management')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('users.add-user') }}">Add New User</a>
    </div>
    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic-custom table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Mobile Number</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
   
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.datatables-basic-custom').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.data') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'mobile_no', name: 'mobile_no' },
            { data: 'active', name: 'active', render: function(data) {
                return data == 1 ? 'Active' : 'Inactive';
            }},
            { data: 'action', name: 'action', orderable: false, searchable: false, render: function(data, type, row) {
                return '<a href="#" class="btn btn-sm btn-primary edit-btn" data-id="'+ row.id +'">Edit</a> <a href="#" class="btn btn-sm btn-danger delete-btn" data-id="'+ row.id +'">Delete</a>';
            }},
        ],
        order: [[0, 'asc']], 
        pageLength: 10,
        lengthMenu: [[10, 25, 50], [10, 25, 50]],
    });

    // Handle Delete Button Click
    $(document).on('click', '.delete-btn', function() {
        var userId = $(this).data('id');
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: '/users/' + userId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('.datatables-basic-custom').DataTable().ajax.reload();
                }
            });
        }
    });
});

</script>

@endsection
