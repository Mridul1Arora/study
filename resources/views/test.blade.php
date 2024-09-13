@extends('layout.app')

@section('title', 'Leads')

@section('content')

<style>
.table-scrollable {
  overflow-x: auto;
}
</style>
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" /> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
    <!-- Form Validation -->
    <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
  </head>

<div class="container-xxl row flex-grow-1 container-p-y">
  <!-- Left Column for Actions -->
  @include('leads.components.filter')

  <!-- Main Table Area -->
  <div class="col-xl-9 col-md-8 col-12">
    <div class="card" style="height: 80vh; width: 75vw;">
      <div class="card-datatable table-responsive pt-0">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
          <div class="card-header d-flex flex-wrap justify-content-between align-items-center border-bottom">
            <div class="head-label">
              <h5 class="card-title mb-0">Leads</h5>
            </div>
            <div class="d-flex align-items-center">
              <div class="dataTables_length me-3" id="DataTables_Table_0_length">
                <label>Show 
                  <select name="DataTables_Table_0_length" id="per_page" onChange="changePerPage()" aria-controls="DataTables_Table_0" class="form-select form-select-sm">
                    <option value="3" {{ $per_page == 3 ? 'selected' : '' }}>3</option>
                    <option value="10" {{ $per_page == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ $per_page == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ $per_page == 50 ? 'selected' : '' }}>50</option>
                    <option value="75" {{ $per_page == 75 ? 'selected' : '' }}>75</option>
                    <option value="100" {{ $per_page == 100 ? 'selected' : '' }}>100</option>
                  </select> entries
                </label>
              </div>
              <div id="DataTables_Table_0_filter" class="dataTables_filter me-3">
                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="ri-more-2-line"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="javascript:void(0);">Mass update</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Manage columns</a></li>
                </ul>
              </div>
              <div class="btn-group ms-3">
                <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="offcanvas" id="add-new-record" data-bs-target="#add-new-record">
                  <i class="ri-add-line ri-16px me-sm-2"></i> Add New Record11
                </button>
              </div>
            </div>
          </div>

          <div>
            <table class="datatables-basic table table-bordered dataTable no-footer dtr-column" id="dataTableId" aria-describedby="DataTables_Table_0_info">
              <thead>
                <tr>
                  <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                    <input type="checkbox" class="form-check-input">
                  </th>
                  <th class="sorting" style="width: 251px;" aria-label="Lead Name: activate to sort column ascending">Lead Name</th>
                  <th class="sorting" style="width: 251px;" aria-label="Phone: activate to sort column ascending">Phone</th>
                  <th class="sorting" style="width: 238px;" aria-label="Email: activate to sort column ascending">Email</th>
                  <th class="sorting" style="width: 78px;" aria-label="Lead Stage: activate to sort column ascending">Lead Stage</th>
                  <th class="sorting" style="width: 74px;" aria-label="City: activate to sort column ascending">City</th>
                  <th class="sorting" style="width: 90px;" aria-label="Current State: activate to sort column ascending">Current State</th>
                  <th class="sorting" style="width: 75px;" aria-label="Lead Owner: activate to sort column ascending">Lead Owner</th>
                  <th class="sorting" style="width: 75px;" aria-label="Preferred Intake: activate to sort column ascending">Preferred Intake</th>
                  <th class="sorting" style="width: 75px;" aria-label="IELTS Score: activate to sort column ascending">IELTS Score</th>
                  <th class="sorting" style="width: 75px;" aria-label="SAT Score: activate to sort column ascending">SAT Score</th>
                  <th class="sorting" style="width: 75px;" aria-label="Lead Status: activate to sort column ascending">Lead Status</th>
                  <th class="sorting" style="width: 75px;" aria-label="Work Experience: activate to sort column ascending">Work Experience</th>
                  <th class="sorting" style="width: 75px;" aria-label="Preferred Course of Study: activate to sort column ascending">Preferred Course of Study</th>
                  <th class="sorting" style="width: 75px;" aria-label="Preferred Universities: activate to sort column ascending">Preferred Universities</th>
                  <th class="sorting_disabled" style="width: 75px;" aria-label="Actions">Actions</th>
                </tr>
              </thead>
              <tbody class="overflow-auto" id="leadsTableBody">  
                @include('leads.components.viewleads', ['leads' => $leads, 'per_page' => $per_page])
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('leads.components.edit')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="offcanvas offcanvas-end" id="add-new-record">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title">New Record</h5>
        <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
    <form class="add-new-record pt-0 row g-3" id="form-add-new-record" action="{{ route('leads.create') }}" method="POST">
    @csrf
    
    <!-- Lead Name -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span id="basicFullname2" class="input-group-text"><i class="ri-user-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                    type="text"
                    id="leadName"
                    class="form-control dt-full-name"
                    name="lead_name"
                    placeholder="John Doe"
                    aria-label="John Doe"
                    aria-describedby="basicFullname2"
                    />
                <label for="leadName">Lead Name</label>
            </div>
        </div>
    </div>

    <!-- Email -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-mail-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control dt-email"
                    placeholder="john.doe@example.com"
                    aria-label="john.doe@example.com"
                    required />
                <label for="email">Email</label>
            </div>
        </div>
        <div class="form-text">You can use letters, numbers & periods</div>
    </div>

    <!-- Lead Stage -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span id="basicPost2" class="input-group-text"><i class="ri-briefcase-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                  type="text"
                  id="leadStage"
                  name="lead_stage"
                  class="form-control"
                  placeholder="Stage"
                  aria-label="Stage"
                />
                <label for="leadStage">Lead Stage</label>
            </div>
        </div>
    </div>

    <!-- City -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-city-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                    type="text"
                    id="city"
                    name="city"
                    class="form-control dt-city"
                    placeholder="City"
                    aria-label="City"
                    required />
                <label for="city">City</label>
            </div>
        </div>
    </div>

    <!-- Current State -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-map-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                    type="text"
                    id="currentState"
                    name="current_state"
                    class="form-control dt-current-state"
                    placeholder="Current State"
                    aria-label="Current State"
                    required />
                <label for="currentState">Current State</label>
            </div>
        </div>
    </div>

    <!-- Lead Owner -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-user-settings-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                    type="text"
                    id="leadOwner"
                    name="lead_owner"
                    class="form-control dt-lead-owner"
                    placeholder="Lead Owner"
                    aria-label="Lead Owner"
                    required />
                <label for="leadOwner">Lead Owner</label>
            </div>
        </div>
    </div>

    <!-- Preferred Intake -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-calendar-todo-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                  type="text"
                  id="preferredIntake"
                  name="preferred_intake"
                  class="form-control"
                  placeholder="Preferred Intake"
                  aria-label="Preferred Intake"
                />
                <label for="preferredIntake">Preferred Intake</label>
            </div>
        </div>
    </div>

    <!-- IELTS Score -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-medal-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                  type="number"
                  id="ieltsScore"
                  name="ielts_score"
                  class="form-control"
                  placeholder="IELTS Score"
                  aria-label="IELTS Score"
                  min="0" max="9"
                  step="0.1"
                />
                <label for="ieltsScore">IELTS Score</label>
            </div>
        </div>
    </div>

    <!-- SAT Score -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-star-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                  type="number"
                  id="satScore"
                  name="sat_score"
                  class="form-control"
                  placeholder="SAT Score"
                  aria-label="SAT Score"
                  min="400" max="1600"
                 />
                <label for="satScore">SAT Score</label>
            </div>
        </div>
    </div>

    <!-- Lead Status -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-status-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                  type="text"
                  id="leadStatus"
                  name="lead_status"
                  class="form-control"
                  placeholder="Lead Status"
                  aria-label="Lead Status"
                />
                <label for="leadStatus">Lead Status</label>
            </div>
        </div>
    </div>

    <!-- Work Experience -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-briefcase-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                  type="text"
                  id="workExperience"
                  name="work_experience"
                  class="form-control"
                  placeholder="Work Experience"
                  aria-label="Work Experience"
                />
                <label for="workExperience">Work Experience</label>
            </div>
        </div>
    </div>

    <!-- Preferred Course of Study -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-book-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                  type="text"
                  id="preferredCourseOfStudy"
                  name="preferred_course_of_study"
                  class="form-control"
                  placeholder="Preferred Course of Study"
                  aria-label="Preferred Course of Study"
                />
                <label for="preferredCourseOfStudy">Preferred Course of Study</label>
            </div>
        </div>
    </div>

    <!-- Preferred Universities -->
    <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-university-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                  type="text"
                  id="preferredUniversities"
                  name="preferred_universities"
                  class="form-control"
                  placeholder="Preferred Universities"
                  aria-label="Preferred Universities"
                />
                <label for="preferredUniversities">Preferred Universities</label>
            </div>
        </div>
    </div>

    <!-- Phone -->
      <div class="col-sm-12">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="ri-phone-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    class="form-control dt-phone"
                    placeholder="Phone Number"
                    aria-label="Phone Number"
                    pattern="[0-9]{10}"
                    required />
                <label for="phone">Phone</label>
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

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- <script src="../../assets/js/tables-datatables-basic.js"></script> -->
<script>
$(document).ready(function() {
  $('#dataTableId').DataTable({
  });
});
function changePerPage(){
  var filters = [];
  document.querySelectorAll('.invoice-actions ul li').forEach((filterItem) => {
    const checkbox = filterItem.querySelector('input[type="checkbox"]');
    const collapseDiv = filterItem.querySelector('.collapse');
    
    if (checkbox.checked) {
        const filterName = checkbox.id;
        const selectedOption = collapseDiv.querySelector('select').value;
        const inputValue = collapseDiv.querySelector('input').value;
        
        filters.push({
            filterName: filterName,
            selectedOption: selectedOption,
            inputValue: inputValue
        });
    }
  });

  count = document.getElementById('per_page').value;
  var filter_str = JSON.stringify(filters);
  // page = 
  $.ajax({
    url: "/leads/data",
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{per_page:count,filters:filter_str},
    success: function (response) {
      $('#leadsTableBody').empty();
      $('#leadsTableBody').append(response.html);
      updatePagination(response.page_count, response.current_page, response.per_page);
    },
    error: function (error){
      alert('Error finding leads');
    }

  });  
}

function deleteLead(lead_id){
  if (confirm('Are you sure you want to delete this lead?')) {
    $.ajax({
        url: `/leads/${lead_id}`,
        type: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            alert('Lead deleted successfully!');
            $(`#lead-${lead_id}`).remove();
        },
        error: function(xhr) {
          alert('An error occurred while deleting the lead.');
        }
    });
  }
}
</script>
@endsection