<?php
	include '../conexion/conexion.php';
	$mbd = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $usuario, $pass);
	$sentencia ="SELECT nombre,precio,plaza_disponibles,descripcion_esp from `promociones`";
	
	foreach($mbd->query($sentencia) as $row){
		echo "";
	}