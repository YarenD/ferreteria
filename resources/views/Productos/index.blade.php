@extends('layouts.admin')

@section('body')
<style type="text/css">

</style>
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Productos</h3>

             
             
               
                <button class="btn btn-success BotonModal" 
                        data-toggle="modal" 
                        data-target="#modal-lg"
                        id="ProductoRegistro"> 
                        <i class="fas fa-store-alt"></i>
                        Registro Nuevo
                </button>
             
              
             
              </div>

              <!-- /.card-header -->
      <div class="card-body">
         

         <br>
         <div class="row">
          <div class="col-sm-12 card-body table-responsive p-0">
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info" >
                  <thead>
                  <tr role="row">
                    <th width="15%">
                     SKU
                    </th>
                    <th width="35%">
                     Nombre
                    </th>
                    <th width="20%">
                      <center>
                     Clasificación
                     </center>
                    </th>
                    <th width="15%">
                      <center>
                     Precio
                     </center>
                    </th>
                    <th width="15%" >
                     <center>Opiones</center>
                    </th>
                  </thead>
                  <tbody>

                 @foreach($productos as $row) 
                  <tr role="row" class="odd" >
                    <td>{{$row->sku}}</td>
                    <td>{{$row->nombre}}</td>
                    <td>
                      <div style="background: {{$row->color}};
                                  padding: 3px;
                                  text-align: center;
                                  font-size: 14px;
                                  color: #FFF">
                        {{$row->clasificacion}}
                      </td>
                    <td>
                      <center>
                        ${{$row->precio}} MXN
                      </center> 
                    </td>

                    <td>
                      <center>
                     
                      <button class="btn btn-success btn-xs EditarProducto"
                              style="font-size: 15px;"
                              data-toggle="modal" 
                              data-target="#modal-lg"
                              id="{{$row->id}}">
                        Editar
                      </button>
                      <a href="{{url('Productos/Eliminar/'.$row->id)}}" class="btn btn-danger btn-xs" style="font-size: 15px;">
                          Eliminar
                      </a>
                      </center>  
                  @endforeach   
                    </td>
                  </tr>
                </tbody>
                  
                </table>
                {{ $productos->links() }}
              </div></div>
              </div>
              
              <!-- /.card-body -->
  </div>
     
<script type="text/javascript">
              $(document).ready(function(){

                
                 $("#ProductoRegistro").click(function(){
                            
                            var urls       =  "<?php echo url('Formularios/ProductoRegistro')  ?>";
                            $("#RespuestaModal").css('display','none');
                             $.ajax({
                                      type: "GET",
                                      url: urls,
                                      dataType: "html",
                                      
                                      error: function(){
                                            alert("error petición actualize o cantacte al programador");
                                      },
                                      success: function(data){
                                        $("#RespuestaModal").css('display','block');
                                       $("#RespuestaModal").html(data);
                                }
                          });
                  });
                  $(".EditarProducto").click(function(){
                            var id         =  $(this).attr('id');
                            var urls       =  "<?php echo url('Formularios/ProductoEditar')  ?>";
                            $("#RespuestaModal").css('display','none');
                             $.ajax({
                                      type: "GET",
                                      url: urls+'/'+id,
                                      dataType: "html",
                                      
                                      error: function(){
                                            alert("error petición actualize o cantacte al programador");
                                      },
                                      success: function(data){
                                        $("#RespuestaModal").css('display','block');
                                       $("#RespuestaModal").html(data);
                                }
                          });
                  });
               
               });

</script>
@endsection
