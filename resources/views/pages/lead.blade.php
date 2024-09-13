@extends('layout.app')

@section('title', 'Leads')

@section('content')

<div class="col-lg-3 col-md-6">
<div class="mt-2">
  <div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="addLead"
    aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasEndLabel" class="offcanvas-title">Offcanvas End</h5>
      <button
        type="button"
        class="btn-close text-reset"
        data-bs-dismiss="offcanvas"
        aria-label="Close"></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
      <p class="text-center">
        Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
        graphic or web designs. The passage is attributed to an unknown typesetter in the 15th
        century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum
        for use in a type specimen book.
      </p>
      <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
      <button
        type="button"
        class="btn btn-outline-secondary d-grid w-100"
        data-bs-dismiss="offcanvas">
        Cancel
      </button>
    </div>
  </div>
</div>
</div>

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-2">
      <div class="col-lg-2 mb-4 ps-3">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLead">Add Lead</button>
      </div>
    </div>
    <div class="row">
      <!-- Filter Component -->
      <div class="col-lg-3 mb-4">
        @include('leads.components.filter')
      </div>
      <!-- DataTable Card -->
      <div class="col-lg-9 mb-4 ps-3">
        <div class="card">
          <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table table-bordered" id="datatables-basic">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Lead Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Lead Status</th>
                  <th>Lead Stage</th>
                  <th>Current State</th>
                  <th>City</th>
                  <th>Preferred Course of Study</th>
                  <th>SAT Score</th>
                  <th>IELTS Score</th>
                  <th>Has Passport</th>
                  <th>Work Experience</th>
                  <th>Preferred Intake</th>
                  <th>Preferred Universities</th>
                  <th>Lead Owner</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('leads.components.edit')




  <!-- Scripts -->
  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>

  <script>
    var table;  // Declare table variable globally

    $(document).ready(function() {
      // Initialize DataTable and assign it to a variable
      table = $('#datatables-basic').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('getLeads') }}",
          type: "GET",
          dataType: 'json',
          data: function(d) {
            d.filters = JSON.stringify(getSelectedFilters());     
          },
          dataSrc: function(json) {
            console.log(json);  // Log the full JSON response to the console
            return json.data;   // Pass the 'data' array to DataTables
          },
          error: function(xhr, error, code) {
            console.error("AJAX Error: ", error);  // Log AJAX errors to the console
          }
        },
        scrollX: true,
        scrollY: "400px",
        columns: [
          { data: 'id' },
          { data: 'lead_name' },
          { data: 'email' },
          { data: 'phone' },
          { data: 'lead_status' },
          { data: 'lead_stage' },
          { data: 'current_state' },
          { data: 'city' },
          { data: 'preferred_course_of_study' },
          { data: 'sat_score' },
          { data: 'ielts_score' },
          { data: 'has_passport' },
          { data: 'work_experience' },
          { data: 'preferred_intake' },
          { data: 'preferred_universities' },
          { data: 'lead_owner' },
          { data: 'created_at', render: function(data, type, row) {
              return new Date(data).toLocaleDateString();
          }},
          { data: 'updated_at', render: function(data, type, row) {
              return new Date(data).toLocaleDateString();
          }},
          { data: 'action' }
        ]
      });

      var applyBtn = document.getElementById('apply_filters');
      applyBtn.addEventListener('click', function () {
        applyBtn.classList.add('d-none');
        table.ajax.reload();
      });
    });

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
                table.ajax.reload();
              },
            error: function(xhr) {
              alert('An error occurred while deleting the lead.');
            }
        });
      }
    }

  </script>

@endsection