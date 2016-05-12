<?php 
include("./includes/head.php"); 
include("./includes/header.php");
include("./includes/menu.php");
if(!isset($_GET['secc'])){
	include("./includes/Principal.php");
	echo "<div style='width:85%;display:inline-block;'>";
	include("./includes/body.php");
	echo "</div>";
}else{ 
	echo "<div style='width:85%; display:inline-block;'>";
	if($_GET['secc'] == "promo"){
		include("./promociones/promociones.php");
	}else if($_GET['secc'] == "habs"){
		if(!isset($_GET['tipo'])){
			include("./Habitaciones/habitaciones.php");
		}else if ($_GET['tipo'] == 1) {
			include("./Habitaciones/hDoble.php");
		}else if ($_GET['tipo'] == 2) {
			include("./Habitaciones/hTriple.php");
		}else if ($_GET['tipo'] == 3) {
			include("./Habitaciones/hDSuperior.php");
		}
	}else if($_GET['secc'] == "servicios"){
		include("./servicios/servicios.php");
	}else if($_GET['secc'] == "fotos"){
		include("./galeria/fotos.php");
	}else if($_GET['secc'] == "contacto"){
		include("./contacto/contacto.php");
	}else if($_GET['secc'] == "opiniones"){
		include("./proximamente/template.php");
	}else if($_GET['secc'] == "mireserva"){
		include("./proximamente/template.php");
	}
	echo "</div>";
}
	echo "<div class='lateralmenu'>";
	include("./includes/barraLateral.php");
	echo "</div>";
include("./includes/footer.php"); 
?>
