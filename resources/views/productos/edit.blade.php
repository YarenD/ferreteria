@extends('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
		<h3>Editar Producto</h3>
		<div class="progress" style="height: 2px;"></div>
	</div>
</div>
</br>
<form method="post" action="{{ URL::action('ProductosController@update',$productos->id)}}" enctype=multipart/form-data>
    @csrf
    @method('PUT')
	<div class="form-group col-md-5">
		<label for="id_clasificacion" class="form-check-label">Clasificacion</label>
		   <select class="form-control" name="id_clasificacion" id="id_clasificacion">
			 @foreach($clasificaciones as $c)
			   <option value="{{ $c->id }}" {{ ( $productos->id_clasificacion == $c->id) ? 'selected' : '' }}>  {{ $c->nombre }} </option>
			 @endforeach			 
		   </select>
	 </div>
	
	<div class="col-md-5">
		<label for="nombre" class="form-check-label">Sku</label>
		<input type="text" name="sku" id="sku" class="form-control" value="{{$productos->sku}}">
	</div>
	<br>
	<div class="col-md-5">
		<label for="nombre" class="form-check-label">Nombre</label>
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{$productos->nombre}}">
	</div>
	<br>
	<div class="col-md-5">
		<label for="nombre" class="form-check-label">Unidad de Medida</label>
		<input type="text" name="medida" id="medida" class="form-control" value="{{$productos->unidad_medida}}">
	</div>
	<br>
	<div class="col-md-5">
		<label for="nombre" class="form-check-label">Descripcion</label>
		<input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$productos->descripcion}}">
	</div>
	<br>
	<div class="col-md-5">
		<label for="nombre" class="form-check-label">Precio</label>
		<input type="text" name="precio" id="precio" class="form-control" value="{{$productos->precio}}">
	</div>
	<br>
	<div class="col-md-5">
		<label>Foto</label>
		<label class="btn btn-default btn-file col-md-12">
			Elegir<input type="file" style="display: none;" name="foto" id="foto">
		</label>
	</div>
        <br>
        <div class="col-md-2">
            <button class="btn btn-success btn-block btn-lg">Guardar</button>
        </div>
	
</form>

@endsection