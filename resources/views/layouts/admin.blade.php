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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
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
            <a href="{{ route('clasificacion.index') }}" class="nav-link">
              <i class="fas fa-pallet ml-1"></i>
              <p>
                 Clasificaciones
                
              </p>
            </a>
         
          </li>
       <li class="nav-item has-treeview">
        <a href="{{route('producto.index')}}" class="nav-link">
          <i class="nav-icon fas fa-box-open"></i>
          <p>
            Productos
            
          </p>
        </a>
     
      </li>
      <li class="nav-item has-treeview">
        <a href="{{route('producto.show')}}" class="nav-link">
          <i class="far fa-images ml-1"></i>
          <p>
           Galeria de Productos
            
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-hammer    "></i> FERRETERIA DE PEDRO</h1>
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
          <h3 class="card-title">Instrucciones</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <p>Este Pedro 🧔🏻Pedro tiene una ferretería desde hace 10 años. El año pasado amplió su negocio y abrió una sucursal  en una ciudad contigua.Actualmente la ferretería de Pedro emplea a 32 personas, es decir, 32 familias dependen del empleo que él genera.
          <br><br> Originalmente él lleva el control de su negocio🧮 en un Excel, por la abrir la sucursal, se dio cuenta de que eso no era suficiente para llevar en control de su catálogo de productos. <br>
          Pedro conoció a Waldo Carranza en un evento de Networking  y al platicar acerca de sus negocios, se dio cuenta de que era posible, no sólo una administración más eficiente, sino también automatizada mediante la construcción de una Plataforma a la medida de sus necesidades.

          <br>En esta etapa del proyecto de desarrollo necesita de tu ayuda para terminar desarrollar los siguientes módulos de su plataforma: 
          <ul>
            <li>Catálogo de productos</li>
            <li>Galería de imágenes</li>
          </ul>
        A continuación están las instrucciones ✅ para que lo ayudes a eficientar su negocio: <br>
      
         El proyecto está administrado con el controlador de versiones Git y alojado en GITHUB, por lo que necesitas clonarlo para empezar a trabajar.
         <ol>
           <li>Clona el siguiente proyecto de GitHub donde esta el proyecto de Pedro: https://github.com/YarenD/ferreteria.git</li>
           <li>Una vez clonado crea una rama local con la estructura TUNOMBRE_APELLIDO. Esta rama será la que envíes despues al repositorio.</li>
           <li>Envia tu cuenta de GITHUB via correo a aldo@adndigital.mx con el asunto "Convocatoria Programación - Usuario GitHub" para agregarte como colaborador al repositorio y que puedas subir tu rama.</li>
           <li>Se deben ocupar migraciones para crear las tablas.</li>
         </ol>
        
        Una vez preparado el proyecto, considera las siguientes requerimientos: 

        <ol>
          <li><b>Módulo de Clasificaciones</b>
            <p>
              Pedro requiere crear un CRUD con las clasificaciones de productos. Los campos para crear una clasificacion son: id (primary key), nombre, descripcion, color. Quiere que lleven un color para poder identificar visualmente y rápido en el catalogo de productos a que clasificación pertenence<br>
              Se tienen que generar la vista donde liste todas las clasificaciones con la siguiente información: nombre, descripcion, color, productos (cantidad de productos que pertenencen a esa clasificacion).
              Pedro también podrá editar o borrar clasificaciones. 
            </p>
          </li>
          <li><b>Módulo de productos </b>
            <p>
              Se requiere hacer un CRUD de productos con la siguiente información que ocupa Pedro: id (primary key), id_clasificacion(relacion con la tabla de clasificaciones), sku (string), nombre, unidad_medida (string), descripcion (text), precio (decimal), foto(archivo imagen). <br>
              Se tienen que generar la vista donde liste todos los productos. En la lista Pedro quiere que se muestre sku, nombre, clasificación (el nombre NO el id y que se muestre del color de la clasificación), precio (en formato moneda).
              Pedro también podrá editar o borrar productos. 
            </p>
          </li>
          
          <li><b>Galeria </b>
            <p>
              Pedro quiere ver una galería con todas las imagenes de los productos que tiene en la base de datos. 
            </p>
          </li>
        </ol>

        <p>
          <p>Nota:</p> Recuerda que tienes hasta las 23:59 del jueves 12/02/2021 por que el viernes Pedro tiene que realizar una presentación de su proyecto. 
        </p>
        
        </div>
      </div>
      <!-- /.card -->

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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.0/dist/js/adminlte.min.js"></script>
</body>
</html>