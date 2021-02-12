<div class="modal-header bg-info">
              <h4 class="modal-title"></i> Editar Producto </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
</div>

  <form method="post" action="{{url('Productos/Editar')}}" enctype="multipart/form-data">
  @csrf         
 <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                 
            <div class="modal-body">
            <div class="img-actual">
               <center>
                <img src="{{url('imagenes/productos/'.$Producto->foto)}}">
                <input type="hidden" name="FotoOld" value="{{$Producto->foto}}">
                 <input type="hidden" name="Id" value="{{$Producto->id}}">
 
                </center>
              </div>
              <label >Clasificación:</label>
              <div class="form-group">
                 <select class="form-control" name="IdClasificacion">
                  <option value="{{$Producto->id_clasifi}}">{{$Producto->clasificacion}}</option>
                      @foreach($Clasificaciones as $row)
                      @if($row->id != $Producto->id_clasifi)
                      <option value="{{$row->id}}">{{$row->nombre}}</option>
                      @endif
                      @endforeach
                    </select>
              </div>
                <div class="form-group">
                    <label >SKU:</label>
                    <input type="text" class="form-control" id="SKU" placeholder="SKU" name="SKU" maxlength="20" autocomplete="off" required value="{{$Producto->sku}}">
              </div>
              <div class="form-group">
                    <label >Nombre:</label>
                    <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre" maxlength="50" autocomplete="off" value="{{$Producto->nombre}}">
              </div>
              <div class="form-group">
                    <label >Unidad de Medida:</label>
                    <select class="form-control" name="IdUnidadMedida">
                       <option value="{{$Producto->id_unidad}}">{{$Producto->unidad}}</option>
                      @foreach($UnidadMedida as $row)
                      @if($row->id != $Producto->id_unidad)
                      <option value="{{$row->id}}">{{$row->nombre}}</option>
                      @endif
                     
                      @endforeach
                    </select>
              </div>
              <div class="form-group">
                    <label >Descripción:</label>
                    <textarea class="form-control" maxlength="100" name="Descripcion">{{$Producto->descripcion}}</textarea>
              </div>
              <div class="form-group">
                    <label >Precio:</label>
                    <input type="text" class="form-control" id="Precio" placeholder="$00.00" name="Precio" maxlength="7" autocomplete="off" value="{{$Producto->precio}}">
              </div>
              
              <div class="form-group">
                    <label >Cambiar Foto:</label>
                    <input type="file" class="form-control" id="Foto" placeholder="Seleciona una Imagen" name="Foto"  accept="image/*">
              </div>
              <br><br>
              
              
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
