<div class="modal-header bg-info">
              <h4 class="modal-title"></i> Registro de Productos </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
</div>

  <form method="post" action="{{url('Productos/Registro')}}" enctype="multipart/form-data">
  @csrf         
 <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                 
            <div class="modal-body">
           
              <label >Clasificación:</label>
              <div class="form-group">
                 <select class="form-control" name="IdClasificacion">
                  <option value="0">-----</option>
                      @foreach($Clasificaciones as $row)
                       
                      <option value="{{$row->id}}">{{$row->nombre}}</option>
                      @endforeach
                    </select>
              </div>
                <div class="form-group">
                    <label >SKU:</label>
                    <input type="text" class="form-control" id="SKU" placeholder="SKU" name="SKU" maxlength="20" autocomplete="off" required>
              </div>
              <div class="form-group">
                    <label >Nombre:</label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre" maxlength="50" autocomplete="off" required>
              </div>
              <div class="form-group">
                    <label >Unidad de Medida:</label>
                    <select class="form-control" name="IdUnidadMedida">
                       <option value="0">-----</option>
                      @foreach($UnidadMedida as $row)
                      <option value="{{$row->id}}">{{$row->nombre}}</option>
                      @endforeach
                    </select>
              </div>
              <div class="form-group">
                    <label >Descripción:</label>
                    <textarea class="form-control"  rows="4" cols="50" name="Descripcion" required></textarea>
              </div>
              <div class="form-group">
                    <label >Precio:</label>
                    <input type="text" class="form-control" id="Precio" placeholder="$00.00" name="Precio" maxlength="7" autocomplete="off" required>
              </div>
              <div class="form-group">
                    <label >Foto</label>
                    <input type="file" class="form-control" id="Foto" placeholder="Seleciona una Imagen" name="Foto"  accept="image/*" required>
              </div>

              
              
               <center>    
                 <button class="btn boton-modal-large" 
                         type="submit">
                          <i class="fas fa-save"></i> 
                          Registrar Producto
                 </button>
                </center>

            </div>
 </div>
 </form>
