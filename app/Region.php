<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regiones';

    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'pais_id',
        'nombre',
        'capital',
        'superficie_km2',
        'cantidad_distritos',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pais()
    {
        return $this->belongsTo('Pais');
    }

    public function distritos()
    {
        return $this->hasMany('Distrito');
    }
}
