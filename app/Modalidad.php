<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table = 'modalidades';

    protected $fillable = [
        'descripcion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function listaPreciosModalidades()
    {
        return $this->hasMany('listaPrecioModalidad');
    }
}
