<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Producto;
use App\Models\Clasificacion;
use File;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get();
        return view('/productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clasificaciones = Clasificacion::get();
        return view('/productos.crear', compact('clasificaciones'));
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
            'sku' => 'required',
            'nombre' => 'required',
            'unidad_medida' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'clasificacion_id' => 'required',
            'foto' => 'required'
        ]);

        //Almacenamiento de imagen
        $archivo_temp = $request->file('foto');
        $imagen = Image::make($archivo_temp)->resize(500, 300, function($constraint){
            $constraint->aspectRatio();
        });
        $imagen->encode('jpg', 95);

        $nombre_archivo = Str::random(10) . '.jpg';
        Storage::disk('productos_fotos')->put($nombre_archivo, $imagen);

        $producto = new Producto([
            'sku' => $request->get('sku'),
            'nombre' => $request->get('nombre'),
            'unidad_medida' => $request->get('unidad_medida'),
            'descripcion' => $request->get('descripcion'),
            'precio' => $request->get('precio'),
            'foto' => $nombre_archivo,
            'clasificacion_id' => $request->get('clasificacion_id')
        ]);

        $producto->saveOrFail();
        return redirect('/productos')->with('success', 'Producto guardada');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $clasificaciones = Clasificacion::get();
        return view('/productos.edicion', compact('producto', 'clasificaciones'));
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
            'sku' => 'required',
            'nombre' => 'required',
            'unidad_medida' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'clasificacion_id' => 'required'
        ]);

        $producto = Producto::find($id);

        if($request->has('foto'))
        {
            if ( Storage::disk('productos_fotos')->has($producto->foto) ){
                Storage::disk('productos_fotos')->delete($producto->foto);
            }

            $archivo_temp = $request->file('foto');
            $imagen = Image::make($archivo_temp)->resize(500, 300, function($constraint){
                $constraint->aspectRatio();
            });
            $imagen->encode('jpg', 75);

            $nombre_archivo = Str::random(10) . '.jpg';
            Storage::disk('productos_fotos')->put($nombre_archivo, $imagen);
            $producto->foto = $nombre_archivo;
        }

        $producto->sku = $request->get('sku');
        $producto->nombre = $request->get('nombre');
        $producto->unidad_medida = $request->get('unidad_medida');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->clasificacion_id = $request->get('clasificacion_id');

        $producto->saveOrFail();
        return redirect('/productos')->with('success', 'Producto actualizado');




        $producto->saveOrFail();

        return response()->json([
            'message' => '¡Los datos se han actualizado correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('/productos')->with('success', 'Producto eliminado!');
    }
}
