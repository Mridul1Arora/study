<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract\NotesRepositoryInterface;
use App\Models\Note;

class NotesController extends Controller
{
    public function __construct(NotesRepositoryInterface $notes){
        $this->notes = $notes;
    }


    public function create(Request $request){
        $data = [];
        $data['lead_id'] = $request->input('lead_id');
        $data['note_text'] = $request->input('note');
        $data['added_by'] = auth()->user()->name;
        $data['created_at'] = now();
        $data['updated_at'] = now();

        // $note_id = $this->notes->create($data);

        $note = Note::create($data);
        if($note){
            return response()->json($note);
        }
        else{
            return false;
        }
    }

    public function getDetails($note_id){
        $details = $this->notes->getDetails($note_id);
        return response()->json($details);
    }

    public function update(Request $request){
        $note_id = $request->input('id');
        $edited_note = $request->input('edited_note');
        $update = $this->notes->update($note_id,$edited_note);
        if(!empty($update)){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete(Request $request){
        $note_id = $request->input('note_id');
        $delete = $this->notes->delete($note_id);
        if($delete){
            return true;
        }
        else{
            return false;
        }
    }
}
