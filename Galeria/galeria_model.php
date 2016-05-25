<?php 
	class Foto {

	   var $ruta;
	   var $textoEsp;
	   var $textoEng;
	   
	  
	   function Foto($ruta,$textoEsp,$textoEng) {
	      $this->ruta = $ruta;
	      $this->textoEsp = $textoEsp;
	      $this->textoEng = $textoEng;
	      $this->mbd=Conexion::conexionBD();
	   }

	   function Galeria($imgfila){
			$sentencia ="SELECT id,ruta,texto_esp,texto_eng from `foto`";
			$totalFotos=0;

			foreach($this->mbd->query($sentencia) as $row){
				$activ = new Foto($row['ruta'],$row['texto_esp'],$row['texto_eng']);
				echo '  <div class="col l3">	
							<div class="polaroid">
							  <p>'.$activ->getTextoEsp().'</p>
							  <img class="materialboxed polas" src="'.$activ->getRuta().'" />
							</div>
						</div>';
				$totalFotos++;
				if($totalFotos == $imgfila){
					$totalFotos = 0;
					echo '</div>
						  <div class="row">';

				}
			}
			echo '</div>';
		   		
	   }

	  function getRuta(){return $this->ruta;}
	  function getTextoEsp(){return $this->textoEsp;}
	  function getTextoEng(){return $this->textoEng;}

	  function setRuta($t){$ruta = $t;}
	  function setTextoEsp($tesp){$textoEsp = $tesp;}
	  function setTextoEng($teng){$textoEng = $teng;}

	}
?>