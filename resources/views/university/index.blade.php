@extends('layout.app')

@section('title', 'User Management')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mb-3">
    <a href="#" 
        class="open-modal btn btn-primary" 
        data-bs-toggle="modal" 
        data-bs-target="#addUniversityModel">
        Add New University
    </a>
    </div>
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic-university table table-bordered">
                <thead>
                    <tr>
                        <th>University Name</th>
                        <th>CD ID</th>
                        <th>College ID</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City 1</th>
                        <th>City 2</th>
                        <th>Compus Location</th>
                        <th>Description</th>
                        <th>University Owner</th>
                        <th>Modified By</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="addUniversityModel" tabindex="-1" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" role="document">
        <form id= "addUniversityModel">
            @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="addUniversityModel">Add University</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- University Information Header -->
            <h5 class="mb-3">University Information</h5>
            <div class="row mb-3">
              <div class="col mb-2">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" required>
                  <label for="nameBasic">University Name</label>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="collegeIdBasic" class="form-control" placeholder="Enter College ID">
                  <label for="collegeIdBasic">College ID</label>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="cdIdBasic" class="form-control" placeholder="Enter CD ID">
                  <label for="cdIdBasic">CD ID</label>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <select id="countryBasic" class="form-control" required>
                        <option value="" disabled selected>Select Country</option>
                        <!-- Options will be populated dynamically -->
                    </select>
                  <label for="countryBasic">Country</label>
                </div>
              </div>
            </div>
            
            <!-- Study Location Header -->
            <h5 class="mb-3">Study Location</h5>
            <div class="row g-4">
              <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                  <select id="stateBasic" class="form-control" required>
                    <option value="" disabled selected>Select State</option>
                    <!-- Options will be populated dynamically -->
                  </select>
                  <label for="stateBasic">State</label>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                  <select id="cityBasic" class="form-control">
                    <option value="" disabled selected>Select City</option>
                    <!-- Options will be populated dynamically -->
                  </select>
                  <label for="cityBasic">City</label>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="city2Basic" class="form-control" placeholder="Enter City 2">
                  <label for="city2Basic">City 2</label>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="campusLocationBasic" class="form-control" placeholder="Enter Campus Location">
                  <label for="campusLocationBasic">Campus Location</label>
                </div>
              </div>
            </div>
            
            <!-- Description Header -->
            <h5 class="mb-3">Description</h5>
            <div class="row mb-3">
              <div class="col-md-12 mb-2">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="descBasic" class="form-control" placeholder="Enter Description">
                  <label for="descBasic">Description</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary waves-effect waves-light" id="saveUniversity">Save changes</button>
          </div>
        </div>
      </div>
    </form>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#saveUniversity').on('click', function() {
        var name = $('#nameBasic').val().trim();
        var country = $('#countryBasic').val();
        var state = $('#stateBasic').val();
        var collegeId = $('#collegeIdBasic').val();
        var cdId = $('#cdIdBasic').val();
        var campusLocation = $('#campusLocationBasic').val();
        var city = $('#cityBasic').val();
        var city2 = $('#city2Basic').val();
        var desc = $('#descBasic').val();
        var universityOwner = $('#universityOwnerBasic').val();
        var createdBy = $('#createdByBasic').val();

        // Validation
        if (!name || !country || !state) {
            alert('Please fill in all required fields: University Name, Country, and State.');
            return;
        }

        // AJAX request
        $.ajax({
            url: '{{ route('university.add-university-details') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                name: name,
                cd_id: cdId,
                country: country,
                state: state,
                college_id: collegeId,
                campus_location: campusLocation,
                city: city,
                city_2: city2,
                desc: desc,
                university_owner: universityOwner,
                created_by: createdBy
            },
            success: function(response) {
                // Handle success
                alert('University added successfully!');
                $('#addUniversityModel').modal('hide');
                $('.datatables-basic-university').DataTable().ajax.reload();
            },
            error: function(xhr) {
                // Handle error
                console.log(xhr.responseText);
                alert('An error occurred. Please try again.');
            }
        });
    });
});

</script>


<script>
    $(document).ready(function() {
    // Fetch counties when the modal opens
    $('#addUniversityModel').on('show.bs.modal', function() {
        $.ajax({
            url: '/countries',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#countryBasic').empty().append('<option value="" disabled selected>Select Country</option>');
                $.each(data.countries, function(key, country) {
                    $('#countryBasic').append('<option value="' + country.country_id + '">' + country.country_name + '</option>');
                });
            }
        });
    });

    // When country is selected
    $('#countryBasic').on('change', function() {
        var countryId = $(this).val();
        if(countryId) {
            $.ajax({
                url: '/states/' + countryId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#stateBasic').empty().append('<option value="" disabled selected>Select State</option>');
                    $.each(data.states, function(key, state) {
                        $('#stateBasic').append('<option value="' + state.state_id + '">' + state.state_name + '</option>');
                    });
                    $('#cityBasic').empty().append('<option value="" disabled selected>Select City</option>');
                }
            });
        } else {
            $('#stateBasic').empty().append('<option value="" disabled selected>Select State</option>');
            $('#cityBasic').empty().append('<option value="" disabled selected>Select City</option>');
        }
    });

    // When state is selected
    $('#stateBasic').on('change', function() {
        var stateId = $(this).val();
        if(stateId) {
            $.ajax({
                url: '/cities/' + stateId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#cityBasic').empty().append('<option value="" disabled selected>Select City</option>');
                    $.each(data.cities, function(key, city) {
                        $('#cityBasic').append('<option value="' + city.city_id + '">' + city.city_name + '</option>');
                    });
                }
            });
        } else {
            $('#cityBasic').empty().append('<option value="" disabled selected>Select City</option>');
        }
    });
});

</script>

<script>
    $(document).ready(function() {
        $('.datatables-basic-university').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('university.data') }}",
            columns:[
                { data: 'name', name: 'name' },
                { data: 'cd_id', name: 'cd_id' },
                { data: 'college_id', name: 'college_id' },
                { data: 'country_name', name: 'country_name' },
                { data: 'state_name', name: 'state_name' },
                { data: 'city_name', name: 'city_name' },
                { data: 'city_2', name: 'city_2' },
                { data: 'campus_location', name: 'campus_location' },
                { data: 'desc', name: 'desc' },
                { data: 'owner_name', name: 'owner_name' },
                { data: 'modified_by_name', name: 'modified_by_name' },
            ],
            order: [[0, 'asc']], 
            pageLength: 7,
            lengthMenu: [[7, 10, 25, 50], [7, 10, 25, 50]],
        });
    });
</script>

@endsection
