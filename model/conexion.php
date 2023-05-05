<?php 
//$contrasena = "";
//$usuario = "root";
//$nombre_bd = "crud";
$servername = "195.179.238.154";
$database = "u382668586_PletoraX";
$username = "u382668586_PletoraX";
$password = "Pletora.Hidalgo.01.";

try {
		$bd = new PDO (
			'mysql:host=195.179.238.154;dbname=u382668586_PletoraX',
		$username,
		$password,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);

	
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}

return $bd;

?>