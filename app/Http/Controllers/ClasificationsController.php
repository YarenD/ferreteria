<?php

namespace App\Http\Controllers;

use App\Clasification;
use Illuminate\Http\Request;

class ClasificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasifications= Clasification::all();
        return view('clasifications.index',compact('clasifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clasifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
            'color'=>'required|min:6',
            'nombre'=>'required|min:3',
            'descripcion'=>'required|min:8',
        ];
        $messages=[
            'color.required'=>'Es necesario agregar un color.',
            'color.min'=>'Hubo un error al agregar color, intente de nuevo.',
            'nombre.required'=>'Es necesario agregar un nombre.',
            'descripcion.required'=>'Es necesario agregar una descripcion.',
            'descripcion.min'=>'La descripcion no puede ser menor a 4 caracteres.',
        ];

        $this->validate($request,$rules,$messages);

        if(Clasification::create($request->only('color','nombre','descripcion'))){
            $notification="La clasificacion ". $request->nombre." se ha registrado correctamente";
            return redirect('/clasifications')->with(compact('notification'));
        }else{
            $notification="Hubo un error al intentar guardar la clasificacion revise los campos e intente de nuevo.";
            return back()->with(compact('notification'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clasification  $clasification
     * @return \Illuminate\Http\Response
     */
    public function show(Clasification $clasification)
    {
        return view('clasifications.show',compact('clasification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clasification  $clasification
     * @return \Illuminate\Http\Response
     */
    public function edit(Clasification $clasification)
    {
        return view('clasifications.edit',compact('clasification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clasification  $clasification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clasification $clasification)
    {
        $rules= [
            'color'=>'required|min:6',
            'nombre'=>'required|min:3',
            'descripcion'=>'required|min:4',
        ];

        $messages=[
            'color.required'=>'Es necesario agregar un color.',
            'color.min'=>'Hubo un error al agregar color, intente de nuevo.',
            'nombre.required'=>'Es necesario agregar un nombre.',
            'description.required'=>'Es necesario agregar una descripcion.',
            'description.required'=>'La descripcion no puede ser menor a 4 caracteres.',
        ];

        $this->validate($request,$rules,$messages);

        if($clasification->update($request->only('color','nombre','descripcion'))){
            $notification="La clasificacion ". $request->nombre." se ha actualizado correctamente";
            return redirect('/clasifications')->with(compact('notification'));
        }else{
            $notification="Hubo un error al intentar guardar la clasificacion revise los campos e intente de nuevo.";
            return back()->with(compact('notification'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clasification  $clasification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clasification $clasification)
    {
        $notification='La clasificacion '. $clasification->nombre.' se ha eliminado correctamente.';
        $clasification->delete();
        return redirect('clasifications')->with(compact('notification'));
    }
}
