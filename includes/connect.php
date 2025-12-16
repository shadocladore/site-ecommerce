<?php 

$db = mysqli_connect("localhost", "root", "", "boutique");
if(!$db) {
	echo "Echec de connexion à la base de données";
	exit;
}

?>
