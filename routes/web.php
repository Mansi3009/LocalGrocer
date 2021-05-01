<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangeStatusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
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
/*
Route::get('/categorydisplay',function() {
	return view('user.productdisplay');
});
*/
Route::get('/payment',function() {
	return view('payment');
});

Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/savelogin',[LoginController::class, 'saveLogin'])->name('save_login');

Route::get('/registration',[RegistrationController::class, 'regProcess']);
Route::post('/registration',[RegistrationController::class,'registration'])->name('register');

Route::get('/registration',[VendorController::class,'regProcess']);
Route::post('/vendor-registration',[VendorController::class,'vendorRegistration'])->name('vendorRegister');

Route::get('/admin',[AdminController::class,'index'])->name('admin')->middleware('admin');
Route::get('/user',[UserController::class,'index'])->name('user')->middleware('user');
Route::get('user',[UserController::class,'viewuser'])->name('user');
Route::get('deleteuser/{id}',[UserController::class,'deleteuser'])->name('deleteuser');
Route::get('edituser/{id}',[UserController::class,'showUser'])->name('editu');
Route::post('edituser',[UserController::class,'updateUser'])->name('edituser');



Route::get('view-vendors',[VendorController::class,'index'])->name('vendor');
Route::get('delete/{id}',[VendorController::class,'delete'])->name('delete');
Route::get('delete{id}',[RegistrationController::class,'delete']);

Route::get('edit/{id}',[VendorController::class,'showData'])->name('edit');
Route::post('edit',[VendorController::class,'update'])->name('editvendor');

Route::get('changestatus/{id}',[ChangeStatusController::class,'changestatus'])->name('changestatus');

Route::get('viewvendor/{id}',[VendorController::class,'viewvendor'])->name('viewvendor');

//product route..
Route::get('product',[ProductController::class,'productview']);
Route::post('product',[ProductController::class,'addProduct'])->name('product');

Route::get('view-product',[ProductController::class,'index'])->name('productview');
Route::get('deleteproduct/{id}',[ProductController::class,'deleteproduct'])->name('deleteproduct');

Route::get('editproduct/{id}',[ProductController::class,'showproduct'])->name('editp');
Route::post('editproduct',[ProductController::class,'updateproduct'])->name('editproduct');

//Route::get('productdisplay',[ProductController::class, 'productdisplay'])->name('productdisplay');

Route::get('category',[CategoryController::class,'categoryview']);
Route::post('category',[CategoryController::class,'addCategory'])->name('category');

Route::get('viewcategory',[CategoryController::class,'index'])->name('categoryview');
Route::get('deletecategory/{id}',[CategoryController::class,'deletecategory'])->name('deletecategory');

Route::get('editcategory/{id}',[CategoryController::class,'showcategory'])->name('editc');
Route::post('editcategory',[CategoryController::class,'updatecategory'])->name('editcategory');

Route::get('categorydisplay',[CategoryController::class,'categorydisplay'])->name('categorydisplay');

Route::get('productdisplay/{id}',[CategoryController::class,'viewcategory'])->name('productdisplay');
Route::get('addItem/{id}',[CartController::class,'addItem']);

Route::get('cart',[CartController::class,'cart'])->name('cart');
Route::post('add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart.post');
