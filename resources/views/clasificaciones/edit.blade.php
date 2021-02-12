@extends('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
		<h3>Editar Clasificacion</h3>
		<div class="progress" style="height: 2px;"></div>
	</div>
</div>
</br>
<form method="post" action="{{ URL::action('ClasificacionesController@update' , $clasificaciones->id)}}" enctype=multipart/form-data>
    @csrf
    @method('PUT')
    
		<div class="form-group col-md-5">
			<label for="nombre" class="form-check-label">Nombre </label>
    		<input type="text" name="nombre" id="nombre" class="form-control" value="{{ $clasificaciones->nombre }}" required>
        </div>

        <div class="form-group col-md-5">
			<label for="descripcion" class="form-check-label">Descripcion</label>
			<input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $clasificaciones->descripcion }}" required>

		</div>
        <div class="form-group col-md-5">
			<label for="color" class="form-check-label">Color </label>
			<input type="text" name="color" id="color" class="form-control" value="{{ $clasificaciones->color }}" required>

		</div>
        <br>
        <div class="col-md-2">
            <button class="btn btn-success btn-block btn-lg">Guardar</button>
        </div>
	
</form>

@endsection