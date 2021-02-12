<?php

namespace App\Http\Controllers;

use App\Product;
use App\Clasification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasifications=Clasification::all();
        $products=Product::all();
        // dd(count($clasifications) <= 0);
        return view('products.index',compact('products','clasifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clasifications= Clasification::all();
        return view('products.create',compact('clasifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'sku'=>'required',
            'nombre'=> 'required',
            'foto'=>'required|mimes:jpeg,jpg,bmp,png,webp|max:91872749',
            'unidad_medida'=>'required',
            'precio'=>'required|numeric',
            'clasification_id'=>'required|numeric',
            'descripcion'=>'required|min:3'
        ];

        $messages=[
            'sku.required'=>'Se requiere introducir un sku.',
            'nombre.required'=>'Se requiere introducir un nombre.',
            'foto.required'=>'Se requiere ingresar una foto.',
            'foto.mimes'=>'La foto debe ser extencion .jpg, .jpeg, .bmp, .png ó webp',
            'unidad_medida.required'=>'Se requiere introducir la unidad de medida.',
            'precio.required'=>'Se requiere ingresar el precio.',
            'precio.numeric'=>'El precio debe ser un numero.',
            'clasification_id.required'=>'Se requiere una clasificacion.',
            'clasification_id.numeric'=>'Hubo un problema al ingresar la clasificacion del producto, intente de nuevo.',
            'descripcion.required'=>'Se requiere ingresar una descripcion.'
        ];

        $validation= $this->validate($request,$rules,$messages);


        if($request->hasFile('foto')){
            $image=$request->foto;
            $basename= Str::random();
            $original= $basename . '.' . $image->getClientOriginalExtension();
            if( !is_dir(public_path('/img/products/')) ){
                mkdir( public_path('/img/products/'),0777,true );
            }
            $image->move(public_path('/img/products/'),$original);
            $request->foto=$original;
            $data= $request->only([
                'sku',
                'nombre',
                'unidad_medida',
                'descripcion',
                'precio',
                'clasification_id'
            ]);
            $data +=  ['foto'=>$original];
            Product::create($data);
            $notification= 'El producto '. $request->nombre .' se ha registrado correctamente.';
            return redirect('/products')->with(compact('notification'));
        }else{
            $notification= 'Hubo un error al subir la foto del producto, verifique el campo foto e intente de nuevo.';
            return back()->with(compact('notification'));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $clasifications= Clasification::all();
        $productClasification=$product->clasification->id;
        return view('products.show',compact('product','clasifications','productClasification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $clasifications= Clasification::all();
        $productClasification=$product->clasification->id;
        return view('products.edit',compact('product','clasifications','productClasification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules=[
            'sku'=>'required',
            'nombre'=> 'required',
            'foto'=>'mimes:jpeg,jpg,bmp,png,webp|max:91872749',
            'unidad_medida'=>'required',
            'precio'=>'required|numeric',
            'clasification_id'=>'required|numeric',
            'descripcion'=>'required|min:3'
        ];

        $messages=[
            'sku.required'=>'Se requiere introducir un sku.',
            'nombre.required'=>'Se requiere introducir un nombre.',
            'foto.mimes'=>'La foto debe ser extencion .jpg, .jpeg, .bmp, .png ó webp',
            'unidad_medida.required'=>'Se requiere introducir la unidad de medida.',
            'precio.required'=>'Se requiere ingresar el precio.',
            'precio.numeric'=>'El precio debe ser un numero.',
            'clasification_id.required'=>'Se requiere una clasificacion.',
            'clasification_id.numeric'=>'Hubo un problema al ingresar la clasificacion del producto, intente de nuevo.',
            'descripcion.required'=>'Se requiere ingresar una descripcion.'
        ];

        $validation= $this->validate($request,$rules,$messages);

        if($request->hasFile('foto')){
            $oldFoto= $product->foto;
            $image=$request->foto;
            $basename= Str::random();
            $original= $basename . '.' . $image->getClientOriginalExtension();
            if( !is_dir(public_path('/img/products/')) ){
                mkdir( public_path('/img/products/'),0777,true );
            }
            $image->move(public_path('/img/products/'),$original);
            $request->foto=$original;
            $data= $request->only([
                'sku',
                'nombre',
                'unidad_medida',
                'descripcion',
                'precio',
                'clasification_id'
            ]);
            $data +=  ['foto'=>$original];
            $product->update($data);
            File::delete([public_path('/img/products/'.$oldFoto)]);
            $notification= 'El producto '. $request->nombre .' se ha actualizado correctamente.';
            return redirect('/products')->with(compact('notification'));
        }else{
            $data= $request->only([
                'sku',
                'nombre',
                'unidad_medida',
                'descripcion',
                'precio',
                'clasification_id'
            ]);
            $data +=  ['foto'=>$product->foto];
            $product->update($data);
            $notification= "El producto $product->nombre se ha actualizado correctamente.";
            return redirect('/products')->with(compact('notification'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $notification="El producto $product->nombre se ha eliminado correctamente.";
        File::delete([public_path('/img/products/'.$product->foto)]);
        $product->delete();
        return back()->with(compact('notification'));
    }

    public function gallery()
    {
        $clasifications=Clasification::all();
        $products= Product::all();
        return view('products.gallery',compact('products','clasifications'));
    }
}
