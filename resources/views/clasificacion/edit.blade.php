@extends('layouts.base')
@section('estilos')

@endsection
@section('principal')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Editar Clasificación</h1>
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
               <form action="{{ route('clasificacion.update',['clasificacion'=> $clasificacion->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre de la Clasificación</label>
                    <input id="nombre" class="form-control @error('nombre') is-invalid @enderror" type="text" 
                name="nombre" value="{{$clasificacion->nombre}}" />
                    @error('nombre')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion">{{$clasificacion->descripcion}}</textarea>
                    @error('descripcion')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                        @enderror
                </div>
                <div class="form-group col-md-4">
                    <div class="row">
                      <div class="col-md-6"><label for="color">Seleccione Color</label></div>
                      <div class="col-md-6"><input id="color" class="form-control form-control-color w-50 @error('color') is-invalid @enderror" type="color" 
                        name="color" value="{{$clasificacion->color}}" />
                       @error('color')
                   <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                       @enderror</div>  
                    </div>
                   
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('clasificacion.index')}}" class="btn btn-secondary">Cancelar</a>
                    
                </div>
                
               </form>
             

            </div>    
@endsection

@section('script')


  @endsection