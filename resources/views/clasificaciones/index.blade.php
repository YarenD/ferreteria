@extends('layouts.admin')
@section ('contenido')
<div class="row justify-content-center align-items-center">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
		<h3>CLASIFICACIONES</h3>
	</div>
</div>
<div class="row justify-content-center align-items-center">
	<div class="col-md-2">
		<a href="{{URL::action('ClasificacionesController@create')}}" class="btn btn-success btn-block btn-lg" title="Nuevo">Nuevo</a>
	</div>
</div>
<br>
{{-- @php
	$counts = 0;
@endphp --}}
<div class="row justify-content-center align-items-center">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">

			<table class="table table-striped table-bordered table-hover" id="example">
				<thead>
					<th>Id</th>
					<th>Nombre Clasificacion</th>
					<th>Descripcion</th>
					<th>Color</th>
					<th>Cantidad Productos</th>
					<th>Acciones</th>
				</thead>
				@foreach($clasificaciones as $c)
					<tr>
						<td>{{ $c->id }}</td>
						<td>{{ $c->nombre }}</td>
						<td>{{ $c->descripcion }}</td>
						<td>{{ $c->color }}</td>

						@foreach($contador as $i)
						@if($loop->index)
							<td>{{ $i->cantidad }}</td>
						@endif
						@endforeach
						
							
						
						<td align="center">
							<form method="post" action="{{ URL::action('ClasificacionesController@destroy', $c->id) }}">
								@method('delete')
								@csrf
								<a class="btn btn-info" href="{{ URL::action('ClasificacionesController@show', $c->id) }}" title="Ver más">
									<i class="fa fa-eye">
									</i>
								</a>
								<a class="btn btn-warning" href="{{ URL::action('ClasificacionesController@edit', $c->id) }}" title="Editar">
									<i class="fa fa-pencil">
									</i>
								</a>
								<button class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar la Clasificacion?');" title="Eliminar">
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