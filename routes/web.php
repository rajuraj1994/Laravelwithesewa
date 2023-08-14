<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/test',[TestController::class,'index']);
Route::get('/addcategory',[ProductController::class,'add_category_form']);
Route::post('/postcategory',[ProductController::class,'store_category'])->name('postcategory');
Route::get('/categorylist',[ProductController::class,'show_category'])->name('categorylist');
Route::get('/editcategory/{id}',[ProductController::class,'edit_category'])->name('editcategory');
Route::post('/updatecategory/{id}',[ProductController::class,'update_category'])->name('updatecategory');
Route::get('/deletecategory/{id}',[ProductController::class,'delete_category'])->name('deletecategory');
Route::get('/addproduct',[ProductController::class,'add_product_form'])->name('addproduct');
Route::post('/storeproduct',[ProductController::class,'store_product'])->name('storeproduct');
Route::get('/productlist',[ProductController::class,'show_product'])->name('productlist');
Route::get('/editproduct/{id}',[ProductController::class,'edit_product'])->name('editproduct');
Route::get('/deleteproduct/{id}',[ProductController::class,'delete_product'])->name('deleteproduct');

// user routes
Route::get('',[UserController::class,'index'])->name('homepage');
Route::get('/products',[UserController::class,'products'])->name('products');
Route::get('/productdetails/{id}',[UserController::class,'product_details'])->name('productdetails');
Route::post('/addtocart/{id}',[UserController::class,'add_to_cart'])->name('addtocart')->middleware('auth');
Route::get('/cart',[UserController::class,'show_user_cart'])->name('cart')->middleware('auth');
Route::get('/buy/{id}',[UserController::class,'buy_form'])->name('buy')->middleware('auth');
Route::post('/postorder/{id}',[UserController::class,'order_process'])->name('postorder')->middleware('auth');
Route::get('/myorders',[UserController::class,'myorders'])->name('myorders')->middleware('auth');
Route::get('/esewaverify',[UserController::class,'esewaVerify'])->name('esewaverify');
// admin routes 
Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
Route::get('/admin/allorder',[AdminController::class,'allorders'])->name('admin.allorder');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
