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

			$Campos = "SRC_CUSTOMER_ID, 
					   SRC_TYPE_CUSTOMER_ID, 
					   SRC_NAME, 
					   SRC_RIF, 
					   SRC_ADDRESS, 
					   SRC_DATE_START, 
					   SRC_SPECIAL_CONTRIBUTOR, 
					   SRC_PHONES, 
					   SRC_MOVIL, 
					   SRC_FAX, 
					   SRC_MAIL, 
					   SRC_SITE, 
					   SRC_CONTACT, 
					   SRC_NOTE";
			$Tablas = "src_customers";
			$Filtros = "1=1						
						AND SRC_CUSTOMER_ID = '".$_GET['srcCodigo']."' ";
			$Order = "SRC_CUSTOMER_ID";			

			$Query = "SELECT ".$Campos." 
					  FROM ".$Tablas." 
					  WHERE ".$Filtros." 
					  ORDER BY ".$Order;

			$Fila = $pdo->query($Query);		  

			$Data = $Fila->fetch();

			If ($Fila->rowCount() > 0){
				
				$rows = array('SRC_CUSTOMER_ID'=>$Data[0],
							  'SRC_TYPE_CUSTOMER_ID'=>$Data[1],
							  'SRC_NAME'=>$Data[2],
							  'SRC_RIF'=>$Data[3],							  
							  'SRC_ADDRESS'=>$Data[4],
							  'SRC_DATE_START'=>$Data[5],
							  'SRC_SPECIAL_CONTRIBUTOR'=>$Data[6],
							  'SRC_PHONES'=>$Data[7],
							  'SRC_MOVIL'=>$Data[8],
							  'SRC_FAX'=>$Data[9],
							  'SRC_MAIL'=>$Data[10],
							  'SRC_SITE'=>$Data[11],
							  'SRC_CONTACT'=>$Data[12],
							  'SRC_NOTE'=>$Data[13]);
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