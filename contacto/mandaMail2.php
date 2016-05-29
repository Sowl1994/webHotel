<?php 
/*Lo primero es añadir al script la clase phpmailer desde la ubicación en que esté*/
require '../lib/PHPMailer/PHPMailerAutoload.php';
 
//Crear una instancia de PHPMailer
$mail = new PHPMailer();
//Definir que vamos a usar SMTP
$mail->IsSMTP();
//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
// 0 = off (producción)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 0;
//Ahora definimos gmail como servidor que aloja nuestro SMTP
$mail->Host       = 'smtp.gmail.com';
//El puerto será el 587 ya que usamos encriptación TLS
$mail->Port       = 587;
//Definmos la seguridad como TLS
$mail->SMTPSecure = 'tls';
//Tenemos que usar gmail autenticados, así que esto a TRUE
$mail->SMTPAuth   = true;
//Definimos la cuenta que vamos a usar. Dirección completa de la misma
$mail->Username   = "usuariosucio@gmail.com";
//Introducimos nuestra contraseña de gmail
$mail->Password   = "departamento";
//Definimos el remitente (dirección y, opcionalmente, nombre)
$mail->SetFrom("usuariosucio@gmail.com", "AT Hotel Plaza Nueva");
//Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
$mail->AddReplyTo("usuariosucio@gmail.com", "AT Hotel Plaza Nueva");
//Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
$mail->AddAddress('jflvilchez94@gmail.com', 'Francisco');
//Definimos el tema del email
$mail->Subject = 'Esto es un correo de prueba';
//Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
$msg = "Estimado/a ".$_POST['nombre'].":\n Aqui tiene un resguardo del contacto realizado por el formulario de contacto de la pagina web, esperamos que tenga un buen dia\n\n\n".$_POST['contenido'];
	$msg = nl2br($msg);
	$mail->msgHTML($msg);
//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
$mail->AltBody = 'This is a plain-text message body';
//Enviamos el correo
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Enviado!";
}