<div class="modal fade" id="nuevoRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Cliente</h4>
      </div>
      <div class="modal-body">
          
          <!-- Creación de los Tabuladores -->   
          <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs"> 
            <!-- ########### Nombre de los Tabuladores ############## -->
            <ul id="myTabs" class="nav nav-tabs" role="tablist"> 
              <li role="presentation" class="active"><a href="#infofiscal" id="infofiscal-tab" role="tab" data-toggle="tab" aria-controls="infofiscal" aria-expanded="true">Información Fiscal</a></li> 
              <li role="presentation"><a href="#contContacto" role="tab" id="contContacto-tab" data-toggle="tab" aria-controls="contContacto">Contactos</a></li>     
            </ul> 
            <!-- #################################################### -->

            <div id="myTabContent" class="tab-content"> 
              <div role="tabpanel" class="tab-pane fade in active" id="infofiscal" aria-labelledby="infofiscal-tab"> 
                
                <br> <!-- Espacio entre la barra de titulos y los campos -->
                <div class="form-group row" id ="grupoCodigo">                  
                  <div class="col-md-6">
                    <label for="TxtCodigo" class="control-label">Código:</label>
                    <input type="text" maxlength="5" class="form-control" placeholder = "Código" id="TxtCodigo">
                  </div>
                  <div class="col-md-6">
                    <label for="TxtFechaInicio" class="control-label">Fecha Inicio:</label>
                    <div class='input-group' id='datetimepicker1'>
                      <input type="date" maxlength="10" class="form-control" placeholder = "10/03/2016" id="TxtFechaInicio">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                  </div>
                </div>
                <!-- Manejador de Diálogos de Errores -->
                <div id = "msgError" class="" role="alert"></div>          

                <div class="form-group" id="grupoTipoCliente">
                  <label for="TxtTipoCliente" class="control-label">Tipo de Cliente:</label>
                  <select class="form-control" id="TxtTipoCliente">
                    <option value="0" selected></option>
                  </select>
                  
                </div>
                
                <div class="form-group" id="grupoRazonSocial">
                  <label for="TxtRazonSocial" class="control-label">Razón Social:</label>
                  <input type="text" maxlength="100" class="form-control" placeholder = "Razón Social" id="TxtRazonSocial">            
                </div>         
          
                <div class="form-group row" id = "grupoIdentidadFiscal">    
                  
                  <div class="col-md-6">  
                    <label for="TxtRIF" class="control-label">RIF: </label>
                    <input type="text" maxlength="12" class="form-control" placeholder = "RIF" id="TxtRIF">
                  </div>
                  
                  <div class="col-md-6">
                    <label for="TxtTipoContribuyente" class="control-label">Tipo de Contribuyente: </label>
                    <select class="form-control" id="TxtTipoContribuyente" placeholder = "Tipo de Contribuyente">
                      <option value= "0">Ordinario</option>
                      <option value= "1">Especial</option>
                    </select>
                  </div> 
                
                </div>          

                <div class="form-group" id="grupoDireccion">
                  <label for="TxtDireccion" class="control-label">Dirección:</label>
                  <textarea row="4" maxlength="255" class="form-control" placeholder = "Dirección" id="TxtDireccion"></textarea>
                </div> 

              </div> <!-- Fin contenido primer tabulador --> 
              
              <div role="tabpanel" class="tab-pane fade" id="contContacto" aria-labelledby="contContacto-tab"> 
                
                <div class="form-group" id="grupoContacto">
                  <label for="TxtContacto" class="control-label">Persona de Contacto:</label>
                  <input type="text" maxlength="50" class="form-control" placeholder = "Persona de Contacto" id="TxtContacto">
                </div>

                <div class="form-group row" id="grupoTelefonos">
                  <div class="col-md-4">
                    <label for="TxtTelefono" class="control-label">Teléfono:</label>
                    <input type="text" maxlength="11" class="form-control" placeholder = "Teléfono" id="TxtTelefono" >
                  </div>
                  <div class="col-md-4">
                    <label for="TxtCelular" class="control-label">Celular:</label>
                    <input type="text" maxlength="11" class="form-control" placeholder = "Celular" id="TxtCelular" onkeypress="javascript:return SoloNumero(event);">
                  </div>
                  <div class="col-md-4">
                    <label for="TxtFax" class="control-label">Fax:</label>
                    <input type="text" maxlength="11" class="form-control" placeholder = "Fax" id="TxtFax" onkeypress="javascript:return SoloNumero(event);">
                  </div>
                </div>

                <div class="form-group row" id="grupoMail">
                  <div class="col-md-6">
                    <label for="TxtCorreo" class="control-label">Correo:</label>
                    <input type="text" maxlength="100" class="form-control" placeholder = "correo@dominio.com" id="TxtCorreo">
                  </div>
                  <div class="col-md-6">
                    <label for="TxtWeb" class="control-label">Página Web:</label>
                    <input type="text" maxlength="100" class="form-control" placeholder = "http://dominio.com" id="TxtWeb">
                  </div>
                </div>        

                <div class="form-group" id="grupoNotas">
                  <label for="TxtNotas" class="control-label">Notas:</label>
                  <textarea row="4" maxlength="255" class="form-control" placeholder = "Notas" id="TxtNotas"></textarea>
                </div>
          
                <!-- Parametros Formulario -->
                <input type="hidden" id="FormName" value="Clientes">
                <input type="hidden" id="TypeSave" value="1">
                <input type="hidden" id="IdReg" value="">

              </div><!-- Fin Contendio Segundo Tabulador -->    
            </div><!-- Fin Sección Contenido Tabuladores --> 
          </div><!-- Fin contenido Tabuladores -->         
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id= "cerrar" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id = "GuardarClientes">Guardar</button>
      </div>
    </div>
  </div>
</div>