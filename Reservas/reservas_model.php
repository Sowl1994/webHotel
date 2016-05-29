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

		public function getPrecio($id){
			$sentencia =$this->mbd->prepare("SELECT precio_base FROM `habitacion` WHERE id=".$id."");
			$sentencia->execute();
			$row = $sentencia->fetch();
			return $row[0];
		}

		public function getTotalDias($fechaIni,$fechaSal){
			$f1 = new DateTime($fechaIni);
			$f2 = new DateTime($fechaSal);
			$dias = $f2->diff($f1)->format("%a");
			return $dias+1;
		}

		public function calculaPorDisponible($id){
			$totalH = $this->getTotalHabs($id);
			$sentencia =$this->mbd->prepare("SELECT precio_base FROM `habitacion` WHERE id=".$id."");
			$sentencia->execute();
			$row = $sentencia->fetch();

		    $habitacionesOcupadas=$this->habitacionesReservadas($id,$_SESSION['fechaIni'],$_SESSION['fechaF']);
		    $porcentajeLibres = ($totalH-$habitacionesOcupadas)/$totalH;
		    $add = 1;

		    if($porcentajeLibres <= 0.85){
		    	$add +=0.1;
		    }else if($porcentajeLibres <= 0.5){
		    	$add +=0.3;
		    }else if($porcentajeLibres <= 0.2){
		    	$add +=0.5;
		    }
			return intval($row['precio_base']*$add);
		}

		public function checkPromo($codigo){
			$sentencia =$this->mbd->prepare("SELECT precio FROM `promocion` WHERE codprom=".$codigo."");
			$sentencia->execute();
			$row = $sentencia->fetch();

			return $row['precio'];
		}

		public function calculaTotalConPromo($dias,$habs,$descuento){
			$totalHabs = json_decode($habs);
			$personas = $_SESSION['nPersonas'];
			$personas = 1;
			$total = 0;
			
			for ($i=0; $i < count($totalHabs); $i++) { 
				$sentencia = "SELECT nombre,precio_base from habitacion WHERE id = ".$totalHabs[$i];
				foreach($this->mbd->query($sentencia) as $row){
					$total += $this->calculaPorDisponible($totalHabs[$i]);
				}
			}

			$descuentoAplicado =($total*$dias*$personas)*$descuento/100;
			return ($total*$dias*$personas)- $descuentoAplicado;
		}

		public function calculaTotal($dias,$habs){
			$totalHabs = json_decode($habs);
			$personas = $_SESSION['nPersonas'];
			$personas = 1;
			$total = 0;

			
			for ($i=0; $i < count($totalHabs); $i++) { 
				$sentencia = "SELECT nombre,precio_base from habitacion WHERE id = ".$totalHabs[$i];
				foreach($this->mbd->query($sentencia) as $row){
					$total += $this->calculaPorDisponible($totalHabs[$i]);
				}
			}

			return $total*$dias*$personas;
		}

		public function totalAPagar($costeH,$actividades){
			$costeA = 0;

			for ($i=0; $i < count($actividades); $i++) { 
				$sentencia = "SELECT precio from actividad WHERE id = ".$actividades[$i];
				foreach($this->mbd->query($sentencia) as $row){
					$costeA += $row['precio'];
				}
				
			}

			return $costeH+$costeA;
		}

		public function listaPedido($habs){
			$totalHabs = json_decode($habs);
			
			for ($i=0; $i < count($totalHabs); $i++) { 
				$cantidad = array_count_values($totalHabs);
				$sentencia = "SELECT id,nombre,precio_base from habitacion WHERE id = ".$totalHabs[$i];
				foreach($this->mbd->query($sentencia) as $row){
					echo $row['nombre']." ".$this->calculaPorDisponible($row['id'])."€ "./*$cantidad[$row['id']].*/"<br>";
				}
				
			}
		}

		public function reservar($pedido){
			if(isset($_SESSION['session_id'])){
			 	try{
					if (isset($_SESSION['session_id'])) {

						
						$sentencia = $this->mbd->prepare("INSERT INTO `reserva` (`cod_usuario`, `cod_habitacion`, `dia_entrada`, `dia_salida`, `n_adultos`, `n_ninios`, `observaciones`, `precio_final`)
						VALUES (:cod_user, :cod_hab, :fI, :fS, :nAd, :nNi, :obs, :precio)");

						$total=json_decode($pedido);
						for ($i=0; $i < count($total); $i++) { 
							$habi = $total[$i];
							$nN = 0;
							$p = $this->getPrecio($total[$i]);/*$this->reserva->totalAPagar($costeHabitaciones,$actividades)*/;
							$sentencia->bindParam(':cod_user', $_SESSION['session_id']);
							$sentencia->bindParam(':cod_hab', $habi);
							$sentencia->bindParam(':fI', $_SESSION['fechaIni']);
							$sentencia->bindParam(':fS', $_SESSION['fechaF']);
							$sentencia->bindParam(':nAd', $_SESSION['nPersonas']);
							$sentencia->bindParam(':nNi', $nN);
							$sentencia->bindParam(':obs', $_POST['observaciones']);
							$sentencia->bindParam(':precio',  $p);

							// insertar una fila
							$sentencia->execute();
						}
					}
				} catch(PDOException $e) { 
				    echo $e;
				}
			}else {
				echo "registrar";
			}
		}

		public function listaHabitaciones($fechaI,$fechaS){
			$sentencia = "SELECT * from habitacion";

			foreach($this->mbd->query($sentencia) as $row){
				$restantes = $this->habitacionesReservadas($row['id'],$fechaI,$fechaS);
				$disponibles = $row['total_habitaciones']-$restantes;
				$precio = $this->calculaPorDisponible($row['id']);
				$foto = explode(";", $row['imagen']);

				echo "<div class='col l4'>
	            <div class='card'>
	              <div class='card-image waves-effect waves-block waves-light'>
	                <img class='activator' src='".$foto[0]."'>
	              </div>
	              <div class='card-proc '>
	                <span class='activator grey-text text-darken-4 card-proc-text'>".$row['nombre']."<i class='material-icons right dots-card-reserva'>more_vert</i></span>
	              </div>
	              <div class='card-proc-action'>
	                <a style='color: #26a69a; font-size: 1.4em; margin-left:10px;'>".$row['pax']." <i class='fa fa-users' aria-hidden='true'></i></a>
	                <a style='color: green; font-size: 1.4em; margin-left:10px;'>".$disponibles."/".$row['total_habitaciones']." <i class='fa fa-check' aria-hidden='true'></i></a>
	                <a style='color: green; font-size: 1.4em; margin-left:10px;'>".$precio."€</a>
	                <a href='#' id=hab".$row['id']." class='right card-proc-add' style='font-size:1.1em;' onclick='aniadeHabitacion(".$row['id'].",".$precio.",`".$row['nombre']."`)'>Añadir</a>
	              </div>
	              <div class='card-reveal'>
	                <span class='card-title grey-text text-darken-4'>".$row['nombre']."<i class='material-icons right'>close</i></span>
	                <p>".$row['descripcion_esp']."</p>
	              </div>
	            </div>
	          </div>";
      		}

		}

		public function listaActividades(){
			$sentencia = "SELECT * from actividad";

			foreach($this->mbd->query($sentencia) as $row){
				echo "<input type='checkbox' id='act".$row['id']."' name='act".$row['id']."'/>
			            <label for='act".$row['id']."'>".$row['nombre']." - ".$row['precio']."€ </label>
			          <br>";
      		}
		}

		public function listaActividad($id){
			$sentencia = "SELECT * from actividad WHERE id=$id";
			foreach($this->mbd->query($sentencia) as $row){
				echo $row['nombre']." ".$row['precio']."€<br>";
      		}
		}

	}
?>