<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\RoleController;





Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages/dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('roles/hierarchy/show', [RoleController::class, 'showRoleHierarchy'])->name('roles.hierarchy');
    Route::get('roles/show/{id}', [RoleController::class, 'showRoleDetails'])->name('roles.details');
    Route::get('roles/data-sharing',[RoleController::class, 'showRuleDetails'])->name('roles.data-sharing');

    Route::post('/role/update-permission', [RoleController::class, 'updateCorePermission'])->name('role.updateCorePermission');
    Route::post('/role/update-rule', [RoleController::class, 'updateDataSharingRule'])->name('role.updateDataSharingRule');
    Route::get('/role/get-permissions-by-module', [RoleController::class, 'getPermissionsByModule'])->name('role.getPermissionsByModule');


    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::post('roles/permission/create', [RoleController::class, 'permisssionCreate'])->name('per.create');



    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create');
    Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');
    Route::get('/leads/{lead_id}', [LeadController::class, 'show'])->name('leads.show');
    Route::get('/leads/{lead_id}/edit', [LeadController::class, 'edit'])->name('leads.edit');
    Route::put('/leads/{lead_id}', [LeadController::class, 'update'])->name('leads.update');
    Route::get('/leads/delete/{lead_id}', [LeadController::class, 'destroy'])->name('leads.destroy');



    // Route::get('lead', function () {
    //     return view('pages/lead');
    // })->name('lead');

    // Route::get('lead/id', function () {
    //     return view('pages/lead-id');
    // })->name('lead-id');

    Route::get('/user' ,[UserController::class, 'index'])->name('user');

    Route::get('contact', function () {
        return view('pages/contact');
    })->name('contact');

    Route::get('deal', function () {
        return view('pages/deal');
    })->name('deal');

    // Route::get('roles', function () {
    //     return view('pages/roles');
    // })->name('roles');

    Route::get('permission', function () {
        return view('pages/permission');
    })->name('permission');

    Route::get('setting/users', function () {
        return view('setting/users');
    })->name('users');

    Route::get('setting/role-setting', function () {
        return view('setting/role-setting');
    })->name('role-setting');

    Route::get('setting/permission-setting', function () {
        return view('setting/permission-setting');
    })->name('permission-setting');

    Route::get('setting/module-field-setting', function () {
        return view('setting/module-field-setting');
    })->name('module-field-setting');

    Route::get('setting/main-setting', function () {
        return view('setting/main-setting');
    })->name('main-setting');

    Route::get('services/calender', function () {
        return view('services/calender');
    })->name('services/calender');

    Route::get('my-profile', function () {
        return view('pages/my-profile');
    })->name('my-profile');

    Route::get('changePassword', function () {
        return view('pages/changepass');
    });

    Route::get('kanban', function () {
        return view('layout/partials/kanban');
    });



});


Route::middleware(['auth', 'can:view lead'])->group(function () {
    Route::get('lead', function () {
        return view('pages/lead');
    })->name('lead');

    Route::get('lead/id', function () {
        return view('pages/lead-id');
    })->name('lead-id');
});




// Publicly accessible routes (Login, Register, Welcome page)
Route::get('login', function () {
    return view('pages/login');
})->name('login');

Route::get('register', function () {
    return view('pages/register');
})->name('register');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

require __DIR__.'/auth.php';
