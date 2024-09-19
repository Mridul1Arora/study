<?php
namespace App\Contract;

interface UniversityRepositoryInterface
{
    public function getUniversitiesDetails();
    public function getUniversitiesCountries();
    public function getUniversitiesStates($countyId);
    public function getUniversitiesCities($stateId);
    public function addNewUniversity(array $data);
    public function getUniversityDetailView($uni_id);
    public function editUniversity(array $data);
    public function deleteUniversity(array $data);
}