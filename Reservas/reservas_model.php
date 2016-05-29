<?php
	class Reserva{
		private $mbd;
		private $fechaEntrada;
		private $fechaSalida;
		private $nAdultos;
		private $nNinos;


		public function __construct(){
			$this->mbd=Conexion::conexionBD();
		}

		public function habitacionesReservadas($id,$fechaIni,$fechaSal){
			$sentencia =$this->mbd->prepare("SELECT COUNT(id) from `reserva` WHERE cod_habitacion=$id AND dia_entrada >= '".$fechaIni."' AND dia_salida <= '". $fechaSal."'");
			$sentencia->execute();
			$row = $sentencia->fetch();
			return $row[0];
		}

		public function getTotalHabs($id){
			$sentencia =$this->mbd->prepare("SELECT total_habitaciones FROM `habitacion` WHERE id=".$id."");
			$sentencia->execute();
			$row = $sentencia->fetch();
			return $row[0];
		}

		public function listaHabitaciones($fechaI,$fechaS){
			$sentencia = "SELECT * from habitacion";

			foreach($this->mbd->query($sentencia) as $row){
				$restantes = $this->habitacionesReservadas($row['id'],$fechaI,$fechaS);
				$disponibles = $row['total_habitaciones']-$restantes;

				echo "<div class='col l4'>
	            <div class='card'>
	              <div class='card-image waves-effect waves-block waves-light'>
	                <img class='activator' src='".$row['imagen']."'>
	              </div>
	              <div class='card-proc '>
	                <span class='activator grey-text text-darken-4 card-proc-text'>".$row['nombre']."<i class='material-icons right dots-card'>more_vert</i></span>
	              </div>
	              <div class='card-proc-action'>
	                <a style='color: #26a69a; font-size: 1.4em; margin-left:10px;'>".$row['pax']." <i class='fa fa-users' aria-hidden='true'></i></a>
	                <a style='color: green; font-size: 1.4em; margin-left:10px;'>".$disponibles."/".$row['total_habitaciones']." <i class='fa fa-check' aria-hidden='true'></i></a>
	                <a href='#' id=hab".$row['id']." class='right card-proc-add' style='font-size:1.1em;' onclick='aniadeHabitacion(".$row['id'].",".$row['precio_base'].",`".$row['nombre']."`)'>Añadir</a>
	              </div>
	              <div class='card-reveal'>
	                <span class='card-title grey-text text-darken-4'>".$row['nombre']."<i class='material-icons right'>close</i></span>
	                <p>".$row['descripcion_esp']."</p>
	              </div>
	            </div>
	          </div>";
      		}

		}

	}
?>