<?php

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

Route::get('/', function () {
    if (\Auth::check()) {
        return redirect('/home');
    }else {
        return redirect()-> route('landing.index');
    }
    return view('landing.pages.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'landing'], function(){
    Route::get('/acerca',[App\Http\Controllers\LandingController::class, 'acerca'])->name('landing.acerca');
    Route::get('/contacto',[App\Http\Controllers\LandingController::class, 'contacto'])->name('landing.contacto');
    Route::get('/equipo',[App\Http\Controllers\LandingController::class, 'equipo'])->name('landing.equipo');
    Route::get('/index',[App\Http\Controllers\LandingController::class, 'index'])->name('landing.index');
    Route::get('/portafolio',[App\Http\Controllers\LandingController::class, 'portafolio'])->name('landing.portafolio');

});