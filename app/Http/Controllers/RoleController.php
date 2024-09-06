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
            return view('roles.role-hierarchy', ['hierarchy' => $hierarchy]);
        }

        return view('roles.role-hierarchy', ['hierarchy' => []]);
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

}