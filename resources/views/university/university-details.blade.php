@extends('layout.app')

@section('title', 'University Management')

@section('content')
<div class="card custom-spacing mb-6">
    <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-6">
            <h3 id="universityNameHeader">{{ !empty($data['name']) ? $data['name'] : 'No Name Available' }}</h3> <!-- University name -->
            <div class="button-wrapper">
                <a href="#" 
                    class="open-modal btn btn-primary" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editUniversityModel">
                    Edit University
                </a>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <form id="formUniversitySettings">
            <div class="row mt-1 g-5">
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="universityName" name="universityName" value="{{ !empty($data['name']) ? $data['name'] : '' }}" disabled/>
                        <label for="universityName">University Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="cdId" name="cdId" value="{{ !empty($data['cd_id']) ? $data['cd_id'] : '' }}" disabled/>
                        <label for="cdId">CD ID</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="universityOwner" name="universityOwner" value="{{ !empty($data['owner_name']) ? $data['owner_name'] : '' }}" disabled/>
                        <label for="universityOwner">University Owner</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="modifiedBy" name="modifiedBy" value="{{ !empty($data['modified_by_name']) ? $data['modified_by_name'] : 'N/A' }}" disabled/>
                        <label for="modifiedBy">Modified By</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="collegeId" name="collegeId" value="{{ !empty($data['college_id']) ? $data['college_id'] : '' }}" disabled/>
                        <label for="collegeId">College ID</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="state" name="state" value="{{ !empty($data['state_name']) ? $data['state_name'] : '' }}" disabled/>
                        <label for="state">State</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="country" name="country" value="{{ !empty($data['country_name']) ? $data['country_name'] : '' }}" disabled/>
                        <label for="country">Country</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="city" name="city" value="{{ !empty($data['city_name']) ? $data['city_name'] : '' }}" disabled/>
                        <label for="city">City</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="city2" name="city2" value="{{ !empty($data['city_2']) ? $data['city_2'] : '' }}" disabled/>
                        <label for="city2">City 2</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="campusLocation" name="campusLocation" value="{{ !empty($data['campus_location']) ? $data['campus_location'] : '' }}" disabled/>
                        <label for="campusLocation">Campus Location</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description" disabled>{{ !empty($data['desc']) ? $data['desc'] : '' }}</textarea>
                        <label for="description">Description</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <h5 class="card-header mb-1">Delete University</h5>
    <div class="card-body">
        <div class="mb-6 col-12 mb-0">
            <div class="alert alert-warning">
                <h6 class="alert-heading mb-1">Are you sure you want to delete this university?</h6>
                <p class="mb-0">Once deleted, this action cannot be undone.</p>
            </div>
        </div>
        <form id="formUniversityDeactivation">
            <div class="form-check mb-6">
                <input class="form-check-input" type="checkbox" name="confirmDelete" id="confirmDelete"/>
                <label class="form-check-label" for="confirmDelete">I confirm university deletion</label>
            </div>
            <button type="button" class="btn btn-danger deactivate-university" id="deleteButton" disabled>Delete University</button>
        </form>
    </div>
</div>

<!-- Edit University Modal -->
<div class="modal fade" id="editUniversityModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editUniversityForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editUniversityModel">Edit University</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- University Information Header -->
                    <h5 class="mb-3">University Information</h5>
                    <div class="row mb-3">
                        <div class="col mb-2">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" value="{{ !empty($data['name']) ? $data['name'] : '' }}" required>
                                <label for="nameBasic">University Name</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="collegeIdBasic" class="form-control" placeholder="Enter College ID" value="{{ !empty($data['college_id']) ? $data['college_id'] : '' }}">
                                <label for="collegeIdBasic">College ID</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="cdIdBasic" class="form-control" placeholder="Enter CD ID" value="{{ !empty($data['cd_id']) ? $data['cd_id'] : '' }}">
                                <label for="cdIdBasic">CD ID</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-floating form-floating-outline">
                                <select id="countryBasic" class="form-control" required>
                                    <option value="" disabled>Select Country</option>
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
                                    <option value="" disabled>Select State</option>
                                    <!-- Options will be populated dynamically -->
                                </select>
                                <label for="stateBasic">State</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-floating form-floating-outline">
                                <select id="cityBasic" class="form-control">
                                    <option value="" disabled>Select City</option>
                                    <!-- Options will be populated dynamically -->
                                </select>
                                <label for="cityBasic">City</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="city2Basic" class="form-control" placeholder="Enter City 2" value="{{ !empty($data['city_2']) ? $data['city_2'] : '' }}">
                                <label for="city2Basic">City 2</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="campusLocationBasic" class="form-control" placeholder="Enter Campus Location" value="{{ !empty($data['campus_location']) ? $data['campus_location'] : '' }}">
                                <label for="campusLocationBasic">Campus Location</label>
                            </div>
                        </div>
                    </div>

                    <!-- Description Header -->
                    <h5 class="mb-3">Description</h5>
                    <div class="row mb-3">
                        <div class="col-md-12 mb-2">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="descBasic" class="form-control" placeholder="Enter Description" value="{{ !empty($data['desc']) ? $data['desc'] : '' }}">
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
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#editUniversityModel').on('show.bs.modal', function() {
            $.ajax({
                url: '/countries',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#countryBasic').empty().append('<option value="" disabled selected>Select Country</option>');
                    $.each(data.countries, function(key, country) {
                        $('#countryBasic').append('<option value="' + country.country_id + '">' + country.country_name + '</option>');
                    });

                    $('#countryBasic').val("{{ $data['country_id'] ?? '' }}").change();
                }
            });
        });

        $('#countryBasic').on('change', function() {
            var countryId = $(this).val();
            if (countryId) {
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

                        $('#stateBasic').val("{{ $data['state_id'] ?? '' }}").change();
                    }
                });
            } else {
                $('#stateBasic').empty().append('<option value="" disabled selected>Select State</option>');
                $('#cityBasic').empty().append('<option value="" disabled selected>Select City</option>');
            }
        });

        $('#stateBasic').on('change', function() {
            var stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: '/cities/' + stateId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#cityBasic').empty().append('<option value="" disabled selected>Select City</option>');
                        $.each(data.cities, function(key, city) {
                            $('#cityBasic').append('<option value="' + city.city_id + '">' + city.city_name + '</option>');
                        });

                        $('#cityBasic').val("{{ $data['city_id'] ?? '' }}");
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

        $('#saveUniversity').on('click', function() {
            var universityData = {
                university_id: '{{ $data['id'] }}',
                name: $('#nameBasic').val(),
                college_id: $('#collegeIdBasic').val(),
                cd_id: $('#cdIdBasic').val(),
                country_id: $('#countryBasic').val(),
                state_id: $('#stateBasic').val(),
                city_id: $('#cityBasic').val(),
                city_2: $('#city2Basic').val(),
                campus_location: $('#campusLocationBasic').val(),
                desc: $('#descBasic').val()
            };

            $.ajax({
                url: '{{ route('university.action') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    action: 'ED',
                    data: universityData
                },
                success: function(response) {
                    if (response.success) {
                        alert('University details updated successfully!');
                        location.reload();
                    } else {
                        alert('Error updating university details: ' + response.message);
                    }
                },
                error: function(xhr) {
                    alert('An error occurred while updating university details.');
                }
            });
        });

        // AJAX call to handle deleting a university
        $('#deleteButton').on('click', function() {
            if ($('#confirmDelete').is(':checked')) {
                $.ajax({
                    url: '{{ route('university.action') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        action: 'D',
                        data: {
                            university_id: '{{ $data['id'] }}'
                        }
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('University deleted successfully!');
                            window.location.href = '{{ url('/university') }}';
                        } else {
                            alert('Error deleting university: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('An error occurred while deleting the university.');
                    }
                });
            } else {
                alert('You must confirm deletion before proceeding.');
            }
        });
    });
</script>

<script>
document.getElementById('confirmDelete').addEventListener('change', function() {
    const deleteButton = document.getElementById('deleteButton');
    deleteButton.disabled = !this.checked;
});
</script>
@endsection
