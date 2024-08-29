@extends('layout.app')

@section('title', 'Dashboard')

@section('content')

<div class="card mb-6 mt-6">
<div class="card-body">
    <div class="d-flex align-items-start align-items-sm-center gap-6">
    <img
        src="../../assets/img/avatars/1.png"
        alt="user-avatar"
        class="d-block w-px-100 h-px-100 rounded-4"
        id="uploadedAvatar" />
    <div class="button-wrapper">
        <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
        <span class="d-none d-sm-block">Upload new photo</span>
        <i class="ri-upload-2-line d-block d-sm-none"></i>
        <input
            type="file"
            id="upload"
            class="account-file-input"
            hidden
            accept="image/png, image/jpeg" />
        </label>

        <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
    </div>
    </div>
</div>
<div class="card-body pt-0">
    <form id="formAccountSettings" method="GET" onsubmit="return false">
    <div class="row mt-1 g-5">
        <div class="col-md-6">
        <div class="form-floating form-floating-outline">
            <input
            class="form-control"
            type="text"
            id="firstName"
            name="firstName"
            value="John"
            autofocus />
            <label for="firstName">First Name</label>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-floating form-floating-outline">
            <input class="form-control" type="text" name="lastName" id="lastName" value="Doe" />
            <label for="lastName">Last Name</label>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-floating form-floating-outline">
            <input
            class="form-control"
            type="text"
            id="email"
            name="email"
            value="john.doe@example.com"
            placeholder="john.doe@example.com" />
            <label for="email">E-mail</label>
        </div>
        </div>
        <div class="col-md-6">
        <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
            <input
                type="text"
                id="phoneNumber"
                name="phoneNumber"
                class="form-control"
                value="+1 (917) 543-9876" />
            <label for="phoneNumber">Phone Number</label>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-floating form-floating-outline">
            <select id="gender" class="select2 form-select">
            <option value=2>Male</option>
            <option value=1>Female</option>
            <option value=0>Prefer not to say</option>
            </select>
            <label for="gender">Gender</label>
        </div>
        </div>
    </div>
    <div class="mt-6">
        <button type="submit" class="btn btn-primary me-3">Save changes</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
    </form>
</div>

</div>
@endsection('content')

<!-- Page JS -->
<script src="../../assets/js/pages-account-settings-account.js"></script>
