<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_espacio',
        'id_user',
        'fecha',
        'hora_inicio',
        'hora_final',
        'estado',
    ];
}
