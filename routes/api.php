<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\AuthController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);

//Route::group(['middleware' => 'role:admin'], function () {
//    Route::put('reminders/{id}', 'App\Http\Controllers\ReminderController@update');
//    Route::delete('reminders/{id}', 'App\Http\Controllers\ReminderController@destroy');
//});
//
//Route::group(['middleware' => 'role:user'], function () {
//    Route::get('reminders', 'App\Http\Controllers\ReminderController@index');
//    Route::post('reminders', 'App\Http\Controllers\ReminderController@store');
//});




Route::middleware('auth:api')->resource('reminders', ReminderController::class);
