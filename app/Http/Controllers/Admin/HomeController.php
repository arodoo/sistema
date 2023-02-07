<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function usuarios(){
        return view('admin.usuarios');
    }
    public function productosAdmi(){
        return view('admin.productosAdmi');
    }
    public function categorias(){
        return view('admin.categorias');
    }
    public function productosUser(){
        return view('admin.productosUser');
    }
    public function carrito(){
        return view('admin.carrito');
    }
}
