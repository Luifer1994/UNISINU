<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'codigo',
        'telefono',
        'email',
        'id_genero',
        'id_sede',
        'direccion',
        'id_ciudad',
        'id_rol',
        'estado',
    ];
}
