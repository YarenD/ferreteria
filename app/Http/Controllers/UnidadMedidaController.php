<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnidadMedida;
class UnidadMedidaController extends Controller
{
    public function index()
    {
    	$UnidadMedida       =    UnidadMedida::all();
    	return view('UnidadMedida.index',['UnidadMedida' =>  $UnidadMedida]);
    }

    public function Registro(Request $request)
    {
    	$UnidadMedida              =     new UnidadMedida;
    	$UnidadMedida->nombre      =     $request['Nombre'];
    	$UnidadMedida->save();

    	return redirect('UnidadMedida');
    }

    public function Editar(Request $request)
    {
    	$UnidadMedida              =     UnidadMedida::find($request['Id']);
    	$UnidadMedida->nombre      =     $request['Nombre'];
    	$UnidadMedida->save();
    	return redirect('UnidadMedida');
    }

    public function Eliminar($id)
    {
    	$UnidadMedida              =     UnidadMedida::find($id);
    	$UnidadMedida->delete();
    	return redirect('UnidadMedida');
    }
}
