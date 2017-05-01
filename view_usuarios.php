<?php

/*
*	
*
*
*
*/	
	/* Inicializamos la sesion*/
	session_start();
	
	if (isset($_SESSION['UserAdmonLab'])){ //Validar Login Correcto
		
		//Archivos de Configuración de Parámetros del sistema
		include_once("config/parametros.php");		
		
		/*************************** Barra de Ubicación ******************************************/
		print '<div class="container">';
			print '<br>';
			print '<ol class="breadcrumb">';
				print '<li><span class="glyphicon glyphicon-home"><span> AdmonLab</li>';
				print '<li>Seguridad</li>';
				print '<li>Usuarios</li>';
			print '</ol>';
		print '</div>';

		/*****************************************************************************************/

		/**************************** Barra de Herramientas (Edición) *********************************/
		
		print '<div id="toolbar" class="btn-group">';	
			print '<a href = "#nuevoRegistro" id = "NuevoRegistro" class="btn btn-primary" data-toggle = "modal" data-backdrop="static" data-keyboard="false"> <span class="glyphicon glyphicon-plus"><span> Nuevo</a>';
			print '<a href = "#nuevoRegistro" id = "EditarRegistro" class="btn btn-primary" data-toggle = "modal" data-backdrop="static" data-keyboard="false"><span class="glyphicon glyphicon-pencil"><span> Editar</a>';
			print '<a href = "#msgInformacion"  id = "EliminarRegistro" class="btn btn-danger" data-toggle = "modal" data-backdrop="static" data-keyboard="false"><span class="glyphicon glyphicon-trash"><span> Eliminar</a>';
			print '<a href = "#nuevoRegistro" id = "ResetPassword" class="btn btn-success" data-toggle = "modal" data-backdrop="static" data-keyboard="false"><span class="glyphicon glyphicon-lock"><span> Clave</a>';
		print '</div>';
		
		/**********************************************************************************************/


		print '<div class="container">';
	        	print '<table id = "Usuarios" class="table table-bordered table-hover" 
	        			data-search="true" 
	        			data-show-refresh="true" 
	        			data-show-toggle="true" 
	        			data-show-columns="true" 
	        			data-toolbar="#toolbar" 
	        			data-toggle="table" 
	        			data-pagination="true"	        			 
	        			data-page-size="'.$cantidaRegPag.'" 
	        			data-url="data.usuarios.php">';
					
					print '<thead>';
						print '<tr>';
							print '<th data-field="SRC_USER_ID" data-visible = "false" data-sortable ="true">Código</th>';
							print '<th data-field="SRC_USER" data-sortable ="true">Usuario</th>';
							print '<th data-field="SRC_NAME" data-sortable ="true">Nombres</th>';
							print '<th data-field="SRC_CARGO" data-sortable ="true">Cargo</th>';
							print '<th data-field="state" data-radio ="true"></th>';						
						print '</tr>';
					print '</thead>';
				print '</table>';
	    print '</div>';
		

		/* Contenedor Ventana emergente para Nuevo registro o Editar */
		
		include_once("frm/frm_usuarios.php");// Ventana para modificar u añadir un nuevo registro
		include_once("frm/frm_confirmar.php");// Ventana de Confirmación
		include_once("frm/frm_informacion.php");// Ventana de Confirmación		

		/*********************************************************************************/
		
	}else{
		header("Location: index.php");
	}
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
<script src="js/jquery/2.2.1/jquery.min.js"></script> -->
<!-- Bootstrap para el manejo de tablas por ajax -->
<script src="js/bootstrap-table.js"></script>
<!-- Bootstrap Tables js Localidad -->
<script src="js/locale/bootstrap-table-es-ES.min.js"></script>
<!-- Manejador de Registros -->
<script src="js/admonlab.save.usuarios.js"></script>