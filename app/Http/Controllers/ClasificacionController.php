<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Clasificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClasificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        //
        $clasificacions = \App\Clasificacion::all();
        return view('clasificacion.index',compact('clasificacions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clasificacion.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'nombre'=>'required|unique:clasificacions|min:3',
            'descripcion'=>'required',
            'color'=>'required',
            
        ]);

        DB::table('clasificacions')->insert([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'color' => $data['color'],
        ]);
        return redirect()->action('ClasificacionController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clasificacion  $clasificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Clasificacion $clasificacion)
    {
        //
        $productos=Producto::where('clasificacion_id',$clasificacion->id)->get();
        $otrasclasificaciones=Clasificacion::where('id', '!=' , $clasificacion->id)->get();
        return view('clasificacion.show', compact('clasificacion','productos','otrasclasificaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clasificacion  $clasificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Clasificacion $clasificacion)
    {
        //
        
        return view('clasificacion.edit', compact('clasificacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clasificacion  $clasificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clasificacion $clasificacion)
    {
        //
        if($request["nombre"]==$clasificacion->nombre)
        {
            $data = request()->validate([
                'nombre'=>'required|min:3',
                'descripcion'=>'required',
                'color'=>'required',
                
            ]);
        }else{
        $data = request()->validate([
            'nombre'=>'required|unique:clasificacions|min:3',
            'descripcion'=>'required',
            'color'=>'required',
            
        ]);}
        $clasificacion->nombre=$request["nombre"];
        $clasificacion->descripcion=$request["descripcion"];
        $clasificacion->color=$request["color"];
        $clasificacion->save();
        return redirect()->action('ClasificacionController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clasificacion  $clasificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,Clasificacion $clasificacion)
    {
        //asignar nueva clasificacion a productos
      

        foreach ($clasificacion->productos as $productoe) {
            $producto = Producto::where('id', '=', $productoe->id)->first();
            $producto->clasificacion_id=$request["clasificacion"];
            $producto->save();
            echo $producto;
            }

        //eliminar clasificacion
        $clasificacion->delete();
      
        //regresar a vista index con mensaje de eliminado
        Session::flash('msg', 'Se ha eliminado la clasificación con exito!!');
        return redirect()->action('ClasificacionController@index');     
       
       
    }
}
