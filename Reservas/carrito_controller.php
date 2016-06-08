<?php
  require_once("./habs_model.php");
  $dh = new DatosHabitaciones();
  function connect() {
      return new PDO('mysql:host=localhost;dbname=hotel', 'root', 'algo', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  }
  $pdo = connect();


  $precio = $dh->calculaPorDisponible($_GET['id']);

  $sentencia = $pdo->prepare("SELECT nombre FROM habitacion WHERE id =".$_GET['id']);
  $sentencia->execute();
  $row = $sentencia->fetch();
  echo $precio.";".$row[0];
?>