<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autobus extends Model
{
    protected $table = 'autobuses';

    protected $fillable = [
        'modelo',
        'marca',
        'anio',
        'capacidad_pasajeros',
        'tipo_autobus',
    ];
}
