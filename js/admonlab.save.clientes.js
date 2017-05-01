// JavaScript Document

$(document).ready(function(){
/*  Variables Globales */
var registroExiste = false;
var valueCheckSeleccionado = "";


	/* Guadar Clientes */
	$('#GuardarClientes').bind('click', function() {
		
		var guadarRegistro = false;

		if ($('#TxtCodigo').val() === ""){
			//alert('Debe Indicar Un Usuario');	
			showMsj('Información','Debe Indicar el Código',$('#msgModal'));
		}

		else if (registroExiste === true){
			//alert('El Usuario Existe');
			showMsj('Información','El Código Existe',$('#msgModal'));
		}

		else if ($('#TxtFechaInicio').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar la fecha de inicio',$('#msgModal'));
		}

		else if ($("#TxtTipoCliente option:selected").val() === "0"){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar El Tipo de Cliente',$('#msgModal'));
		}

		else if ($('#TxtRazonSocial').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar la Razón Social',$('#msgModal'));
		}

		else if ($('#TxtRIF').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar el RIF',$('#msgModal'));
		}

		else if ($('#TxtDireccion').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar la Dirección',$('#msgModal'));
		}

		else if ($('#TxtContacto').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar el Nombre del Contacto',$('#msgModal'));
		}

		else if ($('#TxtTelefono').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar el Teléfono',$('#msgModal'));
		}

		else if ($('#TxtCorreo').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar el Correo',$('#msgModal'));
		}					

		else{
			guadarRegistro = true;	
		}

		if (guadarRegistro === true){
												
			var idRegistro = valueCheckSeleccionado[0];

			$.post("./save_reg.php",{
									  txtCodigo:$('#TxtCodigo').val(),
									  txtTipoCliente:$('#TxtTipoCliente option:selected').val(),
									  txtNombre:$('#TxtRazonSocial').val(),
									  txtRIF:$('#TxtRIF').val(),
									  txtDireccion:$('#TxtDireccion').val(),
									  txtFechaInicio:$('#TxtFechaInicio').val(),
									  txtTipoContribuyente:$("#TxtTipoContribuyente option:selected").val(),
									  txtTelefono:$('#TxtTelefono').val(),
									  txtMovil:$('#TxtCelular').val(),
									  txtFax:$('#TxtFax').val(),
									  txtMail:$('#TxtCorreo').val(),
									  txtSite:$('#TxtWeb').val(),
									  txtContacto:$('#TxtContacto').val(),
									  txtNotas:$('#TxtNotas').val(),
									  FormName:$('#FormName').val(),
									  TypeSave:$('#TypeSave').val(),
									},function(data){

				if (data == '1'){
					
					//alert('Registro Guardado Con Exito');
					showMsj('Información','Registro Guardado Con Exito',$('#msgModal'));						

					//Actualizamos los datos en la tabla
					$('#ClienteTabla').bootstrapTable('refresh');
					

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
			$('#ClienteTabla').bootstrapTable('refresh');
		}
		
	});

	/* Validar que el Código exista */

	$('#TxtCodigo').bind('keyup',function(){		
		
		var buscaCodigo = $('#TxtCodigo').val(); 
		
		$.post('buscar.clientes.php',{src_customer_id:buscaCodigo},CambiaStatusInsert);
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
		llenarSelectTipoCliente();//Llenamos el combobox Tipo de Cliente

	});

	/* Edición de Registro */
	$('#EditarRegistro').bind('click',function(e){		
			
    	var valorCodigo = valueCheckSeleccionado[0];

    	if (valueCheckSeleccionado != ""){ //Validamos que al menos seleccionaron un registro
					
    		/* Lectura de los Datos */ 
    		function muestraRegistro(data){

				$('#TypeSave').val('2');//Indicamos que es una actualización con el valor 2				
				$('#grupoCodigo').hide();//Ocultanos los campos de Código
				$( "#TxtTipoCliente" ).html('<option value="0" selected></option>');
				llenarSelectTipoCliente();//Llenamos el combobox Tipo de Cliente
				alert("Edición de Registro");
				
				//Llenamos los dados del formulario				
				$('#TxtCodigo').val(data.SRC_CUSTOMER_ID);				
				//$('#TxtTipoCliente').val(data.SRC_TYPE_CUSTOMER_ID).change();
				$( "#TxtTipoCliente").val(data.SRC_TYPE_CUSTOMER_ID);
				$('#TxtRazonSocial').val(data.SRC_NAME);
				$('#TxtRIF').val(data.SRC_RIF);
				$('#TxtDireccion').val(data.SRC_ADDRESS);
				$('#TxtFechaInicio').val(data.SRC_DATE_START);
				$('#TxtTipoContribuyente').val(data.SRC_SPECIAL_CONTRIBUTOR);
				$('#TxtTelefono').val(data.SRC_PHONES);
				$('#TxtCelular').val(data.SRC_MOVIL);
				$('#TxtFax').val(data.SRC_FAX);
				$('#TxtCorreo').val(data.SRC_MAIL);
				$('#TxtWeb').val(data.SRC_SITE),
				$('#TxtContacto').val(data.SRC_CONTACT);
				$('#TxtNotas').val(data.SRC_NOTE);	

			}
			
			$.getJSON('./consulta.clientes.php',{srcCodigo:valorCodigo},muestraRegistro);		
		
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
								FormName:'Clientes',
								TypeSave:'3',
								srcCodigo:valorCodigo},function(data){

				if (data == '1'){					
								
					//Cerramos la ventana
					$('#msgInformacion').hide();
					$('.modal-backdrop').hide();

					//Refrescamos la Vista
					$('#ClienteTabla').bootstrapTable('refresh');
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
		$('#ClienteTabla').bootstrapTable('refresh');
		LimpiarFormulario();
				
	});

	/*   Llenar el select con los datos de Tipo de Cliente   */
	function llenarSelectTipoCliente(){

		function optionSelect(data){
			//alert(data.SRC_TYPE_CUSTOMER_ID);
  			
  			$.each(data, function(i,item){
  				$( "#TxtTipoCliente" ).append('<option value="' + item.SRC_TYPE_CUSTOMER_ID + '">' + item.SRC_TYPE_CUSTOMER + '</option>');
  			});

		}

		$.getJSON( "./data.select.tipo.clientes.php",optionSelect);

	}

	/* Limpiar Formulario */		

	function LimpiarFormulario(){
		$('#TxtCodigo').val('');
		$('#TxtTipoCliente').val('');
		$('#TxtRazonSocial').val('');
		$('#TxtRIF').val('');
		$('#TxtDireccion').val('');
		$('#TxtFechaInicio').val('');
		$('#TxtTipoContribuyente').val('');
		$('#TxtTelefono').val('');
		$('#TxtCelular').val('');
		$('#TxtFax').val('');
		$('#TxtCorreo').val('');
		$('#TxtWeb').val(''),
		$('#TxtContacto').val('');
		$('#TxtNotas').val('');				
		$('#msgError').removeClass();
		$('#msgError').html('');
		$( "#TxtTipoCliente" ).html('<option value="0" selected></option>');
		registroExiste = false;
		valueCheckSeleccionado = "";
		$('#infofiscal-tab').tab('show');
	}	

	
   	/*   Solo Numeros en los campos numericos   */

  
   	$('#TxtTelefono').soloNumeros();
   	$('#TxtCelular').soloNumeros();
   	$('#TxtFax').soloNumeros(); 
	
	/* Captura el código del registro de Una Opción Seleccionada */
	
	var $table = $('#ClienteTabla');	

	function getIdSelections() {
    	return  $.map($table.bootstrapTable('getSelections'), function (row) {
        	return row.SRC_CUSTOMER_ID;
        });
    }

    $table.on('check.bs.table',function(){

    	valueCheckSeleccionado = getIdSelections();    	

    });

    /*************************************************************/
});