@extends('layouts.admin')
@section ('contenido')
<div class="row justify-content-center align-items-center">
	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
		<h4>Galeria de Fotos</h4>
	</div>
</div>
<div class="row justify-content-center align-items-center">
</div>
<br>
{{-- @php
	$counts = 0;
@endphp --}}
<div class="row justify-content-center align-items-center">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		@foreach ($prod as $item)
            <td><img src="storage/{{ $item->foto }}" height="130px" width="130px" /></td>
        @endforeach
		</div>
	</div>
</div>


@endsection

@push('scripts')


  

@endpush