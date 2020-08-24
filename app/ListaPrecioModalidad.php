<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaPrecioModalidad extends Model
{
    protected $table = 'lista_precios_modalidades';

    protected $primaryKey = 'timepo_id';
    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'modalidad_id',
        'tiempo_id',
        'precio',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function modalidad()
    {
        return $this->belongsTo('Modalidad');
    }

    public function ventaDetallesModalidades()
    {
        return $this->hasMany('VentaDetalleModalidad');
    }
}