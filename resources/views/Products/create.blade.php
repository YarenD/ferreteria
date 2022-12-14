@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-6">New product</h1>
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
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrfclasification
        <div class="form-group">
            <label for="sku">SKU:</label>
            <input type="text" class="form-control" name="sku"/>
        </div>

        <div class="form-group">
            <label for="nombre">Name:</label>
            <input type="text" class="form-control" name="nombre"/>
        </div>

        <div class="form-group">
            <label for="unidad_medida">Measure unit:</label>
            <input type="text" class="form-control" name="unidad_medida"/>
        </div>

        <div class="form-group">
            <label for="descripcion">Description:</label>
            <input type="text" class="form-control" name="descripcion"/>
        </div>

        <div class="form-group">
            <label for="precio">Price:</label>
            <input type="text" class="form-control" name="precio"/>
        </div>

        <select class="form-control" name="clasification_id">
            @foreach($clasifications as $clasification)
            <option value="{{ $clasification->id }}">{{ $clasification->nombre }}</option>
            @endforeach
        </select>

        <div class="form-group">
            <label for="foto">Photo:</label>
            <input type="file" class="form-control" name="foto" onchange="onFileSelected(event)"/>
            <img id="image" height="85">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<script>
    function onFileSelected(event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();
        var imgtag = document.getElementById("image");
        imgtag.title = selectedFile.name;
        reader.onload = function(event) {
            imgtag.src = event.target.result;
        };
        reader.readAsDataURL(selectedFile);
    }
</script>
@endsection