<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacios extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto',
        'nombre',
        'descripcion',
        'id_sede',
        'id_categoria',
    ];
}
