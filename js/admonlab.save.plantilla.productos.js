// JavaScript Document

$(document).ready(function(){
/*  Variables Globales */
var registroExiste = false;
var valueCheckSeleccionado = "";
var valueCheckSeleccionadoBuscaAnalisis = "";
var $tablaDatos = $('#analisisTabla'); //Grilla donde se cargan los datos.

	/* Guadar Usuarios */
	$('#GuardarPlantillaProductos').bind('click', function() {
		
		var guadarRegistro = false;

		/*if ($('#TxtCodigo').val() === ""){
			//alert('Debe Indicar Un Usuario');	
			showMsj('Información','Debe Indicar el Código',$('#msgModal'));
		}

		else if (registroExiste === true){
			//alert('El Usuario Existe');
			showMsj('Información','El Código Existe',$('#msgModal'));
		}*/

		if ($('#TxtProducto').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar El Nombre del Producto',$('#msgModal'));
		}

		else if ($('#TxtNotas').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar una breve descripción',$('#msgModal'));			
		}

		else if (JSON.stringify($('#tablePlantillaAnalisis').bootstrapTable('getData')) == "[]"){

			showMsj('Información','La Plantilla debe de contener por lo mínimo un análisis',$('#msgModal'));
		}

		else{
			guadarRegistro = true;	
		}

		if (guadarRegistro === true){
												
			var idRegistro = valueCheckSeleccionado[0];

			$.post("./save_reg.php",{txtCodigo:$('#TxtCodigo').val(),
									txtTipoAnalisis:$('#TxtTipoAnalisis').val(),
									txtAnalisis:$('#TxtAnalisis').val(),
									txtBasico:$("#TxtBasico").is(':checked') ? 1 : 0,
									txtNotas:$('#TxtNotas').val(),									
									FormName:$('#FormName').val(),
									TypeSave:$('#TypeSave').val(),
									userid:idRegistro},function(data){

				if (data == '1'){
					
					//alert('Registro Guardado Con Exito');
					showMsj('Información','Registro Guardado Con Exito',$('#msgModal'));						

					//Actualizamos los datos en la tabla
					$tablaDatos.bootstrapTable('refresh');
					

				}else{
					//alert(data);
					showMsj('Error',data,$('#msgModal'));	
				}

			});

			
			//Limpiamos los Input
			LimpiarFormulario();

			//Cerramos la ventana			
			$('#nuevoRegistro').modal('hide');
			//$('#nuevoRegistro').hide();
			//$('div[class="modal-backdrop fade in"]').hide();
			
			//Refrescamos la Vista
			$tablaDatos.bootstrapTable('refresh');
		}
		
	});

	/* Validar que el Código exista */

	$('#TxtCodigo').bind('keyup',function(){		
		
		var buscaCodigo = $('#TxtCodigo').val(); 
		
		$.post('buscar.analisis.php',{SRC_ANALYSIS_ID:buscaCodigo},CambiaStatusInsert);
		function CambiaStatusInsert(datos){
			if(datos != ''){
				registroExiste = true;
				$('#msgError').addClass('alert alert-warning');
				$('#msgError').html(datos);
				
				
			}else{/*   CAMBIAMOS TEXTO A BOTON GUARDAR   */
				registroExiste = false;
				$('#msgError').removeClass();
				$('#msgError').html('');				
				
			}
		}		
	});

	/* Prepara Formulario al hacer click en nuevo */
	$('#NuevoRegistro').bind('click',function(){		

		$('#TypeSave').val('1');//Indicamos que es un registro nuevo con el valor 1		
		$('#grupoCodigo').hide();//Ocultanos los campos de Código
		LimpiarFormulario();
		llenarSelectTipoAnalisis();//Llenamos el combobox Tipo de Cliente

	});

	/* Edición de Registro */
	$('#EditarRegistro').bind('click',function(e){		
			
    	var valorCodigo = valueCheckSeleccionado[0];

    	if (valueCheckSeleccionado != ""){ //Validamos que al menos seleccionaron un registro
					
    		/* Lectura de los Datos */ 
    		function muestraRegistro(data){
					
				$('#TypeSave').val('2');//Indicamos que es una actualización con el valor 2				
				$('#grupoCodigo').hide();//Ocultanos los campos de Código
				//Llenamos los dados del formulario				
				$('#TxtCodigo').val(data.SRC_ANALYSIS_ID);
				llenarSelectTipoAnalisis();//Llenamos el combobox Tipo de Cliente
				alert('Edición Registro');
				$('#TxtTipoAnalisis').val(data.SRC_ANALYSIS_CLASIFICATION_ID);
				$('#TxtAnalisis').val(data.SRC_ANALYSIS);
				data.SRC_BASIC == 1 ? $('#TxtBasico').prop('checked', true) : $('#TxtBasico').prop('checked', false); 
				$('#TxtBasico').val(data.SRC_BASIC);
				$('#TxtNotas').val(data.SRC_DESCRIPTION);

			}
			
			$.getJSON('./consulta.analisis.php',{srcCodigo:valorCodigo},muestraRegistro);		
		
		}else{				
				
			//Evitamos que se propague la Ventana de Edición			
			e.stopPropagation();
			//Mostramos la Alerta
			//alert('Debe de seleccionar el registro para actualizar');
			showMsj('Información','Debe de seleccionar el registro para editar',$('#msgModal'));
			//$('#msgModal').modal('show');
		}				

	});
	
	/* Eliminar Registro */
	$('#EliminarRegistro').bind('click',function(e){		
    	    	
    	if (valueCheckSeleccionado == ""){ //Validamos que al menos seleccionaron un registro					
				
			//Evitamos que se propague la Ventana de Edición
			e.stopPropagation();
			//Mostramos la Alerta
			//alert('Debe de seleccionar el registro para actualizar');	
			showMsj('Información','Debe de seleccionar el registro que desea Eliminar',$('#msgModal'));
		}

	});

	$('#Confirmar').bind('click',function(){
		
		var valorCodigo = valueCheckSeleccionado[0];

		$.post("./save_reg.php",{	
								FormName:'Analisis',
								TypeSave:'3',
								srcCodigo:valorCodigo},function(data){

				if (data == '1'){					
								
					//Cerramos la ventana
					$('#msgInformacion').hide();
					$('.modal-backdrop').hide();

					//Refrescamos la Vista
					$tablaDatos.bootstrapTable('refresh');
					valueCheckSeleccionado = "";					

					//alert('Registro Eliminado Con Exito');
					showMsj('Información','Registro Eliminado Con Exito',$('#msgModal'));	

				}else{
					//alert(data);
					showMsj('Error',data,$('#msgModal'));	
				}

		});
	});

	$('#cerrar').bind('click',function(){
		
		//Refrescamos la Vista
		$tablaDatos.bootstrapTable('refresh');
		LimpiarFormulario();
				
	});

	/*   Llenar el select con los datos de Tipo de Análisis   */
	function llenarSelectTipoAnalisis(){

		function optionSelect(data){
			//alert(data.SRC_TYPE_CUSTOMER_ID);
  			
  			$.each(data, function(i,item){
  				$( "#TxtTipoAnalisis" ).append('<option value="' + item.SRC_ANALYSIS_CLASIFICATION_ID + '">' + item.SRC_ANALYSIS_CLASIFICATION + '</option>');
  			});

		}

		$.getJSON( "./data.select.tipo.analisis.php",optionSelect);

	}


	/* Limpiar Formulario */		

	function LimpiarFormulario(){
		$('#TxtCodigo').val('');
		$('#TxtTipoAnalisis').val('');
		$('#TxtAnalisis').val('');
		$('#TxtBasico').prop('checked', false);
		$('#TxtNotas').val('');				
		$('#msgError').removeClass();
		$('#msgError').html('');
		$( "#TxtTipoAnalisis" ).html('<option value="0" selected></option>');
		registroExiste = false;
		valueCheckSeleccionado = "";
	}	

	/* Captura el código del registro de Una Opción Seleccionada */
	
	
	function getIdSelections() {
    	return  $.map($tablaDatos.bootstrapTable('getSelections'), function (row) {
        	return row.SRC_ANALYSIS_ID;
        });
    }

    $tablaDatos.on('check.bs.table',function(){

    	valueCheckSeleccionado = getIdSelections();    	

    });

    /*************************************************************/

    /* Funciones para el tratamiento de los datos Grilla Análisis Plantilla */

    /* Añadir Renglones */
    var i = 0; //Se puede borrar una vez que este todo listo
    $('#addRegistro').bind('click',function(){

    	if ($('#TxtAnalisis').val() == "" ){
    		showMsj('Información','Debe Indicar el Análisis',$('#msgModal'));    		
    	}else{

	    	alert(JSON.stringify($('#tablePlantillaAnalisis').bootstrapTable('getData')));

	    	var row = [];

	    	row.push({
		    			idProducto: $('#TxtCodigo').val(),
		    			idAnalisis:$('#idAnalisis').val(),
		    			nameAnalisis:$('#TxtAnalisis').val(),
		    			nNorma: $('#TxtNorma').val(),
		    			dEspecificaciones:$('#TxtEspecificaciones').val(),
		    			dLimite:$('#TxtLimite').val(),
		    			dMin:$('#TxtMin').val(),
		    			dMax:$('#TxtMax').val(),
		    			dPromedio:$('#TxtPromedio').val()
	    			}); 

	    	$('#tablePlantillaAnalisis').bootstrapTable('append', row);
	    	limpiarCamposAnalisis();

		}
    });

    /* Quitar Renglones */
   $('#remRegistro').bind('click',function(){

    	alert('Quitar Registro');
    	
        var ids = $.map($('#tablePlantillaAnalisis').bootstrapTable('getSelections'), function (row) {
            	return row.idAnalisis;
        });

    	$('#tablePlantillaAnalisis').bootstrapTable('remove', {
                field: 'idAnalisis',
                values: ids
        });

    });

   /* Comportamiento Boton Cerrar*/

	$('#btnCerrar').bind('click',function(){
    	 	
		limpiarCamposAnalisis();
    	$('#tablePlantillaAnalisis').bootstrapTable('removeAll'); //Quita todos los elemn

    });


   function limpiarCamposAnalisis(){
   		$('#idAnalisis').val('');	    
	    $('#TxtAnalisis').val('');
	    $('#TxtNorma').val('');
	    $('#TxtEspecificaciones').val('');
	    $('#TxtLimite').val('');
	    $('#TxtMin').val('');
	    $('#TxtMax').val('');
	    $('#TxtPromedio').val('');

   }

   function getIdSelectionsAnalisis() {
    	return  $.map($('#tableBuscarAnalisis').bootstrapTable('getSelections'), function (row) {
			var datosRow = [];
			datosRow[0] = row.SRC_ANALYSIS_ID;
			datosRow[1] = row.SRC_ANALYSIS;			
        	return datosRow;
        });
    }
    
    $('#tableBuscarAnalisis').on('check.bs.table',function(){

    	valueCheckSeleccionadoBuscaAnalisis = getIdSelectionsAnalisis();

    });

    $('#btnSeleccionarAnalisis').bind('click',function(){

    	if (valueCheckSeleccionadoBuscaAnalisis != "") {
        	
        	//Llenamos los campos con la información
        	$('#idAnalisis').val(valueCheckSeleccionadoBuscaAnalisis[0]);	    
	    	$('#TxtAnalisis').val(valueCheckSeleccionadoBuscaAnalisis[1]);
        	
        	//Limpiamos las variables
        	$('#tableBuscarAnalisis').bootstrapTable('uncheckAll');
        	valueCheckSeleccionadoBuscaAnalisis = "";

        	//Cerramos la ventana			
			$('#frm-buscar-analisis').modal('hide');

        }else{
        	showMsj('Información','Debe Seleccionar el Análisis',$('#msgModal'));
        }



    });


});