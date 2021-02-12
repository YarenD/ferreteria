<?php

namespace App\Http\Controllers;
use App\Clasificaciones;
use App\Productos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::with('clasificacion')->get();

       
       
        

       


               
                
             
    /* 
        dd($co); */


         return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Productos::with('clasificacion')->get();
        $clasificaciones = Clasificaciones::get();

        return view('productos.create',['productos' => $productos,  'clasificaciones' => $clasificaciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $file = $request->file('foto');
        if($file != null)
        {
            
            $filename = $file->getClientOriginalName();
            //guardamos
            Storage::disk('public')->put($filename,  \File::get($file));
        }
        else
        {
            $filename = "sinImagen.png";
        }
        
        $prod = new Productos();

        $prod->fill([
            
            'id_clasificacion' => $request['clasificacion'],
            'sku' => $request['sku'],
            'nombre' => $request['nombre'],
            'unidad_medida' => $request['medida'],
            'descripcion' => $request['descripcion'],
            'precio' => $request['precio'],
            'foto' => $filename
        ]);
        $prod->save();

        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Productos::with('clasificacion')->findOrfail($id);


         return view('productos.show', ["productos" => $productos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Productos::with('clasificacion')->findOrfail($id);
        $clasificaciones = Clasificaciones::get();
        
		return view('productos.edit', ["productos" => $productos, "clasificaciones"=>$clasificaciones]);
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

        $file = $request->file('foto');
        
        if($file != null)
        {
            $filename = $file->getClientOriginalName();
            //guardamos
            Storage::disk('public')->put($filename,  \File::get($file));

            
        }
        else
        {
            $filename = "sinImagen.png";
        }
        

        $prod = Productos::with('clasificacion')->findOrfail($id);
        $prod->fill([
        
            'id_clasificacion' => $request['id_clasificacion'],
            'sku' => $request['sku'],
            'nombre' => $request['nombre'],
            'unidad_medida' => $request['medida'],
            'descripcion' => $request['descripcion'],
            'precio' => $request['precio'],
            'foto' => $filename

        ]);

        $prod->update();


        return redirect('/productos');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Productos::with('clasificacion')->findOrfail($id);
		$prod->delete();
		
        return redirect('/productos');
    }
}
