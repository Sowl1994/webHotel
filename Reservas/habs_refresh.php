<?php
require_once("./habs_model.php");
$dh = new DatosHabitaciones();
function connect() {
    return new PDO('mysql:host=localhost;dbname=hotel', 'root', 'algo', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
$pdo = connect();

if($_GET['nP']%2 != 0 && $_GET['nP']>=3){
  $sentencia = "SELECT * from habitacion";
}else if($_GET['nP']%2==0 && $_GET['nP']>0){
  $sentencia = "SELECT * from habitacion WHERE pax %2=0";
}else{
  $sentencia = "SELECT * from habitacion WHERE pax = 1";
}


$nHab = 0;
foreach($pdo->query($sentencia) as $row){
	$restantes = $dh->habitacionesReservadas($row['id'],$_GET['fI'],$_GET['fF']);
	$disponibles = $row['total_habitaciones']-$restantes;
	$precio = $dh->calculaPorDisponible($row['id']);
	$foto = explode(";", $row['imagen']);

	echo "<div class='col l4'>
    <div class='card'>
      <div class='card-image waves-effect waves-block waves-light'>
        <img class='activator' src='".$foto[0]."'>
      </div>
      <div class='card-proc '>
        <span class='activator grey-text text-darken-4 card-proc-text'>".$row['nombre']."<i class='material-icons right dots-card-reserva'>more_vert</i></span>
      </div>
      <div class='card-proc-action'>
        <a style='color: #26a69a; font-size: 1.4em; margin-left:10px;'>".$row['pax']." <i class='fa fa-users' aria-hidden='true'></i></a>
        <a style='color: green; font-size: 1.4em; margin-left:10px;'><span id='disp".$row['id']."'>".$disponibles."</span>/".$row['total_habitaciones']." <i class='fa fa-check' aria-hidden='true'></i></a>
        <a style='color: green; font-size: 1.4em; margin-left:10px;'>".$precio."€</a>
        <a href='#' onclick='carrito(".$row['id'].",`".$_GET['fI']."`,`".$_GET['fF']."`)' id=hab".$row['id']." class='right card-proc-add' style='font-size:1.1em;'  >Añadir</a>
      </div>
      <div class='card-reveal'>
        <span class='card-title grey-text text-darken-4'>".$row['nombre']."<i class='material-icons right'>close</i></span>
        <p>".$row['descripcion_esp']."</p>
      </div>
    </div>
  </div>";
  $nHab++;
}

	if($nHab == 0){
		echo "No hay habitaciones disponibles para ese numero de personas. Intentelo con un numero menor.<br> Disculpe las molestias";
	}

?>