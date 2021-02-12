@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Productos</b></h3>
    </div>
    <!-- /.card-header -->
    @if(session('notification'))
        <div class="card-body">
            <div class="alert alert-info" role="alert">
                {{session('notification')}}
            </div>
        </div>
    @endif
    <div class="card-body">
            <a href="{{route('products.create')}}" class="btn btn-primary float-right mb-2">
                Nuevo Producto
                <i class="nav-icon fa fa-bookmark" aria-hidden="true"></i>
            </a>
      <table class="table table-bordered">
        <thead>
          <tr>
            {{-- <th style="width: 10px">#</th> --}}
            <th style="width: 40px">Clasificación</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th style="width: 100px">Foto</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @if(count($clasifications) == 0 )
                <tr>
                    <td></td>
                    <td>
                        <p>
                            <a href="{{route('clasifications.create')}}" class="btn btn-block btn-info btn-lg">Click aqui para crear una clasificacion para tu producto</a>
                        </p>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @else
                 @if(count($products) == 0)
                    <tr>
                        <td></td>
                        <td>
                            <p>
                                <a href="{{route('products.create')}}" class="btn btn-block btn-info btn-lg">Al parecer no tienes productos, click aqui para crear un producto nuevo</a>
                            </p>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @else
                        @foreach($products as $key => $product)
                            <tr>
                                {{-- <td>{{$key}}</td> --}}
                                <td><span class="badge" style="background-color: {{$product->clasification->color}}">{{$product->clasification->nombre}}</span></td>
                                <td>{{$product->nombre}}</td>
                                <td>
                                    <p>{{$product->descripcion}}</p>
                                </td>
                                <td>
                                    <span class="badge" style="background-color: {{$product->clasification->color}}">
                                        <img src="{{'/img/products/'.$product->foto}}" class="w-100" alt="foto del producto">
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('products.show',$product->id)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        Ver
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('products.edit',$product->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Editar
                                    </a>
                                    <form action="{{route('products.destroy',$product->id)}}" method="POST" class="d-inline">
                                        <button class="btn btn-sm btn-danger ">Eliminar</button>
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                @endif
            @endif


        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
      </ul>
    </div>
  </div>
  <!-- /.card -->

@endsection
