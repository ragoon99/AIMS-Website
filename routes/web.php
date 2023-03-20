<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EquipDbController;
use App\Http\Controllers\LivestockDbController;
use App\Http\Controllers\CropDbController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\SeedDbController;
use App\Http\Controllers\UserController;
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
Route::view('/', 'homepage')->name('home');
Route::view('admin', 'admin/login')->name('admin');
// Route::view('signup', 'signUp')->name('signup');
Route::view('reset', 'forgotAccount')->name('reset');
Route::view('adminAcctSett', 'admin\settings\accountSetting')->name('adminAcctSett');
Route::view('editAdminAcc', 'admin\settings\editSettings')->name('editAdminAcc');

Route::fallback(function(){
    return redirect('PageNotFound');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('logout', 'getLogout');
    Route::get('admin', 'getLogin');
    Route::post('Auth', 'UserAuth');
    Route::get('empData',  'adminDisplay')->name('empData');
    Route::get('adminDash', 'getDashboard')->name('dashboard');
    Route::get('passReset', 'getPassReset')->name('passReset');
});

//  Seed
Route::resource('seed', SeedDbController::class);

Route::controller(SeedDbController::class)->group(function () {
    Route::get('sDelete/{id}', 'destroy');
    Route::get('sEdit/{id}', 'edit');
    Route::get('seedPDF', 'createPDF');
    Route::get('seedExcel', 'export');
});


//  Crop
Route::resource('crop', CropDbController::class);

Route::controller(CropDbController::class)->group(function () {
    Route::get('cDelete/{id}', 'destroy');
    Route::get('cEdit/{id}', 'edit');
    Route::get('cropPDF', 'createPDF');
    Route::get('cropExcel', 'export');
});


//  Equipment
Route::resource('equipment', EquipDbController::class);

Route::controller(EquipDbController::class)->group(function () {
    Route::get('eDelete/{id}', 'destroy');
    Route::get('eEdit/{id}', 'edit');
    Route::get('equipmentPDF', 'createPDF');
    Route::get('equipmentExcel', 'export');
});


//  Livestock
Route::resource('livestock', LivestockDbController::class);

Route::controller(LivestockDbController::class)->group(function () {
    Route::get('lDelete/{id}', 'destroy');
    Route::get('lEdit/{id}', 'edit');
    Route::get('livestockPDF', 'createPDF');
    Route::get('livestockExcel', 'export');
});


// Farmer
Route::resource('farmer', FarmerController::class);

Route::controller(FarmerController::class)->group(function () {
    Route::get('fDelete/{id}', 'destroy');
    Route::get('fEdit/{id}', 'edit');
    Route::get('farmerPDF', 'createPDF');
    Route::get('farmerExcel', 'export');
});

//User
Route::controller(UserController::class)->group(function () {
    Route::get('login', 'getLoginPage')->name('login');
    Route::get('accLogout', 'getLogout');
    Route::post('accLogin', 'getAcc');
    Route::get('accReset',  'getAccReset');
    Route::post('accSignup',  'postCreateAcc');
});

Route::resource('asc', AccountController::class);
