<?php

namespace App\Http\Controllers;

use App\Clasificacion;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with('clasificacion')->get();
         return view('productos.productos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clasificacion = Clasificacion::all();

        return view('productos.form', [
            'action' => 'create',
        ], compact('clasificacion'));
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
            'id_clasificacion' => 'required',
            'sku' => 'required',
            'nombre' => 'required',
            'unidad_medida' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'foto' => 'required'
         ]);
         $file = $request->file('foto');
         $filename = 'ferreteria-';
         $filename .= Str::random(15);
         $filename .= '-';
         $filename  .= $file->getClientOriginalName();
         $extension = $file->getClientOriginalExtension();
         $imagen   = $filename;
         $file->move(public_path('imagenes/ferreteria'),$imagen);
         $url = 'http://127.0.0.1:8000/imagenes/ferreteria/';
         $url .= $filename;
        $producto = new Producto([
            'id_clasificacion' => $request->get('id_clasificacion'),
            'sku' => $request->get('sku'),
            'nombre' => $request->get('nombre'),
            'unidad_medida' => $request->get('unidad_medida'),
            'descripcion' => $request->get('descripcion'),
            'precio' => $request->get('precio'),
            'foto' => $url,

         ]);
             $producto->save();


         return redirect('/producto')->with('Success','Clasificacion guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

        return view('productos.edit',compact('producto'));
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

        ]);
        $file = $request->file('foto');
         $filename = 'ferreteria-';
         $filename .= Str::random(15);
         $filename .= '-';
         $filename  .= $file->getClientOriginalName();
         $extension = $file->getClientOriginalExtension();
         $imagen   = $filename;
         $file->move(public_path('imagenes/ferreteria'),$imagen);
         $url = 'http://127.0.0.1:8000/imagenes/ferreteria/';
         $url .= $filename;
        $producto = Producto::find($id);
        $producto->sku = $request->get('sku');
        $producto->nombre = $request->get('nombre');
        $producto->unidad_medida = $request->get('unidad_medida');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->foto = $url;

        $producto->save();
       return redirect('/producto')->with('Success','Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/producto')->with('Success','Producto eliminada');

    }
}
