<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificaciones extends Model
{
    protected $table = 'clasificaciones';
    protected $primaryKey = 'id';

    public $timestamps=false;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /* const DELETED_AT = 'deleted_at'; */
     protected $fillable =[ 

         'nombre',
         'descripcion',
         'color',

        ];


        public function producto(){
            return $this->hasMany('App\Productos', 'id_clasificacion', 'id');
        }
}
