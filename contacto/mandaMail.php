<?php
	require_once "../lib/PHPMailer/PHPMailerAutoload.php";
	//Se pueden enviar los headers en cualquier lugar del documento ->ERROR en los header
	ob_start();
	$username = "usuariosucio@gmail.com";
	$pass = "departamento";
	$header = "AT Hotel Plaza Nueva";

	$mail = new PHPMailer();
	$mail->isSMTP();
	//Mostramos mensajes de error
	$mail->SMTPDebug = 1;

	//Configuraciones
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tsl";
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;

	//Configuracion del mail del hotel
	$mail->Username=$username;
	$mail->Password=$pass;
	$mail->SetFrom($username,$header);
	$mail->AddReplyTo($username,$header);
	$mail->Subject = "Resguardo de la consulta";

	//Mensaje de envio
	$msg = "Estimado/a ".$_POST['nombre'].":\n Aqui tiene un resguardo del contacto realizado por el formulario de contacto de la pagina web, esperamos que tenga un buen dia\n\n\n".$_POST['contenido'];
	$msg = nl2br($msg);
	$mail->msgHTML($msg);

	//Direccion del receptor
	$address = $_POST['mail'];
	$mail->AddAddress($address,$_POST['nombre']);
	$mail->AddAddress($username,$header);

	if(!$mail->Send()) {
		echo "Error al enviar: ".$mail->ErrorInfo;
	} else {
		echo "Mensaje enviado!";
		header('Location: ../index.php?secc=contacto&sm=done');
	}
	//Se pueden enviar los headers en cualquier lugar del documento
	ob_end_flush();