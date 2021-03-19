<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\LoginController;
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

Route::get('/login',[LoginController::class, 'login']);
Route::post('/savelogin',[LoginController::class, 'saveLogin'])->name('save_login');

Route::get('/registration',[RegistrationController::class, 'regProcess']);
Route::post('/registration',[RegistrationController::class,'registration'])->name('register');

Route::get('/registration',[VendorController::class,'regProcess']);
Route::post('/vendor-registration',[VendorController::class,'vendorRegistration'])->name('vendorRegister');


