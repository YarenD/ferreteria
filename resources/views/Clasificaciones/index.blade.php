@extends('layouts.admin')

@section('body')

    <div class="card">
           
              <div class="card-header">
                <h3 class="card-title">Lista de Clasificaciones</h3>

             
             
               
                <button class="btn btn-success BotonModal" 
                        data-toggle="modal" 
                        data-target="#modal-lg"
                        id="ClasificacionRegistro"> 
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
                    <th width="30%">
                     Descripcion
                    </th>
                    <th width="10%">
                    <center>
                     Color
                     </center>
                    </th>
                    <th width="10%">
                    <center>
                     Productos
                     </center>
                    </th>
                    <th width="20%" >
                     <center>Opiones</center>
                    </th>
                  </thead>
                  <tbody>

                 @foreach($Clasificaciones as $row) 
                  <tr role="row" class="odd" >
                    
                    <td>{{$row->nombre}}</td>
                    <td>{{$row->descripcion}}</td>
                    <td>
                      <center>
                        <div class="color" style="background:{{$row->color}}; padding: 10px;">
                          
                        </div>
                      </center> 
                    </td>
                    <td>
                      <center>
                        {{$row->cuenta}}
                        </center>
                    </td>
                    <td>
                      <center>
                     
                      <button class="btn btn-info btn-xs ClasificacionEditar"
                              style="font-size: 15px;"
                              data-toggle="modal" 
                              data-target="#modal-lg"
                              id="{{$row->id}}">
                        Editar
                      </button>
                      <a href="{{url('Clasificaciones/Eliminar/'.$row->id)}}" class="btn btn-danger btn-xs" style="font-size: 15px;">
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

                
                 $("#ClasificacionRegistro").click(function(){
                            
                            var urls       =  "<?php echo url('Formularios/ClasificacionRegistro')  ?>";
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
                  $(".ClasificacionEditar").click(function(){
                            var id         =  $(this).attr('id');
                            var urls       =  "<?php echo url('Formularios/ClasificacionEditar')  ?>";
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
