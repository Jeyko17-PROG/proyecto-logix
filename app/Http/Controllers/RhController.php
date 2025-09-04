<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RhController extends Controller
{
    public function index()
    {
        // Retorna la vista del módulo Recursos Humanos
        return view('rh');
    }
}
