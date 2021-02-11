@extends('layouts.base')
@section('estilos')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" />   

@endsection
@section('principal')
@if (Session::has('msg'))
	<div class="alert alert-danger">{{ Session::get('msg') }}</div>
@endif
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="{{route('clasificacion.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva Clasificación</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{route('clasificacion.index')}}">Clasificaciones</a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
    
@endsection
@section('content')
            <div class="col-md-12 mx-auto bg-white p-3">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Color</th>
                            <th>#Productos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clasificacions as $clasificacion)
                       
                        <tr>
                        <td>{{$clasificacion->id}}</td>
                        <td>{{$clasificacion->nombre}}</td>
                        <td>{{$clasificacion->descripcion}}</td>
                      
                        <td style="color:{{$clasificacion->color}}"><div class="" style="background-color:{{$clasificacion->color}}">{{$clasificacion->color}}</div></td>
                        <td>{{count($clasificacion->productos)}}</td>
                            <td>
                               <a href="{{ route('clasificacion.edit',['clasificacion'=> $clasificacion->id])}}" class="btn btn-warning  d-block"><i class="far fa-edit"></i> Editar</a>
                               <?php if($clasificacion->id > 1){?>
                               <a href="{{ route('clasificacion.show',['clasificacion'=> $clasificacion->id])}}" class="btn btn-danger  d-block"><i class="far fa-trash-alt"></i> Eliminar</a>
                               <?php }?>
                            </td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                   
                  </table>    
             
            </div>    
@endsection

@section('script')

<!-- DataTables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js" integrity="sha512-OQlawZneA7zzfI6B1n1tjUuo3C5mtYuAWpQdg+iI9mkDoo7iFzTqnQHf+K5ThOWNJ9AbXL4+ZDwH7ykySPQc+A==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-responsive/2.2.7/dataTables.responsive.min.js" integrity="sha512-4ecidd7I1XWwmLVzfLUN0sA0t2It86ti4qwPAzXW7B0/yIScpiOj7uyvFgu/ieGTEFjO5Ho98RZIqt75+ZZhdA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs/2.2.7/responsive.bootstrap.min.js" integrity="sha512-LVROG6J6mNjjR8g1krDPCuo0JVs8CWI9HtbcR92NOb+McYM3+5Al8u4ehbpum3BPG7ehCRtP90UvB9UaPzNfiA==" crossorigin="anonymous"></script>

<script>
    $(function () {
 
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  @endsection