<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'inventarios';

    // Campos que se pueden llenar de forma masiva
    protected $fillable = [
        'equipo',
        'marca',
        'serial',
        'cantidad'
    ];
}