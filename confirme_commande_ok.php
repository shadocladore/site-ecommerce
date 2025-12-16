<?php 
session_start();
include("includes/connect.php");

if(isset($_SESSION['id_client']))
{
	$suppression = mysqli_query($db, "DELETE FROM pannier WHERE pannier.id_client='".$_SESSION['id_client']."'") or die ("Echec de suppression");
	
	$reponse = "<p class='erreur'>Votre commande a été passée avec succès.</p>";
	header("location: accueil.php?reponse=".$reponse."");
}
else
{
	header("location: connexion.php");
}