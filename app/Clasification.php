<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasification extends Model
{
    protected $fillable= [
        'nombre','descripcion','color'
    ];
     // $clasification->products
     public function products(){
        return $this->hasMany(Product::class);
    }
}
