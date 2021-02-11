@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-8"><i class="fas fa-plus"></i>Actualizar producto</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="sku">SKU:</label>
                <input type="text" class="form-control" name="sku" value={{ $producto->sku }} />
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value={{ $producto->nombre }} />
            </div>

            <div class="form-group">
                <label for="unidad_medida">Unidad Medida:</label>
                <input type="text" class="form-control" name="unidad_medida" value={{ $producto->unidad_medida }} />
            </div>

            <div class="form-group">
                <label for="descripcion">descripcion:</label>
                <input type="text" class="form-control" name="descripcion" value={{ $producto->descripcion }} />
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" class="form-control" name="precio" value={{ $producto->precio }} />
            </div>

            <select class="form-control" name="clasificacion_id">
                @foreach($clasificaciones as $clasificacion)
                <option value="{{ $clasificacion->id }}">{{ $clasificacion->nombre }}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control" name="foto" value={{ $producto->foto }} />
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection
