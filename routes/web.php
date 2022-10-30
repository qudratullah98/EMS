<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use function App\Http\Controllers\index;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::controller(UserController::class)->group(function(){
    Route::get("/user","index");
    Route::get("user/create","create")->name("user.create");
    Route::post("user/store","store")->name("user.store");
    Route::get("user/delete/{id}","destroy")->name("user.delete");
    Route::get("user/edit/{id}","edit")->name("user.edit");
    Route::post("user/update/{id}","update");
    Route::get("user/search","search");

});
Route::controller(EmployeeController::class)->group(function(){
    Route::get("/employee","index");

});
Route::get("{any}",function(){
    return view("employee.index");
})->where("any",".*");


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
