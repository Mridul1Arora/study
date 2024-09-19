<?php
namespace App\Repositories;

use App\Contract\UniversityRepositoryInterface;
use App\Models\University;
use Yajra\DataTables\DataTables;
use DB;

class UniversityRepository implements UniversityRepositoryInterface
{
    protected $model;

    public function __construct(University $university)
    {
        $this->model = $university;
    }
    public function getUniversitiesDetails()
    {
        $universities = $this->model
            ->select([
                'universities.id',
                'universities.name',
                'universities.cd_id',
                'universities.college_id',
                'universities.city_2',
                'universities.campus_location',
                'universities.desc',
                'study_abroad_city.city_name',
                'study_abroad_state.state_name',
                'study_abroad_country.country_name',
                'owner.name as owner_name',
                'modifier.name as modified_by_name'
            ])
            ->leftJoin('study_abroad_city', 'study_abroad_city.city_id', '=', 'universities.city_id') 
            ->leftJoin('study_abroad_state', 'study_abroad_state.state_id', '=', 'universities.state_id')
            ->leftJoin('study_abroad_country', 'study_abroad_country.country_id', '=', 'universities.country_id')
            ->leftJoin('users as owner', 'owner.id', '=', 'universities.university_owner')
            ->leftJoin('users as modifier', 'modifier.id', '=', 'universities.modified_by')
            ->get();

        return DataTables::of($universities)->make(true);
    }
    
    public function getUniversitiesCountries()
    {
        $countries = DB::table('study_abroad_country')->select(['country_id','country_name'])->get();
        return response()->json(['countries' => $countries]);
    }

    public function getUniversitiesStates($countryId)
    {
        $states = DB::table('study_abroad_state')
            ->select(['state_id','state_name'])
            ->where('country_id', $countryId)
            ->get();
        return response()->json(['states' => $states]);
    }

    public function getUniversitiesCities($stateId)
    {
        $cities = DB::table('study_abroad_city')
            ->select(['city_id','city_name'])
            ->where('state_id', $stateId)
            ->get();
        return response()->json(['cities' => $cities]);
    }

    public function addNewUniversity($data)
    {
        $university = $this->model->create([
            'name' => $data['university_name'],
            'cd_id' => $data['cd_id'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'college_id' => $data['college_id'],
            'campus_location' => $data['campus_location'],
            'city_id' => $data['city'],
            'city_2' => $data['city_2'],
            'desc' => $data['description'],
            'university_owner' => auth()->user()->id,
        ]);

        return $university;
    }

    public function getUniversityDetailView($uni_id)
    {
        $university = $this->model
            ->select([
                'universities.*',
                'users.name as owner_name', 
                'modifier.name as modified_by_name', 
                'study_abroad_city.city_name', 
                'study_abroad_state.state_name', 
                'study_abroad_country.country_name'
            ])
            ->leftJoin('users', 'users.id', '=', 'universities.university_owner')
            ->leftJoin('users as modifier', 'modifier.id', '=', 'universities.modified_by')
            ->leftJoin('study_abroad_city', 'study_abroad_city.city_id', '=', 'universities.city_id')
            ->leftJoin('study_abroad_state', 'study_abroad_state.state_id', '=', 'universities.state_id')
            ->leftJoin('study_abroad_country', 'study_abroad_country.country_id', '=', 'universities.country_id')
            ->where('universities.id', $uni_id)
            ->first();

        return $university;
    }

    public function editUniversity($data)
    {
        $university = $this->model->find($data['university_id']);
        
        if (!$university) {
            return response()->json(['success' => false, 'message' => 'University not found.'], 404);
        }
        
        $university->update([
            'name' => $data['name'],
            'cd_id' => $data['cd_id'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'college_id' => $data['college_id'],
            'campus_location' => $data['campus_location'],
            'city_id' => $data['city_id'],
            'city_2' => $data['city_2'],
            'desc' => $data['desc'],
            'modified_by' => auth()->user()->id,
        ]);
        
        return response()->json(['success' => true, 'message' => 'University details updated successfully!']);
    }


    public function deleteUniversity($data)
    {
        $university = $this->model->find($data['university_id']);
        
        if (!$university) {
            return response()->json(['success' => false, 'message' => 'University not found.'], 404);
        }
        $university->delete();
        return response()->json(['success' => true, 'message' => 'University deleted successfully!']);
    }


}