<?php

namespace App\Contract;

//use Spatie\Permission\Models\Role;
use App\Models\Roles;
use App\Models\Role;

interface RoleRepositoryInterface 
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function addPermission($data);
    public function getRoleHierarchy(Role $role);
    public function getAllUsersInHierarchy(Role $role);
    public function getmodulepermissions();
    public function getmodulerelatedPermissoin();
    public function updateCorePermissions($id1,$id2);
    public function getDataSharingRules();
    public function getDataSharingRule($id);
    public function updateRuleSetting($id1,$id2,$id3,$id4,$id5,$id6);
}
