<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class ,'index']);
//view Route 
Route::get('/Register', [PagesController::class, 'register'])->middleware('guest');
Route::get('/Login', [PagesController::class, 'login'])->name('login')->middleware('guest');
Route::get('/Contact', [PagesController::class, 'contact'])->middleware('auth');
Route::get('/admin/Index',[PagesController::class, 'adminIndex'])->middleware('auth');
Route::get('/users/dashboard',[PagesController::class, 'dashboard'])->middleware('auth');
//category view
Route::get('/Category', [PagesController::class ,'category'])->middleware('auth');
//save category
Route::post('/add-category', [AdminController::class,'addcategory'])->middleware('auth');
//edit category
Route::get('/category_edit/{id}',[PagesController::class, 'categoryEdit'])->middleware('auth');
//store updated category
Route::post('/storeCategory/{id}', [AdminController::class, 'storeCategory'])->middleware('auth');

//delete category
Route::get('/category_delete/{id}', [AdminController::class, 'categoryDelete'])->middleware('auth');

//storing data
Route::post('/store',[UserController::class, 'store']);
Route::post('/verify', [UserController::class, 'verify']);
Route::get('/logout',[UserController::class , 'logout'])->middleware('auth');