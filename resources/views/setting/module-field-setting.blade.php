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
          <a class="nav-link waves-effect waves-light" href="{{ route('role-setting') }}">
            <i class="ri-bank-card-line me-2"></i>
            <span class="align-middle">Role</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link waves-effect waves-light"  href="{{ route('permission-setting') }}">
            <i class="ri-shopping-cart-line me-2"></i>
            <span class="align-middle">Permission</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link waves-effect active waves-light"  href="{{ route('module-field-setting') }}">
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



  @endsection