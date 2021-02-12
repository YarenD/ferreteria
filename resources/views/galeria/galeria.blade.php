@extends('layouts.navbar')

@section('title', 'Productos')
@section('content')
@foreach($productos as $producto)
<div class="col-md-12">
    <div class="card">

        <div class="card-body">
            <div class="card-title text-center">

                <h2 class="text-center" >{{$producto->nombre}}</h2>

            </div>
            <img src="{{$producto->foto}}" class="rounded mx-auto d-block" alt="..." style="width: 300px;high:auto;">
          </div>
        {{-- <img src="{{$producto->foto}}" class="img-fluid" alt="..." style="width: 300px;high:auto;"> --}}

    </div>
</div>
@endforeach

@endsection
