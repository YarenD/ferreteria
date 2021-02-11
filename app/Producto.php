<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //

    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class);
    }
}
