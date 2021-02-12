@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Clasificaciones</b></h3>
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
            <a href="{{route('clasifications.create')}}" class="btn btn-primary float-right mb-2">
                Nueva Clasificación
                <i class="nav-icon fa fa-bookmark" aria-hidden="true"></i>
            </a>
      <table class="table table-bordered">
        <thead>
          <tr>
            {{-- <th style="width: 10px">#</th> --}}
            <th style="width: 40px">Color</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th style="width: 180px">Productos</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @if(count($clasifications) == 0)
                <tr>
                    <td></td>
                    <td>
                        <p>
                            <a href="{{route('clasifications.create')}}" class="btn btn-block btn-info btn-lg">Click aqui para crear una nueva clasificacion.</a>
                        </p>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @else
                @foreach($clasifications as $key => $clasification)
                    <tr>
                        {{-- <td>{{$key}}</td> --}}
                        <td><span class="badge" style="background-color: {{$clasification->color}}">{{$clasification->color}}</span></td>
                        <td>{{$clasification->nombre}}</td>
                        <td>
                            <p>{{$clasification->descripcion}}</p>
                        </td>
                        <td>
                            @foreach($clasification->products as $key => $product)
                                <span class="badge" style="background-color: {{$clasification->color}}">
                                    {{$product->nombre}}
                                </span>
                            @endforeach
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('clasifications.show',$clasification->id)}}">
                                <i class="fas fa-folder">
                                </i>
                                Ver
                            </a>
                            <a class="btn btn-info btn-sm" href="{{route('clasifications.edit',$clasification->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Editar
                            </a>
                            <form action="{{route('clasifications.destroy',$clasification->id)}}" method="POST" class="d-inline">
                                <button class="btn btn-sm btn-danger ">Eliminar</button>
                                @method('DELETE')
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
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
