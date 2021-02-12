@extends('layouts.admin')
@section('styles')
    <style>

    </style>
@endsection

@section('content')

    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Crear Nuevo Producto</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
            @csrf
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
                    <input type="text" class="form-control" id="sku" name="sku" placeholder="Escriba el sku" value="{{old('sku')}}">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre del producto" value="{{old('nombre')}}">
                </div>

                <div class="form-group">
                    <label for="unidad_medida">Unidad de medida</label>
                    <input type="text" class="form-control" id="unidad_medida" name="unidad_medida" placeholder="Escriba la unidad" value="{{old('unidad_medida')}}">
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" name="precio" id="precio" value="{{old('precio')}}">
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="foto" value="{{old('foto')}}">
                        <label class="custom-file-label" for="foto">Sube una foto</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Subir</span>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="clasification_id">Clasificación</label>
                    <select class="form-control" name="clasification_id" id="clasification_id">
                        <option disabled selected>Escoge una clasificación</option>
                        @foreach($clasifications as $key => $clasification)
                            <option @if (old('clasification_id') == $clasification->id ) selected @endif value="{{$clasification->id}}">{{$clasification->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="form-control" rows="3" placeholder="Describe brevemente ..." name="descripcion">{{old('descripcion')}}</textarea>
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
