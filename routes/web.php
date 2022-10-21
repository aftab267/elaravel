<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManufactureController;

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
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
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
