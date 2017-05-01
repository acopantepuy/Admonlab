// JavaScript Document

$(document).ready(function(){
/*  Variables Globales */
var registroExiste = false;
var valueCheckSeleccionado = "";


	/* Guadar Usuarios */
	$('#GuardarUsuarios').bind('click', function() {
		
		var guadarRegistro = false;

		if ($('#TxtUsuario').val() === ""){
			//alert('Debe Indicar Un Usuario');	
			showMsj('Información','Debe Indicar Un Usuario',$('#msgModal'));
		}

		else if (registroExiste === true){
			//alert('El Usuario Existe');
			showMsj('Información','El Usuario Existe',$('#msgModal'));
		}

		else if ($('#TxtNombres').val() === ""){
			//alert('Debe Indicar El Nombre del Usuario');	
			showMsj('Información','Debe Indicar El Nombre del Usuario',$('#msgModal'));
		}

		else if ($('#TxtCargo').val() === ""){
			//alert('Debe Indicar El Cargo Del Usuario');	
			showMsj('Información','Debe Indicar El Cargo Del Usuario',$('#msgModal'));
		}

		else if ($('#TxtClave').val() === "" || $('#TxtClave2').val() === ""){
			//alert('Debe de Colocar Una Contraseña');
			showMsj('Información','Debe de Colocar Una Contraseña',$('#msgModal'));	
		}

		else if ($('#TxtClave').val() != $('#TxtClave2').val()){
			//alert('La Contraseña Deben de Coincidir');	
			showMsj('Información','La Contraseña Deben de Coincidir',$('#msgModal'));	
		}

		else{
			guadarRegistro = true;	
		}

		if (guadarRegistro === true){
												
			var idRegistro = valueCheckSeleccionado[0];

			$.post("./save_reg.php",{usuario:$('#TxtUsuario').val(),
									nombres:$('#TxtNombres').val(),
									cargo:$('#TxtCargo').val(),
									clave:$('#TxtClave').val(),
									FormName:$('#FormName').val(),
									TypeSave:$('#TypeSave').val(),
									userid:idRegistro},function(data){

				if (data == '1'){

					//Limpiamos los Input
					$('#TxtUsuario').val('');
					$('#TxtNombres').val('');
					$('#TxtCargo').val('');
					$('#TxtClave').val('');
					$('#TxtClave2').val('');

					//alert('Registro Guardado Con Exito');
					showMsj('Información','Registro Guardado Con Exito',$('#msgModal'));						

					//Actualizamos los datos en la tabla
					$('#Usuarios').bootstrapTable('refresh');
					

				}else{
					//alert(data);
					showMsj('Error',data,$('#msgModal'));	
				}

			});

			
			//Limpiamos los Input
			LimpiarFormularioUsuarios();

			//Cerramos la ventana			
			$('#nuevoRegistro').hide();
			$('div[class="modal-backdrop fade in"]').hide();
			
			//Refrescamos la Vista
			$('#Usuarios').bootstrapTable('refresh');
		}
		
	});

	/* Validar que el Usuario exista */

	$('#TxtUsuario').bind('keyup',function(){		
		
		var buscaUsuario = $('#TxtUsuario').val(); 
		
		$.post('buscar.usuario.php',{src_user:buscaUsuario},CambiaStatusInsert);
		function CambiaStatusInsert(datos){
			if(datos != ''){
				registroExiste = true;
				$('#msgUsuario').addClass('alert alert-warning');
				$('#msgUsuario').html(datos);
				
				
			}else{/*   CAMBIAMOS TEXTO A BOTON GUARDAR   */
				registroExiste = false;
				$('#msgUsuario').removeClass();
				$('#msgUsuario').html('');				
				
			}
		}		
	});

	/* Limpiar Formulario al hacer click en nuevo */
	$('#NuevoRegistro').bind('click',function(){		

		$('#TypeSave').val('1');//Indicamos que es un registro nuevo con el valor 1
		$('#grupoUsuario').show();//Mostrar los campos de Usuario
		$('#grupoNombres').show();//Mostrar los campos de Nombres
		$('#grupoCargo').show();//Mostrar los campos de Cargo
		$('#password').show();//Mostramos los campos de password
		LimpiarFormularioUsuarios();

	});

	/* Edición de Registro */
	$('#EditarRegistro').bind('click',function(e){		
			
    	var valorUsuario = valueCheckSeleccionado[0];

    	if (valueCheckSeleccionado != ""){ //Validamos que al menos seleccionaron un registro
					
    		/* Lectura de los Datos */ 
    		function muestraUsuario(usuario){
						
				$('#TypeSave').val('2');//Indicamos que es una actualización con el valor 2
				$('#grupoUsuario').show();//Mostrar los campos de Usuario
				$('#grupoNombres').show();//Mostrar los campos de Nombres
				$('#grupoCargo').show();//Mostrar los campos de Cargo
				$('#password').hide();//Ocultanos los campos de password
				//Llenamos los dados del formulario
				$('#TxtUsuario').val(usuario.src_user);
				$('#TxtNombres').val(usuario.src_name);
				$('#TxtCargo').val(usuario.src_cargo);
				$('#TxtClave').val('0');
				$('#TxtClave2').val('0');						

			}
			
			$.getJSON('./consulta.usuario.php',{CodeUser:valorUsuario},muestraUsuario);		
		
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
		
		var valorUsuario = valueCheckSeleccionado[0];

		$.post("./save_reg.php",{	
								FormName:'Usuarios',
								TypeSave:'3',
								userid:valorUsuario},function(data){

				if (data == '1'){					
								
					//Cerramos la ventana
					$('#msgInformacion').hide();
					$('.modal-backdrop').hide();

					//Refrescamos la Vista
					$('#Usuarios').bootstrapTable('refresh');
					valueCheckSeleccionado = "";					

					//alert('Registro Eliminado Con Exito');
					showMsj('Información','Registro Eliminado Con Exito',$('#msgModal'));	

				}else{
					//alert(data);
					showMsj('Error',data,$('#msgModal'));	
				}

		});
	});

	/* Cambio de Password */
	$('#ResetPassword').bind('click',function(e){	
    	
    	var valorUsuario = valueCheckSeleccionado[0];

    	if (valueCheckSeleccionado != ""){ //Validamos que al menos seleccionaron un registro
    								
				$('#TypeSave').val('4');//Indicamos que es una actualización especial 4
				$('#grupoUsuario').hide();//Ocultar los campos de Usuario
				$('#grupoNombres').hide();//Ocultar los campos de Nombres
				$('#grupoCargo').hide();//Ocultar los campos de Cargo
				$('#password').show();//Mostramos los campos de password				
				//Llenamos los dados del formulario
				$('#TxtUsuario').val('0');
				$('#TxtNombres').val('0');
				$('#TxtCargo').val('0');			
		
		}else{				
				
			e.stopPropagation();
			//Mostramos la Alerta
			//alert('Debe de seleccionar el registro para actualizar');
			showMsj('Información','Debe de seleccionar el registro para actualizar',$('#msgModal'));	

		}				

	});

	$('#cerrar').bind('click',function(){
		
		//Refrescamos la Vista
		$('#Usuarios').bootstrapTable('refresh');
		LimpiarFormularioUsuarios();
				
	});

	/* Limpiar Formulario */		

	function LimpiarFormularioUsuarios(){
		$('#TxtUsuario').val('');
		$('#TxtNombres').val('');
		$('#TxtCargo').val('');
		$('#TxtClave').val('');
		$('#TxtClave2').val('');
		$('#msgUsuario').removeClass();
		$('#msgUsuario').html('');
		registroExiste = false;
		valueCheckSeleccionado = "";
	}	

	/* Captura el código del registro de Una Opción Seleccionada */
	
	var $table = $('#Usuarios');	

	function getIdSelections() {
    	return  $.map($table.bootstrapTable('getSelections'), function (row) {
        	return row.SRC_USER_ID;
        });
    }

    $table.on('check.bs.table',function(){

    	valueCheckSeleccionado = getIdSelections();   	

    });

    /*************************************************************/
});