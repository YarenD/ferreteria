@extends('layouts.base')
@section('estilos')

@endsection
@section('principal')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Eliminar Clasificación</h1>
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
               <form action="{{ route('clasificacion.destroy',['clasificacion'=> $clasificacion->id]) }}" method="post">
                @csrf
                @method('DELETE')
              
            <div class="row">
                <div class="col-md-6">
                    
                        <hr>   
                        <h4>Información de la clasificación</h4>
                         <b>Nombre:</b>  {{$clasificacion->nombre}} <br>
                         <b>Descripcion:</b> {{$clasificacion->descripcion}}<br>
                         <b>Color:</b> <p style="display: inline;color:{{$clasificacion->color}};background-color:{{$clasificacion->color}}">{{$clasificacion->color}}</p>
                        
                        <hr>
                        <div class="form-group">
                           
                            <div class="form-group">
                                <label for="clasificacion">Los productos se asignaran a esta clasificación</label>
                                <select name="clasificacion" id="clasificacion" class="form-control @error('clasificacion') is-invalid @enderror">
                                   
                                    @foreach ($otrasclasificaciones as $otraclasificacion)
                                <option value="{{$otraclasificacion->id}}" {{ old('clasificacion') ==  $otraclasificacion->id ? 'selected' : ''}}>{{$otraclasificacion->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('clasificacion')
                                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                                    @enderror
                            </div>
                            <?php if($clasificacion->id > 1){?>
                            <button type="submit" class="btn btn-primary">Eliminar Clasificación</button>
                            <?php } ?>
                            <a href="{{ route('clasificacion.index')}}" class="btn btn-secondary">Cancelar</a>
                        </div>   
                </div>    
                <div class="col-md-6">
                        <center>
                        <hr>   
                        <h4>Productos dentro de esta clasificación</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                <th>SKU</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{$producto->sku}}</td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->descripcion}}</td>
                                    <td>$ @money($producto->precio)</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       
                        <hr>
                        </center>
                </div>
            </div>                 

               
                
               </form>
               

            </div>    
@endsection

@section('script')


  @endsection

