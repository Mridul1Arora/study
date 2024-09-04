<?php

namespace App\Repositories;

use App\Contract\RoleRepositoryInterface;
use App\Models\Roles;
use App\Models\Role;
// use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Models\Activity;

class RoleRepository implements RoleRepositoryInterface 
{
    protected $model;

    public function __construct(Roles $role)
    {
        $this->model = $role;
    }

    public function all()
    {
        $role_id = auth()->user()->id;
        return $this->model->find($role_id);
       
    }
    public function find($id)
    {
        $permission_list = auth()->user()->getAllPermissions();
        $role = $this->model->find($id);
    
        return [
            'permission_list' => $permission_list,
            'role' => $role
        ];
    }
    

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $role = $this->model->find($id);
        if ($role) {
            $role->update($data);
            return $role;
        }
        return null;
    }

    public function delete($id)
    {
        $role = $this->model->find($id);
        if ($role) {
            $role->delete();
            return true;
        }
        return false;
    }

    public function addPermission($data) 
    {
        $permission = $data->all(); 
        $user = auth()->user();
        $role = $user->roles()->first();
        if ($role) {
            //Permission::create(['name' => $permission['permissionName']]);
            //$permissions = Permission::findByName($permission['permissionName']);
            //$role->givePermissionTo($permissions);

            return['success' => 'permission created'];
        }
        return['error' => 'premission not created'];    
    }

    public function getRoleHierarchy(Role $role1)
    {
        $userRole = auth()->user()->roles()->first();
      
        $children = $role1->children;
        $result = [
            'role' => $role1,
            'children' => []
        ];

        foreach ($children as $child) {
            $result['children'][] = $this->getRoleHierarchy($child);
        }

        return $result;
    }

    public function getAllUsersInHierarchy($role, &$users = [])
    {
        $users = array_merge($users, $role->users->toArray());

        foreach ($role->children as $childRole) {
            $this->getAllUsersInHierarchy($childRole, $users);
        }

        return $users;
    }

    public function getModulePermissions() {
        $modulePermissions = \DB::table('core_permission_module_mapper')
            ->join('modules', 'core_permission_module_mapper.module_id', '=', 'modules.id')
            ->join('core_permissions', 'core_permission_module_mapper.core_permission_id', '=', 'core_permissions.id')
            ->select('modules.id as module_id', 'modules.module_name', 'core_permissions.name as permission_name')
            ->get();
    
        return $modulePermissions;
    }    

    public function getmodulerelatedPermissoin() {
        $moduleSpecificPermissions = \DB::table('core_permissions')
            ->where('module_specific', 1)
            ->select('name', 'id')
            ->get();
        return $moduleSpecificPermissions;
    }

    public function updateCorePermissions($corPermissoinId, $moduleId){
        if($corPermissoinId && $moduleId) {
            $updated = \DB::table('core_permission_module_mapper')
                ->where('module_id', $moduleId)
                ->update(['core_permission_id' => $corPermissoinId]);
            return $updated;
        }

    }
}
