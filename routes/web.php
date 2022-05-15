<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VehiclecategoryController;
use App\Http\Controllers\VehicletypeController;
use App\Http\Controllers\FinanceController;
use App\Models\vehiclecategory;
use Database\Factories\PlanFactory;
use Database\Factories\VehiclecategoryFactory;

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

Route::get('user/signup',[userController::class,'create'])->name('signup_page');
Route::post('user/signup',[userController::class,'store'])->name('user_store');
Route::get('user/index',[userController::class,'index'])->name('user_index');
Route::get('user/login',[userController::class,'login_page'])->name('login_page');
Route::post('user/login',[userController::class,'login'])->name('login');
Route::post('user/logout',[userController::class,'logout'])->name('logout');



//                      user routes

Route::group(['middleware' => 'auth'],function(){

    Route::get('user/edit/{id}',[userController::class,'edit'])->name('user_edit');
    Route::post('user/index',[userController::class,'update'])->name('user_update');
    Route::get('user/delete/{id}',[userController::class,'destroy'])->name('user_destroy');

});


Route::group(['middleware' => 'auth'],function(){
    Route::get('/timeline',[\App\Http\Controllers\TimelineController::class,'index'])->name('timeline_index');
    Route::post('/addtimeline',[\App\Http\Controllers\TimelineController::class,'addtimeline'])->name('addtimeline');
    Route::get('/getallTimeline',[\App\Http\Controllers\TimelineController::class,'getallTimeline'])->name('getallTimeline');
    Route::get('/singleuserTimeline/{id}',[\App\Http\Controllers\TimelineController::class,'singleuserTimeline'])->name('singleuserTimeline');
    Route::get('/getallusers',[\App\Http\Controllers\TimelineController::class,'getallusers'])->name('getallusers');
    Route::get('/getimelinedetails',[\App\Http\Controllers\TimelineController::class,'getimelinedetails'])->name('get.timeline.details');
    Route::post('/updateimelinedetails',[\App\Http\Controllers\TimelineController::class,'updateimelinedetails'])->name('update.timeline.details');
    Route::get('/deleteTimeline',[\App\Http\Controllers\TimelineController::class,'deleteTimeline'])->name('delete.timeline');
    Route::get('/getsingleuserdata/{id}',[\App\Http\Controllers\TimelineController::class,'getsingleuserdata'])->name('getsingleuserdata');

});
