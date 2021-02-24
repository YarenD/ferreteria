<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Clasificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
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
        $productos = \App\Producto::all();
        return view('producto.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clasificacions=Clasificacion::all();
        return view('producto.create', compact('clasificacions'));
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
            'sku'=>'required|unique:productos',
            'nombre'=>'required',
            'descripcion'=>'required',
            'unidad_medida'=>'required',
            'clasificacion'=>'required',
            'precio'=>'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'imagen'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $rutaimagen=$request['imagen']->store('upload-productos','public');
        DB::table('productos')->insert([
            'sku' => $data['sku'],
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'unidad_medida' => $data['unidad_medida'],
            'precio' => $data['precio'],
            'clasificacion_id' => $data['clasificacion'],
            'imagen' => $rutaimagen
        ]);
        return redirect()->action('ProductoController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
        
        $clasificaciones = \App\Clasificacion::all();
        return view('producto.show',compact('producto','clasificaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
        $clasificacions=Clasificacion::all(['id','nombre']); 
        return view('producto.edit', compact('producto','clasificacions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
        if($request["sku"]==$producto->sku)
        {
        $data = request()->validate([
            'sku'=>'required',
            'nombre'=>'required',
            'descripcion'=>'required',
            'unidad_medida'=>'required',
            'clasificacion'=>'required',
            'precio'=>'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'imagen'=>'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        }else{
            $data = request()->validate([
                'sku'=>'required|unique:productos',
                'nombre'=>'required',
                'descripcion'=>'required',
                'unidad_medida'=>'required',
                'clasificacion'=>'required',
                'precio'=>'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
                'imagen'=>'image|mimes:jpeg,png,jpg,gif,svg'
            ]); 
        }
        $producto->sku = $data['sku'];
     $producto->nombre = $data['nombre'];
     $producto->clasificacion_id = $data['clasificacion'];
     $producto->descripcion = $data['descripcion'];
     $producto->unidad_medida = $data['unidad_medida'];
     $producto->precio = $data['precio'];
    
     //imagen
      if(request('imagen')){
        //eliminar imagen anterior
        if(Storage::exists('/public/'.$producto->imagen)) {
            Storage::delete('/public/'.$producto->imagen);
        }
        //
        $rutaimagen=$request['imagen']->store('upload-productos','public');
        $producto->imagen = $rutaimagen;
      }
      $producto->save();
     //redireccionar
        return redirect()->action('ProductoController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
   
    public function destroy(Producto $producto)
    {
        //
        //eliminar imagen
        
        if(Storage::exists('/public/'.$producto->imagen)) {
            Storage::delete('/public/'.$producto->imagen);
        }
        //eliminar producto
        $producto->delete();
        return redirect()->action('ProductoController@index');

    }

    public function datatables(Request $request){

        $query = Producto::where('unidad_medida','=',$request->unidad_medida)->with('clasificacion');

        return datatables()
        ->eloquent($query)
        ->editColumn('created_at', function($producto){
            return optional($producto->created_at)->format('d-m-Y');
        })
        ->editColumn('precio', function($producto){
            return '$ '.$producto->precio;
        })
        ->editColumn('sku', function($producto){
            return '<a href="'.route('producto.edit', $producto->id).'"> '.$producto->sku.'</a>';
        })
        ->addColumn('buttons', 'producto.datatable.buttons')
        ->rawColumns(['sku','buttons'])
        ->toJson();

    }
}
