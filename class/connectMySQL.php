<?php
/**
 * Conexiones a base de datos
 *
 * Copyright (c) 2016 SRC SOLUTIONS C.A
 *
 * Esta librería resuelve las conexiones a varios tipos de Base de Datos
 * Mysql, Oracle, Postgresql 
 *
 * @category   Connect
 * @package    Connect
 * @copyright  Copyright (c) 2016 AdmonLab (http://www.src.com.ve/)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    1.0.0, 2016-02-19
*/
	
	/**************************** Parámetros **********************************/

	$username = "root"; //Usuario de la Base de Datos
	$password = ""; //Password del usuario de base de datos
	$host = "127.0.0.1"; //Maquina donde esta el schema de la base de datos
	$dbname = "admonlab"; //Nombre del Schema de Base de Datos
	
	/*************************************************************************/
	try
	{
		$pdo = new PDO("mysql:host=".$host.";dbname=".$dbname, $username, $password); //Cadena de Conexión a MySQL
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Habilitamos las excepciones
	}
	catch(PDOException $e)
	{
		echo 'Error al conectar con la Base de Datos' . $e->getMessage();
	}
?>