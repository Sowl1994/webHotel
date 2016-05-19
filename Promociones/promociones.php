	<div class="container">
	<div class="row">
  	   <div class="col m12 l12 offset-l3">
			<div id="info" style='margin-top: 20px;'>
					<h3 style='padding-bottom: 20px;' class=' separador separadorDots'>Informacion de las promociones</h3>
			</div>
		</div> 

	<?php 
		//include './listaPromociones.php';
		class Promocion {

		   var $imagen;
		   var $cabecera;
		   var $descripcion;
		   
		  
		   function Promocion($imagen,$cabecera,$descripcion) {
		      $this->imagen = $imagen;
		      $this->cabecera = $cabecera;
		      $this->descripcion = $descripcion;
		   }

		   function printPromocionesLeft(){
			   		echo '<div class="col m12 l12 ">
							<div class="row">
						   		<div class="col m6 l6">
									<img class="img-promo" src="'.$this->getImagen().'">
								</div>
								<div class="col m6 l6">
									<div class="text-info-index-row"><h3>'.$this->getCabecera().'</h3>
									<p class="promo-text-info-index-row">'.$this->getDescripcion().'</p>
									<button class="btn waves-effect waves-light" type="submit" name="action">Ir a promocion
									<i class="material-icons right">send</i>
									</button>
	        
								</div>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>';
		   }

		   function printPromocionesRight(){
		   		echo '<div class="col m12 l12 ">
						<div class="row white">
							<div class="col l6">
								<div class="text-info-index-row"><h3>'.$this->getCabecera().'</h3>
									<p class="promo-text-info-index-row ">'.$this->getDescripcion().'</p>
									<button class="btn waves-effect waves-light" type="submit" name="action">Ir a promocion
									<i class="material-icons right">send</i>
									</button>
								</div>
								<div style="clear:both;"></div>
							</div>
							<div class="col l6">
								<img class="img-promo" align="right" src="'.$this->getImagen().'">
							</div>
						</div>
					</div>';
		   }

		  function getImagen(){return $this->imagen;}
		  function getCabecera(){return $this->cabecera;}
		  function getDescripcion(){return $this->descripcion;}

		  function setImagen($img){$imagen = $img;}
		  function setCabecera($header){$cabecera = $header;}
		  function setDescripcion($desc){$descripcion = $desc;}

		  function listaPromos(){
			  	include './conexion/conexion.php';
				$mbd = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $usuario, $pass);
				$sentencia ="SELECT nombre,precio,plazas_disponibles,descripcion_esp,imagen from `promocion`";
				$totalPromos=0;

				foreach($mbd->query($sentencia) as $row){
					$promo = new Promocion($row['imagen'],$row['nombre'],$row['descripcion_esp']);
					if($totalPromos%2==0){
						$promo->printPromocionesLeft();
					}else{
						$promo->printPromocionesRight();
					}
					$totalPromos++;
				}
		  }

		}

		$p = new Promocion('','','');
		$p->listaPromos();
		
	?>
		</div>
	</div>
    

