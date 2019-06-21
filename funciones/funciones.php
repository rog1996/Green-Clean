<?php
	function abrirConexion() {
		$username = "root";
		$password = "";
		$server = "localhost";
		$database = "gc";

		try {
		    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch (PDOException $e) {
		    die("Connection failed: " . $e->getMessage());
		}
	}
	/*
	function queries($conexion, $consulta) {
		$resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");
		return $resultado;
	}

	function transaction($conexion, $consulta) {
		if (mysqli_query($conexion, $consulta)) {
		    return true;
		} else {
		    return false;
		}
	}

	function cerrarConexion($conexion) {
		mysqli_close($conexion);
	}*/
?>
