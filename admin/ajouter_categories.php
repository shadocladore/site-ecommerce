<?php 
session_start();   
include("includes/connect.php");
include("includes/functions_categories.php");
?>
<?php
if(isset($_POST['submit']))
{
	$result = mysqli_query($db, "SELECT COUNT(*) AS numrows FROM categorie WHERE nom_categorie = '".$_POST['nom_categorie']."'")
	or die ("Echec de l'exécution de la requête");
	$rows = mysqli_fetch_array($result);
	$ligne = $rows['numrows'];
	if($ligne != 0)
	{
		$reponse = "<p class='erreur'>Echec de l'ajout car la catégorie existe déjà.</p>";
		header("location: categories.php?reponse=".$reponse."");
	}
	else
	{
		$date = date('d-m-Y');
		$nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'';
		$requete = "INSERT INTO categorie VALUES ('', '".$_POST['nom_categorie']."', '".$nomavatar."', '".$date."')";
		$reponse = mysqli_query($db, $requete);
		if(!$reponse)
		{
			$reponse = "<p class='erreur'>Echec de l'ajout un problème est survenu lors de
			l'exécution de la requête.</p>";
			header("location: categories.php?reponse=".$reponse."");
		}
		else
		{
			$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
			$fp = fopen("$DOCUMENT_ROOT/commerce-en-ligne/".$_POST['nom_categorie'].".php", 'w');
			if (!$fp)
			{
				echo "<p><strong>Echec de l'écriture dans le fichier</strong></p>";
				exit;
			}
			else
			{
				$chaine = "
				<?php
					echo header('location: categorie_ok.php?nom_categorie=".$_POST['nom_categorie']."');
				?>";
				fwrite($fp, $chaine, strlen($chaine));
			}	
			$reponse = "<p class='erreur'>la catégorie a été ajoutée avec succès .</p>";
			header("location: categories.php?reponse=".$reponse.""); 
		}	
	}
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
		<h4><a href="statistiques.php">Acceuil</a> > <a href="categories.php">Liste Catégories</a> > <a class="lieu" href="ajouter_categories.php">Ajout Catégorie</a></h4>
		<form action="" method="post" id="client" enctype="multipart/form-data">
			<p>
				<label>* Nom Catégorie: </label> <input type="text" name="nom_categorie" size="40" required />
			</p>
			<p><label>* Photo: </label> <input type="file" name="avatar" /></p><br/>
			<h3 class="send">
				<button type="submit" name="submit"><img src="images/add.png" /><i>Ajouter</i></button>
				<a href="categories.php"><img src="images/retour.png" /> Retour</a>
			</h3><br/>
		</form>
		</div>
<br/><br/>
<?php include("includes/pied.php"); ?>