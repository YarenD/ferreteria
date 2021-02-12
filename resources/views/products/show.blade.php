@extends('layouts.admin')
@section('content')


      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-header">
            <h3 class="card-title">Detalles del producto</h3>

              <div class="col text-right">
                  <a href="{{route('products.index')}}" class="btn btn-sm btn-warning"><b>Regresar</b></a>
              </div>
          </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$product->nombre}}</h3>
              <div class="col-12">
                <img src="/img/products/{{$product->foto}}" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Nombre:</h3>
              <p>{{$product->nombre}}</p>

              <hr>
              <h4>Clasificacion:</h4>
              <p>{{$product->clasification->nombre}}</p>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option"  autocomplete="off" checked="">
                  {{$product->clasification->color}}
                  <br>
                  <i class="fas fa-circle fa-2x" style="color:{{$product->clasification->color}}!important"></i>
                </label>
              </div>

              <h4 class="mt-3">Sku:</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <p> {{$product->sku}}</p>
              </div>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                    {{$product->precio}}<small>{{$product->unidad_medida}}</small>
                </h2>
              </div>

              <div class="mt-4">
                <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary btn-lg btn-flat">
                    <i class="fas fa-edit"></i>
                  Editar producto
                </a>

                <a href="{{route('products.destroy',$product->id)}}" class="btn btn-outline-danger btn-lg btn-flat">
                    <i class="fas fa-trash"></i>
                  Eliminar producto
                </a>
              </div>


            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>

              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                  {{$product->descripcion}}

              </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

@endsection
