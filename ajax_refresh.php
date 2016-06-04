<?php
// PDO connect *********

function connect() {
    return new PDO('mysql:host=localhost;dbname=hotel', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
$pdo = connect();
$keyword = '%'.$_GET['keyword'].'%';
$sql = "SELECT * FROM usuario WHERE nombre LIKE (:keyword) OR dni LIKE (:keyword) ORDER BY id ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR); 
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$Nombre_user = str_replace($_GET['keyword'], '<b>'.$_GET['keyword'].'</b>', $rs['nombre']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['nombre']).'\')">'.$Nombre_user. " " . $rs['apellidos'] . '</li><br>';
}

?>