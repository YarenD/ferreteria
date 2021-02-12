@extends('layouts.navbar')

@section('title', 'Productos')
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
                'create' => route('producto.create'),
                'index' => route('producto.index'),
                'module' => 'productos'
            ])
            @endcomponent
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Editar</td>
                        <td>Eliminar</td>
                        <td>ID</td>
                        <td>SKU</td>
                        <td>Nombre</td>
                        <td>Clasificacion</td>
                        <td>Color</td>
                        <td>Precio</td>
                    </tr>
                </thead>
              <tbody>
                    @foreach($productos as $producto)
                       <tr>
                        <td>

                            <a href="{{route('producto.edit',$producto->id)}}" ><img src="{{asset('img/editar.png')}}"  style="width: 30px"/></a>
                        </td>
                        <td>
                            <form action="{{route('producto.destroy',$producto->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="border: none"><img src="{{asset('img/eliminar.png')}}"  style="width: 30px;" alt="" ></button>
                            </form>
                        </td>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->sku}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->clasificacion->nombre}}</td>
                        <td style="background-color:{{$producto->clasificacion->color}}"></td>
                        <td>${{$producto->precio}}</td>


                       </tr>
                    @endforeach
                </tbody>

            </table>



        </div>
    </div>
</div>

@endsection
