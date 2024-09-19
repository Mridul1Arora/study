<!--Notes-->
<div class="card ps-5 pe-5">
    <h5 class="mt-2">Notes</h5>
    <div class="chat-history-body">
        <ul class="list-unstyled chat-history overflow-auto" style="max-height: 200px;">
            @foreach($notes as $note)
            <li class="chat-message mb-3" data-note-id="{{ $note->id }}">
                <div class="d-flex overflow-hidden">
                    <div class="user-avatar flex-shrink-0 me-4">
                        <div class="avatar avatar-sm">
                            <img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                        </div>
                    </div>
                    <div class="chat-message-wrapper flex-grow-1 position-relative">
                        <div class="chat-message-text">
                            <p class="mb-0" id="note_text_{{$note->id}}">{{ $note->note_text }}</p>
                        </div>
                        <div class="text-muted mt-1">
                            <small>{{ $note->created_at }}</small>
                            <small>{{ $note->added_by }}</small>
                        </div>
                        <!-- Buttons -->
                        <div class="chat-message-actions position-absolute end-0 top-0 d-none">
                            <button class="btn btn-info btn-sm me-2" onClick="openEdit({{ $note->id }})" data-bs-toggle="modal" data-bs-target="#addNewCCModal">Edit</button>
                            <button class="btn btn-danger btn-sm ms-2" onClick="deleteNote({{ $note->id }})">Delete</button>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="form-send-message d-flex justify-content-between align-items-center mb-3">
        <input class="form-control message-input shadow-none" id="notes_input" placeholder="Add notes here..." />
        <label for="attach-doc" class="form-label mb-0">
            <i class="ri-attachment-2 ri-20px cursor-pointer btn btn-sm btn-text-secondary btn-icon rounded-pill me-2 ms-1 text-heading"></i>
            <input type="file" id="attach-doc" hidden />
        </label>
        <button class="btn btn-primary d-flex send-msg-btn">
            <span class="align-middle" onClick="addNotes()">Add</span>
            <i class="ri-send-plane-line ri-16px ms-md-2 ms-0"></i>
        </button>
    </div>
</div>

<!--Edit Notes Modal-->
<div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body p-0">
            <div class="text-center mb-6">
            <h4 class="mb-2">Edit Note</h4>
            </div>
            <div id="addNewCCForm" class="row g-5">
            <div class="col-12">
                <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                    <input
                    id="note_edit"
                    name="note_edit"
                    class="form-control credit-card-mask"
                    type="text" />
                </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                <input type="text" hidden id="edit_note_id" value="" />
                <button type="submit" class="btn btn-primary" onClick="editNote()">Submit</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const chatMessages = document.querySelectorAll('.chat-message');

    //     chatMessages.forEach(function(message) {
    //         const buttonContainer = message.querySelector('.chat-message-actions');

    //         message.addEventListener('mouseenter', function() {
    //             buttonContainer.classList.remove('d-none');
    //         });

    //         message.addEventListener('mouseleave', function() {
    //             buttonContainer.classList.add('d-none');
    //         });
    //     });
    // });

    document.addEventListener('DOMContentLoaded', function() {
        const chatHistory = document.querySelector('.chat-history');

        // Event delegation: bind event listener to parent element
        chatHistory.addEventListener('mouseenter', function(event) {
            if (event.target.closest('.chat-message')) {
                const message = event.target.closest('.chat-message');
                const buttonContainer = message.querySelector('.chat-message-actions');
                buttonContainer.classList.remove('d-none');
            }
        }, true);

        chatHistory.addEventListener('mouseleave', function(event) {
            if (event.target.closest('.chat-message')) {
                const message = event.target.closest('.chat-message');
                const buttonContainer = message.querySelector('.chat-message-actions');
                buttonContainer.classList.add('d-none');
            }
        }, true);
    });


    function editNote(){
        var id = document.getElementById('edit_note_id').value;

        var edited_note = document.getElementById('note_edit').value;

        $.ajax({
            url: `/notes/update`,
            type: 'POST',
            data:{id,edited_note},
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('note updated successfully');
                window.location.reload();
            },
            error: function(xhr) {
                alert('error updating note');
            }
        });

    }

    function openEdit(note_id){
        // var note = document.getElementById(`note_text_${note_id}`).innerText;

        var edit_note = document.getElementById('note_edit');
        var edit_note_id = document.getElementById('edit_note_id');
        $.ajax({
            url: `/note/details/${note_id}`,
            type: 'GET',
            success: function(response) {
                edit_note.value = response.note_text;
                edit_note_id.value = response.id
            },
            error: function(xhr) {
                alert('error fetching note details');
            }
        });
    }

    function addNotes(){
        var note = document.getElementById('notes_input').value;
        var lead_id = `{{ $id }}`;
        $.ajax({
            url: '/notes/create',
            type: 'POST',
            data : {lead_id,note},
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response);
                var newNoteHTML = `
                    <li class="chat-message mb-3">
                        <div class="d-flex overflow-hidden">
                            <div class="user-avatar flex-shrink-0 me-4">
                                <div class="avatar avatar-sm">
                                    <img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                                </div>
                            </div>
                            <div class="chat-message-wrapper flex-grow-1 position-relative">
                                <div class="chat-message-text">
                                    <p class="mb-0">${response.note_text}</p>
                                </div>
                                <div class="text-muted mt-1">
                                    <small>${response.created_at}</small>
                                    <small>${response.added_by}</small>
                                </div>
                                <!-- Buttons -->
                                <div class="chat-message-actions position-absolute end-0 top-0 d-none">
                                    <button class="btn btn-info btn-sm me-2" onClick="openEdit(${response.id})" data-bs-toggle="modal" data-bs-target="#addNewCCModal">Edit</button>
                                    <button class="btn btn-danger btn-sm ms-2" onClick="deleteNote(${response.id})">Delete</button>
                                </div>
                            </div>
                        </div>
                    </li>`;

                // Append the new note to the chat-history ul
                $('.chat-history').append(newNoteHTML);

                // Clear the input field
                $('#notes_input').val('');
                alert('Note Added successfully!');
            },
            error: function(xhr) {
              alert('An error occurred while adding the note.');
            }
        });
    }

    function deleteNote(note_id){
        if (confirm('Are you sure you want to delete this note?')) {
            $.ajax({
                url: '/notes/delete',
                type: 'DELETE',
                data : {note_id},
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert('Note Deleted Successfully');
                    $(`[data-note-id="${note_id}"]`).remove();

                },
                error: function(error) {
                    alert('Error deleting note',error);
                }
            });
        }
    }
</script>
