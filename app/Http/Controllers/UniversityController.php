<?php

namespace App\Http\Controllers;

use App\Contract\UniversityRepositoryInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\University;

class UniversityController extends Controller
{
    protected $repository;

    public function __construct(UniversityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index() 
    {
        return view('university.index');
    }

    public function getUniversity(Request $request)
    {
        return $this->repository->getUniversitiesDetails();
        
    }

    public function getUniversityDetails($id)
    {
        $data = $this->repository->getUniversityDetailView($id);
        return view('university.university-details', compact('data'));
    }

    public function getCountries()
    {
        return $this->repository->getUniversitiesCountries();
    }

    public function getStates($countryId)
    {
        return $this->repository->getUniversitiesStates($countryId);
    }

    public function getCities($stateId)
    {
        return $this->repository->getUniversitiesCities($stateId);
    }

    public function addNewUniversityDetails(Request $request)
    {
        $data = [
            'university_name' => $request->input('name'),
            'cd_id' => $request->input('cd_id'),
            'country_id' => $request->input('country'),
            'state_id' => $request->input('state'),
            'college_id' => $request->input('college_id'),
            'campus_location' => $request->input('campus_location'),
            'city' => $request->input('city'),
            'city_2' => $request->input('city_2'),
            'description' => $request->input('desc')
        ];
     
        return $this->repository->addNewUniversity($data);
    }

    public function handleAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:ED,D',
            'data' => 'required|array',
        ]);

        $actionCode = $request->input('action');
        $data = $request->input('data');

        switch ($actionCode) {
            case 'ED':
                return $this->repository->editUniversity($data);
                break;

            case 'D':
                return $this->repository->deleteUniversity($data);
                break;

            default:
                return response()->json(['success' => false, 'message' => 'Invalid action code.'], 400);
        }
    }
}