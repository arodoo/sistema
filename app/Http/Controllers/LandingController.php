<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Iluminate\Pagination\LengthAwarePaginator;
use Iluminate\Pagination\Paginator;

class LandingController extends Controller
{
    public function acerca() {
        return view('landing.pages.acerca');
    }

    public function equipo() {
        return view('landing.pages.equipo');
    }

    public function contacto() {
        return view('landing.pages.contacto');
    }

    public function index() {
        return view('landing.pages.index');
    }

    public function portafolio() {
        return view('landing.pages.portafolio');
    }

}
