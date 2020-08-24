<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'ruc',
        'nombre',
        'apellido',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
