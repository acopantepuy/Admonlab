<!DOCTYPE html>
<html lang="es-VE">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>AdmonLab :: Sistema de Administración de Laboratorios de Alimentos</title>
		<?php
			/* Inicializamos la sesion, siempre y cuando se alla realizado desde init_sesion.php */
			if (session_id() === "") { session_start(); }			
			/* Establecemos que las paginas no pueden ser cacheadas */
			header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
			header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
			header("Cache-Control: no-store, no-cache, must-revalidate");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Pragma: no-cache");

			//Archivos de Configuración de Parámetros del sistema
			include_once("config/parametros.php");

		?>	    
	    <!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Bootstrap Tablas-->
		<link href="css/bootstrap-table.min.css" rel="stylesheet">
		<!-- Tema de Bootstrap -->		
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">		
		<!-- CSS AdmonLab -->
		<link href="css/admonlab.css" rel="stylesheet">

				
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="js/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>	
	
	<body>
		<br><br><br>

		<?php
			include_once("navbar.php"); // BARRA DE NAVEGACIÓN

			//Validar Inicio de Sesión
			
	    	if (!isset($_SESSION['UserAdmonLab'])){
				
				include_once('frm/frm_login.php'); //Formulario Login
			
			}
		?>

		<!-- Contenedor de Formularios -->		
		<div id="DataContenedor"></div>
		
		<?php
			include_once("footer.php"); // PIE DE PAGINA			
		?>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery/2.2.1/jquery.min.js"></script>   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>	
    <!-- Libreria Principal del Proyecto -->
    <!-- Manejador de Menu -->
	<script src="js/admonlab.menu.js"></script>	
	<!-- Manejador de Inicio de Sesión -->
	<script src="js/admonlab.login.js"></script>
	<!-- Manejador de Ventana de Información -->
	<script src="js/admonlab.msj.informacion.js"></script>	
	<!-- Valida Input -->
	<script src="js/admonlab.valida.input.js"></script>		
  	</body>
</html>