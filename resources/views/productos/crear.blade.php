@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-6">Agregar nuevo producto</h1>
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
    <form method="post" action="{{ route('productos.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="sku">SKU:</label>
            <input type="text" class="form-control" name="sku"/>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre"/>
        </div>

        <div class="form-group">
            <label for="unidad_medida">Unidad Medida:</label>
            <input type="text" class="form-control" name="unidad_medida"/>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <input type="text" class="form-control" name="descripcion"/>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" name="precio"/>
        </div>

        <select class="form-control" name="clasificacion_id">
            @foreach($clasificaciones as $clasificacion)
            <option value="{{ $clasificacion->id }}">{{ $clasificacion->nombre }}</option>
            @endforeach
        </select>

        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" class="form-control" name="foto" onchange="onFileSelected(event)"/>
            <img id="myimage" height="85">
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<script>
    function onFileSelected(event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById("myimage");
        imgtag.title = selectedFile.name;

        reader.onload = function(event) {
            imgtag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }
</script>
@endsection
