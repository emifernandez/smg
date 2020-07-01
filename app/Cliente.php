<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'documento',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'fecha_ingreso',
        'direccion',
        'telefono',
        'celular',
        'alergias',
        'antecedentes',
        'objetivo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
