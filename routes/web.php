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

Route::get('login',function (){
    return view('pages/login');
});

Route::get('register',function (){
    return view('pages/register');
});

Route::get('editDetails',function (){
    return view('layout/user/editDetails');
});
