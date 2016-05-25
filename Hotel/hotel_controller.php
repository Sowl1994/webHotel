<?php
	require_once("./Hotel/hotel_model.php");

	$hotel = new hotel_model();
	$nombre = $hotel->getNombre();
	$descripcion = $hotel->getDescripcion();
	$imagen = $hotel->getImagen();

	require_once("./Hotel/hotel_view.php");
?>