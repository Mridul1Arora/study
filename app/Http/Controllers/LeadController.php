<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract\LeadRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Lead;
use App\Models\Field;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LeadsImport;
use App\Services\ElasticServices\ElasticQueryHandler;
use App\Constants\CallLogConstants;


class LeadController extends Controller
{
    public function __construct(LeadRepositoryInterface $leadrepo){
        $this->repo = $leadrepo;
    }

    public function import()
    {
        // $query = new ElasticQueryHandler();
        // $query->createIndex();
        // $query->syncLeads();
    }

    public function index (Request $request) {
        $page = $request->input('page') ?? 1;
        $per_page = $request->input('per_page') ?? 10; 
        $count = Lead::count();
        $leads = $request->input('leads') ?? '';
        $filters = $request->input('filters') ?? '';
        if(!empty($leads)){
            $leads = json_decode($leads);
        }
        $fields = Field::where('module_id', 1)->get();
        $page_count = intval(round($count/$per_page));
        if(!empty($filters)){
            return view('pages.lead',['filters'=>$filters,'fields'=>$fields,'per_page'=>$per_page,'page'=>$page,'count'=>$count,'page_count'=>$page_count]);
        }
        return view('pages.lead',['fields'=>$fields,'per_page'=>$per_page,'page'=>$page,'count'=>$count,'page_count'=>$page_count]);
    }
    
    public function getLeads(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->input('start', 0) / $request->input('length', 10);
            $per_page = $request->input('length', 10);
            $search = $request->input('search.value');
            $orderColumnIndex = $request->input('order.0.column');
            $orderDirection = $request->input('order.0.dir');
            $draw = $request->input('draw');
            $filters = $request->input('filters');

            $filter_arr = json_decode($filters);
            if(!empty($filter_arr)){
                $output = $this->repo->getDataElastic($filters);
                return response()->json([
                    'draw' => (int)$draw,
                    'data' => $output
                ]);
            }
            else{
                $output = $this->repo->list($page,$per_page,$search,$orderColumnIndex,$orderDirection,$draw);
                return $output;
            }
        }
    }

    public function create(Request $request){
        $data = $request->all();
        $lead_id = $this->repo->create($data);
    }

    public function update(Request $request){
        $fields = $request->all();
        $lead_id = intval($request->input('id'));
        $excludedFields = ['_token', 'id'];
        $lead = Lead::where('id', $lead_id)->first();
        if($lead){
            foreach ($fields as $key => $value) {
                if(!in_array($key,$excludedFields)){
                    if ($lead->$key !== $value) {
                        $lead->$key = $value;
                    }
                }
            }
        }
        else{
            return response()->json(['success'=>false,'message'=>'Lead Not Found'],404);
        }
        $updatedFields = $lead->getDirty();
        
        $update = $this->repo->update($updatedFields,$lead_id);
        if($update){
            return response()->json(['success' => true, 'message' => 'Lead updated successfully']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Error updating the lead']);
        }
    }

    public function getDetailsPage($id){

        $call_purposes = CallLogConstants::CALL_PURPOSES;
        $call_results = CallLogConstants::CALL_RESULTS;
        $call_types = CallLogConstants::CALL_TYPES;
        $call_details = $this->repo->getCallDetails($id);
        $notes = $this->repo->getNotes($id);
        return view('pages/lead-id',['call_purposes'=>$call_purposes,'call_results'=>$call_results,'call_types'=>$call_types,'id'=>$id,'call_details'=>$call_details,'notes'=>$notes]);
    }

    public function getLeadDetails($id){
        $leadDetails = $this->repo->getLeadDetails($id);
        if(!empty($leadDetails)){
            return response()->json(['success' => true, 'message' => 'Lead details found.','data'=>$leadDetails]);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Lead Not Found'],404);
        }
    }

    public function destroy($id){
        $delete = $this->repo->delete($id);
        if($delete){
            return response()->json(['success' => true, 'message' => 'Lead deleted successfully.']);
        }
        else{
            return response()->json(['success' => false, 'message' => 'Lead not found.'], 404);
        }
    }
}


