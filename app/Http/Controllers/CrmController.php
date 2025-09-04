<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function index()
    {
        // Retorna la vista del módulo CRM
        return view('crm');
    }
}
