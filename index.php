<?php 
session_start();

require_once("./includes/head.php"); 
require_once("./includes/menu.php");
require_once("./conexion/conexion.php");
if(!isset($_GET['secc'])){
	//include("./includes/Principal.php");
	//echo "<div id='main-container'>";
	require_once("./Hotel/hotel_controller.php");
	//echo "</div>";
}else{ 
	

	if(isset($_GET['secc']) && $_GET['secc'] == 'mireserva'){
		echo "<div id='main-container' style='width: 100%;'>";
	}else{
		echo "<div id='main-container'>";
	}


	if($_GET['secc'] == "promo"){
		require_once("./promociones/promoActividades_controller.php");
	}else if($_GET['secc'] == "actividades"){
		require_once("./promociones/promoActividades_controller.php");
	}else if($_GET['secc'] == "habs"){
		require_once("./Habitaciones/habitacion_controller.php");
		/*if(!isset($_GET['tipo'])){
			include("./Habitaciones/habitaciones.php");
		}else if ($_GET['tipo'] == 1) {
			include("./Habitaciones/hDoble.php");
		}else if ($_GET['tipo'] == 2) {
			include("./Habitaciones/hTriple.php");
		}else if ($_GET['tipo'] == 3) {
			include("./Habitaciones/hDSuperior.php");
		}*/
	}else if($_GET['secc'] == "servicios"){
		include("./servicios/servicios.php");
	}else if($_GET['secc'] == "fotos"){
		require_once("./Galeria/galeria_controller.php");
	}else if($_GET['secc'] == "contacto"){
		include("./contacto/contacto.php");
	}else if($_GET['secc'] == "opiniones"){
		include("./proximamente/template.php");
	}else if($_GET['secc'] == "mireserva"){
		include("./proximamente/template.php");
	}
	echo "</div>";
}
	if(isset($_GET['secc']) && $_GET['secc'] == 'mireserva'){
		echo "<div class='lateralmenu' style='width: 0%;'>";
		 echo "</div>";
	}else{
		echo "<div class='lateralmenu'>";
		include("./includes/barraLateral.php");
		 echo "</div>";
	}



if(!isset($_GET['secc'])){
include ("./includes/prefooter.php");
};
include("./includes/footer.php"); 
?>
