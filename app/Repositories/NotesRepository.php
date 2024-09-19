<?php

namespace App\Repositories;
use App\Contract\NotesRepositoryInterface;
use App\Models\Note;

class NotesRepository implements NotesRepositoryInterface{

    public function __construct(Note $note){
        $this->model = $note;
    }

    public function create($data){
        $note_id = $this->model->firstOrCreate($data);
        if($note_id){
            return true;
        }
        else{
            return false;
        }
    }

    public function update($note_id,$edited_note){
        $note = $this->model->find($note_id);
        if($note){
            $fields = [];
            $fields['updated_at'] = now();
            $fields['note_text'] = $edited_note;
            $update = $this->model->where('id',(int)$note_id)->update($fields);
        }
        else{
            return response()->json('note not found');
        }
        return $update;
    }

    public function getDetails($note_id){
        $details = $this->model->where('id',(int)$note_id)->first();
        if(!empty($details)){
            return $details;
        }
        else{
            return [];
        }
    }

    public function delete($note_id){
        $delete = $this->model->destroy($note_id);
        if($delete){
            return true;
        }
        else{
            return false;
        }
    }

}

?>