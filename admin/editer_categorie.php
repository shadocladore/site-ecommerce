<?php 
session_start();   
include("includes/connect.php");
include("includes/functions_categories.php");

@$id_categorie = $_GET['id_categorie'];
$requete = "SELECT * FROM categorie WHERE id_categorie = '".$id_categorie."'";
$reponse = mysqli_query($db, $requete) or die("Echec de l'enregistrement");
$produit = mysqli_fetch_array($reponse);			
?>	
<?php
if(isset($_POST['submit']))
{	
	$nomavatar = "";
	if(empty($_FILES['avatar']['size'])) {
		$nomavatar = $produit['photo_categorie'];
	} else {
		$nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'';
	}
	$date = date('Y-m-d');
	$requete = "UPDATE categorie SET nom_categorie = '".$_POST['nom_categorie']."', 
	photo_categorie = '".$nomavatar."', date = '".$date."' WHERE id_categorie='".$id_categorie."'";
	$reponse = mysqli_query($db, $requete) or die("Echec de l'enregistrement");
	if($reponse)
	{
		$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
		$fp = fopen("$DOCUMENT_ROOT/commerce-en-ligne/".$_POST['nom_categorie'].".php", 'w');
		if (!$fp)
		{
			echo "<p><strong>Echec de l'écriture dans le fichier</strong></p>";
			exit;
		}
		$chaine = "
		<?php
			echo header('location: categorie_ok.php?nom_categorie=".$_POST['nom_categorie']."');
		?>";
		fwrite($fp, $chaine, strlen($chaine));
	}
	else
	{
		$reponse = "<p class='erreur'>Echec de la modification car la catégorie existe déja.</p>";
		header("location: categories.php?reponse=".$reponse."");  
	}	
	$reponse = "<p class='erreur'>La catégorie a été éditée avec succès .</p>";
	header("location: categories.php?reponse=".$reponse."");   
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
		<h4><a href="statistiques.php">Acceuil</a> > <a href="categories.php">Liste Catégories</a> > <a class="lieu" href="">Editer Catégorie</a></h4>
		<form action="" method="post" id="client" enctype="multipart/form-data">
			<p>
				<label>* Nom Catégorie: </label> <input type="text" value="<?php echo $produit['nom_categorie']; ?>" name="nom_categorie" size="30" required />
			</p>
			<p><label>* Photo: </label> <input type="file" name="avatar" /></p><br/>
			<h3 class="send">
				<button type="submit" name="submit"><img src="images/add.png" /><i> Editer </i></button>
				<a href="categories.php"><img src="images/retour.png" />Retour</a>
			</h3><br/>
		</form>
		</div>
<br/><br/>
<?php include("includes/pied.php"); ?>