<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function index()
    {
        return view('tecnicos.index'); // crea la vista en resources/views/tecnicos/index.blade.php
    }
};

