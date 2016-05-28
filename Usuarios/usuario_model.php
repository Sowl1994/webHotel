<?php
	class Usuario{
		private $mbd;

		public function __construct(){
			$this->mbd=Conexion::conexionBD();
		}

		public function registrarUsuario(){
			$admin = 0;
			$lenguaje = "esp";
			$sentencia =$this->mbd->prepare("INSERT INTO `usuario`(`nombre`, `apellidos`, `dni`, `login`, `pass`, `email`, `idioma`, `is_admin`) 
				VALUES (:nombre,:apellidos,:dni,:login,:pass,:email,:idioma,:isAdmin)");
			$sentencia->bindParam(':nombre', $_POST['first_name']);
			$sentencia->bindParam(':apellidos', $_POST['last_name']);
			$sentencia->bindParam(':dni', $_POST['dni']);
			$sentencia->bindParam(':login', $_POST['nick']);
			$sentencia->bindParam(':pass', $_POST['pass']);
			$sentencia->bindParam(':email', $_POST['email']);
			$sentencia->bindParam(':idioma', $lenguaje);
			$sentencia->bindParam(':isAdmin', $admin);

			$sentencia->execute();
		}

		public function loginUsuario(){
			$sentencia =$this->mbd->prepare("SELECT * FROM usuario where login = :login AND pass = :pass");
			$sentencia->bindParam(':login', $_POST['loginNick']);
			$sentencia->bindParam(':pass', $_POST['loginPass']);

			$sentencia->execute();
			$row = $sentencia->fetch();

			if(empty($row['login']) || empty($row['id'])){
				header("Location:index.php?datosErroneos");
			}else{
				session_start();
				$_SESSION['session_username']= $row['login'];
				$_SESSION['session_id']= $row['id'];
				$_SESSION['session_pass']= $row['pass'];
				$_SESSION['isAdmin']= $row['is_admin'];
			}
			
		}

		public function logout(){
			session_start();
			session_destroy();
		}

	}
?>