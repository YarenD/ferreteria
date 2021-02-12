@extends('layouts.admin')
@section ('contenido')
<div class="row justify-content-center align-items-center">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
		<h3>NUEVO PRODUCTO</h3>
	</div>
</div>
<form method="post" action="{{ URL::action('ProductosController@store') }}" enctype=multipart/form-data>
    @csrf
 
        <div><br> <br></div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="clasificacion">Clasificacion</label>
                   <select class="form-control" name="clasificacion" id="clasificacion">
                    @foreach ($clasificaciones as $p)
                    <option value="{{ $p->id }}" selected>
                        {!! $p->nombre !!}
                    </option>
                @endforeach			 
                   </select>
             </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="sku">Sku</label>
                    <input type="text" name="sku" id="sku"  placeholder="Sku..." class="form-control" required>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre..." required>
                </div>			
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="medida">Unidad de medida</label>
                    <input type="text" name="medida" id="medida" class="form-control" placeholder="Unidad de medida..." required>
                </div>			
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion..." required>
                </div>			
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio..." required>
                </div>			
            </div>
            
        </div>
        

        <div class="row">
            <div class="col-md-4">
                <label for="foto">Foto</label>
                <div class="file-loading">
					<input id="foto" name="foto" class="form-control" type="file" accept="image/*"/>
				</div>
            </div>
        </div>

        <legend></legend>
		<div class="row justify-content-center align-items-center">
			<div class="col-md-2">
				<button class="btn btn-success btn-block btn-lg">Guardar</button>
			</div>
			<div class="col-md-2">
				<a href="{{URL::action('ProductosController@index')}}" class="btn btn-primary btn-block btn-lg" title="Salir">Salir</a>
			</div>
		</div>

</form>

@endsection

@push('scripts')
<script>

$('#clasificacion').select2({
			placeholder: "Clasificacion"
		});
    
</script>

@endpush