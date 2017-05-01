<div class="modal fade" id="nuevoRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Usuarios</h4>
      </div>
      <div class="modal-body">
             
          
          <div class="form-group" id ="grupoUsuario">
            <label for="TxtUsuario" class="control-label">Usuario:</label>
            <input type="text" class="form-control" placeholder = "Usuario" id="TxtUsuario">            
          </div>
          <div id = "msgUsuario" class="" role="alert"></div>

          <div class="form-group" id="grupoNombres">
            <label for="TxtNombres" class="control-label">Nombres y Apellidos:</label>
            <input type="text" class="form-control" placeholder = "Nombres y Apellidos" id="TxtNombres">
          </div>

          <div class="form-group" id="grupoCargo">
            <label for="TxtCargo" class="control-label">Cargo:</label>
            <input type="text" class="form-control" placeholder = "Cargo" id="TxtCargo">
          </div>

          <div class="form-group form-inline" id = "password">
            <label for="TxtClave" class="control-label">Contraseña:</label>
            <input type="password" class="form-control" placeholder = "Contraseña" id="TxtClave">            
            <input type="password" class="form-control" placeholder = "Contraseña" id="TxtClave2">
          </div>
          <input type="hidden" id="FormName" value="Usuarios">
          <input type="hidden" id="TypeSave" value="1">
          <input type="hidden" id="IdReg" value="">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id= "cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id = "GuardarUsuarios">Guardar</button>
      </div>
    </div>
  </div>
</div>