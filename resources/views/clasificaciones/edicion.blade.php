@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-8"><i class="fas fa-plus"></i>Actualizar clasificacion</h1>

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
        <form method="post" action="{{ route('clasificaciones.update', $clasificacion->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value={{ $clasificacion->nombre }} />
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion" value={{ $clasificacion->descripcion }} />
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" name="color"  onchange="onFileSelected(event)" value={{ $clasificacion->color }}/>
                <img id="myimage" height="85">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
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
