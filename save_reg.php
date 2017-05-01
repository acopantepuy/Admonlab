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
		
		switch ($_POST["TypeSave"]){
			case 1: //Nuevo Registro
				switch ($_POST["FormName"]) {
					case 'Usuarios': //Usuarios del Sistema
							
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = "INSERT INTO src_users(
											SRC_USER, 
											SRC_NAME, 
											SRC_PASSWORD, 
											SRC_CARGO, 
											SRC_DATE_STAR) 
									VALUES ('".$_POST["usuario"]."', 
											'".$_POST["nombres"]."', 
											'".hash('sha256', $_POST["clave"])."', 
											'".$_POST["cargo"]."', 
											'".$fechaHoy."');";

							$pdo->query($SQL);

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						
						break;
					
					case 'TipoCliente': //Tipos de Clientes
							
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = "INSERT INTO src_type_customers(
											SRC_TYPE_CUSTOMER_ID, 
											SRC_TYPE_CUSTOMER, 
											SRC_NOTE, 
											SRC_USER_ADD, 
											SRC_DATE_ADD, 
											SRC_MAC_ADD, 
											SRC_USER_MOD, 
											SRC_DATE_MOD, 
											SRC_MAC_MOD) 
									VALUES ('".$_POST["codigo"]."', 
											'".$_POST["tipoCliente"]."', 
											'".$_POST["srcNotas"]."', 
											'".$_SESSION['userName']."',
											'".$fechaHoy."',
											'".$_SESSION['ipEquipo']."',
											'".$_SESSION['userName']."',
											'".$fechaHoy."', 
											'".$_SESSION['ipEquipo']."');";

							$pdo->query($SQL);

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						
						break;
					
					case 'Clientes': //Clientes
							
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = $pdo->prepare('INSERT INTO src_customers(
														SRC_CUSTOMER_ID, 
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
														SRC_NOTE, 
														SRC_USER_ADD, 
														SRC_DATE_ADD, 
														SRC_MAC_ADD, 
														SRC_USER_MOD, 
														SRC_DATE_MOD, 
														SRC_MAC_MOD) 
												VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);');

							$SQL->bindParam(1,$_POST['txtCodigo'],PDO::PARAM_STR,5);    		// Código
							$SQL->bindParam(2,$_POST['txtTipoCliente'],PDO::PARAM_STR,10);   	// Tipo de Cliente
							$SQL->bindParam(3,$_POST['txtNombre'],PDO::PARAM_STR,100);  		// Nombre 
							$SQL->bindParam(4,$_POST['txtRIF'],PDO::PARAM_STR,12);   			// RIF
							$SQL->bindParam(5,$_POST['txtDireccion'],PDO::PARAM_STR,150);  		// Dirección
							$SQL->bindParam(6,$_POST['txtFechaInicio'],PDO::PARAM_STR,10);   	// Fecha Inicio
							$SQL->bindParam(7,$_POST['txtTipoContribuyente'],PDO::PARAM_BOOL);	// Tipo Contribuyente
							$SQL->bindParam(8,$_POST['txtTelefono'],PDO::PARAM_STR,50);   		// Telefono
							$SQL->bindParam(9,$_POST['txtMovil'],PDO::PARAM_STR,50);   			// Movil
							$SQL->bindParam(10,$_POST['txtFax'],PDO::PARAM_STR,50);  			// Fax
							$SQL->bindParam(11,$_POST['txtMail'],PDO::PARAM_STR,100);			// Mail
							$SQL->bindParam(12,$_POST['txtSite'],PDO::PARAM_STR,100);			// Site
							$SQL->bindParam(13,$_POST['txtContacto'],PDO::PARAM_STR,50);		// Contacto
							$SQL->bindParam(14,$_POST['txtNotas'],PDO::PARAM_STR,255);			// Notas
							$SQL->bindParam(15,$_SESSION['userName'],PDO::PARAM_STR,10);		// Usuario que agrego
							$SQL->bindParam(16,$fechaHoy,PDO::PARAM_STR,10);					// Fecha de Creación
							$SQL->bindParam(17,$_SESSION['ipEquipo'],PDO::PARAM_STR,10);		// Ip equipo que agrego
							$SQL->bindParam(18,$_SESSION['userName'],PDO::PARAM_STR,10);		// Usuario que modifico
							$SQL->bindParam(19,$fechaHoy,PDO::PARAM_STR,10);					// Fecha de Modificación
							$SQL->bindParam(20,$_SESSION['ipEquipo'],PDO::PARAM_STR,20);		// Ip equipo que Modifico


							$SQL->execute(); //Ejecuta la sentencia						

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						
						break;

					case 'TipoAnalisis': //Tipo Análisis
							
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = $pdo->prepare('INSERT INTO src_analysis_clasification(
														SRC_ANALYSIS_CLASIFICATION_ID, 
														SRC_ANALYSIS_CLASIFICATION, 
														SRC_DESCRIPTION, 														 
														SRC_USER_ADD, 
														SRC_DATE_ADD, 
														SRC_MAC_ADD, 
														SRC_USER_MOD, 
														SRC_DATE_MOD, 
														SRC_MAC_MOD) 
												VALUES (?,?,?,?,?,?,?,?,?);');

							$SQL->bindParam(1,$_POST['txtCodigo'],PDO::PARAM_STR,10);    	// Código
							$SQL->bindParam(2,$_POST['txtTipoAnalisis'],PDO::PARAM_STR,100);// Tipo de Análisis
							$SQL->bindParam(3,$_POST['txtNotas'],PDO::PARAM_STR,255);  		// Notas 							
							$SQL->bindParam(4,$_SESSION['userName'],PDO::PARAM_STR,10);		// Usuario que agrego
							$SQL->bindParam(5,$fechaHoy,PDO::PARAM_STR,10);					// Fecha de Creación
							$SQL->bindParam(6,$_SESSION['ipEquipo'],PDO::PARAM_STR,10);		// Ip equipo que agrego
							$SQL->bindParam(7,$_SESSION['userName'],PDO::PARAM_STR,10);		// Usuario que modifico
							$SQL->bindParam(8,$fechaHoy,PDO::PARAM_STR,10);					// Fecha de Modificación
							$SQL->bindParam(9,$_SESSION['ipEquipo'],PDO::PARAM_STR,20);		// Ip equipo que Modifico


							$SQL->execute(); //Ejecuta la sentencia						

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						
						break;

					case 'Analisis': //Análisis
							
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = $pdo->prepare('INSERT INTO src_analysis(
														SRC_ANALYSIS_CLASIFICATION_ID, 
														SRC_ANALYSIS, 
														SRC_BASIC,
														SRC_DESCRIPTION, 														 
														SRC_USER_ADD, 
														SRC_DATE_ADD, 
														SRC_MAC_ADD, 
														SRC_USER_MOD, 
														SRC_DATE_MOD, 
														SRC_MAC_MOD) 
												VALUES (?,?,?,?,?,?,?,?,?,?);');

							
							$SQL->bindParam(1,$_POST['txtTipoAnalisis'],PDO::PARAM_INT,100);// Tipo de Análisis
							$SQL->bindParam(2,$_POST['txtAnalisis'],PDO::PARAM_STR,100);    // Nombre del Análisis
							$SQL->bindParam(3,$_POST['txtBasico'],PDO::PARAM_BOOL,1);    	// Análisis Básico
							$SQL->bindParam(4,$_POST['txtNotas'],PDO::PARAM_STR,255);  		// Notas 							
							
							$SQL->bindParam(5,$_SESSION['userName'],PDO::PARAM_STR,10);		// Usuario que agrego
							$SQL->bindParam(6,$fechaHoy,PDO::PARAM_STR,10);					// Fecha de Creación
							$SQL->bindParam(7,$_SESSION['ipEquipo'],PDO::PARAM_STR,10);		// Ip equipo que agrego
							$SQL->bindParam(8,$_SESSION['userName'],PDO::PARAM_STR,10);		// Usuario que modifico
							$SQL->bindParam(9,$fechaHoy,PDO::PARAM_STR,10);					// Fecha de Modificación
							$SQL->bindParam(10,$_SESSION['ipEquipo'],PDO::PARAM_STR,20);		// Ip equipo que Modifico							


							$SQL->execute(); //Ejecuta la sentencia						

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						
						break;

					default:
						# code...
						break;
				}
			break;
			case 2: //Actualizar Registro
				switch ($_POST["FormName"]) {
					case 'Usuarios': //Usuarios del Sistema
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 
											
							/* Preparamos la Transacción */	
							$SQL = "UPDATE src_users 
									SET SRC_USER = '".$_POST["usuario"]."',
										SRC_NAME =  '".$_POST["nombres"]."', 
										SRC_CARGO = '".$_POST["cargo"]."' 
									WHERE 
										SRC_USER_ID = ".$_POST["userid"].";";
																		
							//print $SQL;

							$pdo->query($SQL);

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						break;
					
					case 'TipoCliente': //Actualización Tipos de Clientes
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 										
											
							/* Preparamos la Transacción */	
							$SQL = "UPDATE src_type_customers 
									SET SRC_TYPE_CUSTOMER = '".$_POST["tipoCliente"]."',
										SRC_NOTE =  '".$_POST["srcNotas"]."', 
										SRC_USER_MOD = '".$_SESSION['userName']."',
										SRC_DATE_MOD = '".$fechaHoy."',
										SRC_MAC_MOD = '".$_SESSION['ipEquipo']."'
									WHERE 
										SRC_TYPE_CUSTOMER_ID = '".$_POST["codigo"]."';";
																		
							//print $SQL;

							$pdo->query($SQL);

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						break;

					case 'Clientes': //Clientes
							
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = $pdo->prepare('UPDATE src_customers
														SET SRC_TYPE_CUSTOMER_ID = ?, 
														SRC_NAME = ?, 
														SRC_RIF = ?, 
														SRC_ADDRESS = ?, 
														SRC_DATE_START = ?, 
														SRC_SPECIAL_CONTRIBUTOR = ?, 
														SRC_PHONES = ?, 
														SRC_MOVIL = ?, 
														SRC_FAX = ?, 
														SRC_MAIL = ?, 
														SRC_SITE = ?, 
														SRC_CONTACT = ?, 
														SRC_NOTE = ?, 														
														SRC_USER_MOD = ?, 
														SRC_DATE_MOD = ?, 
														SRC_MAC_MOD = ? 
												WHERE SRC_CUSTOMER_ID = "'.$_POST['txtCodigo'].'";');

							$SQL->bindParam(1,$_POST['txtTipoCliente'],PDO::PARAM_STR,10);   	// Tipo de Cliente
							$SQL->bindParam(2,$_POST['txtNombre'],PDO::PARAM_STR,100);  		// Nombre 
							$SQL->bindParam(3,$_POST['txtRIF'],PDO::PARAM_STR,12);   			// RIF
							$SQL->bindParam(4,$_POST['txtDireccion'],PDO::PARAM_STR,150);  		// Dirección
							$SQL->bindParam(5,$_POST['txtFechaInicio'],PDO::PARAM_STR,10);   	// Fecha Inicio
							$SQL->bindParam(6,$_POST['txtTipoContribuyente'],PDO::PARAM_BOOL);	// Tipo Contribuyente
							$SQL->bindParam(7,$_POST['txtTelefono'],PDO::PARAM_STR,50);   		// Telefono
							$SQL->bindParam(8,$_POST['txtMovil'],PDO::PARAM_STR,50);   			// Movil
							$SQL->bindParam(9,$_POST['txtFax'],PDO::PARAM_STR,50);  			// Fax
							$SQL->bindParam(10,$_POST['txtMail'],PDO::PARAM_STR,100);			// Mail
							$SQL->bindParam(11,$_POST['txtSite'],PDO::PARAM_STR,100);			// Site
							$SQL->bindParam(12,$_POST['txtContacto'],PDO::PARAM_STR,50);		// Contacto
							$SQL->bindParam(13,$_POST['txtNotas'],PDO::PARAM_STR,255);			// Notas							
							$SQL->bindParam(14,$_SESSION['userName'],PDO::PARAM_STR,10);		// Usuario que modifico
							$SQL->bindParam(15,$fechaHoy,PDO::PARAM_STR,10);					// Fecha de Modificación
							$SQL->bindParam(16,$_SESSION['ipEquipo'],PDO::PARAM_STR,20);		// Ip equipo que Modifico


							$SQL->execute(); //Ejecuta la sentencia						

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						
						break;

					case 'TipoAnalisis': //Tipo Análisis
							
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = $pdo->prepare('UPDATE src_analysis_clasification
														SET SRC_ANALYSIS_CLASIFICATION = ?, 
														SRC_DESCRIPTION = ?, 																										
														SRC_USER_MOD = ?, 
														SRC_DATE_MOD = ?, 
														SRC_MAC_MOD = ? 
												WHERE SRC_ANALYSIS_CLASIFICATION_ID = "'.$_POST['txtCodigo'].'";');

							$SQL->bindParam(1,$_POST['txtTipoAnalisis'],PDO::PARAM_STR,100);   	// Tipo de Análsis
							$SQL->bindParam(2,$_POST['txtNotas'],PDO::PARAM_STR,255);  		    // Notas 													
							$SQL->bindParam(3,$_SESSION['userName'],PDO::PARAM_STR,10);		// Usuario que modifico
							$SQL->bindParam(4,$fechaHoy,PDO::PARAM_STR,10);					// Fecha de Modificación
							$SQL->bindParam(5,$_SESSION['ipEquipo'],PDO::PARAM_STR,20);		// Ip equipo que Modifico


							$SQL->execute(); //Ejecuta la sentencia						

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						
						break;

					case 'Analisis': //Análisis
							
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = $pdo->prepare('UPDATE src_analysis
														SET SRC_ANALYSIS_CLASIFICATION_ID = ?, 
														SRC_ANALYSIS = ?,
														SRC_BASIC = ?,
														SRC_DESCRIPTION = ?,
														SRC_USER_MOD = ?, 
														SRC_DATE_MOD = ?, 
														SRC_MAC_MOD = ? 
												WHERE SRC_ANALYSIS_ID = "'.$_POST['txtCodigo'].'";');

							$SQL->bindParam(1,$_POST['txtTipoAnalisis'],PDO::PARAM_INT,100);// Tipo de Análisis
							$SQL->bindParam(2,$_POST['txtAnalisis'],PDO::PARAM_STR,100);    // Nombre del Análisis
							$SQL->bindParam(3,$_POST['txtBasico'],PDO::PARAM_BOOL,1);    	// Análisis Básico
							$SQL->bindParam(4,$_POST['txtNotas'],PDO::PARAM_STR,255);  		// Notas 							
														
							$SQL->bindParam(5,$_SESSION['userName'],PDO::PARAM_STR,10);		// Usuario que modifico
							$SQL->bindParam(6,$fechaHoy,PDO::PARAM_STR,10);					// Fecha de Modificación
							$SQL->bindParam(7,$_SESSION['ipEquipo'],PDO::PARAM_STR,20);		// Ip equipo que Modifico


							$SQL->execute(); //Ejecuta la sentencia						

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						
						break;

					default:
						# code...
						break;
				}
			break;
		case 3: //Eliminar Registros
				switch ($_POST["FormName"]) {
					case 'Usuarios': //Usuarios del Sistema
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = "DELETE FROM
										src_users 
									WHERE 
										SRC_USER_ID = ".$_POST["userid"].";";
																		
							//print $SQL;

							$pdo->query($SQL);

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						break;

					case 'TipoCliente': //Tipos de Clientes
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = "DELETE FROM
										src_type_customers 
									WHERE 
										SRC_TYPE_CUSTOMER_ID = '".$_POST["srcCodigo"]."';";
																		
							//print $SQL;

							$pdo->query($SQL);

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						break;
					
					case 'Clientes': //Clientes
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = "DELETE FROM
										src_customers 
									WHERE 
										SRC_CUSTOMER_ID = '".$_POST["srcCodigo"]."';";
																		
							//print $SQL;

							$pdo->query($SQL);

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						break;

					case 'TipoAnalisis': //Tipo Análisis
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = "DELETE FROM
										src_analysis_clasification 
									WHERE 
										SRC_ANALYSIS_CLASIFICATION_ID = '".$_POST["srcCodigo"]."';";
																		
							//print $SQL;

							$pdo->query($SQL);

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						break;

					case 'Analisis': //Análisis
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = "DELETE FROM
										src_analysis 
									WHERE 
										SRC_ANALYSIS_ID = '".$_POST["srcCodigo"]."';";
																		
							//print $SQL;

							$pdo->query($SQL);

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						break;

					default:
						# code...
						break;
				}
			break;
		case 4: //Actualizaciones Especiales
				switch ($_POST["FormName"]) {
					case 'Usuarios': //Usuarios del Sistema
						try{
							
							/* Iniciar una transacción, desactivando 'autocommit' */
							$pdo->beginTransaction(); 

							/* Preparamos la Transacción */	
							$SQL = "UPDATE src_users 
									SET SRC_PASSWORD = '".hash('sha256', $_POST["clave"])."'
									WHERE 
										SRC_USER_ID = ".$_POST["userid"].";";
																		
							//print $SQL;

							$pdo->query($SQL);

							/* Consignar los cambios */
							$respuesta = $pdo->commit();
							/* La conexión a la base de datos ahora a vuelto al modo 'autocommit' */

							$pdo = null; //Cerramos la Conexión a la base de datos
							print $respuesta;
						
						} catch (PDOException $e) {
	    					$pdo->rollBack();
	    					print "¡Error!: " . $e->getMessage() . "<br/>";
	    					die();
						}
						break;
					
					default:
						# code...
						break;
				}
			break;
		}

	}else{
		header("Location: index.php");
	}

?>