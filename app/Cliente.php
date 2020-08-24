<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'ruc',
        'fecha_nacimiento',
        'nacionalidade',
        'regione',
        'ciudade',
        'barrio',
        'direccion',
        'telefono',
        'email',
        'fecha_ingreso',
        'calificacione',
        'tipoCliente',
        'alergias',
        'antecedentes',
        'objetivo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function ventas()
    {
        return $this->hasMany('Venta');
    }
}
