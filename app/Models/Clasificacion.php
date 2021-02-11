<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clasificacion extends Model
{
    //
    use SoftDeletes;

    protected $table = 'clasificaciones';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'color',
        'descripcion'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
