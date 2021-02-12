@extends('layouts.admin')
@section ('contenido')
<div class="row justify-content-center align-items-center">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
		<h3>Ver Productos</h3>
		<div class="progress" style="height: 2px;"></div>
	</div>
</div>
</br>

   
		<div class="form-group col-md-5">
			<label for="nombre" class="form-check-label">Clasificacion </label>
    		<input type="text"  class="form-control" value="{{ $productos->clasificacion->nombre }}" disabled>
        </div>
        <br>
        <div class="col-md-5">
            <label for="nombre" class="form-check-label">Sku</label>
    		<input type="text"  class="form-control" value="{{$productos->sku}}" disabled>
		</div>
        <br>
        <div class="col-md-5">
            <label for="nombre" class="form-check-label">Nombre</label>
    		<input type="text"  class="form-control" value="{{$productos->nombre}}" disabled>
		</div>
        <br>
        <div class="col-md-5">
            <label for="nombre" class="form-check-label">Unidad de Medida</label>
    		<input type="text"  class="form-control" value="{{$productos->unidad_medida}}" disabled>
		</div>
        <br>
        <div class="col-md-5">
            <label for="nombre" class="form-check-label">Precio</label>
    		<input type="text"  class="form-control" value="{{$productos->precio}}" disabled>
		</div>
        <br>
        <div class="col-md-5">
            <label for="nombre" class="form-check-label">Foto</label>
            <img class="zoom" src="../storage/{{ $productos->foto }}" height="400px" width="450px" alt="Responsive image" >
		</div>

        </br>
        </br>
        <div class="row" >
            <div class="col-md-3">
                <a href="{{URL::action('ProductosController@index')}}" class="btn btn-primary btn-block btn-lg" title="Salir">Volver</a>
            </div>
        </div>
	
@endsection