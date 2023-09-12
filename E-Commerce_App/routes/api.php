<?php

use App\Http\Controllers\Api\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Api\Admin\Auth\LogOutAdminController;
use App\Http\Controllers\Api\Admin\RegisterAdminController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum','verified'])->group(function () { //use user token

    Route::get('users',[UserController::class,'index']); //show all users
    Route::put('users/{id}',[UserController::class,'update']);  
    Route::delete('users/{id}',[UserController::class,'delete']);
});
Route::middleware(['auth:sanctum','admin'])->group(function () {
    Route::post('admin/logout',[LogOutAdminController::class,'logout']);
    Route::post('admin/register',[RegisterAdminController::class,'register']);
});

Route::post('users',[UserController::class,'create']); // register user
Route::post('users/login',[App\Http\Controllers\Api\User\Auth\LoginController::class, 'login']); // login user

Route::post('admin/login',[LoginAdminController::class,'login']); //login admin
