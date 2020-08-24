<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaDetalleModalidad extends Model
{
    protected $table = 'ventas_detalles_modalidades';

    protected $primaryKey = 'item';

    protected $fillable = [
        'venta_id',
        'item',
        'cantidad',
        'precio_modalidad_id',
        'precio_modalidad_tiempo_id',
        'precio_unitario',
        'iva5',
        'iva10',
        'total',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function venta()
    {
        return $this->belongsTo('Venta');
    }

    public function listaPrecioModalidad()
    {
        return $this->belongsTo('ListaPrecioModalidad');
    }
    
}
