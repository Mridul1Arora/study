<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\CallLogController;
use App\Http\Controllers\NotesController;


  

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        // return view('pages/dashboard');
        return view('test');
    })->middleware('verified')->name('dashboard');
 

    Route::get('/attachment', [AttachmentController::class, 'index'])->name('attachment.index');
    Route::get('/attachment/getData', [AttachmentController::class, 'getFilesData'])->name('attachment.data');
    Route::post('/attachment/upload', [AttachmentController::class, 'upload'])->name('attachment.upload');
    Route::post('/attachment/action', [AttachmentController::class, 'handleAction'])->name('attachment.action');


    Route::get('/users' ,[UserController::class, 'index'])->name('users.index');
    Route::get('/users-data', [UserController::class, 'getUsers'])->name('users.data');
    Route::get('/users/add-user' ,[UserController::class, 'addNewUser'])->name('users.add-user');
    Route::post('/users/add-user' ,[UserController::class, 'createNewUser'])->name('users.user-added');


    Route::get('/university' ,[UniversityController::class, 'index'])->name('university.index');
    Route::get('/university-data', [UniversityController::class, 'getUniversity'])->name('university.data');
    Route::get('/university/{id}', [UniversityController::class, 'getUniversityDetails'])->name('university.university-details');
    Route::post('/university/add-new-uni', [UniversityController::class, 'addNewUniversityDetails'])->name('university.add-university-details');
    Route::post('/university/action', [UniversityController::class, 'handleAction'])->name('university.action');


    Route::get('/countries', [UniversityController::class, 'getCountries']);
    Route::get('/states/{countryId}', [UniversityController::class, 'getStates']);
    Route::get('/cities/{stateId}', [UniversityController::class, 'getCities']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('roles/hierarchy/show', [RoleController::class, 'showRoleHierarchy'])->name('roles.hierarchy');
    Route::get('roles/show/{id}', [RoleController::class, 'showRoleDetails'])->name('roles.details');
    Route::get('roles/data-sharing',[RoleController::class, 'showRuleDetails'])->name('roles.data-sharing');
    Route::get('roles/add-new-permission/{id}',[RoleController::class, 'addNewPermissions'])->name('roles.add-new-permission');
    Route::post('/roles/update-role-permission', [RoleController::class, 'updateRolePermission'])->name('roles.updateRolePermission');
    Route::get('roles/role-permission', [RoleController::class, 'rolePermissionData'])->name('roles.role-permission');
    Route::post('/roles/add-role-permission', [RoleController::class, 'addRolePermission'])->name('roles.addRolePermission');
    Route::post('/role/update-permission', [RoleController::class, 'updateCorePermission'])->name('role.updateCorePermission');
    Route::post('/role/update-rule', [RoleController::class, 'updateDataSharingRule'])->name('role.updateDataSharingRule');
    Route::post('/role/delete-rule', [RoleController::class, 'deleteDataSharingRule'])->name('role.deleteDataSharingRule');
    Route::post('/roles/add-role', [RoleController::class, 'addNewRole'])->name('roles.addNewRole');
    Route::get('/role/get-permissions-by-module', [RoleController::class, 'getPermissionsByModule'])->name('role.getPermissionsByModule');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::post('roles/permission/create', [RoleController::class, 'permisssionCreate'])->name('per.create');


    Route::get('lead', [LeadController::class,'index'])->name('lead');
    Route::post('lead', [LeadController::class,'index'])->name('lead-post');

    Route::get('lead/{id}',[LeadController::class,'getDetailsPage']);


    Route::get('get-lead-details/{id}',[LeadController::class,'getLeadDetails']);
    
    Route::get('/import', [LeadController::class, 'import'])->name('leads.import');

    Route::get('/leads/data',[LeadController::class,'getLeads'])->name('getLeads');

    Route::post('lead/update',[LeadController::class,'update'])->name('leads.update');

    Route::delete('/leads/{id}', [LeadController::class, 'destroy'])->name('leads.destroy');

    Route::post('lead',[LeadController::class,'create'])->name('leads.create');

    //Calls Module
    Route::get('calls', [CallLogController::class,'index'])->name('calls');
    Route::get('calls/list', [CallLogController::class,'list'])->name('calls.list');
    Route::get('calls/details/{id}', [CallLogController::class,'getDetails'])->name('calls.details');
    Route::post('/calls/create', [CallLogController::class,'create']);
    Route::post('/calls/update', [CallLogController::class,'update'])->name('calls.update');


    //Notes Module
    Route::get('/note/details/{id}',[NotesController::class,'getDetails']);
    Route::post('/notes/create',[NotesController::class,'create'])->name('create.note');
    Route::post('/notes/update',[NotesController::class,'update'])->name('update.note');
    Route::delete('/notes/delete',[NotesController::class,'delete'])->name('delete.note');
   
    Route::get('roles', function () {
        return view('pages/roles');
    })->name('roles');

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


//check module permission
Route::middleware(['auth','check_module_permission'])->group(function () {

  

    Route::get('lead/id', function () {
        return view('pages/lead-id');
    })->name('lead-id');

    Route::get('contact', function () {
        return view('pages/contact');
    })->name('contact');

    Route::get('deal', function () {
        return view('pages/deal');
    })->name('deal');



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
