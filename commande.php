<?php 
session_start();
include("includes/connect.php");

if(isset($_SESSION['id_client']))
{
	$nbr_produit = $_GET['nbr_produit'];
	if($nbr_produit == 0)
	{
		$reponse = "<p class='erreur'>Impossible de commander car aucun article ne se trouve dans le pannier</p>";
		header("location: pannier.php?reponse=".$reponse."");
	}
	else
	{
		$resultat = mysqli_query($db, "SELECT * FROM pannier WHERE id_client='".$_SESSION['id_client']."'");
		while($pannier = mysqli_fetch_array($resultat))
		{
			$id_produit = $pannier['id_produit'];
			$id_client = $pannier['id_client'];
			$quantite_produit = $pannier['quantite_produit'];
			$montant_total = $pannier['montant_total'];
			$date = date('d-m-Y');
			
			$reponse = mysqli_query($db, "INSERT INTO commande VALUES ('', '".$id_produit."', 
			'".$id_client."', '".$quantite_produit."', '".$montant_total."', '".$date."')") or die("Echec de l'insertion");
			
			// On modifie la quantité du produit commandé dans le stocke
			$recuperation = mysqli_query($db, "SELECT quantite FROM produit WHERE id_produit = '".$id_produit."'") 
			or die("Echec de la recupération de la quantité du produit");
			$produit = mysqli_fetch_array($recuperation);
			$ancien_quantite = $produit['quantite'];
			
			$new_quantite = $ancien_quantite - $quantite_produit;
			$modification = mysqli_query($db, "UPDATE produit SET quantite = '".$new_quantite."' WHERE id_produit = '".$id_produit."'")
			or die("Echec de la modification de la quantité du produit");
			
			header("location: chargement/chargement_commande.php");
		}
	
	}
}
else
{
	header("location: connexion.php");
}
?>
