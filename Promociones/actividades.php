	<div class="container">
  	<div class="row">
  	   <div class="col s12 l12 center ">
		     <div id="info" style='margin-top: 20px;'>
					<h3    style='padding-bottom: 20px;' class=' separador separadorDots'>Informacion de las Actividades</h3>
			</div>
  		</div> 

	<?php 
		class Actividad {

		   var $imagen;
		   var $cabecera;
		   var $descripcion;
		   
		  
		   function Actividad($imagen,$cabecera,$descripcion) {
		      $this->imagen = $imagen;
		      $this->cabecera = $cabecera;
		      $this->descripcion = $descripcion;
		   }

		   function printActividadesLeft(){
			   		echo '<div class="col s12 big">
							<div class="row">
								<div class="col s6">
								<img class="img-promo" src="'.$this->getImagen().'">
								</div>
								<div class="col s6">
									<div class="text-info-index-row"><h3>'.$this->getCabecera().'</h3>
									<p class="promo-text-info-index-row">'.$this->getDescripcion().'</p>
									<button class="btn waves-effect waves-light" type="submit" name="action">Contratar actividad
									<i class="material-icons right">send</i>
									</button>
				        
									</div>
									<div style="clear:both;"></div>
								</div>
							</div>
						</div>';


				echo'	<div class="card small">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="'.$this->getImagen().'">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">'.$this->getCabecera().'<i class="material-icons right dots-card">more_vert</i></span>
						</div>
						<div class="card-action">
							<a style="color: #26a69a; font-size: 1.3em">10€</a>
							<a href="#" class="right" style="font-size:1.2em;">Contratar actividad</a>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">'.$this->getCabecera().'<i class="material-icons right">close</i></span>
							<p>'.$this->getDescripcion().'</p>
						</div>
					</div>';
		   }

		   function printActividadesRight(){
		   		echo '<div class="col s12 big">
						<div class="row white">
							<div class="col s6">
								<div class="text-info-index-row"><h3>'.$this->getCabecera().'</h3>
									<p class="promo-text-info-index-row ">'.$this->getDescripcion().'</p>
									<button class="btn waves-effect waves-light" type="submit" name="action">Contratar actividad
									<i class="material-icons right">send</i>
									</button>
								</div>
								<div style="clear:both;"></div>
							</div>
							<div class="col s6">
								<img class="img-promo" align="right" src="'.$this->getImagen().'">
							</div>
						</div>
					</div>';


				echo'	<div class="card small">
					<div class="card-image waves-effect waves-block waves-light">
						<img class="activator" src="'.$this->getImagen().'">
					</div>
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4">'.$this->getCabecera().'<i class="material-icons right dots-card">more_vert</i></span>
					</div>
					<div class="card-action">
						<a style="color: #26a69a; font-size: 1.3em">10€</a>
						<a href="#" class="right" style="font-size:1.2em;">Contratar actividad</a>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4">'.$this->getCabecera().'<i class="material-icons right">close</i></span>
						<p>'.$this->getDescripcion().'</p>
					</div>
				</div>';
		   }

		  function getImagen(){return $this->imagen;}
		  function getCabecera(){return $this->cabecera;}
		  function getDescripcion(){return $this->descripcion;}

		  function setImagen($img){$imagen = $img;}
		  function setCabecera($header){$cabecera = $header;}
		  function setDescripcion($desc){$descripcion = $desc;}

		  function listaActividades(){
			  	include './conexion/conexion.php';
				$mbd = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $usuario, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				$sentencia ="SELECT nombre,precio,descripcion_esp,imagen from `actividad`";
				$totalActiv=0;

				foreach($mbd->query($sentencia) as $row){
					$activ = new Actividad($row['imagen'],$row['nombre'],$row['descripcion_esp']);
					if($totalActiv%2==0){
						$activ->printActividadesLeft();
					}else{
						$activ->printActividadesRight();
					}
					$totalActiv++;
				}
		  }

		}

		$a = new Actividad('','','');
		$a->listaActividades();
		
	?>
		</div>
	</div>
