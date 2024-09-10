<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Contract\RoleRepositoryInterface;


class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string|max:255',
        ]);

        $this->roleRepository->create($request->all());

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = $this->roleRepository->find($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string|max:255',
        ]);

        $this->roleRepository->update($id, $request->all());

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $this->roleRepository->delete($id);
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }

    public function permisssionCreate(Request $request) 
    {
        $validated = $request->validate([
            'permissionName' => 'required|string|max:255',
        ]);

        return $this->roleRepository->addPermission($request);
    }

    public function showRoleHierarchy()
    {
        $userRole = auth()->user()->roles()->first(); 

        if ($userRole) {
            $hierarchy = $this->roleRepository->getRoleHierarchy($userRole);
            $roles = $this->roleRepository->all();
            return view('roles.role-hierarchy', ['hierarchy' => $hierarchy, 'roles' => $roles]);
        }

        return view('roles.role-hierarchy', ['hierarchy' => [], 'roles' =>[]]);
    }


    public function showRoleDetails($id) 
    {
        $userRole = Role::find($id);

        if ($userRole) {
            $users = $this->roleRepository->getAllUsersInHierarchy($userRole);

            $parentRoleName = $userRole->parent ? $userRole->parent->name : null;
            $modulepermission = $this->roleRepository->getmodulepermissions();
            $moduleSpecificPermissions = $this->roleRepository->getmodulerelatedPermissoin();
            $dataSharingRules = $this->roleRepository->getDataSharingRules();

            return view('roles.role-info', [
                'userRole' => $userRole,
                'users' => $users,
                'parentRoleName' => $parentRoleName,
                'modulepermission' => $modulepermission,
                'moduleSpecificPermissions' => $moduleSpecificPermissions,
                'dataSharingRules' => $dataSharingRules
            ]);
        }

        return view('roles.role-info', [
            'userRole' => [],
            'users' => [],
            'parentRoleName' => null,
            'modulepermission' => [],
            'moduleSpecificPermissions' => [],
            'dataSharingRules' => []
        ]);
    }

    public function showRuleDetails() {
        $modulepermission = $this->roleRepository->getmodulepermissions();
        $moduleSpecificPermissions = $this->roleRepository->getmodulerelatedPermissoin();
        $dataSharingRules = $this->roleRepository->getDataSharingRules();

        return view('roles.data-sharing', [
            'modulepermission' => $modulepermission,
            'moduleSpecificPermissions' => $moduleSpecificPermissions,
            'dataSharingRules' => $dataSharingRules
        ]);

    }

    public function updateCorePermission(Request $request){
        if(!empty($request->all())){
            $corPermissoinId = $request->all()['permission_id'];
            $moduleId = $request->all()['module_id'];

            $respose = $this->roleRepository->updateCorePermissions($corPermissoinId, $moduleId);
            if($respose) {
                return ['success' => 'Successfully Updated'];
            }
        }
    }

    public function updateDataSharingRule(Request $request) {
        if(!empty($request->all())){
            $ruleName = $request->all()['rule_name'];
            $fromRole = $request->all()['from_role'];
            $toRole = $request->all()['to_role'];
            $permission = $request->all()['permission'];
            $moduleId = ($request->all()['module_id'])??'';
            $ruleId = ($request->all()['rule_id'])??'';
            
            $respose = $this->roleRepository->updateRuleSetting($ruleName,$fromRole, $toRole, $permission, $moduleId, $ruleId);

            if($respose) {
                return ['success' => 'Successfully Updated'];
            }

        }
    }

    public function deleteDataSharingRule(Request $request) {
        $ruleId = $request->input('rule_id');
        if($ruleId) {
            $res  =  $this->roleRepository->deleteRules($ruleId);
            if($res) {
                return ['success' => 'Successfully deleted'];
            }
        }
    }

    public function getPermissionsByModule(Request $request)
    {
        $moduleId = $request->input('module_id');
        $data =[];
        if($moduleId) {
            $data  =  $this->roleRepository->getDataSharingRule($moduleId);
        }
        return $data;
    }

    public function addNewRole(Request $request)
    {
        if(!empty($request->all())){
            $role_name = $request->all()['role_name'];
            $reporting_role = $request->all()['reporting_role'];
            $description = $request->all()['description'];

            $respose = $this->roleRepository->addNewRoles($role_name,$reporting_role, $description);

            if($respose) {
                return ['success' => 'Successfully Updated'];
            }
        }
    }


    public function rolePermissionData()
    {
        $data = $this->roleRepository->getAllRolePermissions();
        return view('roles.role-permission', compact('data'));
    }

    public function addRolePermission(Request $request) 
    {
        dd($request->all());
    }

    public function addNewPermissions($id)
    {
        $data = $this->roleRepository->getRoleRelatedPermission($id);
        return view('roles.add-new-permission', compact('data'));
    }

    public function updateRolePermission(Request $request) 
    {
        if(!empty($request->all())){
            $role_id = $request->all()['role_id'];
            $related_permissions = ($request->all()['related_permissions'])??[];
            $new_permissions = ($request->all()['new_permissions'])??[];

            $respose = $this->roleRepository->updatePermissionForRole($role_id,$related_permissions, $new_permissions);

            if($respose) {
                return ['success' => 'Successfully Updated'];
            }
        }
    }
}