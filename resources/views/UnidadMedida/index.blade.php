@extends('layouts.admin')

@section('body')

    <div class="card">
             
              <div class="card-header">
                <h3 class="card-title">Lista Unidad de Medida</h3>

             
             
               
                <button class="btn btn-success BotonModal" 
                        data-toggle="modal" 
                        data-target="#modal-lg"
                        id="UnidadMedidaRegistro"> 
                        <i class="fas fa-store-alt"></i>
                        Registro Nuevo
                </button>
             
              
             
              </div>
     <div class="card-body">
         <div class="row">
          <div class="col-sm-12 card-body table-responsive p-0">
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info" >
                  <thead>
                  <tr role="row">
                    
                    <th width="30%">
                     Nombre
                    </th>
                    <th width="20%" >
                     <center>Opiones</center>
                    </th>
                  </thead>
                  <tbody>

                 @foreach($UnidadMedida as $row) 
                  <tr role="row" class="odd" >
                    
                    <td>{{$row->nombre}}</td>
              

                    <td>
                      <center>
                     
                      <button class="btn btn-info btn-xs UnidadMedidaEditar"
                              style="font-size: 15px;"
                              data-toggle="modal" 
                              data-target="#modal-lg"
                              id="{{$row->id}}">
                        Editar
                      </button>
                      <a href="{{url('UnidadMedida/Eliminar/'.$row->id)}}" class="btn btn-danger btn-xs" style="font-size: 15px;">
                          Eliminar
                      </a>
                      </center>  
                  @endforeach   
                    </td>
                  </tr>
                </tbody>
                  
                </table>
              </div></div>
              </div>
              
              <!-- /.card-body -->
  </div>
     
<script type="text/javascript">
              $(document).ready(function(){

                
                 $("#UnidadMedidaRegistro").click(function(){
                            
                            var urls       =  "<?php echo url('Formularios/UnidadMedidaRegistro')  ?>";
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
                  $(".UnidadMedidaEditar").click(function(){
                            var id         =  $(this).attr('id');
                            var urls       =  "<?php echo url('Formularios/UnidadMedidaEditar')  ?>";
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
