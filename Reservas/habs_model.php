<?php
	class DatosHabitaciones{

		function connect() {
		    return new PDO('mysql:host=localhost;dbname=hotel', 'root', 'algo', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}
		

		public function habitacionesReservadas($id,$fechaIni,$fechaSal){
			$pdo = connect();
			$sentencia =$pdo->prepare("SELECT COUNT(id) from `reserva` WHERE cod_habitacion=$id AND dia_entrada >= '".$fechaIni."' AND dia_salida <= '". $fechaSal."'");
			$sentencia->execute();
			$row = $sentencia->fetch();
			return $row[0];
		}


		public function getTotalHabs($id){
			$pdo = connect();
			$sentencia =$pdo->prepare("SELECT total_habitaciones FROM `habitacion` WHERE id=".$id."");
			$sentencia->execute();
			$row = $sentencia->fetch();
			return $row[0];
		}
		
		public function calculaPorDisponible($id){
			$pdo = connect();
			$totalH = $this->getTotalHabs($id);
			$sentencia =$pdo->prepare("SELECT precio_base FROM `habitacion` WHERE id=".$id."");
			$sentencia->execute();
			$row = $sentencia->fetch();

		    $habitacionesOcupadas=$this->habitacionesReservadas($id,$_GET['fI'],$_GET['fF']);
		    $porcentajeLibres = ($totalH-$habitacionesOcupadas)/$totalH;
		    $add = 1;

		    if($porcentajeLibres <= 0.2){
		    	$add +=0.5;
		    }else if($porcentajeLibres > 0.2 && $porcentajeLibres <= 0.5){
		    	$add +=0.3;
		    }else if($porcentajeLibres > 0.5 && $porcentajeLibres <= 0.85){
		    	$add +=0.1;
		    } 
			return intval($row['precio_base']*$add);
		}
	}