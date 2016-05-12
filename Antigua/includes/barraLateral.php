 <div class="menu-lateral">
  <div class="header">
    <div class="hd">
  <h3>Categorias</h3>
    </div>
    <div class="type"><i class="fa fa-bars" aria-hidden="true"></i></div>
  </div>
  <ul class='padd'>
	<?php 
	$home = true;
		if(isset($_GET['secc'])){$home = false;echo" <li><a href='index.php'>Hotel</a></li>";};

		if(isset($_GET['secc']) && $_GET['secc'] != "promo"){echo "<li><a href='index.php?secc=promo'>Promociones</a></li>";}else{
			if($home == true){echo "<li><a href='index.php?secc=promo'>Promociones</a></li>";}
		}
		echo "<li><a href='index.php?secc=habs'>Habitaciones</a></li><ul class='padd'>";
		if(isset($_GET['tipo'])){
			if($_GET['tipo'] != 1){
				echo "<li><a href='index.php?secc=habs&tipo=1'>Habitacion Doble</a></li>";
			}if($_GET['tipo'] != 2){
				echo "<li><a href='index.php?secc=habs&tipo=2'>Habitacion Triple</a></li>";
			}if($_GET['tipo'] != 3){
				echo "<li><a href='index.php?secc=habs&tipo=3'>Habitacion Doble Superior</a></li>";
			}
		}else{
			echo "<li><a href='index.php?secc=habs&tipo=1'>Habitacion Doble</a></li>";
			echo "<li><a href='index.php?secc=habs&tipo=2'>Habitacion Triple</a></li>";
			echo "<li><a href='index.php?secc=habs&tipo=3'>Habitacion Doble Superior</a></li>";
		}
		
		
		if(isset($_GET['secc'])){
			if($_GET['secc'] != "servicios"){
				echo "<li><a href='index.php?secc=servicios'>Servicios</a></li>";
			}if($_GET['secc'] != "fotos"){
				echo " <li><a href='index.php?secc=fotos'>Fotos</a></li>";
			}if($_GET['secc'] != "contacto"){
				echo "<li><a href='index.php?secc=contacto'>Contacto y mapa</a></li>";
			}if($_GET['secc'] != "opiniones"){
				echo "<li><a href='index.php?secc=opiniones'>Opiniones</a></li>";
			}if($_GET['secc'] != "mireserva"){
				echo "<li><a href='index.php?secc=mireserva'>Mi reserva</a></li>";
			}		
		}else{
			echo "<li><a href='index.php?secc=servicios'>Servicios</a></li>";
			echo "<li><a href='index.php?secc=fotos'>Fotos</a></li>";
			echo "<li><a href='index.php?secc=contacto'>Contacto y mapa</a></li>";
			echo "<li><a href='index.php?secc=opiniones'>Opiniones</a></li>";
			echo "<li><a href='index.php?secc=mireserva'>Mi reserva</a></li>";		
		}
	?>
  </ul>
</div>

<div class="menu-lateral-ofertas">
  	<div class="slider">
		<ul>
			<li><img id='imagenCarr' src="./images/carrousel_wall4.jpg"><div class='Slider-text'><a style='color: black; text-decoration:none;' href="index.php?secc=promo"><h4>OFERTA DOS NOCHES</h4></a><p>Disfrute de un 10% de descuento en estancias de un mínimo de dos noches.</p></div></li>
			<li><img id='imagenCarr' src="./images/carrousel_wall2.jpg"><div class='Slider-text'><a style='color: black; text-decoration:none;' href="index.php?secc=promo"><h4>OFERTA 10% DE DESCUENTO</h4></a><p>Disfrute de un 10% de descuento con esta tarifa no reembolsable.</p></div></li>
			<li><img id='imagenCarr' src="./images/carrousel_wall5.jpg"><div class='Slider-text'><a style='color: black; text-decoration:none;' href="index.php?secc=promo"><h4>HABITACIÓN DOBLE + ESPECTÁCULO DE FLAMENCO</h4></a><p>El Flamenco más puro nacido del corazón del monte Albayzín, vive un recuerdo de vida en la cueva flamenca más bonita de Andalucía</p></div></li>
			<li><img id='imagenCarr' src="./images/carrousel_wall.jpg"><div class='Slider-text'><a style='color: black; text-decoration:none;' href="Promociones/promociones.html"><h4>OFERTA RESERVA ANTICIPADA</h4></a><p>Disfruta de un 10% de descuento reservando con 21 días de antelación.</p></div></li>
		</ul>
	</div>
</div>

<div class="menu-lateral">
  <div class="header">
    <div class="hd">
  <h3>Contacto</h3>
    </div>
    <div class="type"><i class="fa fa-comment" aria-hidden="true"></i></i></div>
  </div>
  <ul class='padd'>
 	 <p class='menu-lateral-info'>Calle Imprenta, nº 2. 18010 Granada, Granada, España</p>
  </ul>
</div>