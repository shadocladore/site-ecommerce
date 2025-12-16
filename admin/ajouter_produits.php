<?php 
session_start();   
include("includes/connect.php");
include("includes/functions_produits.php");
?>
<?php
if(isset($_POST['submit']))
{	
	$date = date('Y-m-d');
	$nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'';
	
	$requete = "INSERT INTO produit VALUES ('', '".$_POST['nom_produit']."', '".$_POST['monnaie']."',
	'".$_POST['prix']."', '".$_POST['description']."', '".$_POST['quantite']."', '".$nomavatar."', 
	'".$_POST['nom_categorie']."', '".$date."')";
	
	$reponse = mysqli_query($db, $requete) or die("Echec de l'enregistrement");
	
	$reponse = "<p class='erreur'>le produit a été ajouté avec succès .</p>";
	header("location: produits.php?reponse=".$reponse."");         
	exit;
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
		<h4><a href="statistiques.php">Accueil</a> > <a href="produits.php">Liste Produits</a> > <a class="lieu" href="ajouter_produits.php">Ajout Produit</a></h4>
		<form action="" method="post" id="client" enctype="multipart/form-data">
			<p>
				<label>* Nom Catégorie:</label>
				<select name="nom_categorie" required>
					<option>La categorie</option>
<?php
	$requete = "SELECT * FROM categorie";
	$reponse = mysqli_query($db, $requete) or die("Echec de l'enregistrement");
		while($data = mysqli_fetch_array($reponse)) {
			$nom_categorie = $data['nom_categorie'];
		
?>					<option name="nom_categorie" size="35" required value="<?php echo $nom_categorie; ?>"><?php echo $nom_categorie; ?></option>
<?php
		}
?>				</select>
			</p>
			<p><label>* Nom Produit: </label><input type="text" name="nom_produit" size="40" required /></p>
			<p><label>* Monnaie:  </label> 
				<select name="monnaie" required>
					<option>La monnaie</option>
					<option name="monnaie" value="FCFA">FCFA</option>
					<option name="monnaie" value="EURO">EURO</option>
					<option name="monnaie" value="$">DOLLAR</option>
				</select>
			</p>
			<p><label>* Prix Produit: </label> <input type="text" name="prix" size="40" required /></p>
			<p><label>* Quantite:  </label> <input type="number" name="quantite" size="8" required /></p>
			<p><label>* Photo: </label> <input type="file" name="avatar" /></p><br/>
			<h6><label>* Description: </label><br/> <textarea name="description" rows="8" cols="28" required /></textarea></h6>
			<h3 class="send">
				<button type="submit" name="submit"><img src="images/add.png" /><i>Ajouter</i></button>
				<a href="produits.php"><img src="images/retour.png" /> Retour</a>
			</h3><br/>
		</form>
		</div>
<br/><br/>
<?php include("includes/pied.php"); ?>