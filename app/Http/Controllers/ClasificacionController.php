<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasificacion;
use App\Models\Producto;

class ClasificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasificaciones = Clasificacion::get();
        return view('clasificaciones.index', compact('clasificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/clasificaciones.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'color' => $request->get('color')
        ]);

        $clasificacion->saveOrFail();
        return redirect('/clasificaciones')->with('success', 'Clasificacion guardada');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clasificacion = Clasificacion::find($id);
        return view('/clasificaciones.edicion', compact('clasificacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'color' => 'required'
        ]);

        $clasificacion = Clasificacion::find($id);
        $clasificacion->nombre = $request->get('nombre');
        $clasificacion->descripcion = $request->get('descripcion');
        $clasificacion->color = $request->get('color');

        $clasificacion->saveOrFail();
        return redirect('/clasificaciones')->with('success', 'Clasificacion actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clasificacion = Clasificacion::findOrFail($id);
        $clasificacion->delete();

        return redirect('/clasificaciones')->with('success', 'Clasificacion eliminada!');
    }
}
