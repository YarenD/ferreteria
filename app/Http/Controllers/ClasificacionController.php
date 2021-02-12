<?php

namespace App\Http\Controllers;

use App\Clasificacion;
use App\Http\Requests\ClasificacionRequest;
use App\Producto;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClasificacionController extends Controller
{
    //
    public function index()
    {
        // $producto = Producto::all();
        // $producto->countBy();
        // dd($producto);

        $clasificaciones = Clasificacion::all();
        return view('clasificacion.clasificacion', compact('clasificaciones'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clasificacion.form', [
            'action' => 'create',
        ]);
    }
    public function store(Request $request)
    {

         $request->validate([
            'nombre' => 'required',
           'descripcion' => 'required',
           'color' => 'required'
         ]);
        $clasificacion = new Clasificacion([
            'nombre' => $request->get('nombre'),
             'descripcion' => $request->get('descripcion'),
             'color' => $request->get('color'),
         ]);
             $clasificacion->save();
        //  $clasificacion = Clasificacion::create($request->all());

         return redirect('/clasificacion')->with('Success','Clasificacion guardada');

    }
    public function edit($id){
        $clasificacion = Clasificacion::find($id);

        return view('clasificacion.edit',compact('clasificacion'));
    }
    public function update(Request $request, $id) {

         $request->validate([
             'nombre' => 'required',
             'descripcion' => 'required',
             'color' => 'required'
         ]);
         $clasificacion = Clasificacion::find($id);
         $clasificacion->nombre = $request->get('nombre');
         $clasificacion->descripcion = $request->get('descripcion');
         $clasificacion->color = $request->get('color');
         $clasificacion->save();
        return redirect('/clasificacion')->with('Success','Clasificacion Actualizado');

        // $clasificacion->nombre = $request->nombre;
        // return var_dump($request->get('nombre'));



    }
    public function destroy($id) {
        $clasificacion = Clasificacion::find($id);
        $clasificacion->delete();
        return redirect('/clasificacion')->with('Success','Clasificacion eliminada');

    }


}
