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
            return view('roles.role-info', [
                'userRole' => $userRole,
                'users' => $users,
                'parentRoleName' => $parentRoleName,
                'modulepermission' => $modulepermission,
                'moduleSpecificPermissions' => $moduleSpecificPermissions
            ]);
        }

        return view('roles.role-info', [
            'userRole' => [],
            'users' => [],
            'parentRoleName' => null,
            'modulepermission' => [],
            'moduleSpecificPermissions' => []
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
}