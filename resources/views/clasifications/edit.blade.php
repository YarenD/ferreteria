@extends('layouts.admin')
@section('styles')
    <style>
        #color{
            height: 55px;
            width: 55px;
            border:none;
            padding: 0;
        }
    </style>
@endsection

@section('content')

    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Clasificación</h3>
            <div class="col text-right">
                <a href="{{route('clasifications.index')}}" class="btn btn-sm btn-warning"><b>Cancelar y volver</b></a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{route('clasifications.update',$clasification->id)}}">
            @csrf
            @method('PATCH')
            <div class="card-body">

                <div class="form-group">
                    <div>
                        <label for="color">Escoge un color</label> <br>
                        <input type="color" id="color" name="color"
                            value="{{$clasification->color}}">
                    </div>

                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la clasificación" value="{{$clasification->nombre}}">
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="form-control" rows="3" placeholder="Describe brevemente ..." name="descripcion">{{$clasification->descripcion}}</textarea>
                </div>

            </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Editar</button>
        </div>
        </form>
    </div>

@endsection
@section('scripts')
    <script>

    </script>
@endsection
