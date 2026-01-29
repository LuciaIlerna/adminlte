<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = [
        'nombre_mascota',
        'tipo_cita',
        'fecha_hora',
    ];

    public $timestamps = true;

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];
}