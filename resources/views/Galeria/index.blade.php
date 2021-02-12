@extends('layouts.admin')

@section('body')
<style type="text/css">
  .margen-galeria{
    padding: 5px;
    width: 100%;
    height: 550px;

  }
  .margen-galeria ul li{
    float: left;
    margin-right: 30px;
    margin-bottom: 10px;
    border:solid 1px black;
    list-style: none;
    border-radius: 6px;
    background: #FFF;
    box-shadow: 1px 1px 4px #716d6d;
  }
  .margen-galeria ul li img{
    width: 170px;
    height: 170px;
    border-radius: 6px;
  }
  .margen-galeria .nombre{

    font-size: 15px;
    padding: 5px;
    color: #FFF;
  }
</style>
<div class="bg-info alert text-center">
    <h3>Galeria de Productos</h3>
</div>
<div class="margen-galeria">
  <ul>
    @foreach($productos as $row) 
    <li>
      <img src="{{url('imagenes/productos/'.$row->foto)}}">
      <div class="nombre" style="background: {{$row->color}}">
        {{$row->nombre}}<br>
        ${{$row->precio}} <small>MXN</small>
      </div>
    </li>
    @endforeach
  </ul>
 {{ $productos->links() }}
</div>
@endsection
