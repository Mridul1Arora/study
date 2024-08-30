<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract\LeadRepositoryInterface;


class LeadController extends Controller
{
    public function __construct(LeadRepositoryInterface $leadrepo){
        $this->repo = $leadrepo;
    }

    // public function testConnection(){
    //     $lead = LeadModel::create([
    //         'name' => 'John Doe',
    //         'email' => 'john.doe@example.com',
    //         'phone' => '123-456-7890',
    //     ]);

    //     $leadFromDb = LeadModel::where('email', 'john.doe@example.com')->first();

    //     return response()->json([
    //         'status' => 'success',
    //         'lead' => $leadFromDb
    //     ]);
    // }

    public function index () {
        $data = request()->all();
        print_r($data);die;
        $leads = $this->repo->list();
    }
}


