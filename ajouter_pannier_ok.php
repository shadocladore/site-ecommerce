<?php		
session_start();
include("includes/connect.php");

$id_commande = $_GET['id_commande'];
$id_produit = $_GET['id_produit'];  $nom_produit = $_GET['nom_produit']; 
$prix = $_GET['prix']; $date = date('Y-m-d'); $montant_total = $prix * $_POST['quantite'];
?>
				<!-- Insertion des produits dans la table pannier -->
<?php 
if(isset($_SESSION['id_client']))
{
	$id_client = $_SESSION['id_client'];
	if(isset($_POST['submit'])) 
	{
		$result = mysqli_query($db, "SELECT COUNT(*) AS numrows FROM pannier WHERE id_client='".$id_client."' and 
		id_produit = '".$id_produit."'") or die ("Echec de l'exécution de la requête");
		$rows = mysqli_fetch_array($result);
		$ligne = $rows['numrows'];
		if($ligne == 1)
		{
			$reponse = "<p class='erreur'>Echec de l'ajout car l' article sélectionné est déja dans le pannier.</p>";
			header("location: pannier.php?reponse=".$reponse."");
		}
		else
		{
			$insert = mysqli_query($db, "INSERT INTO pannier VALUES ('', '".$id_produit."', 
			'".$_SESSION['id_client']."', '".$_POST['quantite']."','".$montant_total."')")
			or die("Echec de l'insertion");
			
			$reponse = "<p class='erreur'>l' article sélectionné a été ajouté dans le pannier avec succès .</p>";
			header("location: pannier.php?reponse=".$reponse."");
		}	
	}		
}
else
{
	header("location: connexion.php");
}
?>
