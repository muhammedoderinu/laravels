<?php

use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\symptompsController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PrintFilterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LgaController;

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

Route::get('/form',[PrintController::class,'index']);
Route::post('/form',[PrintController::class,'store']);




Route::get('/filterpage',[PrintFilterController::class,'index']);
Route::get('/getForm/{id}',[PrintFilterController::class,'getForm']);
Route::post('/filterpage',[PrintFilterController::class,'store']);


Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/getEmployees/{id}',[DashboardController::class,'getEmployees']);
Route::post('/dashboard',[DashboardController::class,'store']);

Route::get('/site',[SiteController::class,'index']);
Route::post('/site',[SiteController::class,'store']);

Route::get('/symptomps',[symptompsController::class,'index']);
Route::post('/symptomps',[symptompsController::class,'store']);


Route::get('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'store']);



Route::get('/register',[registerController::class,'index']);
Route::post('/register',[registerController::class,'store']);


Route::get('/', function () {
   return view('symptomps');
});
