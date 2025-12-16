<?php 
session_start();   
include("includes/connect.php");
$id_commande = $_GET['id_commande'];
$reponse = mysqli_query($db, "SELECT * FROM commande, produit, client WHERE id_commande = '".$id_commande."'
and commande.id_client = client.id_client and commande.id_produit = produit.id_produit") or die ("Echec de la selection du prix du produit");
$commande = mysqli_fetch_array($reponse);
?>
<?php 
if(isset($_SESSION['id']))
{
	if(isset($_POST['submit'])) 
	{
		$reponse = mysqli_query($db, "SELECT prix FROM produit WHERE id_produit = '".$_POST['id_produit']."'")
		or die("Echec de la selection du prix du produit");
		$produit = mysqli_fetch_array($reponse);
		$prix = $produit['prix'];
		
		$id_produit = $_POST['id_produit'];  $id_client = $_POST['id_client'];
		$date = date('d-m-Y'); $montant_total = $prix * $_POST['quantite'];
		
		$insert = mysqli_query($db, "UPDATE commande SET id_produit = '".$id_produit."', 
		id_client = '".$id_client."', quantite_produit = '".$_POST['quantite']."', montant_total = '".$montant_total."',
		date_commande = '".$date."' WHERE id_commande = '".$id_commande."'") or die("Echec de l'insertion");
	
		$reponse = "<p class='erreur'>La commande a été éditée avec succès .</p>";
		header("location: commandes.php?reponse=".$reponse."");
		exit;
	}		
}
else
{
	header("location: connexion_admin.php");
}
?>
<html>
	<head>
		<title>Entete</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="body_contenu">
		<div id="bloc">
		<h4><a href="statistiques.php">Acceuil</a> > <a href="produits.php">Liste Commandes</a> > <a class="lieu" href="">Edition Commande</a></h4>
		<form action="" method="post" id="client" enctype="multipart/form-data">
			<p>
				<label>* Nom du Produit:</label>
				<select align="center" name="id_produit" required>
					<option value="<?php echo $commande['id_produit']; ?>"><?php echo $commande['nom_produit']; ?></option>
<?php 
$reponse = mysqli_query($db, "SELECT * FROM produit ORDER BY nom_produit")
or die("Echec de l'insertion");
while($data = mysqli_fetch_array($reponse)) 
{
?>					<option name="id_produit" size="35" required value="<?php echo $data['id_produit']; ?>"><?php echo $data['nom_produit']; ?></option>
<?php
}
?>				</select>
			</p>
			<p><label>* Quantite:  </label> <input type="number" value="<?php echo $commande['quantite_produit']; ?>" name="quantite" size="4" required /></p>
			<p>
				<label>* Nom du Client:</label>
				<select name="id_client" required>
					<option name="id_client" value="<?php echo $commande['id_client']; ?>"><?php echo $commande['nom']; ?></option>
<?php 
$reponse = mysqli_query($db, "SELECT * FROM client ORDER BY nom")
or die("Echec de l'insertion");
while($data = mysqli_fetch_array($reponse)) 
{
?>					
					<option name="id_client" size="35" required value="<?php echo $data['id_client']; ?>"><?php echo $data['nom']; ?></option>
<?php
}
?>				
				</select>
			</p>
			<h3 class="send">
				<button type="submit" name="submit"><img src="images/add.png" /><i>Editer</i></button>
				<a href="categories.php"><img src="images/retour.png" /> Retour</a>
			</h3><br/>
		</form>
		</div>
<br/><br/>
<?php include("includes/pied.php"); ?>