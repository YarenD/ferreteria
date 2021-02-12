<div class="modal fade" id="updateClasification" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Clasificación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  method="post">
              @csrf
              <input id="id" name="id" hidden>
            <span>Escribe el Nombre de la clasificación</span>
            <input id="updatenombre" name="updatenombre" placeholder="Nombre de la clasificaci&oacute;n" class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{3,30}$" title="Las categorias solo deben tener una palabra" required="true"  type="text" minlength="3" maxlength="30">
            <span>Descripcion de la clasificación</span>
            <textarea class="form-control" name="updatedescripcion" id="updatedescripcion" rows="4" required></textarea><br>
            <span>Selecciona un color: </span><input type="color" id="upudatecolors" name="updatecolors" value="#ffffff">
            <br>
            <a href="#" id="modificar" class="btn btn-dark rounded float-right" role="button">Modificar</a>
          </form>
        </div>
    </div>
</div>
</div>
