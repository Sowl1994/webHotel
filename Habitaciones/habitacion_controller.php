<?php
	if(!isset($_GET['tipo'])){
		require_once("./Habitaciones/habitacion_model.php");
		//include("./Habitaciones/habitaciones.php");
		$habitaciones = new Habitacion();
		require_once("./Habitaciones/habitacionListado_view.php");
	}else {
		require_once("./Habitaciones/habitacion_model.php");
		$habitacion = new Habitacion();
		$nombre = $habitacion->getNombre($_GET['tipo']);
		$maxPax = $habitacion->getPax($_GET['tipo']);
		$precio = $habitacion->getPrecio($_GET['tipo']);
		$totalHabitaciones = $habitacion->getTotalHabs($_GET['tipo']);
		$descripcion = $habitacion->getDescripcionESP($_GET['tipo']);
		$totalTipos = $habitacion->getCount();
		$foto = $habitacion->getCarrousel($_GET['tipo']);
		require_once("./Habitaciones/habitacion_view.php");
	/*}else if ($_GET['tipo'] == 2) {
		include("./Habitaciones/hTriple.php");
	}else if ($_GET['tipo'] == 3) {
		include("./Habitaciones/hDSuperior.php");*/
	}
?>