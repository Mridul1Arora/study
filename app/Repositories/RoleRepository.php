<?php

namespace App\Repositories;

use App\Contract\RoleRepositoryInterface;
use App\Models\Roles;
use App\Models\Role;
// use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Models\Activity;
use App\Constant\PermissionConstant;
use DB;

class RoleRepository implements RoleRepositoryInterface 
{
    protected $model;

    public function __construct(Roles $role)
    {
        $this->model = $role;
    }

    public function all()
    {
        return $this->model->all();
       
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
        $modulePermissions = DB::table('core_permission_module_mapper')
            ->join('modules', 'core_permission_module_mapper.module_id', '=', 'modules.id')
            ->join('core_permissions', 'core_permission_module_mapper.core_permission_id', '=', 'core_permissions.id')
            ->select('modules.id as module_id', 'modules.module_name', 'core_permissions.name as permission_name')
            ->get();
    
        return $modulePermissions;
    }    

    public function getmodulerelatedPermissoin() {
        $moduleSpecificPermissions = DB::table('core_permissions')
            ->where('module_specific', PermissionConstant::MODULE_SPECIFIC)
            ->select('name', 'id')
            ->get();
        return $moduleSpecificPermissions;
    }

    public function updateCorePermissions($corPermissoinId, $moduleId){
        if($corPermissoinId && $moduleId) {
            $updated = DB::table('core_permission_module_mapper')
                ->where('module_id', $moduleId)
                ->update(['core_permission_id' => $corPermissoinId]);
            return $updated;
        }
    }

    public function getDataSharingRules() {

        $data = DB::table('role_data_sharing_map')
            ->join('roles as from_role', 'role_data_sharing_map.role_id_from', '=', 'from_role.id')
            ->join('roles as to_role', 'role_data_sharing_map.role_id_to', '=', 'to_role.id')
            ->join('core_permissions', 'role_data_sharing_map.core_permission_id', '=', 'core_permissions.id')
            ->join('modules', 'role_data_sharing_map.module_id', '=', 'modules.id')
            ->select(
                'role_data_sharing_map.id as rule_id',
                'role_data_sharing_map.module_id',
                'role_data_sharing_map.rule_name',
                'modules.module_name as module_name',
                'core_permissions.name as permission_name',
                'core_permissions.id as core_premission_id',
                'from_role.name as from_role_name',
                'from_role.id as from_role_id',
                'to_role.name as to_role_name',
                'to_role.id as to_role_id'
            )
            ->where('core_permissions.module_specific', PermissionConstant::MODULE_SPECIFIC)
            ->get();
    
        $formattedData = [];

        foreach ($data as $item) {
            $formattedData[$item->module_id][] = [
                'rule_id' => $item->rule_id,
                'module_name' => $item->module_name,
                'rule_name' => $item->rule_name,
                'permission_name' => $item->permission_name,
                'permission_id' => $item->core_premission_id,
                'from_role' => $item->from_role_name,
                'from_role_id' => $item->from_role_id,
                'to_role' => $item->to_role_name,
                'to_role_id' => $item->to_role_id
            ];
        }
        return $formattedData;
    }

    public function getDataSharingRule($moduleId) 
    {
        $data['core_permission'] = DB::table('core_permissions')
            ->select(['id','name'])
            ->where('core_permissions.module_specific', PermissionConstant::MODULE_SPECIFIC)->get();

        $data['roles'] = DB::table('roles')->select(['id','name'])->get();

        return $data;
    }

    public function updateRuleSetting($ruleName,$fromRole, $toRole, $permissionId, $moduleId, $ruleId) 
    {
        $res='';
        $currentTimestamp = now();
        if ($ruleId) {
            $res = DB::table('role_data_sharing_map')
                ->where('id', $ruleId)
                ->update([
                    'rule_name' => $ruleName,
                    'role_id_from' => $fromRole,
                    'role_id_to' => $toRole,
                    'core_permission_id' => $permissionId,
                    'updated_at' => $currentTimestamp,
                ]);
        } else {
            $res = DB::table('role_data_sharing_map')
                ->insert([
                    'rule_name' => $ruleName,
                    'role_id_from' => $fromRole,
                    'role_id_to' => $toRole,
                    'core_permission_id' => $permissionId,
                    'module_id' => $moduleId,
                    'created_at' => $currentTimestamp,
                    'updated_at' => $currentTimestamp,
                ]);
        }
        return $res;
    }

    public function deleteRules($ruleId) 
    {
        $deleted = DB::table('role_data_sharing_map')->where('id', $ruleId)->delete();
        return $deleted;
    }

    public function addNewRoles($role_name, $reporting_role, $description) 
    {
        $role = new Role();
        $role->name = $role_name;
        $role->parent_id = $reporting_role;
        $role->desc = $description;
        $role->save();

        return $role;
    }

    public function getAllRolePermissions() {
        $data['roles'] = Role::all();
        $data['permissions'] = DB::table('permissions')->select(['id','name'])->get();

        return $data;
       
    }

    public function getRoleRelatedPermission($id)
    {
        $data['roleData'] = Role::find($id);
        $data['relatedPermission'] = DB::table('role_has_permissions')
            ->where('role_id', $id)
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->select(['permissions.id','permissions.name'])
            ->get();
           
        $relatedPermissionIds = $data['relatedPermission']->pluck('id')->toArray();

        $data['allPermissions'] = DB::table('permissions')
            ->whereNotIn('id', $relatedPermissionIds)
            ->select(['id', 'name'])
            ->get(); 
   
        return $data;
    }

    public function updatePermissionForRole($role_id,$related_permissions, $new_permissions)
    {

        $role = Role::findOrFail($role_id);

        if (!empty($related_permissions)) {
           // $role->permissions()->sync($related_permissions);       
        }

        if (!empty($new_permissions)) {
            foreach ($new_permissions as $permissionId) {
dump($permissionId);
            }
        }

        return response()->json(['success' => 'Permissions updated successfully']);
    }
}
