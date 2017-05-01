<div class="modal fade" id="nuevoRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tipo Cliente</h4>
      </div>
      <div class="modal-body">
             
          
          <div class="form-group" id ="grupoCodigo">
            <label for="TxtCodigo" class="control-label">Código:</label>
            <input type="text" class="form-control" placeholder = "Código" id="TxtCodigo">            
          </div>
          <div id = "msgError" class="" role="alert"></div>

          <div class="form-group" id="grupoTipoCliente">
            <label for="TxtTipoCliente" class="control-label">Tipo de Cliente:</label>
            <input type="text" class="form-control" placeholder = "Tipo de Cliente" id="TxtTipoCliente">
          </div>

          <div class="form-group" id="grupoNotas">
            <label for="TxtNotas" class="control-label">Notas:</label>
            <textarea row="4" maxlength="255" class="form-control" placeholder = "Notas" id="TxtNotas"></textarea>
          </div>
          
          <!-- Parametros Formulario -->
          <input type="hidden" id="FormName" value="TipoCliente">
          <input type="hidden" id="TypeSave" value="1">
          <input type="hidden" id="IdReg" value="">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id = "GuardarUsuarios">Guardar</button>
      </div>
    </div>
  </div>
</div>