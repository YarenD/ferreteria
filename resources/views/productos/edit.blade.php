@extends('layouts.navbar')

@section('title', 'Editar')
@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="elipsis">
                <strong style="text-align: center">Actualizar Producto</strong>
            </span>
        </div>
    </div>
</div>

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
    <div class="col-12 ">
        <form method="POST" action="{{route('producto.update',$producto->id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
        @method('PUT')
        @csrf
        {{-- <div class="form-group">
            <label for="id_clasificacion">Clasificación</label>
            <select name="id_clasificacion" id="">

            @foreach ($clasificacion as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>

            @endforeach
            </select>

        </div> --}}
        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="" class="form-control" value="{{$producto->sku}}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="" class="form-control" value="{{$producto->nombre}}">
        </div>
        <div class="form-group">
            <label for="unidad_medida">Unidad de medidad</label>
            <input type="text" name="unidad_medida" id="" class="form-control" value="{{$producto->unidad_medida}}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="" class="form-control" value="{{$producto->descripcion}}">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="" class="form-control" value="{{$producto->precio}}">
        </div>
        @if($producto->foto)
            <img src="{{$producto->foto}}" alt="ferreteria" style="width:300px; high:auto">

        @endif

        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="" class="form-control" value="{{$producto->foto}}">
        </div>


        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ url()->previous() }}">
            <button type="button" class="btn btn-warning btn-sm">
                <i class="far fa-times-circle"></i> CANCELAR
            </button>
      </a>
        </form>
    </div>

</div>



@endsection
