@extends('layouts.base')
@section('estilos')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
@endsection
@section('principal')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Editar Producto</h1>
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
               <form action="{{ route('producto.update',['producto'=> $producto->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="sku">SKU</label>
                        <input id="sku" class="form-control @error('sku') is-invalid @enderror" type="text" 
                    name="sku" value="{{$producto->sku}}" />
                        @error('sku')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre del Producto</label>
                        <input id="nombre" class="form-control @error('nombre') is-invalid @enderror" type="text" 
                    name="nombre" value="{{$producto->nombre}}" />
                        @error('nombre')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="clasificacion">Clasificación</label>
                        <select name="clasificacion" id="clasificacion" class="form-control @error('clasificacion') is-invalid @enderror">
                            
                            @foreach ($clasificacions as $clasificacion)
                        <option value="{{$clasificacion->id}}" {{ $producto->clasificacion->id ==  $clasificacion->id ? 'selected' : ''}}>{{$clasificacion->nombre}}</option>
                            @endforeach
                        </select>
                        @error('clasificacion')
                        <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                            @enderror
                    </div>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion">{{$producto->descripcion}}</textarea>
                @error('descripcion')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                    @enderror
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="unidad_medida">Unidad de Medida</label>
                    <input id="unidad_medida" class="form-control @error('unidad_medida') is-invalid @enderror" type="text" 
                name="unidad_medida" value="{{$producto->unidad_medida}}" />
                    @error('unidad_medida')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="precio">Precio</label>
                    <input id="precio" class="form-control @error('precio') is-invalid @enderror" type="number" step="0.01"
                name="precio" value="{{$producto->precio}}" />
                    @error('precio')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del producto</label>
                <input id="imagen" class="dropify form-control @error('imagen') is-invalid @enderror" type="file" name="imagen" data-default-file="/storage/{{$producto->imagen}}">
                @error('imagen')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                    @enderror
                    
            </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('producto.index')}}" class="btn btn-secondary">Cancelar</a>
                    
                </div>
                
               </form>
             

            </div>    
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script>
    $('.dropify').dropify({
        messages: {
            'default': 'Arrastre o de click para agregar imagen',
            'replace': 'Arrastre o de click para remplazar imagen',
            'remove': 'Eliminar',
            'error': 'Ooops, Algo salio mal.'
        },
        error: {
            'fileSize': 'El archivo es demasiado grande.'
        }
    });
</script>
  @endsection