<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';

    protected $fillable = [
        'nombre', 
        'name', 
        'nom', 
        'iso2',
        'iso3',
        'phone_code',
        'gentilicio',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function regiones()
    {
        return $this->hasMany('Region');
    }
}
