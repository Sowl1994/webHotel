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

		public function listareservas($id){
			$sentencia = "SELECT r.*, e.nombre from reserva r, habitacion e WHERE cod_usuario = $id AND r.cod_habitacion=e.id";

			foreach($this->mbd->query($sentencia) as $row){
			setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
			$fece = strtotime($row['dia_entrada']);
			$feced = new DateTime($row['dia_entrada']);
			$fecsd = new DateTime($row['dia_salida']);
			$fecs = strtotime($row['dia_salida']);
			$total_dias = $feced->diff($fecsd);
			$fecee = strftime("%d/%B/%Y",$fece);
			$fecss = strftime("%d/%B/%Y",$fecs);
			

			echo '
			<div class="col s12 l4">
						<div class="reserva-card">
						  <div class="close">x</div>
						  <div class="content">
						    <div class="title"><h2>' . $row['nombre'] . '</h2></div>
						    <div class="detail">
						      <div class="item">
						        <div class="title">PERSONAS</div>
						        <div class="value">' . $row['n_adultos'] . ' </div>
						      </div>
						       <div class="item">
						        <div class="title">TOTAL DIAS</div>
						        <div class="value">' . $total_dias->format('%a') . '</div>
						      </div>
						       <div class="item">
						        <div class="title">ID RESERVA</div>
						        <div class="value">' . $row['id'] . ' </div>
						      </div>
						    </div>
						    <div class="btn-reserva btn-continue">' . $fecee . ' a ' . $fecss .' 
								<a class="btn-reserva btn-continue"></a>
							</div>
						  </div>

						</div></div>';
      		}

		}


	}
?>