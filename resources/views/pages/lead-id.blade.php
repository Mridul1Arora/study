@extends('layout.app')

@section('title', 'Leads')

@section('content')

<link rel="stylesheet" href="../../assets/vendor/css/pages/page-profile.css" />

<!-- Show call Details Modal -->
<div class="modal fade" id="call_details_modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel3">Call Details</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <div class="col-md-6">
            <p><strong>Call To:</strong> <span id="call_to"></span></p>
            <p><strong>Call Type:</strong> <span id="call_type"></span></p>
            <p><strong>Call Start Time:</strong> <span id="call_start_time"></span></p>
            <p><strong>Call Duration:</strong> <span id="time_duration"></span></p>
            <p><strong>Call From:</strong> <span id="call_from"></span></p>
            <p><strong>Subject:</strong> <span id="subject"></span></p>
          </div>
          <div class="col-md-6">
            <p><strong>Outgoing Call Status:</strong> <span id="call_status"></span></p>
            <p><strong>Created By:</strong> <span id="created_by"></span></p>
            <p><strong>Modified By:</strong> <span id="modified_by"></span></p>
            <p><strong>Voice Recording:</strong> <span id="voice_recording"></span></p>
          </div>
          <div>
            <h6><strong>Purpose Of Outgoing Call</strong></h6>
            <p><strong>Call Purpose:</strong> <span id="call_purpose"></span></p>
            <p><strong>Call Agenda:</strong> <span id="call_agenda"></span></p>
            <h6><strong>Outcome Of Outgoing Call</strong></h6>
            <p><strong>Call Result:</strong> <span id="call_result"></span></p>
            <p><strong>Description:</strong> <span id="description"></span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Add Modal-->
@php
    $ist = new \DateTimeZone('Asia/Kolkata');
    $currentDateTime = now()->setTimezone($ist)->format('Y-m-d\TH:i');
@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="add_call_log" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel4">Log a Call</h4>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Call Type -->
                    <div class="col-12 mb-3">
                        <div class="form-floating form-floating-outline">
                            <select id="callType" class="form-select">
                              @foreach ($call_types as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                            </select>
                            <label for="callType">Call Type</label>
                        </div>
                    </div>

                    <!-- Call Status -->
                    <div class="col-12 mb-3">
                        <div class="form-floating form-floating-outline">
                            <select id="callStatus" class="form-select">
                                <option value="completed">Completed</option>
                                <option value="not_completed">Not Completed</option>
                            </select>
                            <label for="callStatus">Call Status</label>
                        </div>
                    </div>

                    <!-- Call Start Time -->
                    <div class="col-12 mb-3">
                        <div class="form-floating form-floating-outline">
                            <input type="datetime-local" id="callStartTime" class="form-control" min="2024-01-01T00:00" max="{{ $currentDateTime }}" />
                            <label for="callStartTime">Call Start Time</label>
                        </div>
                    </div>

                    <!-- Call Duration -->
                    <div class="col-12 mb-3">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="callDuration" class="form-control" placeholder="00 minutes 00 seconds" />
                            <label for="callDuration">Call Duration</label>
                        </div>
                    </div>

                    <!-- Purpose Of Outgoing Call -->
                    <div class="col-12 mb-3">
                        <div class="form-floating form-floating-outline">
                            <select id="callPurpose" class="form-select">
                            @foreach ($call_purposes as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                            </select>
                            <label for="callPurpose">Purpose Of Outgoing Call</label>
                        </div>
                    </div>

                    <!-- Call Agenda -->
                    <div class="col-12 mb-3">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="callAgenda" class="form-control" placeholder="Enter Call Agenda" />
                            <label for="callAgenda">Call Agenda</label>
                        </div>
                    </div>

                    <!-- Call Result -->
                    <div class="col-12 mb-3">
                        <div class="form-floating form-floating-outline">
                            <select id="callResult" class="form-select">
                                @foreach ($call_results as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                                
                            </select>
                            <label for="callResult">Call Result</label>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-12 mb-3">
                        <div class="form-floating form-floating-outline">
                            <textarea id="description" class="form-control" placeholder="Enter Description"></textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" onClick="validateAndSave()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Header -->
              <div class="row">
                <div class="col-12">
                  <div class="card mb-6">
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-5">
                      <div class="flex-grow-1 mt-4 mt-sm-12">
                        <div
                          class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-6">
                          <div class="user-profile-info">
                            <h4 class="mb-2">John Doe</h4>
                            <ul
                              class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4">
                              <li class="list-inline-item">
                              </li>
                              <li class="list-inline-item">
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Header -->

              <!-- Navbar pills -->
              <div class="row">
                <div class="col-md-6">
                  <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-sm-row mb-6 row-gap-2">
                      <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"
                          ><i class="ri-user-3-line me-2"></i>Overview</a
                        >
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"
                          ><i class="ri-user-3-line me-2"></i>Timeline</a
                        >
                      </li>
                      <li>
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#add_call_log">
                        Add Call Log
                      </button>
                      </li>
                    </ul>
                  </div>
                </div>

              <!--/ Navbar pills -->

                  <!-- Activity Timeline -->
                  <div class="card card-action mb-6">
                    <div class="card-header align-items-center">
                      <h5 class="card-action-title mb-0">
                        <i class="ri-bar-chart-2-line ri-24px text-body me-4"></i>Activity Timeline
                      </h5>
                      <div class="card-action-element">
                        <div class="dropdown">
                          <button
                            type="button"
                            class="btn dropdown-toggle hide-arrow p-0"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ri-more-2-line ri-22px text-muted"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:void(0);">Share timeline</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                            <li>
                              <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="card-body pt-5">
                      <ul class="timeline mb-0">
                        <li class="timeline-item timeline-item-transparent">
                          <span class="timeline-point timeline-point-primary"></span>
                          <div class="timeline-event">
                            <div class="timeline-header mb-3">
                              <h6 class="mb-0">12 Invoices have been paid</h6>
                              <small class="text-muted">12 min ago</small>
                            </div>
                            <p class="mb-2">Invoices have been paid to the company</p>
                            <div class="d-flex align-items-center">
                              <div class="badge bg-lighter rounded-3">
                                <img src="../../assets//img/icons/misc/pdf.png" alt="img" width="15" class="me-2" />
                                <span class="h6 mb-0 text-body">invoices.pdf</span>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent">
                          <span class="timeline-point timeline-point-success"></span>
                          <div class="timeline-event">
                            <div class="timeline-header mb-3">
                              <h6 class="mb-0">Client Meeting</h6>
                              <small class="text-muted">45 min ago</small>
                            </div>
                            <p class="mb-2">Project meeting with john @10:15am</p>
                            <div class="d-flex justify-content-between flex-wrap gap-2">
                              <div class="d-flex flex-wrap align-items-center">
                                <div class="avatar avatar-sm me-2">
                                  <img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                                </div>
                                <div>
                                  <p class="mb-0 small fw-medium">Lester McCarthy (Client)</p>
                                  <small>CEO of Pixinvent</small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent">
                          <span class="timeline-point timeline-point-info"></span>
                          <div class="timeline-event">
                            <div class="timeline-header mb-3">
                              <h6 class="mb-0">Create a new project for client</h6>
                              <small class="text-muted">2 Day Ago</small>
                            </div>
                            <p class="mb-2">6 team members in a project</p>
                            <ul class="list-group list-group-flush">
                              <li
                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap p-0">
                                <div class="d-flex flex-wrap align-items-center">
                                  <ul class="list-unstyled users-list d-flex align-items-center avatar-group m-0 me-2">
                                    <li
                                      data-bs-toggle="tooltip"
                                      data-popup="tooltip-custom"
                                      data-bs-placement="top"
                                      title="Vinnie Mostowy"
                                      class="avatar pull-up">
                                      <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                                    </li>
                                    <li
                                      data-bs-toggle="tooltip"
                                      data-popup="tooltip-custom"
                                      data-bs-placement="top"
                                      title="Allen Rieske"
                                      class="avatar pull-up">
                                      <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar" />
                                    </li>
                                    <li
                                      data-bs-toggle="tooltip"
                                      data-popup="tooltip-custom"
                                      data-bs-placement="top"
                                      title="Julee Rossignol"
                                      class="avatar pull-up">
                                      <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar" />
                                    </li>
                                    <li class="avatar">
                                      <span
                                        class="avatar-initial rounded-circle pull-up text-heading"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="bottom"
                                        title="3 more"
                                        >+3</span
                                      >
                                    </li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!--/ Activity Timeline -->

              <div class="mt-3 mb-3">
              @include('layout.components.notes')
              </div>
              <!-- User Profile Content -->
              <div class="row mx-0">
                <div class="col-xl-4 col-lg-5 col-md-5 px-2">
                  <!-- About User -->
                  <div class="card mb-6">
                    <div class="card-body">
                      <small class="card-text text-uppercase text-muted small">About</small>
                      <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                          <i class="ri-user-3-line ri-24px"></i><span class="fw-medium mx-2">Full Name:</span>
                          <span>John Doe</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="ri-check-line ri-24px"></i><span class="fw-medium mx-2">Status:</span>
                          <span>Active</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="ri-star-smile-line ri-24px"></i><span class="fw-medium mx-2">Role:</span>
                          <span>Developer</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="ri-flag-2-line ri-24px"></i><span class="fw-medium mx-2">Country:</span>
                          <span>USA</span>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                          <i class="ri-translate-2 ri-24px"></i><span class="fw-medium mx-2">Languages:</span>
                          <span>English</span>
                        </li>
                      </ul>
                      <small class="card-text text-uppercase text-muted small">Contacts</small>
                      <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                          <i class="ri-phone-line ri-24px"></i><span class="fw-medium mx-2">Contact:</span>
                          <span>(123) 456-7890</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="ri-wechat-line ri-24px"></i><span class="fw-medium mx-2">Skype:</span>
                          <span>john.doe</span>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                          <i class="ri-mail-open-line ri-24px"></i><span class="fw-medium mx-2">Email:</span>
                          <span>john.doe@example.com</span>
                        </li>
                      </ul>
                      <small class="card-text text-uppercase text-muted small">Teams</small>
                      <ul class="list-unstyled mb-0 mt-3 pt-1">
                        <li class="d-flex align-items-center mb-4">
                          <i class="ri-github-line ri-24px text-body me-2"></i>
                          <div class="d-flex flex-wrap">
                            <span class="fw-medium me-2">Backend Developer</span><span>(126 Members)</span>
                          </div>
                        </li>
                        <li class="d-flex align-items-center">
                          <i class="ri-reactjs-line ri-24px text-body me-2"></i>
                          <div class="d-flex flex-wrap">
                            <span class="fw-medium me-2">React Developer</span><span>(98 Members)</span>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!--/ About User -->
                  <!-- Profile Overview -->
                  <div class="card mb-6">
                    <div class="card-body">
                      <small class="card-text text-uppercase text-muted small">Overview</small>
                      <ul class="list-unstyled mb-0 mt-3 pt-1">
                        <li class="d-flex align-items-center mb-4">
                          <i class="ri-check-line ri-24px"></i><span class="fw-medium mx-2">Task Compiled:</span>
                          <span>13.5k</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <i class="ri-user-3-line ri-24px"></i><span class="fw-medium mx-2">Projects Compiled:</span>
                          <span>146</span>
                        </li>
                        <li class="d-flex align-items-center">
                          <i class="ri-star-smile-line ri-24px"></i><span class="fw-medium mx-2">Connections:</span>
                          <span>897</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!--/ Profile Overview -->
                </div>
                <div class="col-xl-8 col-lg-7 col-md-7 px-0">
                  <!-- Call Log -->

                  <div class="card mb-5 pe-5 ps-5">
                      <h5 class="card-header">Calls</h5>
                      <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-sm">
                          <thead>
                            <tr>
                              <th>Call Type</th>
                              <th>Call From</th>
                              <th>Call Start Time</th>
                              <th>Time Duration</th>
                              <th>Call Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            @foreach($call_details as $detail)
                            <tr>
                                <td>{{ $call_types[$detail->call_type] }}</td>
                                <td>{{ $detail->call_from }}</td>
                                <td>{{ $detail->call_start_time }}</td>
                                <td>{{ $detail->time_duration }}</td>
                                <td>{{ $detail->call_status }}</td>
                                <td>
                                  <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                      <i class="ri-more-2-line"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#call_details_modal" onClick="getCallDetails({{ $detail->id }})">Details</button>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                    </div>
        
                </div>
              </div>
              <!--/ User Profile Content -->
            </div>
            <!-- / Content -->

            <script src="../../assets/js/pages-profile-user.js"></script>
@endsection
<script>

  function getCallDetails(id){
    const callDetailsRoute = "{{ route('calls.details', ['id' => ':id']) }}";
    const url = callDetailsRoute.replace(':id', id);

    $.ajax({
      url: url,
      type: 'GET',
      success: function(response) {
        $('#call_to').text(response.call_to || '—');
        $('#call_type').text(response.call_type || '—');
        $('#call_start_time').text(formatDate(response.call_start_time) || '—');
        $('#time_duration').text(response.time_duration || '—');
        $('#call_from').text(response.call_from || '—');
        $('#subject').text(response.subject || '—');
        $('#call_status').text(response.call_status || '—');
        $('#created_by').text(response.created_by || '—');
        $('#modified_by').text(response.modified_by || '—');
        $('#voice_recording').text(response.voice_recording || '—');
        $('#call_purpose').text(response.call_purpose || '—');
        $('#call_agenda').text(response.call_agenda || '—');
        $('#call_result').text(response.call_result || '—');
        $('#description').text(response.description || '—');
      },
      error: function(error) {
        alert('Error finding call log',error);
      }
    });
  }

  function formatDate(dateString) {
    // Example: Convert ISO date string to a more readable format
    if (!dateString) return '';
    const date = new Date(dateString);
    return date.toLocaleString(); // Adjust formatting as needed
  }

  function validateAndSave() {
    const callType = document.getElementById('callType').value;
    const callStatus = document.getElementById('callStatus').value;
    const callStartTime = document.getElementById('callStartTime').value;
    const callDuration = document.getElementById('callDuration').value;
    const callPurpose = document.getElementById('callPurpose').value;
    const callResult = document.getElementById('callResult').value;
    const callAgenda = document.getElementById('callAgenda').value;
    const callDesc = document.getElementById('description').value;

    const requiredFields = [ callType, callStatus, callStartTime, callPurpose, callResult];

    for (const field of requiredFields) {

      console.log(field);
      
        if (!field || field == 0) {
          alert('Please fill in all the required fields.');
          return false;
        }
    }

    const currentTime = @json($currentDateTime);
    if (callStartTime > currentTime) {
      alert('Call start time cannot be in the future.');
      return false;
    }    

    var timeDuration = convertDuration();
    if(!timeDuration){
      alert('Invalid time duration');
      return false;
    }

    var call_to = '{{ $id }}';
    $.ajax({
      url: "/calls/create",
      type: 'POST',
      data: {callType, callStatus,call_to, timeDuration, callPurpose, callResult,callDuration ,callAgenda,callDesc,callStartTime},
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        alert('Call Log Added Successfully');
      },
      error: function(error) {
        alert('Error adding call log',error);
      }
    });
  }

  function convertDuration() {
    const durationInput = document.getElementById('callDuration').value;
    const regex = /(?:(\d+)\s*hours?)?\s*(?:(\d+)\s*minutes?)?\s*(?:(\d+)\s*seconds?)?/i;
    const matches = durationInput.match(regex);

    if (matches) {
      let hours = parseInt(matches[1], 10) || 0;
      let minutes = parseInt(matches[2], 10) || 0;
      let seconds = parseInt(matches[3], 10) || 0;

      hours = hours.toString().padStart(2, '0');
      minutes = minutes.toString().padStart(2, '0');
      seconds = seconds.toString().padStart(2, '0');

      const formattedDuration = `${hours}:${minutes}:${seconds}`;
      
      if(formattedDuration == '00:00:00'){
        return false;
      }
      else{
        return formattedDuration;
      }
    } else {
      alert('Please enter the duration in the correct format (e.g., 10 hours 5 minutes 10 seconds)');
    }
  }

</script>