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
}
