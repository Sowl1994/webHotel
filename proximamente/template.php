<?php echo $_POST['totalHabs']?>
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
		<form id='informacion-usuario' method="post">
			<div class='row'><!-- datos usuario -->
				    <div class="col s12 l10 offset-l1">
						<div class="row">
						<h4 class='big-texth4-cart'> Información Personal </h4>
							<div class="input-field col s12 l4">
								<input id="Nombre" type="text" class="validate">
								<label for="Nombre">Nombre</label>
							</div>
							<div class="input-field col s12 l4">
								<input id="apellidos" type="text" class="validate">
								<label for="apellidos">Apellidos</label>
							</div>
							<div class="input-field col s12 l4">
								<input id="apellidos" type="text" class="validate">
								<label for="apellidos">DNI</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 l3">
								<input id="password" type="password" class="validate">
								<label for="password">Password</label>
							</div>
							<div class="input-field col s6 l3">
								<input id="email" type="password" class="validate">
								<label for="email">Repite password</label>
							</div>
							<div class="input-field col s6 l3">
								<input id="email" type="email" class="validate">
								<label for="email">Email</label>
							</div>
							<div class="input-field col s6 l3">
								<input id="email" type="email" class="validate">
								<label for="email">Repite Email</label>
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
							<input class="with-gap" name="group3" type="radio" id="test5"  />
							<label for="test5">Voy a pagar en metalico</label>
						</p>
				    </div>
			</div><!-- fin datos pago -->

				<div class='row'><!-- datos adicionales -->
				    <div class="col s12 l10 offset-l1">
						<div class="row">
						<h4 class='big-texth4-cart'> Información adicional</h4>
							<div class="input-field col s12">
								<textarea id="textarea1" class="materialize-textarea"></textarea>
	         					<label for="textarea1">Si tiene alguna necesidad, o comentario, deje información aqui</label>
							</div>
						</div>

				    </div>
			</div><!-- fin datos adicionales -->
		</form>
		<div class='row'><!-- botones continuar -->
			<div class="input-field col s12 l12  right-align " id="next-habs">
				<div class='col s12 l2  bt-movil'>
						<button class="btn col s12 waves-effect waves-light red left" type="submit" name="action">Cancelar</button>
				</div>
				<div class='col s12 l3 offset-l4 bt-derecha  bt-movil'>
						<button class="btn col s12 waves-effect waves-light blue-grey" type="submit" name="action">Anterior 
		                <i class="material-icons left rotado">trending_flat</i></button>

				</div>
				<div class='col s12 l3  bt-movil'>
	                <button class="btn col s12 waves-effect waves-light green right" type="submit" name="action">Siguiente 
	                  <i class="material-icons right">trending_flat</i>
	                </button>
				</div>

	        </div>
		</div><!-- fin botones continuar -->
</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

