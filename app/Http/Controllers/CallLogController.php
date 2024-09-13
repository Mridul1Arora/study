<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use App\Contract\CallLogRepositoryInterface;
use App\Models\Lead;
use App\Models\CallLog;

class CallLogController extends Controller
{
    public function __construct(CallLogRepositoryInterface $callrepo){
        $this->repo = $callrepo;
    }

    public function index(){
        // $user = auth()->user()->id; dd($user);
        $fields = Field::where('module_id', 2)->get();
        return view('pages.call-log',['fields'=>$fields]);
    }

    public function create(Request $request){
        $data = [];
        // dd($request->all());

        $call_to = $request->input('call_to');
        $call_to_uname = Lead::where('id',(int)$call_to)->pluck('lead_name')->first();
        $data['lead_id'] = $call_to;
        $data['call_to'] = $call_to_uname;
        $data['call_from'] = auth()->user()->name;
        $data['call_type'] = $request->input('callType');
        $data['call_status'] = $request->input('callStatus');
        $data['call_purpose'] = $request->input('callPurpose');
        $data['call_result'] = $request->input('callResult');
        $data['call_start_time'] = $request->input('callStartTime');
        $data['call_agenda'] = $request->input('callAgenda');
        $data['call_desc'] = $request->input('callDesc');
        $data['time_duration'] = $request->input('timeDuration');

        $create = $this->repo->create($data);
        if($create){
            return true;
        }
        else{
            return false;
        }
    }

    public function list(Request $request){
        $page = $request->input('start', 0) / $request->input('length', 10);
        $per_page = $request->input('length', 10);
        $search = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');
        $draw = $request->input('draw');
        $list = $this->repo->list($page,$per_page,$search,$orderColumnIndex,$orderDirection,$draw);
        return $list;
    }

    public function getDetails($log_id){
       $details = $this->repo->getDetails($log_id);
       return $details;
    }

    public function update(Request $request){
        $fields = $request->all();
        $log_id = intval($request->input('log_id'));
        $excludedFields = ['_token', 'log_id'];
        $log = CallLog::where('id', $log_id)->first();
        if($log){
            foreach ($fields as $key => $value) {
                if(!in_array($key,$excludedFields)){
                    if ($log->$key !== $value) {
                        $log->$key = $value;
                    }
                }
            }
        }
        else{
            return response()->json(['success'=>false,'message'=>'Call Log Not Found'],404);
        }
        $updatedFields = $log->getDirty();

        $update = $this->repo->update($updatedFields,$log_id);
        if($update){
            return response()->json(['success' => true, 'message' => 'Call log updated successfully']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Error updating the Log']);
        }
    }
}
