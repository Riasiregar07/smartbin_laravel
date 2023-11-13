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
Route::view('admin','Admin');

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/login', 'index');
    Route::post('/login', 'login')->name('login');

});

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/Register', 'index');
    Route::post('/Register', 'Register')->name('Register');

});

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/dashboard', 'index')->name('dashboard');

});

Route::controller(UserController::class)->group(function(){
    Route::get('/home', 'index')->name('home');
   
});