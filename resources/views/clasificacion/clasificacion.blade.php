@extends('layouts.navbar')

@section('title', 'Clasificacion')
@section('content')

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="elipsis">
                <strong>Clasificaciones</strong>
            </span>
        </div>
        <div class="panel-body">
            @component('componentes.crear', [
                'create' => route('clasificacion.create'),
                'index' => route('clasificacion.index'),
                'module' => 'clasificacion'
            ])
            @endcomponent
            <table class="table table-striped">
                <thead>
                    <tr>

                            <td>Editar</td>
                            <td>Eliminar</td>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Descripcion</td>
                            <td>Color</td>

                            <td>Productos relacionados</td>


                    </tr>
                </thead>
                <tbody>
                    @foreach($clasificaciones as $clasificacion)
                       <tr>

                        <td>

                            <a href="{{route('clasificacion.edit',$clasificacion->id)}}" ><img src="{{asset('img/editar.png')}}"  style="width: 30px"/></a>
                        </td>

                        <td>
                            <form action="{{route('clasificacion.destroy',$clasificacion->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="border: none"><img src="{{asset('img/eliminar.png')}}"  style="width: 30px;" alt="" ></button>
                            </form>
                        </td>

                        <td>{{$clasificacion->id}}</td>
                        <td>{{$clasificacion->nombre}}</td>
                        <td>{{$clasificacion->descripcion}}</td>
                        <td style="background-color: {{$clasificacion->color}}"></td>
                        <td>
                            <a href="{{route('ver.edit',$clasificacion->id)}}" style=" align=center">        ver más </a>

                        </td>
                       </tr>
                    @endforeach
                </tbody>

            </table>



        </div>
    </div>
</div>

@endsection
