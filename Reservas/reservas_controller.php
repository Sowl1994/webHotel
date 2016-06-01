<?php
	if(!isset($_SESSION['session_id'])) header("Location:index.php?noreg");
	require_once("./Reservas/reservas_model.php");

	if(isset( $_POST['fechaInicio']) && isset($_POST['fechaFin'])){
		//Dias en formato DateTime

		$originalDate = $_POST['fechaInicio'];
		$fechaIn = date("Y-m-d H:i:s", strtotime($originalDate));
		$originalDateo = $_POST['fechaFin'];
		$fechaS = date("Y-m-d H:i:s", strtotime($originalDateo));
		
		if($fechaIn >= $fechaS){
			header("Location:./index.php?fechaErroneaEMS");
		}


		$_SESSION['fechaIni']=$fechaIn;
		$_SESSION['fechaF']=$fechaS;
		$_SESSION['nPersonas']=$_POST['nPersonas'];
	}else{
		if(!isset($_SESSION['fechaIni']) && !isset($_SESSION['fechaF'])){

		}else{
			$fechaIn = $_SESSION['fechaIni'];
			$fechaS = $_SESSION['fechaF'];
		}
	}
	$reserva = new Reserva();
	

	if($_GET['secc'] == "p1"){
		require_once("./Reservas/reservas_view_fecha.php");
	}else if($_GET['secc'] == "mireserva"){
		
		$dias = $reserva->getTotalDias($_SESSION['fechaIni'],$_SESSION['fechaF']);
		/*if($fechaIn<$fechaS)*/ require_once("./Reservas/reservas_view_habitaciones.php");
	}else if($_GET['secc'] == "mireserva2"){
		$dias = $reserva->getTotalDias($_SESSION['fechaIni'],$_SESSION['fechaF']);
		if(!isset($_GET['r']))
			require_once("./Reservas/reservas_view_datos.php");
		else{
			$reserva->reservar($_SESSION['pedido']);
			require_once("./facturas/facturas/facturasHotel.php");
			require_once("./Reservas/mandaMail.php");
			header("Location:index.php?reserva=true");
		}
	}
?>