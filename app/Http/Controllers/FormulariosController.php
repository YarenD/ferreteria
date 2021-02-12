<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clasificacion;
use App\UnidadMedida;
use App\Producto;
use DB;
class FormulariosController extends Controller
{
    public function ProductoRegistro()
    {   $Clasificaciones    =    Clasificacion::all();
    	$UnidadMedida		=    UnidadMedida::all();
    	return view('Formularios.ProductosRegistro',['Clasificaciones' => $Clasificaciones,
    												 'UnidadMedida'    => $UnidadMedida]);
    }
    public function ProductoEditar($id)
    {
        $Producto           =    DB::table('productos')
                                   ->where('productos.id','=',$id)
                                   ->join('clasificaciones','clasificaciones.id','=','productos.id_clasificacion')
                                   ->join('unidad_medida','unidad_medida.id','=','productos.id_unidad_medida')
                                   ->select('productos.*',
                                            'clasificaciones.id as id_clasifi',
                                            'clasificaciones.nombre as clasificacion',
                                            'unidad_medida.id as id_unidad',
                                            'unidad_medida.nombre as unidad')
                                   ->first();   
        $Clasificaciones    =    Clasificacion::all();
        $UnidadMedida       =    UnidadMedida::all();
        return view('Formularios.ProductosEditar',['Producto' => $Producto,
                                                  'Clasificaciones' => $Clasificaciones,
                                                  'UnidadMedida'    => $UnidadMedida]);
    }
    public function ClasificacionesRegistro()
    {   
    	return view('Formularios.ClasificacionesRegistro');
    }
    public function ClasificacionEditar($id)
    {
    	$Clasificacion       =    Clasificacion::find($id);
    	return view('Formularios.ClasificacionesEditar',['Clasificacion' => $Clasificacion]);
    }
    public function UnidadMedidaRegistro()
    {   
    	return view('Formularios.UnidadMedidaRegistro');
    }
    public function UnidadMedidaEditar($id)
    {
    	$UnidadMedida       =    UnidadMedida::find($id);
    	return view('Formularios.UnidadMedidaEditar',['UnidadMedida' => $UnidadMedida]);
    }
}
