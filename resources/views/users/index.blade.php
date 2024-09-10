@extends('layout.app')

@section('title', 'User Management')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
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
    
    <!-- Modal to add new record -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-add-new-record" onsubmit="return false">
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span id="basicFullname2" class="input-group-text"><i class="ri-user-line ri-18px"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="basicFullname" class="form-control" name="name" placeholder="John Doe" />
                            <label for="basicFullname">Full Name</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span id="basicEmail2" class="input-group-text"><i class="ri-mail-line ri-18px"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input type="email" id="basicEmail" name="email" class="form-control" placeholder="john.doe@example.com" />
                            <label for="basicEmail">Email</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span id="basicDate2" class="input-group-text"><i class="ri-calendar-2-line ri-18px"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input type="text" class="form-control dt-date" id="basicDate" name="date" placeholder="MM/DD/YYYY" />
                            <label for="basicDate">Joining Date</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span id="basicMobileNo2" class="input-group-text"><i class="ri-phone-line ri-18px"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="basicMobileNo" name="mobile_no" class="form-control" placeholder="Mobile Number" />
                            <label for="basicMobileNo">Mobile Number</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span id="basicActive2" class="input-group-text"><i class="ri-checkbox-circle-line ri-18px"></i></span>
                        <div class="form-floating form-floating-outline">
                            <select id="basicActive" name="active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <label for="basicActive">Active Status</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                </div>
            </form>
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
                return '<a href="#" class="btn btn-sm btn-primary">Edit</a> <a href="#" class="btn btn-sm btn-danger">Delete</a>';
            }},
        ],
        order: [[0, 'asc']], 
        pageLength: 10,
        lengthMenu: [[10, 25, 50], [10, 25, 50]],
    });
});
</script>

@endsection
