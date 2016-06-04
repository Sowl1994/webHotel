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
			$sentencia = "SELECT * from reserva WHERE cod_usuario = $id";

			foreach($this->mbd->query($sentencia) as $row){
			echo '
			<div class="col s12 l3">
						<div class="reserva-card">
						  <div class="close">x</div>
						  <div class="content">
						    <div class="title"><h2>Habitacion Doble</h2></div>
						    <div class="detail">
						      <div class="item">
						        <div class="title">PERSONAS</div>
						        <div class="value">2452</div>
						      </div>
						       <div class="item">
						        <div class="title">NIÑOS</div>
						        <div class="value">T53</div>
						      </div>
						       <div class="item">
						        <div class="title">HABITACION</div>
						        <div class="value">D442</div>
						      </div>
						    </div>
						    <div class="btn-reserva btn-continue">02/02/1993
								<a class="btn-reserva btn-continue"></a>
							</div>
						  </div>

						</div></div>';
      		}

		}


	}
?>