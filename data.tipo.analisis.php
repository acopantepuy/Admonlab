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
		
		//Conexión a la Base de Datos
		include_once("class/connectMySQL.php");
		
		try {
			
			$Campos = "SRC_ANALYSIS_CLASIFICATION_ID,   
					   SRC_ANALYSIS_CLASIFICATION";
			$Tablas = "src_analysis_clasification";
			$Filtros = "1=1";
			$Order = "SRC_ANALYSIS_CLASIFICATION_ID ASC";			

			$Query = "SELECT ".$Campos." 
					  FROM ".$Tablas." 
					  WHERE ".$Filtros." 
					  ORDER BY ".$Order;
					  


	    	$resultado = $pdo->query($Query); //Ejecutamos el Query
	        
	        $datos_array = 	$resultado->fetchAll(PDO::FETCH_ASSOC);
	
			$json=json_encode( $datos_array );

	    	$pdo = null; //Cerramos la Conexión a la base de datos

	    	print $json;

		} catch (PDOException $e) {
	    	print "¡Error!: " . $e->getMessage() . "<br/>";
	    	die();
		}
	}else{
		header("Location: index.php");
	}
?>