<?php
	class hotel_model{
		private $mbd;

		public function __construct(){
			$this->mbd=Conexion::conexionBD();
		}

		public function getDescripcion(){
			$sentencia =$this->mbd->prepare("SELECT descripcionESP from `hotel`");
			$sentencia->execute();
			$row = $sentencia->fetch();
			return $row[0];
		}

		public function getNombre(){
			$sentencia =$this->mbd->prepare("SELECT nombre from `hotel`");
			$sentencia->execute();
			$row = $sentencia->fetch();
			return $row[0];
		}

		public function getImagen(){
			$sentencia =$this->mbd->prepare("SELECT imagen from `hotel`");
			$sentencia->execute();
			$row = $sentencia->fetch();
			return $row[0];
		}

	}
?>