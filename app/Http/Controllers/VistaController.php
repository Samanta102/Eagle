<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaController extends Controller
{
    public function mostrarVista()
    {
        return view('vista');
    }
}

