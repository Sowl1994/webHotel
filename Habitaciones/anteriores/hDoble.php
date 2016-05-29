<div class="container">
     
	<div class="row">
	  	   <div class="col s12 l12 center ">
			     <div id="info">
						<h3    style='margin-bottom: -60px;' class=' separador separadorDots'>Habitacion Doble</h3>
				</div>
	  		</div>

	  	   <div class="col s12 l12 center ">
				      <div id="banner-slide">
				        <!-- start Basic Jquery Slider -->
				        <ul class="bjqs">
				          <li><img src="images/habitaciones/doble/d1.jpg"></li>
				          <li><img src="images/habitaciones/doble/d2.jpg"></li>
				          <li><img src="images/habitaciones/doble/d3.jpg"></li>
				          <li><img src="images/habitaciones/doble/d4.jpg"></li>
				          <li><img src="images/habitaciones/doble/d5.jpg"></li>
				        </ul>
				        <!-- end Basic jQuery Slider -->

				      </div>
				      <!-- End outer wrapper -->

			</div>

	 </div>

	<div class="row">
		<div class="input-field col s12 l12 center">
                <button class="btn waves-effect waves-light" type="submit" name="action">Reservar Ahora
                  <i class="material-icons right">done</i>
                </button>
        </div>
	</div>

	<div class="row">
		<div class="col s12 l6 ">
			<div class="card-panel">
		      <div class='info-hotel-atributos'>
		      	<label class='label-info-atrib'>Numero maximo de personas:</label><p class='n-attrib'>  3</p>
		      	<br>
				<label class='label-info-atrib'>Tamaño de la(s) cama(s):</label><p class='n-attrib'>  2</p>
				<br>
				<label class='label-info-atrib'>Tamaño de la habitación</label> <p class='n-attrib'>  182cm</p>
		      </div>
		      <div class='info-hotel-descripcion' style='text-align:justify;'>
		      	<p>Esta amplia habitación tiene un balcón privado con vistas a la Plaza Nueva, que ofrece a su vez vistas a la Alhambra.</p>
		      </div>
		    </div>
		</div>
		<div class="col s12 l6 ">
			<div class="card-panel">
		      <span class="text-darken-2 center" style=" color: #9e9e9e;">Servicios</span>
				<ul class="amenities">
					<li>Bidé</li>
					<li>Toallas</li>
					<li>Suelo de madera/parquet</li>
					<li>Armario</li>
					<li>Balcón</li>
					<li>Vistas a un lugar de interés</li>
					<li>Bañera</li>
					<li>Ropa de cama</li>
					<li>Servicio de despertador/Reloj despertador</li>
					<li>Aire acondicionado</li>
					<li>Escritorio</li>
					<li>Secador de pelo</li>
					<li>Caja fuerte</li>
					<li>Teléfono</li>
					<li>TV</li>
					<li>Calefacción</li>
					<li>Canales vía satélite</li>
					<li>Artículos de aseo gratuitos</li>
					<li>Baño</li>
				</ul>
		    </div>
		</div>		
	</div>
	<div class="row">
		<div class="input-field col s12 l12 right-align "  id='next-habs'>
                <button class="btn waves-effect waves-light blue-grey" type="submit" name="action">Siguiente Habitacion
                  <i class="material-icons right">trending_flat</i>
                </button>
        </div>
	</div>

 </div>
				    
<script class="secret-source">
	jQuery(document).ready(function($) {

		$('#banner-slide').bjqs({
			animtype      : 'slide',
			height        : 550,
			width         : 900,
			responsive    : true,
			animduration : 450, // how fast the animation are
			animspeed : 4000, // the delay between each slide
			automatic : true,
			keyboardnav : true, // enable keyboard navigation
			randomstart   : true
		});
	});

	jQuery(function($) {
		$('.secret-source').secretSource({
			includeTag: false
		});
	});
</script>