<?php 
session_start();
include("includes/connect.php");
?>
<meta charset="utf-8"/>
<?php
$id = "";
if(isset($_SESSION['id']))
{
	if($id = $_GET['id_commande'])
	{
		$id_commande = $_GET['id_commande'];
		$reponse = mysqli_query($db, "DELETE FROM commande WHERE id_commande = '".$id_commande."'")
		or die ("Echec commande");
		echo "<script> alert('Le produit a été enlevé du pannier avec succès'); </script>";
		$reponse = "<p class='erreur'>La commande a été supprimée avec succès .</p>";
		header("location: commandes.php?reponse=".$reponse."");
	}
	else if($id = $_GET['id_client'])
	{
		$id_client = $_GET['id_client'];
		$reponse = mysqli_query($db, "DELETE FROM client WHERE id_client = '".$id_client."'")
		or die ("Echec commande");
		$reponse = "<p class='erreur'>Le client a été supprimé avec succès .</p>";
		header("location: clients.php?reponse=".$reponse."");
	}
	else if($id = $_GET['id_produit'])
	{
		$id_produit = $_GET['id_produit'];
		$reponse = mysqli_query($db, "DELETE FROM produit WHERE id_produit = '".$id_produit."'")
		or die ("Echec commande");
		$reponse = "<p class='erreur'>Le produit a été supprimé avec succès .</p>";
		header("location: produits.php?reponse=".$reponse."");
	}
	else
	{
		$id_categorie = $_GET['id_categorie'];
		$reponse = mysqli_query($db, "DELETE FROM categorie WHERE id_categorie = '".$id_categorie."'")
		or die ("Echec commande");
		$reponse = "<p class='erreur'>La catégorie a été supprimée avec succès .</p>";
		header("location: categories.php?reponse=".$reponse."");
	}
}
else
{	
	echo header("../connexion_admin.php");
}
