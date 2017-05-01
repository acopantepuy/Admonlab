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
		//Conexión a la Base de Datos
		include_once("class/connectMySQL.php");
		
		try {

			$Campos = "SRC_ANALYSIS_CLASIFICATION_ID";
			$Tablas = "src_analysis_clasification";
			$Filtros = "1=1 AND SRC_ANALYSIS_CLASIFICATION_ID = '".$_POST['SRC_ANALYSIS_CLASIFICATION_ID']."' ";
			$Order = "SRC_ANALYSIS_CLASIFICATION_ID";			

			$Query = "SELECT ".$Campos." 
					  FROM ".$Tablas." 
					  WHERE ".$Filtros." 
					  ORDER BY ".$Order;

			$CantidadReg = $pdo->query($Query);		  

			If ($CantidadReg->rowCount() > 0){
				print "Registro Existe";
			}

			$pdo = null; //Cerramos la Conexión a la base de datos

		}
		catch (PDOException $e) {
	    	print "¡Error!: " . $e->getMessage() . "<br/>";
	    	die();
		}
	}else{
		header("Location: index.php");
	}

?>