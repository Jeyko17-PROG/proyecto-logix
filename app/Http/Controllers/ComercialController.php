<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComercialController extends Controller
{
    public function index()
    {
        // Retorna la vista resources/views/comercial-proveedores/index.blade.php
        return view('comercial-proveedores.index');
        }
    }