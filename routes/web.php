<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('pages/dashboard');
})->name('dashboard');

Route::get('lead', function () {
    return view('pages/lead');
})->name('lead');

Route::get('lead/id', function () {
    return view('pages/lead-id');
})->name('lead-id');

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

Route::get('login',function (){
    return view('pages/login');
});

Route::get('register',function (){
    return view('pages/register');
});

Route::get('my-profile',function (){
    return view('pages/my-profile');
})->name('my-profile');

Route::get('changePassword', function (){
    return view('pages/changepass');
});

Route::get('kanban', function (){
    return view('layout/partials/kanban');
});