<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ferreteria de pedro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('\fontawesome\css\all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://adndigital.mx" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://adndigital.mx" class="nav-link">Contacto</a>
      </li>
    </ul>



<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="https://adndigital.mx/img/logo-negativo.png"
           alt="AdminLTE Logo"
           class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-light">FERRETERIA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}} {{Auth::user()->last_name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Productos
              </p>
            </a>
            <a href="{{ route('clasificaciones') }}" class="nav-link">
                <i class="nav-icon far fa-bookmark" ></i>
                <p>
                  Clasificaciones
                </p>
            </li>
        </a>
          <li class="nav-item has-treeview">
            <a  href="{{ route('logout') }}"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">

              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Cerrar Sesión

              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-hammer"></i> FERRETERIA DE PEDRO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Clasificaciones</h3>
          <div class="card-tools">
            <i class="far fa-plus-square" data-toggle="modal" data-target="#createClasification"></i>
          </div>
        </div>
        <div class="card-body">
            <div class="col-12">
                 <!--  Clasifications Table -->
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Color</th>
                            <th scope="col">No. Productos</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="datos_clasificaciones">
                    </tbody>
                </table>
                 <!--  /.Table -->
            </div>
        </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('moduls.clasifications.sections.create_clasification')
  @include('moduls.clasifications.sections.update_clasification')
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; {{date('Y')}} <a href="https://adndigital.mx">www.adndigital.mx</a>.</strong> Todos los derechos reservados
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.0/dist/js/adminlte.min.js"></script>
{{-- 1 --}}
<script>
    $("#guardar").click(
    function()
    {
        var nombre =$("#nombre").val();
        var descripcion =$("#descripcion").val();
        var colors =$("#colors").val();
        var route ="create_clasificacion";
        $.ajax({
            type: "post",
            url: route,
            dataType: 'json',
            data:{
                _token: '{{csrf_token()}}',
                nombre: nombre,
                descripcion: descripcion,
                colors: colors
            }
        });
        location.reload();
    });
</script>
{{-- 2 --}}
<script>
$(document).ready(function(){
Carga();
});
function Carga(){
var dataTable =$("#datos_clasificaciones");
var route = "list_clasificacion";
$("#datos_clasificaciones").empty();
$.get(route, function(res)
{
$(res).each(function(key,value){
dataTable.append(
    "<tr><td>"+value.name_classification+"</td>"
        +"<td>"+value.description+"</td>"
        +"<td>"+value.color+"</td>"+
        "<td>"+value.noproducts+"</td>"+
        "<td><button  class='btn btn-outline-link' value="+value.id_classification+" onclick='Mostrar(this)' data-toggle='modal' data-target='#updateClasification' ><i class='fas fa-pencil-alt'></i></button></td>"+
        "<td><button  class='btn btn-outline-link' value="+value.id_classification+" onclick='Eliminar(this)'><i class=' fas fa-trash'></i></button></td></tr>"
        );
});
});
}
function Eliminar(btn) {
    var route = "delete_clasificacion/"+btn.value;
        $.ajax({
            type: "DELETE",
            url: route,
            dataType: 'json',
            data:{
                _token: '{{csrf_token()}}',
            }
        });
        location.reload();
};
function Mostrar(btn) {
    var route = "edit_clasificacion/"+btn.value;
    $.get(route,function(res){
        $(res).each(function(key,value){
            $("#updatenombre").val(value.name_classification);
            $("#updatedescripcion").val(value.description);
            $("#upudatecolors").val(value.color);
            $("#id").val(value.id_classification);
        });
    });
}
$("#modificar").click(function(){
var id  = $("#id").val();
var nombre =$("#updatenombre").val();
var descripcion =$("#updatedescripcion").val();
var colors =$("#upudatecolors").val();
var route ="update_clasificacion";
        $.ajax({
            type: "post",
            url: route,
            dataType: 'json',
            data:{
                _token: '{{csrf_token()}}',
                id: id,
                nombre: nombre,
                descripcion: descripcion,
                colors: colors
            }
        });
        location.reload();
});
</script>
</body>
</html>

