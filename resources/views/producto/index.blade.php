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
        <a href="{{route('producto.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Producto</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{route('producto.index')}}">Productos</a></li>
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
                            
                            <th>SKU</th>
                            <th>Nombre</th>
                            <th>Clasificación</th>
                            <th>Descripción</th>
                            <th>Unidad de medida</th>
                            <th>Precio</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                   
                  </table>    
             
            </div>    
@endsection

@section('script')

<!-- DataTables -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js" integrity="sha512-OQlawZneA7zzfI6B1n1tjUuo3C5mtYuAWpQdg+iI9mkDoo7iFzTqnQHf+K5ThOWNJ9AbXL4+ZDwH7ykySPQc+A==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-responsive/2.2.7/dataTables.responsive.min.js" integrity="sha512-4ecidd7I1XWwmLVzfLUN0sA0t2It86ti4qwPAzXW7B0/yIScpiOj7uyvFgu/ieGTEFjO5Ho98RZIqt75+ZZhdA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs/2.2.7/responsive.bootstrap.min.js" integrity="sha512-LVROG6J6mNjjR8g1krDPCuo0JVs8CWI9HtbcR92NOb+McYM3+5Al8u4ehbpum3BPG7ehCRtP90UvB9UaPzNfiA==" crossorigin="anonymous"></script> --}}

<script>
    $(function () {
      var tb; 

      var opciones_datatables={
            "serverSide":true,
                'ajax': {
                  'url': "{{route('productos.datatables')}}",
                  'data': function (d) {
                        d.unidad_medida = 'eos'
                    }
                },
                "columns":[
                {data: 'sku', },
                {data: 'nombre' },
                {data: 'clasificacion.nombre', name:'clasificacion.nombre' },
                {data: 'descripcion'},
                {data: 'unidad_medida' },
                {data: 'precio', className: "text-right", },
                {data: 'created_at', className: "text-center text-nowrap", },
                {data: 'buttons', class: 'text-center text-nowrap'},
                
                ],
                "drawCallback": function(settings){
                  $('.eliminar_registro').click(function(){
                        id = $(this).data('id');
                        alert('¿Estas seguro de eliminar este producto '+id+'?')
                    });
                },
                pageLength: 25,
                responsive: true,
                dom: 'Tflgtip',
                scrollY:        '60vh',
                scrollCollapse: true,
                buttons: [
                    {extend: 'excel', title: 'ordenes'},
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No se encontro ningún registro",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_ registros. (Página _PAGE_ de _PAGES_)",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Última",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                },
                "order": [[ 3, "desc" ]]
            }

        

       tb  = $('#example2').DataTable(opciones_datatables);


       


    });
  </script>

  @endsection