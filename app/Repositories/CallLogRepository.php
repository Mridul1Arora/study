<?php

namespace App\Repositories;
use App\Contract\CallLogRepositoryInterface;
use App\Models\CallLog;
use App\Constants\CallLogConstants;

class CallLogRepository implements CallLogRepositoryInterface{

    public function __construct(CallLog $log){
        $this->model = $log;
    }

    public function create($data){
        try {
            $call = $this->model;
            $call->lead_id = $data['lead_id'];
            $call->call_to = $data['call_to'];
            $call->call_from = $data['call_from'];
            $call->call_type = $data['call_type'];
            $call->time_duration = $data['time_duration'];
            $call->call_start_time = $data['call_start_time'];
            $call->call_purpose = $data['call_purpose'];
            $call->call_agenda = $data['call_agenda'];
            $call->call_result = $data['call_result'];
            $call->description = $data['call_desc'];
            $call->call_status = $data['call_status'];
            $call->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update($updated_fields,$id){
        $update = $this->model->where('id',$id)->update($updated_fields);
        if($update){
            return true;
        }
        else{
            return false;
        }
    }

    public function list($page,$per_page,$search,$orderColumnIndex,$orderDirection,$draw){

        $call_purposes = CallLogConstants::CALL_PURPOSES;
        $call_results = CallLogConstants::CALL_RESULTS;
        $call_types = CallLogConstants::CALL_TYPES;
        
        $columns = [
            'id', 
            'call_to', 
            'call_from', 
            'call_type', 
            'call_start_time', 
            'time_duration', 
            'call_purpose', 
            'call_agenda', 
            'call_result', 
            'description', 
            'call_status', 
            'created_at', 
            'updated_at'
        ];
        
        // Apply sorting and filtering
        $query = $this->model->query();

        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('call_to', 'like', "%{$search}%")
                ->orWhere('call_from', 'like', "%{$search}%");
            });
        }
        
        if (isset($columns[$orderColumnIndex])) {
            $query->orderBy($columns[$orderColumnIndex], $orderDirection);
        }
        
        // Get total count and filtered count
        $totalCount = $this->model->count();
        $filteredCount = $query->count();
        
        // Fetch paginated and filtered data
        $list = $query->get();
        
        $data = $list->map(function ($item) use ($call_types, $call_purposes, $call_results) {
            return [
                'call_to' => $item->call_to,
                'call_from' => $item->call_from,
                'call_type' => $call_types[$item->call_type], // Correct access
                'call_start_time' => $item->call_start_time,
                'call_purpose' => $call_purposes[$item->call_purpose], // Correct access
                'call_agenda' => $item->call_agenda,
                'call_result' => $call_results[$item->call_result], // Correct access
                'description' => $item->description,
                'call_status' => $item->call_status,
                'created_at' => $item->created_at->format('Y-m-d'),
                'updated_at' => $item->updated_at->format('Y-m-d'),
                'time_duration' => $item->time_duration,
                'action' => '<div class="row"><button class="btn btn-info" onClick="openEditModal('.$item->id.')" data-bs-toggle="modal" data-bs-target="#editDetailsModal">Edit</button></div>'
            ];
        });
        
        $response = [
            'draw' => $draw,
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $filteredCount,
            'data' => $data->toArray()
        ];
        
        return response()->json($response);
        

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $filteredCount,
            'data' => $data
        ]);
    }

    public function getDetails($log_id){
        $log_details = $this->model->where('id',(int)$log_id)->get()->first();
        return $log_details;
    }
}