<?php
	if(!isset($_SESSION['session_id'])) header("Location:index.php?noreg");
	require_once("./panelAdmin/panel_model.php");

	$reserva = new Reserva();
	require_once("./panelAdmin/panel_view.php");
?>