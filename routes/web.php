<?php
use App\http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\CategoryController;

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
Route::get('admin',[AdminController::class, 'index']);
Route::post('admin/auth',[AdminController::class,'auth']);
Route::get('admin/logout',[AdminController::class,'logout']);
Route::group(['middleware'=>'admin_auth'], function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/add-new',[CategoryController::class,'create']);
    Route::post('admin/category/add-new',[CategoryController::class,'save']);
    Route::get('admin/category/edit/{id}', [CategoryController::class,'edit']);
    Route::post('admin/category/edit/{id}',[CategoryController::class,'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
});