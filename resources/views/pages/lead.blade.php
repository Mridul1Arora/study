@extends('layout.app')

@section('title', 'Leads')

@section('content')

<style>
.table-scrollable {
  overflow-x: auto;
}

</style>
<!-- <div class="container-xxl row flex-grow-1 container-p-y">
  <div class="col-xl-3 col-md-4 col-12 invoice-actions">
    <div class="card">
      <div class="card-body">
        <button
          class="btn btn-primary d-grid w-100 mb-4"
          data-bs-toggle="offcanvas"
          data-bs-target="#sendInvoiceOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"
            ><i class="ri-send-plane-line ri-16px scaleX-n1-rtl me-2"></i>Send Invoice</span
          >
        </button>
        <button class="btn btn-outline-secondary d-grid w-100 mb-4">Download</button>
        <div class="d-flex mb-4">
          <a
            class="btn btn-outline-secondary d-grid w-100 me-4"
            target="_blank"
            href="./app-invoice-print.html">
            Print
          </a>
          <a href="./app-invoice-edit.html" class="btn btn-outline-secondary d-grid w-100"> Edit </a>
        </div>
        <button
          class="btn btn-success d-grid w-100"
          data-bs-toggle="offcanvas"
          data-bs-target="#addPaymentOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"
            ><i class="ri-money-dollar-circle-line ri-16px me-2"></i>Add Payment</span
          >
        </button>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-datatable table-responsive pt-0">
      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
        <div class="card-header flex-column flex-md-row border-bottom">
          <div class="head-label text-center">
            <h5 class="card-title mb-0">Leads</h5>
          </div>
          <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons btn-group flex-wrap">
              <div class="btn-group">
                <button class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-4 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                  <span><i class="ri-external-link-line me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span></span>
                </button>
                <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" data-bs-toggle="offcanvas" id ="add-new-record" data-bs-target="#add-new-record" type="button"><span><i class="ri-add-line ri-16px me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span>
              </button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-8">
            <div class="dataTables_length" id="DataTables_Table_0_length">
              <label>Show 
                <select name="DataTables_Table_0_length" id="per_page" onChange="changePerPage()" aria-controls="DataTables_Table_0" class="form-select form-select-sm">
                  <option value="7" {{ $per_page == 7 ? 'selected' : '' }}>7</option>
                  <option value="10" {{ $per_page == 10 ? 'selected' : '' }}>10</option>
                  <option value="25" {{ $per_page == 25 ? 'selected' : '' }}>25</option>
                  <option value="50" {{ $per_page == 50 ? 'selected' : '' }}>50</option>
                  <option value="75" {{ $per_page == 75 ? 'selected' : '' }}>75</option>
                  <option value="100" {{ $per_page == 100 ? 'selected' : '' }}>100</option>
                </select> entries
              </label>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="d-flex justify-content-end">
              <div id="DataTables_Table_0_filter" class="dataTables_filter me-2">
                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label>
              </div>
              <div class="btn-group pt-5">
                <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="ri-more-2-line"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="table-scrollable">
        <table class="datatables-basic table table-bordered dataTable no-footer dtr-column " id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
          <thead>
            <tr>
              <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
              <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                <input type="checkbox" class="form-check-input">
              </th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 251px;" aria-label="Lead Name: activate to sort column ascending">Lead Name</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 251px;" aria-label="Lead Name: activate to sort column ascending">Phone</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 238px;" aria-label="Email: activate to sort column ascending">Email</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 78px;" aria-label="Lead Stage: activate to sort column ascending">Lead Stage</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 74px;" aria-label="City: activate to sort column ascending">City</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 90px;" aria-label="Current State: activate to sort column ascending">Current State</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 75px;" aria-label="Lead Owner: activate to sort column ascending">Lead Owner</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 75px;" aria-label="Preferred Intake: activate to sort column ascending">Preferred Intake</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 75px;" aria-label="IELTS Score: activate to sort column ascending">IELTS Score</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 75px;" aria-label="SAT Score: activate to sort column ascending">SAT Score</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 75px;" aria-label="Lead Status: activate to sort column ascending">Lead Status</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 75px;" aria-label="Work Experience: activate to sort column ascending">Work Experience</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 75px;" aria-label="Preferred Course of Study: activate to sort column ascending">Preferred Course of Study</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 75px;" aria-label="Preferred Universities: activate to sort column ascending">Preferred Universities</th>
              <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 75px;" aria-label="Actions">Actions</th>
            </tr>
          </thead>
          <tbody> 
            @include('leads.components.viewleads',['leads'=>$leads,'per_page'=>$per_page])
          </tbody>
        </table>
        </div>
      </div>
    </div>
    @include('leads.components.pagination')
    </div>
  </div>
</div> -->

<div class="container-xxl row flex-grow-1 container-p-y">
  <!-- Left Column for Actions -->
  @include('leads.components.filter')

  <!-- Main Table Area -->
  <div class="col-xl-9 col-md-8 col-12">
    <div class="card" style="height: 80vh; width: 70vw;">
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
                  <i class="ri-add-line ri-16px me-sm-2"></i> Add New Record
                </button>
              </div>
            </div>
          </div>

          <div class="table-scrollable">
            <table class="datatables-basic table table-bordered dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
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
      @include('leads.components.pagination')
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

<script src="../../assets/js/tables-datatables-basic.js"></script>
<script>

function changePerPage(){
  count = document.getElementById('per_page').value;
  // page = 
  $.ajax({
    url: "/leads/data",
    type:'GET',
    data:{per_page:count},
    success: function (response) {
      var per_page = response.per_page;
      var page = response.page;
      var count = response.count;

      // Redirect with the proper parameters
      window.location.href = '/lead?per_page=' + encodeURIComponent(per_page) +
        '&page=' + encodeURIComponent(page) +
        '&count=' + encodeURIComponent(count);
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