<?php 
session_start();
include("includes/connect.php");

$id_commande = $_GET['id_commande'];
$id_client = $_SESSION['id_client'];
if(isset($_SESSION['id_client']))
{
    $resultat = mysqli_query($db, "SELECT * FROM pannier, produit WHERE id_client='".$_SESSION['id_client']."'
	and pannier.id_commande='".$id_commande."' and pannier.id_produit = produit.id_produit") or die("Echec de la modification");
    $rows = mysqli_fetch_array($resultat);
	$montant_total = $rows['prix'] * $_POST['quantite'];

    $reponse = mysqli_query($db, "UPDATE pannier SET quantite_produit='".$_POST['quantite']."', 
    montant_total='".$montant_total."' WHERE pannier.id_client='".$_SESSION['id_client']."'
    and id_commande='".$id_commande."'") or die ("Echec de la modification");
    header("location: pannier.php");
}
else 
{
    header("location: connexion.php");
}
