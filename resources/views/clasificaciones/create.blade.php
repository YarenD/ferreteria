@extends('layouts.admin')
@section ('contenido')
<div class="row justify-content-center align-items-center">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
		<h3>NUEVA CLASIFICACION</h3>
	</div>
</div>
<form method="post" action="{{ URL::action('ClasificacionesController@store') }}" enctype=multipart/form-data>
    @csrf
   {{--  <legend>Clasificaciones</legend> --}}
        <div><br> <br></div>
        <div class="row">
            <div class="col col-md-5">
                <div class="form-group">
                    <label for="nombre">Nombre </label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre Clasificacion..." required>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion"  placeholder="Descripcion..." class="form-control" required>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="legajo">Color</label>
                    <input type="text" name="color" id="color" class="form-control" placeholder="Color..." required>
                </div>			
            </div>
        </div>

        <legend></legend>
		<div class="row justify-content-center align-items-center">
			<div class="col-md-2">
				<button class="btn btn-success btn-block btn-lg">Guardar</button>
			</div>
			<div class="col-md-2">
				<a href="{{URL::action('ClasificacionesController@index')}}" class="btn btn-primary btn-block btn-lg" title="Salir">Salir</a>
			</div>
		</div>

</form>

@endsection