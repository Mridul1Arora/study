<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;




Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages/dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('lead', function () {
    //     return view('pages/lead');
    // })->name('lead');

    // Route::get('lead/id', function () {
    //     return view('pages/lead-id');
    // })->name('lead-id');

    Route::get('contact', function () {
        return view('pages/contact');
    })->name('contact');

    Route::get('deal', function () {
        return view('pages/deal');
    })->name('deal');

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




Route::middleware(['auth', 'can:can access lead'])->group(function () {
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

