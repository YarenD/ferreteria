<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clasificacion;
use DB;
class ClasificacionesController extends Controller
{
    public function index()
    {
    	$Clasificaciones =  DB::table('clasificaciones')
                              ->selectRaw('clasificaciones.*, count(*) as cuenta')
                              ->join('productos', 'clasificaciones.id', '=', 'productos.id_clasificacion')
                              ->groupBy('clasificaciones.id')
                              ->get();

    	return view('Clasificaciones.index',['Clasificaciones' =>  $Clasificaciones]);
    }

    public function Registro(Request $request)
    {
    	$clasificacion              =     new Clasificacion;
    	$clasificacion->nombre      =     $request['Nombre'];
    	$clasificacion->descripcion =     $request['Descripcion'];
    	$clasificacion->color       =     $request['Color'];
    	$clasificacion->save();

    	return redirect('Clasificaciones');
    }

    public function Editar(Request $request)
    {
    	$clasificacion              =     Clasificacion::find($request['Id']);
    	$clasificacion->nombre      =     $request['Nombre'];
    	$clasificacion->descripcion =     $request['Descripcion'];
    	$clasificacion->color  		=     $request['Color'];
    	$clasificacion->save();
    	return redirect('Clasificaciones');
    }

    public function Eliminar($id)
    {
    	$clasificacion              =     Clasificacion::find($id);
    	$clasificacion->delete();
    	return redirect('Clasificaciones');
    }
}
