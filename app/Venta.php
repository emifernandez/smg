<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $primaryKey = 'id';

    protected $attributes = [
        'fecha' => '21/08/2020',
    ];

    protected $fillable = [
        'cliente_id',
        'numeroFactura',
        'fecha',
        'totalIVA5',
        'totalIVA10',
        'montoTotal',
        'tipoVenta',
        'estadoVenta',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function ventaDetallesModalidades()
    {
        return $this->hasMany('VentaDetalleModalidad');
    }

    public function cliente()
    {
        return $this->belongsTo('Cliente');
    }

}
