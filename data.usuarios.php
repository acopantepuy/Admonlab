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
			
			$Campos = "SRC_USER,SRC_NAME,SRC_CARGO,SRC_USER_ID";
			$Tablas = "src_users";
			$Filtros = "1=1";
			$Order = "SRC_USER_ID DESC";			

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