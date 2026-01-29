<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascotas';

    protected $fillable = [
        'nombre_mascota',
        'nombre_dueno',
        'raza',
        'edad',
        'tamano',
        'peso',
    ];

    public $timestamps = true;
}