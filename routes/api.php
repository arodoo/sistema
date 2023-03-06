<?php

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

//Check this one

Route::post('register', [App\Http\Controllers\API\RegisterController::class, 'register']);
Route::post('login', [App\Http\Controllers\API\RegisterController::class, 'login']);
     
Route::middleware('auth:api')->group( function () {

    Route::get('show', [RegisterController::class, 'show']);
    Route::post('create', [RegisterController::class, 'create']);
    Route::delete('delete', [RegisterController::class, 'delete']);
    Route::put('update', [RegisterController::class, 'update']);

});