<?php

namespace App\Repositories;
use App\Contract\LeadRepositoryInterface;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Services\ElasticServices\ElasticQueryHandler;
use App\Services\ElasticServices\ElasticConstants;
use App\Models\CallLog;
use App\Models\Note;
use App\Models\ActivityLog;


class LeadRepository implements LeadRepositoryInterface{

    public function __construct(Lead $lead,ElasticQueryHandler $handle){
        $this->model = $lead;
        $this->elastic = $handle;
    }

    public function create($data){
        $rules = [
            'lead_name' => 'required|string|max:255',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email',
            'lead_stage' => 'nullable|string',
            'city' => 'required|string',
            'current_state' => 'required|string',
            'lead_owner' => 'required|string',
            'preferred_intake' => 'nullable|string',
            'ielts_score' => 'nullable|numeric|min:0|max:9',
            'sat_score' => 'nullable|integer|min:400|max:1600',
            'lead_status' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'preferred_course_of_study' => 'nullable|string',
            'has_passport' => 'nullable|boolean',
            'preferred_universities' => 'nullable|string',
        ];
        
        $messages = [
            'lead_name.required' => 'Lead Name is required.',
            'phone.required' => 'Phone Number is required.',
            'phone.regex' => 'Phone Number must be 10 digits.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'city.required' => 'City is required.',
            'current_state.required' => 'Current State is required.',
            'lead_owner.required' => 'Lead Owner is required.',
            'ielts_score.numeric' => 'IELTS Score must be a number.',
            'ielts_score.min' => 'IELTS Score must be at least 0.',
            'ielts_score.max' => 'IELTS Score cannot be more than 9.',
            'sat_score.integer' => 'SAT Score must be an integer.',
            'sat_score.min' => 'SAT Score must be at least 400.',
            'sat_score.max' => 'SAT Score cannot be more than 1600.',
            'has_passport.boolean' => 'Has Passport must be true or false.',
        ];        

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            print_r($errors);die;
        }
        else{
            $lead_id = Lead::create($data);
            return $lead_id;
        }

    }

    public function update($updated_fields,$id){
        $update = Lead::where('id',$id)->update($updated_fields);
        if($update){
            return true;
        }
        else{
            return false;
        }
    }

    public function getActivity($id){
        $activity = ActivityLog::where('lead_id',(int)$id)->get();
        if(!empty($activity)){
            return $activity;
        }
        else{
            return array();
        }
    }

    public function massUpdate(){

    }

    public function delete($id){
        $lead = Lead::where('id', (int)$id)->first();
        if ($lead->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public function getLeadDetails($id){

        $leadDetails = Lead::where('id', (int)$id)->get();
        if($leadDetails){
            return $leadDetails;
        }
        else{
            return false;
        }
    }

    public function changeStatus(){

    }

    public function list($page,$per_page,$search,$orderColumnIndex,$orderDirection,$draw){
        $columns = [
            'id', 
            'lead_name', 
            'email', 
            'phone', 
            'lead_status', 
            'lead_stage', 
            'current_state', 
            'city', 
            'preferred_course_of_study', 
            'sat_score', 
            'ielts_score', 
            'has_passport', 
            'work_experience', 
            'preferred_intake', 
            'preferred_universities', 
            'lead_owner', 
            'created_at', 
            'updated_at'
        ];

        $count = Lead::count();
        $query = Lead::query();
        
        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('lead_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if (isset($columns[$orderColumnIndex])) {
            $query->orderBy($columns[$orderColumnIndex], $orderDirection);
        }
        
        $filteredCount = $query->count();
        
        $leads = $query->skip($page * $per_page)->take($per_page)->get();

        $data = $leads->map(function ($lead) {
            return [
                'id' => $lead->id,
                'lead_name' => $lead->lead_name,
                'email' => $lead->email,
                'phone' => $lead->phone,
                'lead_status' => $lead->lead_status,
                'lead_stage' => $lead->lead_stage,
                'current_state' => $lead->current_state,
                'city' => $lead->city,
                'preferred_course_of_study' => $lead->preferred_course_of_study,
                'sat_score' => $lead->sat_score,
                'ielts_score' => $lead->ielts_score,
                'has_passport' => $lead->has_passport ? 'Yes' : 'No',
                'work_experience' => $lead->work_experience,
                'preferred_intake' => $lead->preferred_intake,
                'preferred_universities' => $lead->preferred_universities,
                'lead_owner' => $lead->lead_owner,
                'created_at' => $lead->created_at->format('Y-m-d'),
                'updated_at' => $lead->updated_at->format('Y-m-d'),
                'action' => '<div class="row"><button class="btn btn-info" onClick="openModal('.$lead->id.')" data-bs-toggle="modal" data-bs-target="#editDetailsModal">Edit</button><button class="btn btn-danger" onClick="deleteLead('.$lead->id.')" class="dropdown-item delete-lead">Delete</button></div>'
            ];
        });

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $filteredCount,
            'data' => $data
        ]);
    }

    public function getDataElastic($filters){
        $filter_arr  = json_decode($filters,true);
        $query = ['bool' => ['must' => []]];
        
        foreach ($filter_arr as $filter) {
            $filterName = $filter['filterName'];
            $selectedOption = $filter['selectedOption'];
            $inputValue = $filter['inputValue'];
        
            switch ($selectedOption) {
                case 1: // "is"
                        $query['bool']['must'][] = ['match' => [$filterName => $inputValue]];
                        break;
                case 2: // "isn't"
                        $query['bool']['must'][] = ['bool' => ['must_not' => ['match' => [$filterName => $inputValue]]]];
                        break;
                case 3: // "is empty"
                        $query['bool']['must'][] = ['bool' => ['must_not' => ['exists' => ['field' => $filterName]]]];
                        break;
                    case 4: // "isn't empty"
                        $query['bool']['must'][] = ['exists' => ['field' => $filterName]];
                        break;
            }
        }
             
        // print_r($query);die;
        $result = $this->elastic->search($query);
        return json_decode(json_encode($result));
    }

    public function getCallDetails($lead_id){

        $call_details = CallLog::where('lead_id', (int)$lead_id)
        ->select('call_type', 'call_from', 'call_start_time', 'time_duration','id','call_status')
        ->get();
        return $call_details;
    }

    public function getNotes($lead_id){
        $notes = Note::where('lead_id',(int)$lead_id)->get();
        return $notes;
    }

}