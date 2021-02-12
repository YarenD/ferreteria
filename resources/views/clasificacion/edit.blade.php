@extends('layouts.navbar')

@section('title', 'Editar')
@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="elipsis">
                <strong style="text-align: center">Actualizar Clasificación</strong>
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
        <form method="POST" action="{{route('clasificacion.update',$clasificacion->id)}}" >
            {{ csrf_field() }}
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="" class="form-control" value="{{$clasificacion->nombre}}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="" class="form-control" value="{{$clasificacion->descripcion}}">
        </div>
        {{-- <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="" class="form-control" value="{{$clasificacion->color}}">
        </div> --}}
        <div class="form-group">
            <label for="color">Color</label>
            <div id="color" class="input-group colorpicker-component">
          <input type="text" value="{{$clasificacion->color}}" class="form-control" name="color"/>
          <span class="input-group-addon"><i></i></span>
        </div>
        <script type="text/javascript">
            $('#color').colorpicker();
            </script>
            {{-- <input type="text" name="color" id="" class="form-control"> --}}
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
