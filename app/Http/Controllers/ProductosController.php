<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use DB;

class ProductosController extends Controller
{
    public function index()
    {
    	$productos   =    DB::table('productos')
    						->join('clasificaciones','clasificaciones.id','productos.id_clasificacion')
    						->select('productos.*',
    					             'clasificaciones.nombre as clasificacion',
    					         	 'clasificaciones.color as color')
    						->orderby('productos.id','desc')
    						->paginate(5);
    	return view('Productos.index',['productos' => $productos]);
    }

    public function Registro(Request $request)
    {
    	
    	$imagen                        =   $request->file('Foto');
    	$nombre                        = time().'.'.$imagen->getClientOriginalExtension();
    	$storage                       = public_path('imagenes/productos/');
    	$request->Foto->move($storage,$nombre);
    	$producto                      =   new Producto;
    	$producto->id_clasificacion    =   $request['IdClasificacion'];
    	$producto->sku 				   =   $request['SKU'];
    	$producto->nombre      		   =   $request['Nombre'];
    	$producto->id_unidad_medida    =   $request['IdUnidadMedida'];
    	$producto->descripcion         =   $request['Descripcion'];
    	$producto->precio     		   =   $request['Precio'];
    	$producto->foto    			   =   $nombre;
    	$producto->save();
    	return redirect('Productos');
    }

        public function Editar(Request $request)
    {
        
        if($request->file('Foto') != null)
        {
          $imagen                        =   $request->file('Foto');
          $nombreFoto                    = time().'.'.$imagen->getClientOriginalExtension();
          $storage                       = public_path('imagenes/productos/');
          $request->Foto->move($storage,$nombreFoto);
        }else{

          $nombreFoto                  =  $request['FotoOld'];            
        }
 
        $producto                      =   Producto::find($request['Id']);
        $producto->id_clasificacion    =   $request['IdClasificacion'];
        $producto->sku                 =   $request['SKU'];
        $producto->nombre              =   $request['Nombre'];
        $producto->id_unidad_medida    =   $request['IdUnidadMedida'];
        $producto->descripcion         =   $request['Descripcion'];
        $producto->precio              =   $request['Precio'];
        $producto->foto                =   $nombreFoto;
        $producto->save();
        return redirect('Productos');
    }
    public function Eliminar($id)
    {
        $producto   =   Producto::find($id);
        $producto->delete();
        return redirect('Productos');
    }
    public function Galeria()
    {
        $productos   =    DB::table('productos')
                            ->join('clasificaciones','clasificaciones.id','productos.id_clasificacion')
                            ->select('productos.*',
                                     'clasificaciones.nombre as clasificacion',
                                     'clasificaciones.color as color')
                            ->orderby('productos.id','desc')
                            ->paginate(10);
        return view('Galeria.index',['productos' => $productos]);    
    }
}
