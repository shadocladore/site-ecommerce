<?php 
session_start();
include("includes/connect.php");
$id_commande = $_GET['id_commande'];
?>
<meta charset="utf-8"/>
<?php
if(isset($_SESSION['id_client']))
{
	
	$reponse = mysqli_query($db, "DELETE FROM pannier WHERE id_commande= '".$id_commande."'")
	or die ("Echec pannier");
	
	$reponse = "<p class='erreur'>l' article sélectionné a été supprimé dans le pannier avec succès .</p>";
	header("location: pannier.php?reponse=".$reponse."");
}
else
{
	echo header("location: connexion.php");
}



