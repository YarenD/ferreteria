<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasifications;
use App\Models\Products;

class ClasificationsController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasifications = Clasification::get();
        return view('clasifications.index', compact('clasifications'));
    }

    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/clasifications.create');
    }

    /**
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

        $clasification = new Clasification([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'color' => $request->get('color')
        ]);

        $clasification->saveOrFail();
        return redirect('/clasifications')->with('success', 'Clasification Saved!');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clasification = Clasification::find($id);
        return view('/clasifications.edit', compact('clasification'));
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'color' => 'required'
        ]);

        $clasification = Clasification::find($id);
        $clasification->nombre = $request->get('nombre');
        $clasification->descripcion = $request->get('descripcion');
        $clasification->color = $request->get('color');

        $clasification->saveOrFail();
        return redirect('/clasifications')->with('success', 'Clasification Updated!');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clasification = Clasification::findOrFail($id);
        $clasification->delete();

        return redirect('/clasifications')->with('success', 'Clasification Deleted!');
    }
}