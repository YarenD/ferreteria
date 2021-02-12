@extends('layouts.admin')
@section('styles')
    <style>

    </style>
@endsection

@section('content')

    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Producto</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="sku">Sku</label>
                    <input type="text" class="form-control" id="sku" name="sku" value="{{old('sku',$product->sku)}}">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre del producto" value="{{old('nombre',$product->nombre)}}">
                </div>

                <div class="form-group">
                    <label for="unidad_medida">Unidad de medida</label>
                    <input type="text" class="form-control" id="unidad_medida" name="unidad_medida" placeholder="Escriba la unidad" value="{{old('unidad_medida',$product->unidad_medida)}}">
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" name="precio" id="precio" value="{{old('precio',$product->precio)}}">
                </div>

                <div class="row">

                    <div class="col-md-6 text-center">
                        <img src="/img/products/{{$product->foto}}" style="max-height: 300px;width:auto" alt="foto del producto">
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class="form-group">
                            <label for="foto">Foto</label><br>
                            <small class="text-muted">(Sube una foto solo si no se muestra ninguna ó deseas cambiarla.)</small>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto" id="foto">
                                <label class="custom-file-label" for="foto"></label>
                                </div>
                                <div class="input-group-append">
                                <span class="input-group-text" id="">Subir</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="clasification_id">Clasificación</label>
                    <select class="form-control" name="clasification_id" id="clasification_id">
                        <option disabled selected>Escoge una clasificación</option>
                        @foreach($clasifications as $key => $clasification)
                            <option @if (old('clasification_id',$clasification->id) == $productClasification ) selected @endif value="{{$clasification->id}}">
                                {{$clasification->nombre}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="form-control" rows="3" placeholder="Describe brevemente ..." name="descripcion">{{old('descripcion',$product->descripcion)}}</textarea>
                </div>

            </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Guardar</button>
        </div>
        </form>
    </div>

@endsection
@section('scripts')
    <script>

    </script>
@endsection
