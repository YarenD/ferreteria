<?php

namespace App\Http\Controllers;
use App\Clasificaciones;
use App\Productos;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ClasificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasificaciones = Clasificaciones::with('producto')->get();

        $contador = DB::table('clasificaciones')
        ->select('id_clasificacion', DB::raw("COUNT(Clasificaciones.id) as cantidad"))
        ->groupBy(['id_clasificacion']) 
        ->join('productos', 'clasificaciones.id', '=', 'productos.id_clasificacion')
        ->get();
        
        return view('clasificaciones.index',['clasificaciones' => $clasificaciones,'contador'=>$contador]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clasificaciones = Clasificaciones::with('producto')->get();

		return view('clasificaciones.create', ["clasificaciones" => $clasificaciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clasi = new Clasificaciones();

        $clasi->fill([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'color' =>$request->input('color'),
            
		]);
		$clasi->save();
       
        return redirect('/clasificaciones');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clasificaciones = Clasificaciones::with('producto')->findOrfail($id);


         return view('clasificaciones.show', ["clasificaciones" => $clasificaciones]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clasificaciones = Clasificaciones::with('producto')->findOrfail($id);
	
		return view('clasificaciones.edit', ["clasificaciones" => $clasificaciones]);
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
        $clasificaciones = Clasificaciones::with('producto')->findOrfail($id);
        $clasificaciones->fill([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'color' =>$request->input('color'),
		
        ]);
        $clasificaciones->update();

        return redirect('/clasificaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clasificaciones = Clasificaciones::with('producto')->findOrfail($id);
		$clasificaciones->delete();
		
        return redirect('/clasificaciones');
    }
}
