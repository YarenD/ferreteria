@extends('layouts.base')
@section('estilos')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" />
@endsection
@section('principal')
@if (Session::has('msg'))
	<div class="alert alert-danger">{{ Session::get('msg') }}</div>
@endif
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Galeria de Productos</h1>
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
<div class="container">
<div class="row">
  
   
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-default filter-button px-1 py-1" data-filter="all">Todos</button>
            @foreach ($clasificacions as $clasificacion)    
             <button class="btn btn-default filter-button px-1 py-1" style="background-color:{{$clasificacion->color}}" data-filter="{{$clasificacion->id}}">{{$clasificacion->nombre}}</button>
             @endforeach
        </div>
    </div>
    

      <div class="row">
        @foreach ($productos as $producto)
        <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6  px-1 py-1 filter {{$producto->clasificacion->id}} ">
          <a href="/storage/{{$producto->imagen}}" data-lightbox="{{$producto->clasificacion->id}}" data-title="{{$producto->nombre}}  Precio: $@money($producto->precio)">
            <img src="/storage/{{$producto->imagen}}" class="img-fluid" style="">
          </a>
        </div>
        @endforeach
      </div>
    </div>
</div>

@endsection

@section('script')

<!-- DataTables -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){

$(".filter-button").click(function(){
    var value = $(this).attr('data-filter');
    
    if(value == "all")
    {
        //$('.filter').removeClass('hidden');
        $('.filter').show('10');
    }
    else
    {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
        $(".filter").not('.'+value).hide('10');
        $('.filter').filter('.'+value).show('10');
        
    }
});

if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");



});

  </script>

  @endsection