<?php
	if($_GET['secc'] == "promo"){
		require_once("./Promociones/promociones_model.php");
		$promo =  new Promocion('','','');
		require_once("./Promociones/promociones_view.php");
	}else if($_GET['secc'] == "actividades"){
		require_once("./Promociones/actividades_model.php");
		$actividad = new Actividad('','','');
		require_once("./Promociones/actividades_view.php");
	}
?>