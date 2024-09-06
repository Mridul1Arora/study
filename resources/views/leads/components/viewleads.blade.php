@foreach ($leads as $lead)
<tr>
  <td class="control" tabindex="0" style="display: none;"></td>
  <td class="dt-checkboxes-cell">
    <input type="checkbox" class="dt-checkboxes form-check-input">
  </td>
  <td>{{ $lead->lead_name }}</td>
  <td>{{ $lead->phone }}</td>
  <td>{{ $lead->email }}</td>
  <td>{{ $lead->lead_stage }}</td>
  <td>{{ $lead->city }}</td>
  <td>{{ $lead->current_state }}</td>
  <td>{{ $lead->lead_owner }}</td>
  <td>{{ $lead->preferred_intake }}</td>
  <td>{{ $lead->ielts_score }}</td>
  <td>{{ $lead->sat_score }}</td>
  <td>{{ $lead->lead_status }}</td>
  <td>{{ $lead->work_experience }}</td>
  <td>{{ $lead->preferred_course_of_study }}</td>
  <td>{{ $lead->preferred_universities }}</td>
  <td>
    <div class="d-inline-block">
      <a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="ri-more-2-line"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end m-0">
        <li><a href="/get-lead-details/{{ $lead->_id }}" class="dropdown-item">Details</a></li>
        <li><button class="dropdown-item" onClick="openModal('{{ $lead->_id }}')" data-bs-toggle="modal" data-bs-target="#editDetailsModal">Edit</button></li>
        <li><button onClick="deleteLead('{{ $lead->id }}')" class="dropdown-item delete-lead">Delete</button></li>
      </ul>
    </div>
  </td>
</tr>
@endforeach
