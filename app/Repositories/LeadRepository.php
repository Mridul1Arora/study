<?php

namespace App\Repositories;
use App\Contract\LeadRepositoryInterface;
use App\Models\LeadModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Services\ElasticServices\ElasticQueryHandler;
use App\Services\ElasticServices\ElasticConstants;


class LeadRepository implements LeadRepositoryInterface{

    public function __construct(LeadModel $lead,ElasticQueryHandler $handle){
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
            $lead_id = LeadModel::create($data);
            return $lead_id;
        }

    }

    public function update($updated_fields,$id){
        $update = LeadModel::where('_id',$id)->update($updated_fields);
        if($update){
            return true;
        }
        else{
            return false;
        }
    }

    public function massUpdate(){

    }

    public function delete($id){
        $lead = LeadModel::find($id);
        if ($lead->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public function getLeadDetails($id){
        $leadDetails = LeadModel::findOrFail($id);
        if($leadDetails){
            return $leadDetails;
        }
        else{
            return false;
        }
    }

    public function changeStatus(){

    }

    public function list($per_page=10,$page=1){
        $offset = ($page - 1) * $per_page;
        $leads = $this->model->where('id', '>', 0)
        ->skip($offset)
        ->take($per_page) 
        ->get();
        $totalCount = $this->model->count();
        return $leads;
    }

    public function createFilterQuery($filters){
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
        return $result;
    }

}