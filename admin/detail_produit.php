<?php 
session_start();   
include("includes/connect.php");
include("includes/functions.php");

$id_produit = $_GET['id_produit'];
?>
<html>
	<head>
		<title>Entete</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="body_contenu">
		<div id="bloc">
	<?php
		$requete = "SELECT * FROM produit WHERE id_produit='".$id_produit."'";
		$reponse = mysqli_query($db, $requete) or die("Echec de l'enregistrement");
		$data = mysqli_fetch_array($reponse);
	?>	
		<h4><a href="statistiques.php">Acceuil</a> > <a href="produits.php">Liste Produits</a> > <a class="lieu" href="">Détail Produit</a></h4>
			<table border="1" class="liste">
			<tr>
				<?php echo "<th colspan='5'>Nom : ".$data['nom_produit']."</th>"; ?>
			</tr>
			<tr>
				<td colspan="5"><img src="./../images/produits/<?php echo $data['photo']; ?>" width='200' height='170'/></td>
			</tr>
			<tr>
				<th>No</th><th>Date<br/>d'ajout</th><th>Prix</th><th>Quantité</th><th>Catégorie</th>
			</tr>
	
	<?php
			echo "<tr>
					<td>".$data['id_produit']."</td>
					<td>".$data['date']."</td>
					<td>".$data['prix']."</td>
					<td>".$data['quantite']."</td>
					<td>".$data['nom_categorie']."</td>";
	?>
				</tr>
				<tr>
					<th colspan="5">Description du Produit</td>
				</tr>
				<tr>
					<td colspan="5"><?php echo $data['description']; ?></td>
				</tr>
		</table>
	<br/>
	<p id="espace"> </p>
		</div>
	<?php include("includes/pied.php");	?>	
	</body>
</html>