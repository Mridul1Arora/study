@extends('layout.app')

@section('title', 'Calls')

@section('content')

@php
  use App\Constants\CallLogConstants;
  $call_purposes = CallLogConstants::CALL_PURPOSES;
  $call_results = CallLogConstants::CALL_RESULTS;
  $call_types = CallLogConstants::CALL_TYPES;
  $ist = new \DateTimeZone('Asia/Kolkata');
  $currentDateTime = now()->setTimezone($ist)->format('Y-m-d\TH:i');
@endphp

<div class="container-xxl container-p-y">
      <!-- DataTable Card -->
      <div class="col-lg-12 mb-4">
        <div class="card">
          <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table table-bordered" id="datatables-basic">
              <thead>
                <tr>
                  <th>Call Purpose</th>
                  <th>Call To</th>
                  <th>Time Duration</th>
                  <th>Description</th>
                  <th>Call Agenda</th>
                  <th>Call Result</th>
                  <th>Call Start Time</th>
                  <th>Call Status</th>
                  <th>Call Type</th>
                  <th>Call From</th>
                  <th>Created Time</th>
                  <th>Updated Time</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
</div>

<div
  class="modal fade"
  id="editDetailsModal"
  tabindex="-1"
  aria-labelledby="editDetailsModalLabel"
  aria-hidden="true"
>
<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDetailsModalLabel">Edit Details</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <!-- Log id -->
        <input type="hidden" id="log_id_edit" name="id">
        <!-- Call Type -->
        <div class="col-12 mb-3">
            <div class="form-floating form-floating-outline">
                <select id="call_type_edit" class="form-select">
                  @foreach ($call_types as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
                <label for="call_type_edit">Call Type</label>
            </div>
        </div>

        <!-- Call Status -->
        <div class="col-12 mb-3">
            <div class="form-floating form-floating-outline">
                <select id="call_status_edit" class="form-select">
                    <option value="completed">Completed</option>
                    <option value="not_completed">Not Completed</option>
                </select>
                <label for="call_status_edit">Call Status</label>
            </div>
        </div>

        <!-- Call Start Time -->
        <div class="col-12 mb-3">
            <div class="form-floating form-floating-outline">
                <input type="datetime-local" id="call_start_time_edit" class="form-control" min="2024-01-01T00:00"/>
                <label for="call_start_time_edit">Call Start Time</label>
            </div>
        </div>

        <!-- Call Duration -->
        <div class="col-12 mb-3">
            <div class="form-floating form-floating-outline">
                <input type="text" id="time_duration_edit" class="form-control" placeholder="00 minutes 00 seconds" />
                <label for="time_duration_edit">Time Duration</label>
            </div>
        </div>

        <!-- Call Purpose -->
        <div class="col-12 mb-3">
            <div class="form-floating form-floating-outline">
                <select id="call_purpose_edit" class="form-select">
                @foreach ($call_purposes as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
                </select>
                <label for="call_purpose_edit">Call Purpose</label>
            </div>
        </div>

        <!-- Call Agenda -->
        <div class="col-12 mb-3">
            <div class="form-floating form-floating-outline">
                <input type="text" id="call_agenda_edit" class="form-control" placeholder="Enter Call Agenda" />
                <label for="call_agenda_edit">Call Agenda</label>
            </div>
        </div>

        <!-- Call Result -->
        <div class="col-12 mb-3">
            <div class="form-floating form-floating-outline">
                <select id="call_result_edit" class="form-select">
                    @foreach ($call_results as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                    
                </select>
                <label for="call_result_edit">Call Result</label>
            </div>
        </div>

        <!-- Description -->
        <div class="col-12 mb-3">
            <div class="form-floating form-floating-outline">
                <textarea id="description_edit" class="form-control" placeholder="Enter Description"></textarea>
                <label for="description_edit">Description</label>
            </div>
        </div>
    </div>

          <!-- Submit and Cancel Buttons -->
          <div class="col-sm-12">
              <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1" onClick="submitEdit()">Submit</button>
          </div>
</div>
      </div>
    </div>
</div>

  <!-- Scripts -->
  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>

  <script>
    var table;

    $(document).ready(function() {
      // Initialize DataTable and assign it to a variable
      table = $('#datatables-basic').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('calls.list') }}",
          type: "GET",
          dataType: 'json',
          dataSrc: function(json) {
            console.log(json);
            return json.data;
          },
          error: function(xhr, error, code) {
            console.error("AJAX Error: ", error);
          }
        },
        scrollX: true,
        scrollY: "400px",
        columns: 
        [
            { data: 'call_purpose', title: 'Call Purpose' },
            { data: 'call_to', title: 'Call To' },
            { data: 'time_duration', title: 'Time Duration' },
            { data: 'description', title: 'Description' },
            { data: 'call_agenda', title: 'Call Agenda' },
            { data: 'call_result', title: 'Call Result' },
            { data: 'call_start_time', title: 'Call Start Time', render: function(data, type, row) {
                return new Date(data).toLocaleString();
            }},
            { data: 'call_status', title: 'Call Status' },
            { data: 'call_type', title: 'Call Type' },
            { data: 'call_from', title: 'Call From' },
            { data: 'created_at', title: 'Created Time', render: function(data, type, row) {
                return new Date(data).toLocaleDateString();
            }},
            { data: 'updated_at', title: 'Updated Time', render: function(data, type, row) {
                return new Date(data).toLocaleDateString();
            }},
            { data: 'action' }
        ]

      });
    });

    function openEditModal(log_id){
      $.ajax({
        url: `/calls/details/${log_id}`,
        type: 'GET',
        success: function(response) { 
          $('#log_id_edit').val(response.id);
          $('#call_purpose_edit').val(response.call_purpose);
          $('#time_duration_edit').val(convertToHumanReadableDuration(response.time_duration));
          $('#description_edit').val(response.description);
          $('#call_agenda_edit').val(response.call_agenda);
          $('#call_result_edit').val(response.call_result);
          $('#call_start_time_edit').val(response.call_start_time);
          $('#call_status_edit').val(response.call_status);
          $('#call_type_edit').val(response.call_type);
          $('#call_from_edit').val(response.call_from);
        },
        error: function(err) {
          console.error('Failed to fetch call log details:', err);
        }
      });
    }

    function submitEdit(){
      const log_id = document.getElementById('log_id_edit').value;
      const call_type = document.getElementById('call_type_edit').value;
      const call_status = document.getElementById('call_status_edit').value;
      const call_start_time = document.getElementById('call_start_time_edit').value;
      const time_duration_readable = document.getElementById('time_duration_edit').value;
      const call_purpose = document.getElementById('call_purpose_edit').value;
      const call_result = document.getElementById('call_result_edit').value;
      const call_agenda = document.getElementById('call_agenda_edit').value;
      const description = document.getElementById('description_edit').value;

      const currentTime = @json($currentDateTime);

      if (call_start_time > currentTime) {
        alert('Call start time cannot be in the future.');
        return false;
      }    

      var time_duration = convertDuration(time_duration_readable);
      if(!time_duration){
        alert('Invalid time duration');
        return false;
      }

      $.ajax({
        url: "/calls/update",
        type: 'POST',
        data: {log_id,call_type,call_status,call_start_time,time_duration,call_purpose,call_result,call_agenda,description},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          alert('Call Log Updated Successfully');
          $('#editDetailsModal').modal('hide');
        },
        error: function(error) {
          alert('Error updating call log',error);
          $('#editDetailsModal').modal('hide');
        }
      });
    }

    function convertToHumanReadableDuration(timeString) {
      const [hours, minutes, seconds] = timeString.split(':').map(Number);
      const durationParts = [];
      if (hours > 0) durationParts.push(hours + (hours === 1 ? ' hour' : ' hours'));
      if (minutes > 0) durationParts.push(minutes + (minutes === 1 ? ' minute' : ' minutes'));
      if (seconds > 0) durationParts.push(seconds + (seconds === 1 ? ' second' : ' seconds'));

      return durationParts.length > 0 ? durationParts.join(' ') : '0 seconds';
    }

    function convertDuration(time_duration) {
      const durationInput = time_duration;
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

@endsection