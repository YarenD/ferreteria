<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    //
    use SoftDeletes;

    protected $table = 'productos';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'sku',
        'nombre',
        'unidad_medida',
        'descripcion',
        'precio',
        'foto',
        'clasificacion_id'
    ];

    protected $hidden = [
        'clasificacion_id',
    ];

    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class);
    }
}
