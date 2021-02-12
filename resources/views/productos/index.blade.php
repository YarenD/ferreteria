@extends('layouts.admin')
@section ('contenido')
<div class="row justify-content-center align-items-center">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
		<h3>PRODUCTOS</h3>
	</div>
</div>
<div class="row justify-content-center align-items-center">
	<div class="col-md-2">
		<a href="{{URL::action('ProductosController@create')}}" class="btn btn-success btn-block btn-lg" title="Nuevo">Nuevo</a>
	</div>
</div>
<br>

<div class="row justify-content-center align-items-center">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">

			<table class="table table-striped table-bordered table-hover" id="example">
				<thead>
					<th>Id</th>
					<th>Clasificacion</th>
					<th>Sku</th>
					<th>Nombre</th>
					<th>U.medida</th>
					<th>Precio</th>
					<th>Foto</th>
				
					<th>Acciones</th>
				</thead>
				@foreach($productos as $p)
					<tr>
						<td>{{ $p->id }}</td>
						<td>{{ $p->clasificacion->id }}</td>
						<td>{{ $p->sku }}</td>
						<td>{{ $p->nombre }}</td>
						<td>{{ $p->unidad_medida }}</td>
						<td>{{ $p->precio }}</td>
						{{-- <td>
                            <img class="zoom" width="50px" src="../../uploads/{{$p->foto}}">
                        </td> --}}

						<td><img src="storage/{{ $p->foto }}" height="130px" width="130px" /></td>
						
						<td align="center">
							<form method="post" action="{{ URL::action('ProductosController@destroy', $p->id) }}">
								@method('delete')
								@csrf
								<a class="btn btn-info" href="{{ URL::action('ProductosController@show', $p->id) }}" title="Ver más">
									<i class="fa fa-eye">
									</i>
								</a>
								<a class="btn btn-warning" href="{{ URL::action('ProductosController@edit', $p->id) }}" title="Editar">
									<i class="fa fa-pencil">
									</i>
								</a>
								<button class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar El Producto?');" title="Eliminar">
									<i class="fa fa-remove">
									</i>
								</button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>


@endsection

@push('scripts')

	<script>
  		$('#example').DataTable({
        	dom: 'Bfrtip',
        	buttons: [
				'excel'
        	],
     	});
  	</script>

@endpush