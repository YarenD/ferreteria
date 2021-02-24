<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $dates = [
        'created_at'
    ];

    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class);
    }
}
