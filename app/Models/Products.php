<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    //
    use SoftDeletes;

    protected $table = 'products';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'sku',
        'nombre',
        'unidad_medida',
        'descripcion',
        'precio',
        'foto',
        'clasification_id'
    ];

    protected $hidden = [
        'clasification_id',
    ];

    public function clasificacion()
    {
        return $this->belongsTo(Clasifications::class);
    }
}