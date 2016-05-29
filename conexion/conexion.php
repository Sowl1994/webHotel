<?php
	class Conexion{
		public static function conexionBD(){
			$usuario = "root";
			$pass = "algo";
			$host = "localhost";
			$dbname = "hotel";
			$mdb = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $usuario, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			return $mdb;
		}
	}
?>