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

			$Campos = "SRC_ANALYSIS_ID,SRC_ANALYSIS_CLASIFICATION_ID,SRC_ANALYSIS,SRC_BASIC,SRC_DESCRIPTION";
			$Tablas = "src_analysis";
			$Filtros = "1=1 AND SRC_ANALYSIS_ID = '".$_GET['srcCodigo']."' ";
			$Order = "SRC_ANALYSIS_ID";			

			$Query = "SELECT ".$Campos." 
					  FROM ".$Tablas." 
					  WHERE ".$Filtros." 
					  ORDER BY ".$Order;

			$Fila = $pdo->query($Query);		  

			$Data = $Fila->fetch();

			If ($Fila->rowCount() > 0){
				
				$rows = array('SRC_ANALYSIS_ID'=>$Data[0],
							  'SRC_ANALYSIS_CLASIFICATION_ID'=>$Data[1],
							  'SRC_ANALYSIS'=>$Data[2],
							  'SRC_BASIC'=>$Data[3],
							  'SRC_DESCRIPTION'=>$Data[4]);
				print json_encode($rows);				
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