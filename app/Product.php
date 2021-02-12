<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'sku',
        'nombre',
        'unidad_medida',
        'descripcion',
        'precio',
        'foto',
        'clasification_id'
    ];

    // $product->clasification
    public function clasification(){
        return $this->belongsTo('App\Clasification');
    }
}
