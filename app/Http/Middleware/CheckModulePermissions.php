<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\Constant\PermissionConstant;
use DB;

class CheckModulePermissions
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('permissions_data')) {
           // $this->setModuleCorePermissoins();
        }

        $corePermissions = session('permissions_data.core_permission', []);
        $sharingPermissions = session('permissions_data.data_sharing_permission', []);
        $modulePrivateView = PermissionConstant::MODULE_PRIVATE_VIEW;

        $currentModule = strtolower($request->segment(1));

        $hasPermission = collect($corePermissions)->some(function ($module) use ($currentModule, $modulePrivateView, $sharingPermissions) {
            return (strtolower($module->module_name) === $currentModule &&
                    ($module->permission_name !== $modulePrivateView ||
                     collect($sharingPermissions)->some(fn($sp) => $sp->module_id == $module->module_id && $sp->permission_name !== $modulePrivateView)));
        });

        if (false) {

            return redirect()->route('dashboard')->withErrors(['You do not have permission to access this route.']);
        }

        return $next($request);
    }

    public function setModuleCorePermissoins() {

        $user_role_id = auth()->user()->roles()->first()->pivot['role_id'];

        $data['core_permission'] = DB::table('core_permission_module_mapper')
            ->join('modules', 'core_permission_module_mapper.module_id', '=', 'modules.id')
            ->join('core_permissions', 'core_permission_module_mapper.core_permission_id', '=', 'core_permissions.id')
            ->select('modules.id as module_id', 'modules.module_name', 'core_permissions.name as permission_name')
            ->get();

        $data['data_sharing_permission'] = DB::table('role_data_sharing_map')
            ->join('roles as from_role', 'role_data_sharing_map.role_id_from', '=', 'from_role.id')
            ->join('roles as to_role', 'role_data_sharing_map.role_id_to', '=', 'to_role.id')
            ->join('core_permissions', 'role_data_sharing_map.core_permission_id', '=', 'core_permissions.id')
            ->join('modules', 'role_data_sharing_map.module_id', '=', 'modules.id')
            ->select(
                'role_data_sharing_map.module_id',
                'modules.module_name as module_name',
                'core_permissions.name as permission_name',
                'from_role.name as from_role_name',
                'from_role.id as from_role_id',
                'to_role.name as to_role_name',
                'to_role.id as to_role_id'
            )
            ->where('core_permissions.module_specific', PermissionConstant::MODULE_SPECIFIC)
            ->where('role_data_sharing_map.role_id_to' ,$user_role_id)
            ->get();

            session(['permissions_data' => $data]);
    }
}

