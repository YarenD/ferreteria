<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    public $timestamps=false;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /* const DELETED_AT = 'deleted_at'; */
     protected $fillable =[ 

         'id_clasificacion',
         'sku',
         'nombre',
         'unidad_medida',
         'descripcion',
         'precio',
         'foto',

        ];


        public function clasificacion(){
            return $this->belongsTo('App\Clasificaciones', 'id_clasificacion', 'id');
        }
        
}
