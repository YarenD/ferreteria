@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-6">Agregar nueva clasificacion</h1>
    <div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    <form method="post" action="{{ route('clasificaciones.store') }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre"/>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <input type="text" class="form-control" name="descripcion"/>
        </div>

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" class="form-control" name="color"/>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection
