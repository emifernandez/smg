<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'descripcion'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
