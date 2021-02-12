<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ferreteria de Pedro</title>
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
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style type="text/css">
    #RespuestaProducto{
    background: #f9bad1;
    font-size: 13px;
    padding: 10px;
    color:#6d0000;
    border: solid 1px black;
    border-radius: 4px;
    display: none;
  }
     .boton-modal-large{
    width: 80%;
    background: #061e44;
    color: #efefef;
  }
  .boton-modal-large:hover{
    text-shadow: 1px 1px 2px #3a3a4e;
    color: #FFFFFF;
    border:solid 1px #1f1f31;
    box-shadow:1px 1px 4px #6f6c6c;
  }
  .BotonModal{
    float: right;
  }
  .boton-modal-large{
    width: 80%;
    background: #061e44;
    color: #efefef;
  }
  .boton-modal-large:hover{
    text-shadow: 1px 1px 2px #3a3a4e;
    color: #FFFFFF;
    border:solid 1px #1f1f31;
    box-shadow:1px 1px 4px #6f6c6c;
  }
  .img-actual img{
    width: 150px;
  }
</style>
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
            <a href="{{url('Productos')}}" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Productos
                
              </p>
            </a>
         
          </li>
                    <li class="nav-item has-treeview">
            <a href="{{url('Galeria')}}" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Galeria de Productos
                
              </p>
            </a>
         
          </li>
          <li class="nav-item has-treeview">
            <a href="{{url('Clasificaciones')}}" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Clasificaciones
                
              </p>
            </a>
         
          </li>
          <li class="nav-item has-treeview">
            <a href="{{url('UnidadMedida')}}" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Unidades de Medida
                
              </p>
            </a>
         
          </li>
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
<br>

    <!-- Main content -->
    <section class="content">
    
          @yield('body')
          

      <!-- /.card -->

<div class="modal fade show" id="modal-lg"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" id="RespuestaModal">
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.0/dist/js/adminlte.min.js"></script>
</body>
</html>