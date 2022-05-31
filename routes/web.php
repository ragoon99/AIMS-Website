<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EquipDbController;
use App\Http\Controllers\LivestockDbController;
use App\Http\Controllers\WeatherDbController;
use App\Http\Controllers\CropDbController;
use App\Http\Controllers\SeedDbController;
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

// admin view
Route::view('/', 'homepage');
Route::view('database', 'layouts/databaseLayout');
Route::view('admin', 'admin/login');
Route::view('passReset', 'admin/passReset');

Route::controller(AdminController::class)->group(function () {
    Route::get('logout', 'getLogout');
    Route::get('admin', 'getLogin');
    Route::post('Auth', 'UserAuth');
    Route::get('empData',  'adminDisplay');
    Route::get('adminDash', 'getDashboard');
});

//  Seed
Route::resource('seed', SeedDbController::class);

Route::controller(SeedDbController::class)->group(function () {
    Route::get('sDelete/{id}', 'destroy');
    Route::get('sEdit/{id}', 'edit');
});


//  Crop
Route::resource('crop', CropDbController::class);

Route::controller(CropDbController::class)->group(function () {
    Route::get('cDelete/{id}', 'destroy');
    Route::get('cEdit/{id}', 'edit');
});


//  Equipment
Route::resource('equipment', EquipDbController::class);

Route::controller(EquipDbController::class)->group(function () {
    Route::get('eDelete/{id}', 'destroy');
    Route::get('eEdit/{id}', 'edit');
});


//  Livestock
Route::resource('livestock', LivestockDbController::class);

Route::controller(LivestockDbController::class)->group(function () {
    Route::get('lDelete/{id}', 'destroy');
    Route::get('lEdit/{id}', 'edit');
});


//  Weather
Route::resource('weather', WeatherDbController::class);

Route::controller(WeatherDbController::class)->group(function () {
    Route::get('wDelete/{id}', 'destroy');
    Route::get('wEdit/{id}', 'edit');
});

Route::resource('asc', AccountController::class);
