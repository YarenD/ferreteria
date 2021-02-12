@extends('layouts.admin')
@section ('contenido')
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <h3>Ver Clasificaciones</h3>
                <div class="progress" style="height: 2px;"></div>
            </div>
        </div>
        </br>
		<div class="form-group col-md-5">
			<label for="nombre" class="form-check-label">Nombre </label>
    		<input type="text"  class="form-control" value="{{ $clasificaciones->nombre }}" disabled>
        </div>
        <br>
        <div class="col-md-5">
            <label for="nombre" class="form-check-label">Descripcion</label>
    		<input type="text"  class="form-control" value="{{$clasificaciones->descripcion}}" disabled>
		</div>
        <br>
        <div class="col-md-5">
            <label for="nombre" class="form-check-label">Color</label>
    		<input type="text"  class="form-control" value="{{$clasificaciones->color}}" disabled>
		</div>

        </br>
        </br>
        <div class="row" >
            <div class="col-md-3">
                <a href="{{URL::action('ClasificacionesController@index')}}" class="btn btn-primary btn-block btn-lg" title="Salir">Volver</a>
            </div>
        </div>
	
@endsection