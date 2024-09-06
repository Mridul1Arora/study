<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract\LeadRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\LeadModel;
use App\Models\FieldsModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LeadsImport;
use App\Services\ElasticServices\ElasticQueryHandler;

class LeadController extends Controller
{
    public function __construct(LeadRepositoryInterface $leadrepo){
        $this->repo = $leadrepo;
    }

    public function import()
    {
        $query = new ElasticQueryHandler();
        // $query->createIndex();
        // $query->syncLeads();
        $query->search('Emily Johnson');
    }

    public function index (Request $request) {
        $page = $request->input('page') ?? 1;
        $per_page = $request->input('per_page') ?? 10;
        $count = LeadModel::count();
        $fields = FieldsModel::all();
        $page_count = intval(round($count/$per_page));
        $leads = $this->repo->list($per_page,$page);
        return view('pages.lead',['leads'=>$leads,'fields'=>$fields,'per_page'=>$per_page,'page'=>$page,'count'=>$count,'page_count'=>$page_count]);
    }

    public function getLeads (Request $request) {
        $page = $request->input('page') ?? 1;
        $per_page = $request->input('per_page') ?? 10;
        $filters = $request->input('filter_data');
        if(!empty($filters)){
            $offset = ($page - 1) * $per_page;
            $filter_query = $this->repo->createFilterQuery($filters);
            $count_filtered = count($filter_query);
            $paginated_items = array_slice($filter_query, $offset, $per_page);
        }
        $count = LeadModel::count();
        $page_count = round($count/$per_page);
        $leads = $this->repo->list($per_page,$page);
        if(!empty($filters)){
            return ['leads'=>$paginated_items,'per_page'=>$per_page,'page'=>$page,'count'=>$count,'page_count'=>round($count_filtered/$per_page)];
        }
        else{
           return ['leads'=>$leads,'per_page'=>$per_page,'page'=>$page,'count'=>$count,'page_count'=>$page_count];
        }
    }

    public function create(Request $request){
        $data = $request->all();
        $lead_id = $this->repo->create($data);
    }

    public function update(Request $request){
        $fields = $request->all();
        $lead_id = $request->input('lead_id');
        $excludedFields = ['_token', 'lead_id'];

        $lead = LeadModel::find($request->lead_id);

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

    public function getLead($id){
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


