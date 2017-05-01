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

			$Campos = "SRC_USER,SRC_NAME,SRC_CARGO";
			$Tablas = "src_users";
			$Filtros = "1=1 AND SRC_USER_ID = ".$_GET['CodeUser']." ";
			$Order = "SRC_USER_ID";			

			$Query = "SELECT ".$Campos." 
					  FROM ".$Tablas." 
					  WHERE ".$Filtros." 
					  ORDER BY ".$Order;

			$Fila = $pdo->query($Query);		  

			$Data = $Fila->fetch();

			If ($Fila->rowCount() > 0){
				
				$usuario = array('src_user'=>$Data[0],'src_name'=>$Data[1],'src_cargo'=>$Data[2]);
				print json_encode($usuario);				
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