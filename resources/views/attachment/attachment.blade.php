@extends('layout.app')
@section('title', 'Add New User')
@section('content')

<!-- Attachment Card -->
<button type="button" class="btn custom-spacing btn-primary waves-effect waves-light" 
    data-bs-toggle="modal" data-bs-target="#attachmentModal">Add attachment
</button>

<div class="card">
  <h5 class="card-header">Attachments</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>File Name</th>
          <th>Attached By</th>
          <th>Date Added</th>
          <th>Size</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0" id="attachmentTableBody">
      </tbody>
    </table>
  </div>
</div>


<!-- File Upload Modal -->
<div class="modal fade" id="attachmentModal" tabindex="-1" aria-labelledby="attachmentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form id="uploadForm" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="attachmentModalLabel">Upload Attachments</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="dropzone needsclick dz-clickable" id="dropzone-multi">
            <div class="dz-message needsclick">
              Drop files here or click to upload
            </div>
          </div>
          <input type="file" id="fileInput" name="files[]" multiple class="form-control mt-3" />

          <!-- Hidden section to show uploaded file names -->
          <div id="uploadedFilesSection" class="mt-3" style="display: none;">
            <h6>Uploaded Files:</h6>
            <ul id="uploadedFilesList"></ul>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="uploadButton" class="btn btn-primary">Upload</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelButton">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- File Edit Modal -->
<div class="modal fade" id="editattachement" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form id="editattachment">
        @csrf
            <div class="modal-header">
                <h4 class="modal-title" id="modalCenterTitle">Edit File Name</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col mb-6 mt-2">
                    <div class="form-floating form-floating-outline">
                    <input type="text" id="filename" class="form-control">
                    <label for="filename">Attachment Name</label>
                    </div>
                </div>
                </div>
                <input type="hidden" id="fileId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="saveChangesButton" class="btn edit-button-att btn-primary waves-effect waves-light">Save changes</button>
            </div>
        </from>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function() {
      const fileInput = document.getElementById('fileInput');
      const uploadButton = $('#uploadButton');
      const uploadedFilesSection = $('#uploadedFilesSection');
      const uploadedFilesList = $('#uploadedFilesList');

      uploadButton.on('click', function() {
        const files = fileInput.files;

        if (files.length === 0) {
          return;
        }

        uploadButton.prop('disabled', true);

        uploadedFilesList.empty();
        uploadedFilesSection.hide();

        let uploadedCount = 0;
        for (let i = 0; i < files.length; i++) {
          const formData = new FormData();
          formData.append('files[]', files[i]);

          axios.post("{{ route('attachment.upload') }}", formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          })
          .then(response => {
            if (response.data.uploaded_files.length > 0) {
              const uploadedFile = response.data.uploaded_files[0];

              uploadedFilesList.append('<li>' + uploadedFile.file_name + '</li>');
            }
            uploadedFilesSection.show();
            uploadedCount++;
            if (uploadedCount === files.length) {
              $('#attachmentModal').modal('hide');
            }
          })
          .catch(error => {
            console.error(`Upload failed for ${files[i].name}:`, error);
          });
        }
      });

      $('#attachmentModal').on('hidden.bs.modal', function () {
        fileInput.value = ''; 
        uploadButton.prop('disabled', false); 
        uploadedFilesList.empty(); 
        uploadedFilesSection.hide();
      });
    });
</script>

<script>
    $(document).ready(function() {
        function loadAttachments() {
            $.ajax({
                url: '{{ route("attachment.data") }}',
                method: 'GET',
                success: function(data) {
                    let rows = '';
                    data.forEach(function(attachment) {
                        rows += `<tr>
                            <td>${attachment.file_name}</td>
                            <td>${attachment.name}</td>
                            <td>${attachment.created_at}</td>
                            <td>${attachment.file_size}</td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a href="#" 
                                        class="open-modal dropdown-item waves-effect waves-light" 
                                        data-bs-toggle="modal" 
                                        data-file-id="${attachment.id}"
                                        data-file-name="${attachment.file_name}"
                                        data-bs-target="#editattachement">
                                        Edit
                                    </a></li>
                                    <li><a class="dropdown-item delete-button" data-file-id="${attachment.id}" href="#">Delete</a></li>
                                    <li><a class="dropdown-item download-button" data-file-id="${attachment.id}" href="#">Download</a></li>
                                </ul>
                            </div>
                            </td>
                        </tr>`;
                    });
                    $('#attachmentTableBody').html(rows);

                    $('.open-modal').on('click', function() {
                        const fileName = $(this).data('file-name');
                        const fileId = $(this).data('fileId');

                        $('#filename').val(fileName);
                        $('#fileId').val(fileId);
                    });
                }
            });
        }

        // Call loadAttachments when the modal closes
        $('#attachmentModal').on('hidden.bs.modal', function () {
            loadAttachments();
        });

        // Call loadAttachments on page load
        loadAttachments();

        function handleAttachmentAction(actionCode, fileId, newFileName = null) {
            $.ajax({
                url: "{{ route('attachment.action') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    action_code: actionCode, 
                    file_id: fileId,
                    new_file_name: newFileName
                },
                success: function(response) {
                    if (actionCode === 'D') {
                        loadAttachments();
                    } else if (actionCode === 'E') {
                        $('#editattachement').modal('hide');
                        loadAttachments();
                    } else if (actionCode === 'DL') {
                        window.open(response.download_url, '_blank');
                    }
                },
                error: function(error) {
                console.error('Action failed:', error);
                }
            });
        }

        // Delete button handler
        $(document).on('click', '.delete-button', function(e) {
            confirm('Are you sure');
            e.preventDefault();
            const fileId = $(this).data('file-id');
            if(fileId) {
                handleAttachmentAction('D', fileId);
            }
        });

        // Download button handler
        $(document).on('click', '.download-button', function(e) {
            e.preventDefault();
            const fileId = $(this).data('file-id');
            if(fileId) {
                handleAttachmentAction('DL', fileId);
            }
        });

        // Save changes button handler
        $(document).on('click', '.edit-button-att', function(e) {
            e.preventDefault();
            const fileId = $('#fileId').val();
            const filename = $('#filename').val();
            if (filename && fileId) {
                handleAttachmentAction('E', fileId, filename);
            }
        });
    });
</script>

@endsection
