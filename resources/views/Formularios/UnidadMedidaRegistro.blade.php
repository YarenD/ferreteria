<div class="modal-header bg-info">
              <h4 class="modal-title"></i> Registro de Unidad de Medida </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
</div>

  <form method="post" action="{{url('UnidadMedida/Registro')}}">
  @csrf         
 <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                 
            <div class="modal-body">


              <div class="form-group">
                    <label >Nombre:</label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre" maxlength="50" autocomplete="off" >
              </div>
             
               <center>    
                 <button class="btn boton-modal-large" 
                         type="submit">
                          <i class="fas fa-save"></i> 
                          Registrar Unidad de Medida
                 </button>
                </center>

            </div>
 </div>
 </form>
