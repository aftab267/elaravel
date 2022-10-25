<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;

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
// frontend Side......................................
Route::get('/',[HomeController::class,'index']);











// Backend Side........................................
Route::get('/logout',[SuperAdminController::class,'logout']);
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[SuperAdminController::class,'index']);
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);

// category releted route..................................................
Route::get('/add-category',[CategoryController::class,'index']);
Route::get('/all-category',[CategoryController::class,'all_category']);
Route::post('/save-category',[CategoryController::class,'save_category']);
Route::get('/inactive_category/{category_id}',[CategoryController::class,'inactive_category']);
Route::get('/active_category/{category_id}',[CategoryController::class,'active_category']);
Route::get('/edit-category/{category_id}',[CategoryController::class,'edit_category']);
Route::post('/update-category/{category_id}',[CategoryController::class,'update_category']);
Route::get('/delete-category/{category_id}',[CategoryController::class,'delete_category']);

// all manufacture Route are here..................
Route::get('/add-manufacture',[ManufactureController::class,'index']);
Route::post('/save-manufacture',[ManufactureController::class,'save_manufacture']);
Route::get('/all-manufacture',[ManufactureController::class,'all_manufacture']);
Route::get('/delete-manufacture/{manufacture_id}',[ManufactureController::class,'delete_manufacture']);
Route::get('/inactive_manufacture/{manufacture_id}',[ManufactureController::class,'inactive_manufacture']);
Route::get('/active_manufacture/{manufacture_id}',[ManufactureController::class,'active_manufacture']);
Route::get('/edit-manufacture/{manufacture_id}',[ManufactureController::class,'edit_manufacture']);
Route::post('/update-manufacture/{manufacture_id}',[ManufactureController::class,'update_manufacture']);

// Products route................................................
Route::get('/add-product',[ProductController::class,'index']);
Route::post('/save-product',[ProductController::class,'save_product']);
Route::get('/all-product',[ProductController::class,'all_product']);
Route::get('/inactive_product/{product_id}',[ProductController::class,'inactive_product']);
Route::get('/active_product/{product_id}',[ProductController::class,'active_product']);
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
Route::post('/update-product/{product_id}',[ProductController::class,'update_product']);

// Slider Routes are here.....................................................................
Route::get('/add-slider',[SliderController::class,'index']);
Route::post('/save-slider',[SliderController::class,'save_slider']);
Route::get('/all-slider',[SliderController::class,'all_slider']);
Route::get('/all-slider',[SliderController::class,'all_slider']);
Route::get('/inactive_slider/{slider_id}',[SliderController::class,'inactive_slider']);
Route::get('/active_slider/{slider_id}',[SliderController::class,'active_slider']);
Route::get('/delete-slider/{slider_id}',[SliderController::class,'delete_slider']);




