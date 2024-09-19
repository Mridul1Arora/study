<?php

namespace App\Contract;

Interface NotesRepositoryInterface {
    public function create($data);
    public function update($note_id,$edited_note);
    public function delete($note_id);
}
?>