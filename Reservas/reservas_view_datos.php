<div class='content'>
<div class='row'>
<div class="col s12 l7 offset-l3 card" style='margin-top: 50px;'>
	<br>
		<div class='row'> <!-- progreso indicadores -->
			<div class=' col s12 l8 offset-l2  proces-row center row-icon-procg'>
				<a href="#" class='row-icon-proc '><i class='fa fa-check-circle-o icon-proceso'></i><div class='labe-proceso'>Fechas</div></a>
				<a href="#" class='row-icon-proc'><i class="fa fa-bed icon-proceso" aria-hidden="true"></i></i><div class='labe-proceso'>Habitaciones</div></a>
				<a href="#" class='row-icon-proc select-proc'><i class="fa fa-users icon-proceso" aria-hidden="true"></i><div class='labe-proceso'>Datos Cliente</div></a>
				<a href="#" class='row-icon-proc'><i class="fa fa-credit-card-alt icon-proceso" aria-hidden="true"></i><div class='labe-proceso'>Pago</div></a>
			</div>
		</div><!-- fin progreso indicadores -->
		<form action="index.php?secc=mireserva2&r" id='informacion-usuario' method="post">
			<div class='row'><!-- datos usuario -->
				    <div class="col s12 l10 offset-l1">
						<div class="row">
						<h4 class='big-texth4-cart'> Información Personal </h4>
							<div class="input-field col s12 l6">
							<?php
							if(isset($_SESSION['nombre']))
								echo '<input id="Nombre" name="nombre" type="text" value="'.$_SESSION['nombre'].'" class="validate">';
								else{
							?>
								<input id="Nombre" name="nombre" type="text" class="validate">
							<?php }?>
								<label for="Nombre">Nombre</label>
							</div>
							<div class="input-field col s12 l6">
								<?php 
								if(isset($_SESSION['apellidos']))
									echo '<input id="apellidos" name="apellidos" type="text" value="'.$_SESSION['apellidos'].'" class="validate">';
									else{
								?>
									<input id="apellidos" name="apellidos" type="text" class="validate">
								<?php }?>
								<label for="apellidos">Apellidos</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 l6">
								<?php 
								if(isset($_SESSION['dni']))
									echo '<input id="dni" name="dni" type="text" value="'.$_SESSION['dni'].'" class="validate">';
									else{
								?>
									<input id="dni" name="dni" type="text" class="validate">
								<?php }?>
								<label for="dni">DNI</label>
							</div>
							<div class="input-field col s6 l6">
							<?php 
								if(isset($_SESSION['email']))
									echo '<input id="email" name="email" type="email" value="'.$_SESSION['email'].'" class="validate">';
									else{
								?>
									<input id="email" name="email" type="email" class="validate">
								<?php }?>
								<label for="email">Email</label>
							</div>
						</div>
				    </div>  
			</div><!-- fin datos usuario -->

			<!--<div class='row'> --><!-- datos personas -->
				   <!--
				    <form class="col s12 l10 offset-l1">
						<div class="row">
						<h4 class='big-texth4-cart'> Información Hospedados  </h4>
						<div class="input-field col s4 l2">
							<label class='client-label-proc' for="Nombre">Cliente 1:</label>
						</div>
							<div class="input-field col s4">
								<input id="Nombre" type="text" class="validate">
								<label for="Nombre">Nombre</label>
							</div>
							<div class="input-field col s4">
								<input id="apellidos" type="text" class="validate">
								<label for="apellidos">Apellidos</label>
							</div>
							<div class="input-field col s2">
								<input id="apellidos" type="text" class="validate">
								<label for="apellidos">DNI</label>
							</div>
						</div>
						<div class="input-field col s4 l2">
							<label class='client-label-proc' for="Nombre">Cliente 2:</label>
						</div>
							<div class="input-field col s4">
								<input id="Nombre" type="text" class="validate">
								<label for="Nombre">Nombre</label>
							</div>
							<div class="input-field col s4">
								<input id="apellidos" type="text" class="validate">
								<label for="apellidos">Apellidos</label>
							</div>
							<div class="input-field col s2">
								<input id="apellidos" type="text" class="validate">
								<label for="apellidos">DNI</label>
							</div>
				    </form> 
				    --> 
			<!--</div>--><!-- fin datos peronas -->
			<div class='row'><!-- datos pago -->
				    <div class="col s12 l10 offset-l1">
				    	
						<div class="row">
						<h4 class='big-texth4-cart'> Información Pago</h4>
						<p>
							<input class="with-gap" name="group3" value="1" type="radio" id="t"/>
							<label for="t">Voy a pagar con tarjeta</label>
						</p>
							<div class="input-field col s12 l3">
								<input id="Nombre" type="text" class="validate">
								<label for="Nombre">Numero de Tarjeta</label>
							</div>
							<div class="input-field col s6 l2">
								<input id="apellidos" type="text" class="validate">
								<label for="apellidos">Cod. seguridad</label>
							</div>
							<div class="input-field col s6 l3">
								<input id="apellidos" type="text" class="validate">
								<label for="apellidos">Nombre titular</label>
							</div>
							<div class="input-field col s4 l2">
								<label class='client-label-proc' for="Nombre">Expiracion:</label>
							</div>
							<div class="input-field col s4 l1">
								<input id="apellidos" type="number" min='0' max='12' class="validate center">
							</div>
							<div class="input-field col s4 l1">
								<input id="apellidos" type="number" min='0' max='99' class="validate center">
							</div>
						</div>
						<p>
							<input class="with-gap" name="group3" value="2" type="radio" id="m"/>
							<label for="m">Voy a pagar en metalico</label>
						</p>
				    </div>
			</div><!-- fin datos pago -->

				<div class='row'><!-- datos adicionales -->
				    <div class="col s12 l10 offset-l1">
						<div class="row">
						<h4 class='big-texth4-cart'> Información adicional</h4>
							<div class="input-field col s12">
								<textarea id="textarea1" name="observaciones" class="materialize-textarea"></textarea>
	         					<label for="textarea1">Si tiene alguna necesidad, o comentario, deje información aqui</label>
							</div>
						</div>

				    </div>
			</div><!-- fin datos adicionales -->

			<div class='row'><!-- informacion factura -->
				    <div class="col s12 l10 offset-l1">
						<div class="row">
						<h4 class='big-texth4-cart'> Datos de la operacion</h4>
							<div class="input-field col s12">
								<h2 class ='big-text-cart'> Entrada </h2>
					            <p class='date-cart'><?php 
								  setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
					              $fecha = strftime("%A, %d de %B de %Y", strtotime($fechaIn));
					              echo $fecha . "(Estancia de ".$dias." dias)";
					             ?><br></p>
					            <p class='small-text-cart'> A partir de las 13:00</p>
					            <hr class='separador-cart'></hr>
					          	<h2 class ='big-text-cart'> Salida </h2>
					            <p class='date-cart'><?php 
									setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
									$fecha = strftime("%A, %d de %B de %Y", strtotime($fechaS));
									echo $fecha;
					            ?><br></p>
					            <p class='small-text-cart'>Hasta las 12:00 </p><br>
					            <hr class='separador-cart'></hr>
					            <?php 
					            	if(!isset($_POST['totalHabs'])){
										//Redireccion a index
									}else{
										echo "<p class='date-cart mm'> Duración estancia: ".$dias." dias<br></p>";
										echo "<p class='date-cart mm'> Personas: ".$_SESSION['nPersonas']."<br></p>";

										echo "<p class='date-cart mm'> Promociones: <br></p>";

										$actividades = array();
										for ($i=0; $i < 4; $i++) { 
											$act = "act".$i;
											if(isset($_POST[$act]) && $_POST[$act] == "on"){
												array_push($actividades, $i);
												$reserva->listaActividad($i);
											}
										}

										echo "<p class='date-cart mm'> Habitaciones: <br></p>";
										$reserva->listaPedido($_POST['totalHabs']);
										$_SESSION['pedido']=$_POST['totalHabs'];
										$costeHabitaciones=$reserva->calculaTotal($dias,$_POST['totalHabs']);
										echo strtoupper("Total habitaciones: ". $costeHabitaciones)."€";

										echo "<h3>";
										echo "Total: ".$reserva->totalAPagar($costeHabitaciones,$actividades);
										echo "€</h3>";
									}
								?>
							</div>
						</div>
				    </div>
			</div><!-- fin datos adicionales -->
		
		<div class='row'><!-- botones continuar -->
			<div class="input-field col s12 l12  right-align " id="next-habs">
				<div class='col s12 l3  bt-movil right'>
	                <button class="btn col s12 waves-effect waves-light green right" type="submit" name="action">Siguiente 
	                  <i class="material-icons right">trending_flat</i>
	                </button>
				</div>
				<div class='col s12 l2  bt-movil'>
						<a href="index.php" class="btn col s12 waves-effect waves-light red left">Cancelar</a>
				</div>
				<div class='col s12 l3 offset-l4 bt-derecha  bt-movil'>
						<a href="index.php?secc=mireserva" class="btn col s12 waves-effect waves-light blue-grey">Anterior<i class="material-icons left rotado">trending_flat</i></a>

				</div>
				

	        </div>
		</div><!-- fin botones continuar -->
		</form>
</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

