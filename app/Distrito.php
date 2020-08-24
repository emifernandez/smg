<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distritos';

    protected $primaryKey = 'id';
    public $incrementing = false;


    protected $fillable = [
        'id',
        'region_id',
        'distrito',
        'superficie_km2',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function region()
    {
        return $this->belongsTo('Region');
    }
}