<?php

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
Route::get('/Register', [PagesController::class, 'register']);
Route::get('/Login', [PagesController::class, 'login']);
Route::get('/Contact', [PagesController::class, 'contact']);

//storing data
Route::post('/store',[UserController::class, 'store']);
Route::post('/verify', [UserController::class, 'verify']);
Route::get('/logout',[UserController::class , 'logout']);