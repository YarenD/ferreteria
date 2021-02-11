@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-lg-12">
        <a href="{{ route('productos.create')}}" class="btn btn-info float-right">Nuevo producto</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>SKU</td>
                <td>Nombre</td>
                <td>Clasificación</td>
                <td>Precio</td>
                <td colspan="3">Acción</td>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->sku }}</td>
                <td>{{ $producto->nombre }}</td>
                <td><h4><span class="badge" style="background-color: {{ $producto->clasificacion['color'] }}">{{ $producto->clasificacion['nombre'] }}</span></h4></td>
                <td>$ {{ $producto->precio }}</td>
                <td><a href="{{ route('productos.edit',$producto->id) }}" class="btn btn-primary">Editar</a></td>
                <td><form action="{{ route('productos.destroy',$producto->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-sm-12">

    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}
        </div>
    @endif
    </div>
</div>
@endsection
