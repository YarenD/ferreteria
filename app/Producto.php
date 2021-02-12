<?php

namespace App;
use App\Clasificacion;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable = [
        'id_clasificacion','sku','nombre', 'unidad_medida', 'descripcion','precio','foto'
    ];
    public function clasificacion()
{
    return $this->belongsTo(Clasificacion::class, 'id_clasificacion');
}


}
