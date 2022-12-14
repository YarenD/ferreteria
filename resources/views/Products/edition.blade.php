@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-8"><i class="fas fa-plus"></i>Update product</h1>

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
        <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="sku">SKU:</label>
                <input type="text" class="form-control" name="sku" value={{ $product->sku }} />
            </div>

            <div class="form-group">
                <label for="nombre">Name:</label>
                <input type="text" class="form-control" name="nombre" value={{ $product->nombre }} />
            </div>

            <div class="form-group">
                <label for="unidad_medida">Measure unit:</label>
                <input type="text" class="form-control" name="unidad_medida" value={{ $product->unidad_medida }} />
            </div>

            <div class="form-group">
                <label for="descripcion">Description:</label>
                <input type="text" class="form-control" name="descripcion" value={{ $product->descripcion }} />
            </div>

            <div class="form-group">
                <label for="precio">Price:</label>
                <input type="text" class="form-control" name="precio" value={{ $product->precio }} />
            </div>

            <select class="form-control" name="clasification_id">
                @foreach($clasifications as $clasification)
                <option value="{{ $clasification->id }}">{{ $clasification->nombre }}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="foto">Photo:</label>
                <input type="file" class="form-control" name="foto" value={{ $product->foto }} />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection