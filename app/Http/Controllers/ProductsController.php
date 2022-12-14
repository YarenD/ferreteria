<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Products;
use App\Models\Clasifications;
use File;

class ProductsController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('/products.index', compact('products'));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clasifications = Clasification::get();
        return view('/products.create', compact('products'));
    }

    /**
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
            'clasification_id' => 'required',
            'foto' => 'required'
        ]);
        $file_temp = $request->file('foto');
        $img = Image::make($file_temp)->resize(500, 300, function($constraint){
            $constraint->aspectRatio();
        });
        $img->encode('jpg', 95);

        $file_name = Str::random(10) . '.jpg';
        Storage::disk('products_photos')->put($file_name, $img);

        $product = new Product([
            'sku' => $request->get('sku'),
            'nombre' => $request->get('nombre'),
            'unidad_medida' => $request->get('unidad_medida'),
            'descripcion' => $request->get('descripcion'),
            'precio' => $request->get('precio'),
            'foto' => $file_name,
            'clasification_id' => $request->get('clasification_id')
        ]);

        $product->saveOrFail();
        return redirect('/products')->with('success', 'Product Saved!');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $clasifications = Clasification::get();
        return view('/products.edit', compact('product', 'clasifications'));
    }

    /**
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
            'clasification_id' => 'required'
        ]);

        $product = Product::find($id);

        if($request->has('foto'))
        {
            if ( Storage::disk('products_photos')->has($product->foto) ){
                Storage::disk('products_photos')->delete($product->foto);
            }

            $file_temp = $request->file('foto');
            $img = Image::make($file_temp)->resize(500, 300, function($constraint){
                $constraint->aspectRatio();
            });
            $img->encode('jpg', 75);

            $file_name = Str::random(10) . '.jpg';
            Storage::disk('products_photos')->put($file_name, $img);
            $product->foto = $file_name;
        }

        $product->sku = $request->get('sku');
        $product->nombre = $request->get('nombre');
        $product->unidad_medida = $request->get('unidad_medida');
        $product->descripcion = $request->get('descripcion');
        $product->precio = $request->get('precio');
        $product->clasification_id = $request->get('clasification_id');

        $product->saveOrFail();
        return redirect('/products')->with('success', 'Product Updated!');




        $product->saveOrFail();

        return response()->json([
            'message' => '¡The data have been updated!'
        ], 200);
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Product Deleted!');
    }
}