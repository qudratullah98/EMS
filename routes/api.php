<?php

use App\Http\Controllers\api\countryController;
use App\Http\Controllers\apiEmploeeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    Route::controller(apiEmploeeController::class)->group(function(){
    Route::get("/employee", "index");
    Route::get("gitEmployeeData", "getdata");
    Route::get("/gitStatData/{id}","getStat");
    Route::get("/gitCityData/{id}","getCity");
    Route::get("/getdapartment","getDepartment");
    Route::get("/employee/delete/{id}","destroy");
    Route::post("/saveEmployee","save");
    Route::post("/UpdateEmployee/{id}","update");
});

 Route::controller(countryController::class)->group(function(){
    Route::get("/country","index");
    Route::post("/country/store","store");
 });