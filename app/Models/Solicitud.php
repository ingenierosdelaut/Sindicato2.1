<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $fillable = [
        'estado',
        'fecha',
        'id_usuario',
        'motivo',
    ];

    use HasFactory;
}
