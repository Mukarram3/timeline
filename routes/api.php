<?php

use App\Http\Controllers\apiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('vehiclecat/index',[apiController::class,'index1'])->name('vehiclecategory_index');

Route::post('vehicle/index',[apiController::class,'index2'])->name('vehicle_index');

Route::get('finance/index',[apiController::class,'index3'])->name('finance_index');
