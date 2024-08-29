@extends('layout.app')

@section('title', 'User')

@section('content')


<div class="container-fluid" style="
    gap: 30px;
    display: flex;
    padding-top: 30px;
">
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

<!-- Module and settings table-->
  <div class="card">
    <div class="card-datatable table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="row mx-1">
                <!-- Left Column: Show Entries -->
                <div class="col-sm-12 col-md-3 mt-5 mt-md-0">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label>Show 
                            <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select form-select-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </label>
                    </div>
                </div>

                <!-- Right Column: Search and Action Buttons -->
                <div class="col-sm-12 col-md-9">
                    <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1">
                        <div class="me-4">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>
                                    <input type="search" class="form-control form-control-sm" placeholder="Search module" aria-controls="DataTables_Table_0">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <table class="datatables-permissions table dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1134px;">
                <thead>
                    <tr>
                        <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 240px;" aria-label="Name: activate to sort column ascending">Displayed in tabs as</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 365px;">Module Name</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 243px;">Shared To</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 124px;">Last Modified</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <td class="control" tabindex="0" style="display: none;"></td>
                        <td><span class="text-nowrap text-heading">Lead</span></td>
                        <td>
                            <span class="text-nowrap">
                                <a href="app-user-list.html">
                                    <span class="badge rounded-pill bg-label-primary me-4">Lead</span>
                                </a>
                            </span>
                        </td>
                        <td><span class="text-nowrap">All profiles</span></td>
                        <td></td>
                    </tr>
                    <tr class="even">
                        <td class="control" tabindex="0" style="display: none;"></td>
                        <td><span class="text-nowrap text-heading">Contact</span></td>
                        <td>
                            <span class="text-nowrap">
                                <a href="app-user-list.html">
                                    <span class="badge rounded-pill bg-label-primary me-4">Contact</span>
                                </a>
                            </span>
                        </td>
                        <td><span class="text-nowrap">All profiles</span></td>
                        <td></td>
                    </tr>
                    <tr class="even">
                        <td class="control" tabindex="0" style="display: none;"></td>
                        <td><span class="text-nowrap text-heading">Deal</span></td>
                        <td>
                            <span class="text-nowrap">
                                <a href="app-user-list.html">
                                    <span class="badge rounded-pill bg-label-primary me-4">Deal</span>
                                </a>
                            </span>
                        </td>
                        <td><span class="text-nowrap">All profiles</span></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection