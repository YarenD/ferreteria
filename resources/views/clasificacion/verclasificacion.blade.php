@extends('layouts.navbar')

@section('title', 'Clasificacion')
@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="elipsis">
                <strong>Clasificaciones</strong>


            </span>
            <span class="elipsis">
                <strong>Clasificaciones</strong>


            </span>
        </div>

        <div class="panel-body">

            <table class="table table-striped">
                <thead>
                    <tr style="background-color: #132562; color:#fff; ">

                        <td>Nombre del producto</td>
                        <td>Color</td>


                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $clasificacion)

                       <tr>

                        <td>{{$clasificacion->nombre}}</td>
                        <td style="background-color: {{$clasificacion->color}}"></td>
                       </tr>
                    @endforeach

                </tbody>

            </table>
            <a href="{{ url()->previous() }}">
                <button type="button" class="btn btn-warning btn-sm">
                    <i class="far fa-times-circle"></i> CANCELAR
                </button>
          </a>


        </div>
    </div>
</div>

@endsection
