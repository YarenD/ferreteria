@extends('layouts.navbar')



@section('title', 'Producto')
@section('content')


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
<div class="col-md-12 container">
    <div class="col-12">
        <form action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_clasificacion">Clasificación</label>
                <select name="id_clasificacion" id="">

                @foreach ($clasificacion as $item)
                <option value="{{$item->id}}">{{$item->nombre}}</option>

                @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" name="sku" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="nombre">Nombres</label>
                <input type="text" name="nombre" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="unidad_medida">Unidad de medidad</label>
                <input type="text" name="unidad_medida" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ url()->previous() }}">
                <button type="button" class="btn btn-warning btn-sm">
                    <i class="far fa-times-circle"></i> CANCELAR
                </button>
          </a>

        </form>
    </div>
</div>



@endsection
