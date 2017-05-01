<div class="modal fade" id="nuevoRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-admin" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Plantilla Productos</h4>
      </div>
      <div class="modal-body">
             
          
          <div class="form-group" id ="grupoCodigo">
            <label for="TxtCodigo" class="control-label">Código:</label>
            <input type="text" class="form-control" placeholder = "Código" id="TxtCodigo">            
          </div>
          <div id = "msgError" class="" role="alert"></div>

          <div class="form-group row" id="grupoTipoAnalisis">
            
            <div class="col-md-6">
              <label for="TxtProducto" class="control-label">Producto:</label>
              <input type="text" class="form-control" placeholder = "Producto" id="TxtProducto">
            </div>
            
            <div class="col-md-6">
              <label for="TxtNotas" class="control-label">Notas:</label>
              <textarea row="4" maxlength="255" class="form-control" placeholder = "Descripción" id="TxtNotas"></textarea>
            </div>
          
          </div>          
                           
         <!-- Input para llenar información de la grilla -->
          <div class="form-group row" id="grupoDetalleAnalisis">
            <div class="col-md-4">
              <label for="TxtAnalisis" class="control-label">Análisis</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder = "Análisis" id="TxtAnalisis" aria-describedby="buscar-analisis">
                <span class="input-group-addon btn" id="buscar-analisis" data-toggle = "modal" data-backdrop="static" data-keyboard="false" data-target="#frm-buscar-analisis"> <span class="glyphicon glyphicon-search"> </spam></span>
              </div>
            </div>
            <div class="col-md-2">
              <label for="TxtNorma" class="control-label">Norma</label>
              <input type="text" class="form-control" placeholder = "Norma" id="TxtNorma">
            </div>
            <div class="col-md-2">
              <label for="TxtEspecificaciones" class="control-label">Especificaciones</label>
              <input type="text" class="form-control" placeholder = "Especificaciones" id="TxtEspecificaciones">
            </div>
            <div class="col-md-1">
              <label for="TxtLimite" class="control-label">Limite</label>
              <input type="text" class="form-control" placeholder = "Limite" id="TxtLimite">
            </div>
            <div class="col-md-1">
              <label for="TxtMin" class="control-label">Min</label>
              <input type="text" class="form-control" placeholder = "Min" id="TxtMin">
            </div>
            <div class="col-md-1">
              <label for="TxtMax" class="control-label">Max</label>
              <input type="text" class="form-control" placeholder = "Max" id="TxtMax">
            </div>
            <div class="col-md-1">
              <label for="TxtPromedio" class="control-label">Promedio</label>
              <input type="text" class="form-control" placeholder = "Pmd" id="TxtPromedio">
            </div>
            
          </div>     

         <!-- Barra de Herramientas (Edición) -->
    
          <div id="toolbar2" class="btn-group">            
            <span id = "addRegistro" class="btn btn-primary" data-toggle = "modal" data-backdrop="static" data-keyboard="false"><span class="glyphicon glyphicon-plus"></span></span>            
            <span id = "remRegistro" class="btn btn-danger" data-toggle = "modal" data-backdrop="static" data-keyboard="false"><span class="glyphicon glyphicon-minus"><span></span>
          </div>
    
          <!-- Colocar Datos de los Análisis de la Plantilla -->

          <table id="tablePlantillaAnalisis"
                 data-toggle="table"
                 data-height="220"
                 data-toolbar-align="right"
                 data-toolbar="#toolbar2"
                 >
            <thead>
              <tr>
                <th data-field="state" data-checkbox="true"></th>
                <th data-field="idProducto" data-visible = "false">Código Producto</th>
                <th data-field="idAnalisis" data-visible = "false">Código Análisis</th>
                <th data-field="nameAnalisis">Análisis</th>
                <th data-field="nNorma" data-width="200px">Norma</th>
                <th data-field="dEspecificaciones" data-width="200px">Especificaciones</th>
                <th data-field="dLimite" data-width="75px" data-halign="center">Limite</th>
                <th data-field="dMin" data-width="75px" data-halign="center">Min</th>
                <th data-field="dMax" data-width="75px" data-halign="center">Max</th>
                <th data-field="dPromedio" data-width="75px" data-halign="center">Promedio</th>                
              </tr>
            </thead>
          </table>

          <!-- Parametros Formulario -->
          <input type="hidden" id="idAnalisis" value="">
          <input type="hidden" id="FormName" value="PlantillaProductos">
          <input type="hidden" id="TypeSave" value="1">
          <input type="hidden" id="IdReg" value="">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="btnCerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id = "GuardarPlantillaProductos">Guardar</button>
      </div>
    </div>
  </div>
</div>