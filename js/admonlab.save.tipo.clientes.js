// JavaScript Document

$(document).ready(function(){
/*  Variables Globales */
var registroExiste = false;
var valueCheckSeleccionado = "";


	/* Guadar Usuarios */
	$('#GuardarUsuarios').bind('click', function() {
		
		var guadarRegistro = false;

		if ($('#TxtCodigo').val() === ""){
			//alert('Debe Indicar Un Usuario');	
			showMsj('Información','Debe Indicar el Código',$('#msgModal'));
		}

		else if (registroExiste === true){
			//alert('El Usuario Existe');
			showMsj('Información','El Código Existe',$('#msgModal'));
		}

		else if ($('#TxtTipoCliente').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar El Tipo de Cliente',$('#msgModal'));
		}			

		else{
			guadarRegistro = true;	
		}

		if (guadarRegistro === true){
												
			var idRegistro = valueCheckSeleccionado[0];

			$.post("./save_reg.php",{codigo:$('#TxtCodigo').val(),
									tipoCliente:$('#TxtTipoCliente').val(),
									srcNotas:$('#TxtNotas').val(),									
									FormName:$('#FormName').val(),
									TypeSave:$('#TypeSave').val(),
									userid:idRegistro},function(data){

				if (data == '1'){
					
					//alert('Registro Guardado Con Exito');
					showMsj('Información','Registro Guardado Con Exito',$('#msgModal'));						

					//Actualizamos los datos en la tabla
					$('#tipoClienteTabla').bootstrapTable('refresh');
					

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
			$('#tipoClienteTabla').bootstrapTable('refresh');
		}
		
	});

	/* Validar que el Código exista */

	$('#TxtCodigo').bind('keyup',function(){		
		
		var buscaCodigo = $('#TxtCodigo').val(); 
		
		$.post('buscar.tipo.clientes.php',{src_type_customer_id:buscaCodigo},CambiaStatusInsert);
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
		$('#grupoCodigo').show();//Ocultanos los campos de Código
		LimpiarFormulario();

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
				$('#TxtCodigo').val(data.SRC_TYPE_CUSTOMER_ID);
				$('#TxtTipoCliente').val(data.SRC_TYPE_CUSTOMER);
				$('#TxtNotas').val(data.SRC_NOTE);

			}
			
			$.getJSON('./consulta.tipo.clientes.php',{srcCodigo:valorCodigo},muestraRegistro);		
		
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
								FormName:'TipoCliente',
								TypeSave:'3',
								srcCodigo:valorCodigo},function(data){

				if (data == '1'){					
								
					//Cerramos la ventana
					$('#msgInformacion').hide();
					$('.modal-backdrop').hide();

					//Refrescamos la Vista
					$('#tipoClienteTabla').bootstrapTable('refresh');
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
		$('#tipoClienteTabla').bootstrapTable('refresh');
		LimpiarFormulario();
				
	});

	/* Limpiar Formulario */		

	function LimpiarFormulario(){
		$('#TxtCodigo').val('');
		$('#TxtTipoCliente').val('');
		$('#TxtNotas').val('');				
		$('#msgError').removeClass();
		$('#msgError').html('');
		registroExiste = false;
		valueCheckSeleccionado = "";
	}	

	/* Captura el código del registro de Una Opción Seleccionada */
	
	var $table = $('#tipoClienteTabla');	

	function getIdSelections() {
    	return  $.map($table.bootstrapTable('getSelections'), function (row) {
        	return row.SRC_TYPE_CUSTOMER_ID;
        });
    }

    $table.on('check.bs.table',function(){

    	valueCheckSeleccionado = getIdSelections();    	

    });

    /*************************************************************/
});