@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-lg-12">
        <a href="{{ route('clasificaciones.create')}}" class="btn btn-info float-right">Nueva clasificación</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Descripción</td>
                <td>Color</td>
                <td>Productos</td>
                <td colspan="3">Acción</td>
            </tr>
        </thead>
        <tbody>
            @foreach($clasificaciones as $clasificacion)
            <tr>
                <td>{{ $clasificacion->nombre }}</td>
                <td>{{ $clasificacion->descripcion }}</td>
                <td><h4><span class="badge" style="background-color: {{ $clasificacion->color }}">{{ $clasificacion->color }}</span></h4></td>
                <td>{{ $clasificacion->productos->count() }}</td>
                <td><a href="{{ route('clasificaciones.edit',$clasificacion->id) }}" class="btn btn-primary">Editar</a></td>
                <td><form action="{{ route('clasificaciones.destroy',$clasificacion->id)}}" method="post">
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
