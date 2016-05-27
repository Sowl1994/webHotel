<?php
	require_once("./usuario_model.php");
	require_once("../conexion/conexion.php");
	$user = new Usuario();
	if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['nick']) && isset($_POST['pass'])){
		$user->registrarUsuario();
		header("Location: ../index.php?registro=completo");
	}

	if(isset($_POST['loginNick']) && isset($_POST['loginPass']) && $_POST['loginNick']!="" && $_POST['loginPass']!=""){
		$user->loginUsuario();
		header("Location: ../index.php?login=true");
	}

	if(isset($_GET['lo'])){
		$user->logout();
		header('Location: ../index.php?lo');
	}
?>