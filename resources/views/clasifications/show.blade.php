@extends('layouts.admin')
@section('content')
     <!-- Default box -->
     <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detalles de la clasificación</h3>

            <div class="col text-right">
                <a href="{{route('clasifications.index')}}" class="btn btn-sm btn-warning"><b>Regresar</b></a>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12">

                    <div class="post">
                        <h2 style="color: black" class="text-center">{{$clasification->nombre}}</h2>
                            <span class="username">
                            <p>Color:</p>
                            </span>
                        <div class="img-bordered-sm text-center" style="height:70px;background-color:{{$clasification->color}}">
                            <p class="text-center text-black" style="font-size: 2rem;font-weight:900;color:black">{{$clasification->color}}</p>
                        </div>
                    </div>

                    <div class="post clearfix">
                        <span class="username">
                            <p clpss="text-center">Descripción:</p>
                        </span>
                        <p style="color: black">
                            {{$clasification->descripcion}}
                        </p>
                    </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{route('clasifications.edit',$clasification->id)}}" class="btn btn-primary float-right">Editar clasificación</a>
        </div>
      </div>
      <!-- /.card -->
@endsection
