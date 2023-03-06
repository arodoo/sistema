<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
//use App\Http\Controllers\HomeController;


Route::get('', [HomeController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/usuarios', [App\Http\Controllers\Admin\HomeController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('/productosAdmi', [App\Http\Controllers\Admin\HomeController::class, 'productosAdmi'])->name('admin.productosAdmi');
    Route::get('/categorias', [App\Http\Controllers\Admin\HomeController::class, 'categorias'])->name('admin.categorias');
    Route::get('/productosUser', [App\Http\Controllers\Admin\HomeController::class, 'productosUser'])->name('admin.productosUser');
    Route::get('/carrito', [App\Http\Controllers\Admin\HomeController::class, 'carrito'])->name('admin.carrito');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/usuarios', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    //Mandar a la vista para el formulario (vacía)
    //Lo que hay en la uri es lo que vmos en la ruta, el create es el método y el name es la ruta
    Route::get('/nuevo', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');

});