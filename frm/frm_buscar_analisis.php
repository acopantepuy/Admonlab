<div class="modal fade" id="frm-buscar-analisis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Buscar Análisis</h4>
      </div>
      <div class="modal-body">       
    
          <!-- Datos Análisis -->

          <table id="tableBuscarAnalisis"
                 data-toggle="table"
                 data-height="220"
                 data-toolbar-align="right"
                 data-search="true" 
                 data-show-refresh="true"
                 data-url="data.analisis.php"                  
                 >
            <thead>
              <tr>
                <th data-field="state" data-radio ="true"></th>                
                <th data-field="SRC_ANALYSIS_ID" data-visible = "false">Código Análisis</th>
                <th data-field="SRC_ANALYSIS_CLASIFICATION">Tipo Análisis</th>
                <th data-field="SRC_ANALYSIS">Análisis</th>                              
              </tr>
            </thead>
          </table>

         
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="btnCerrarBuscarAnalisis" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id = "btnSeleccionarAnalisis">Seleccionar</button>
      </div>
    </div>
  </div>
</div>