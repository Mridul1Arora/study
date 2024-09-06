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
        <form class="edit-record" id="edit-record" action="{{ route('leads.update') }}" method="POST">
          @csrf
          <!-- Lead id -->
          <input type="hidden" id="lead_id_edit" name="lead_id">
          <!-- Lead Name -->
          <div class="input-group input-group-merge mb-6">
            <span id="basicFullname2" class="input-group-text"><i class="ri-user-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
              <input
                type="text"
                id="leadName_edit"
                class="form-control dt-full-name"
                name="lead_name"
                placeholder="John Doe"
                aria-label="John Doe"
                aria-describedby="basicFullname2"
                required />
              <label for="leadName">Lead Name</label>
            </div>
          </div>

          <!-- Email -->
          <div class="input-group input-group-merge mb-6">
            <span class="input-group-text"><i class="ri-mail-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
              <input
                type="email"
                id="email_edit"
                name="email"
                class="form-control dt-email"
                placeholder="john.doe@example.com"
                aria-label="john.doe@example.com"
                required />
              <label for="email">Email</label>
            </div>
          </div>

          <!-- Lead Stage -->
          <div class="input-group input-group-merge mb-6">
            <span id="basicPost2" class="input-group-text"><i class="ri-briefcase-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
              <input
                type="text"
                id="leadStage_edit"
                name="lead_stage"
                class="form-control"
                placeholder="Stage"
                aria-label="Stage"
              />
              <label for="leadStage">Lead Stage</label>
            </div>
          </div>

          <!-- City -->
          <div class="input-group input-group-merge mb-6">
            <span class="input-group-text"><i class="ri-city-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
              <input
                type="text"
                id="city_edit"
                name="city"
                class="form-control dt-city"
                placeholder="City"
                aria-label="City"
                required />
              <label for="city">City</label>
            </div>
          </div>

          <!-- Current State -->
          <div class="input-group input-group-merge mb-6">
            <span class="input-group-text"><i class="ri-map-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
              <input
                type="text"
                id="currentState_edit"
                name="current_state"
                class="form-control dt-current-state"
                placeholder="Current State"
                aria-label="Current State"
                required />
              <label for="currentState">Current State</label>
            </div>
          </div>

          <!-- Lead Owner -->
          <div class="input-group input-group-merge mb-6">
            <span class="input-group-text"><i class="ri-user-settings-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
              <input
                type="text"
                id="leadOwner_edit"
                name="lead_owner"
                class="form-control dt-lead-owner"
                placeholder="Lead Owner"
                aria-label="Lead Owner"
                required />
              <label for="leadOwner">Lead Owner</label>
            </div>
          </div>

          <!-- Preferred Intake -->
          <div class="input-group input-group-merge mb-6">
            <span class="input-group-text"><i class="ri-calendar-todo-line ri-18px"></i></span>
            <div class="form-floating form-floating-outline">
              <input
                type="text"
                id="preferredIntake_edit"
                name="preferred_intake"
                class="form-control"
                placeholder="Preferred Intake"
                aria-label="Preferred Intake"
              />
              <label for="preferredIntake">Preferred Intake</label>
            </div>
          </div>

          <!-- IELTS Score -->
          <div class="col-sm-12">
              <div class="input-group input-group-merge mb-6">
                  <span class="input-group-text"><i class="ri-medal-line ri-18px"></i></span>
                  <div class="form-floating form-floating-outline">
                      <input
                        type="number"
                        id="ieltsScore_edit"
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
              <div class="input-group input-group-merge mb-6">
                  <span class="input-group-text"><i class="ri-star-line ri-18px"></i></span>
                  <div class="form-floating form-floating-outline">
                      <input
                        type="number"
                        id="satScore_edit"
                        name="sat_score"
                        class="form-control"
                        placeholder="SAT Score"
                        aria-label="SAT Score"
                        min="400" max="1600"
                      />
                      <label for="satScore_edit">SAT Score</label>
                  </div>
              </div>
          </div>

          <!-- Lead Status -->
          <div class="col-sm-12">
              <div class="input-group input-group-merge mb-6">
                  <span class="input-group-text"><i class="ri-status-line ri-18px"></i></span>
                  <div class="form-floating form-floating-outline">
                      <input
                        type="text"
                        id="leadStatus_edit"
                        name="lead_status"
                        class="form-control"
                        placeholder="Lead Status"
                        aria-label="Lead Status"
                      />
                      <label for="leadStatus_edit">Lead Status</label>
                  </div>
              </div>
          </div>

          <!-- Work Experience -->
          <div class="col-sm-12">
              <div class="input-group input-group-merge mb-6">
                  <span class="input-group-text"><i class="ri-briefcase-line ri-18px"></i></span>
                  <div class="form-floating form-floating-outline">
                      <input
                        type="text"
                        id="workExperience_edit"
                        name="work_experience"
                        class="form-control"
                        placeholder="Work Experience"
                        aria-label="Work Experience"
                      />
                      <label for="workExperience_edit">Work Experience</label>
                  </div>
              </div>
          </div>

          <!-- Preferred Course of Study -->
          <div class="col-sm-12">
              <div class="input-group input-group-merge mb-6">
                  <span class="input-group-text"><i class="ri-book-line ri-18px"></i></span>
                  <div class="form-floating form-floating-outline">
                      <input
                        type="text"
                        id="preferredCourseOfStudy_edit"
                        name="preferred_course_of_study"
                        class="form-control"
                        placeholder="Preferred Course of Study"
                        aria-label="Preferred Course of Study"
                      />
                      <label for="preferredCourseOfStudy_edit">Preferred Course of Study</label>
                  </div>
              </div>
          </div>

          <!-- Preferred Universities -->
          <div class="col-sm-12 mb-6">
              <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="ri-university-line ri-18px"></i></span>
                  <div class="form-floating form-floating-outline">
                      <input
                        type="text"
                        id="preferredUniversities_edit"
                        name="preferred_universities"
                        class="form-control"
                        placeholder="Preferred Universities"
                        aria-label="Preferred Universities"
                      />
                      <label for="preferredUniversities_edit">Preferred Universities</label>
                  </div>
              </div>
          </div>

          <!-- Phone -->
          <div class="col-sm-12 mb-6">
              <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="ri-phone-line ri-18px"></i></span>
                  <div class="form-floating form-floating-outline">
                      <input
                          type="tel"
                          id="phone_edit"
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

          <!-- Submit and Cancel Buttons -->
          <div class="col-sm-12">
              <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Submit</button>
          </div>
        </form>
      </div>
    </div>
</div>

<script src="../../assets/vendor/libs/jquery.js"></script>

<script>
    function openModal(lead_id){
  $.ajax({
    url: `/get-lead-details/${lead_id}`,
    type: 'GET',
    success: function(response) {
      $('#lead_id_edit').val(response.data._id);
      $('#leadName_edit').val(response.data.lead_name);
      $('#email_edit').val(response.data.email);
      $('#leadStage_edit').val(response.data.lead_stage);
      $('#city_edit').val(response.data.city);
      $('#currentState_edit').val(response.data.current_state);
      $('#leadOwner_edit').val(response.data.lead_owner);
      $('#preferredIntake_edit').val(response.data.preferred_intake);
      $('#ieltsScore_edit').val(response.data.ielts_score);
      $('#satScore_edit').val(response.data.sat_score);
      $('#leadStatus_edit').val(response.data.lead_status);
      $('#workExperience_edit').val(response.data.work_experience);
      $('#preferredCourseOfStudy_edit').val(response.data.preferred_course_of_study);
      $('#preferredUniversities_edit').val(response.data.preferred_universities);
      $('#phone_edit').val(response.data.phone);
    },
    error: function(err) {
      console.error('Failed to fetch lead details:', err);
    }
  });
}
</script>