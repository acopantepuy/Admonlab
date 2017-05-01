<?php
	//while (ob_get_level())
	//ob_end_clean();

	//Archivos de Configuración de Parámetros del sistema
	include_once("config/parametros.php");
	//Conexión a la Base de Datos
	include_once("class/connectMySQL.php");


	try{

		$ShaPassword = hash('sha256', $_POST['pClave']);
		$UserLogin = $_POST['UserLogin'];		

		$Campos  = "SRC_USER,SRC_PASSWORD";
		$Tablas  = "src_users";
		$Filtros = "1=1 AND SRC_USER = '".$UserLogin."' AND SRC_PASSWORD = '".$ShaPassword."'";
		$Order   = "SRC_USER_ID";			

		$Query   = "SELECT ".$Campos." 
				  	FROM ".$Tablas." 
				 	WHERE ".$Filtros." 
				  	ORDER BY ".$Order;
		
		$resultadoUsuario = $pdo->query($Query);
		$totalUsuarios = $resultadoUsuario->rowCount();



		if ($totalUsuarios > 0){
			session_start();
			$_SESSION['UserAdmonLab'] = True;
			$_SESSION['ipEquipo'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['userName'] = $UserLogin;
			
		}else{
			print "Datos Incorrectos";
		}

	}catch(PDOException $e) {
		
		print "¡Error!: " . $e->getMessage() . "<br/>";
	    die();

	}

?>