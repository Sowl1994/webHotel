<?php
	require_once("./Reservas/reservas_model.php");
	
	if(isset( $_POST['fechaInicio']) && isset($_POST['fechaFin'])){
		//Dias en formato DateTime
		$diaI = explode(" ", $_POST['fechaInicio']);
		$fechaIn = $diaI[2]."-05-".$diaI[0]." 16:00:00";
		$diaS = explode(" ", $_POST['fechaFin']);
		$fechaS = $diaS[2]."-05-".$diaS[0]." 12:00:00";
		
		$_SESSION['fechaIni']=$fechaIn;
		$_SESSION['fechaF']=$fechaS;
		$_SESSION['nPersonas']=$_POST['nPersonas'];
	}else{
		$fechaIn= $_SESSION['fechaIni'];
		$fechaS= $_SESSION['fechaF'];
	}
		
	$reserva = new Reserva();


	if($fechaIn<$fechaS) require_once("./Reservas/reservas_view.php");
	
?>