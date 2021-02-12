<div class="modal-header bg-info">
              <h4 class="modal-title"></i> Registro de Clasificaciones </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
</div>

  <form method="post" action="{{url('Clasificaciones/Editar')}}">
  @csrf        
 <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                 
            <div class="modal-body">

              <input type="hidden" name="Id" value="{{$Clasificacion->id}}">
              <div class="form-group">
                    <label >Nombre:</label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre" maxlength="50" autocomplete="off" value="{{$Clasificacion->nombre}}" >
              </div>
              <div class="form-group">
                    <label >Descripción:</label>
                    <textarea class="form-control" maxlength="100" name="Descripcion">{{$Clasificacion->descripcion}}
                    </textarea>
              </div>
              <div class="form-group">
                    <label >Color:</label>
                    <input type="color" class="form-control" id="Color" name="Color" style="width: 200px;" value="{{$Clasificacion->color}}">
              </div>


              
              
               <center>    
                 <button class="btn boton-modal-large" 
                         type="submit">
                          <i class="fas fa-save"></i> 
                          Guardar Cambios
                 </button>
                </center>

            </div>
 </div>
 </form>
