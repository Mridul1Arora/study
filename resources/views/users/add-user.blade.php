@extends('layout.app')

@section('title', 'Add New User')

@section('content')

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

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
