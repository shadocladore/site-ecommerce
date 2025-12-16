<?php 
include("includes/connect.php");
include("includes/functions_clients.php");

if(isset($_POST['submit']))
{	
	$result = mysqli_query($db, "SELECT COUNT(*) AS numrows FROM client WHERE email = '".$_POST['email']."'")or die ("Echec de l'exécution de la requête");
	$rows = mysqli_fetch_array($result, MYSQL_ASSOC);
	$ligne = $rows['numrows'];
	if($ligne != 0)
	{
		$reponse = "<p class='erreur'>Echec de l'ajout car L'email entré a déja été utilisé par un autre client Veuillez-en Entrer un autre.</p>";
		header("location: clients.php?reponse=".$reponse."");
	}
	else
	{
		$nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'';
		$reponse = mysqli_query($db, "INSERT INTO client VALUES ('', '".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['telephone']."', '".$_POST['email']."',
		'".$_POST['adresse']."', '".$nomavatar."', '".$_POST['password']."')") or die ("Echec de l'exécution de la requête");
			
		$reponse = "<p class='erreur'>Le client a été ajouté avec succès.</p>";
		header("location: clients.php?reponse=".$reponse."");
	}
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
		<h4><a href="statistiques.php">Acceuil</a> > <a href="clients.php">Liste Clients</a> > <a href="ajouter_clients.php" class="lieu" href="">Ajout Client</a></h4>
		<form action="" method="post" id="client" enctype="multipart/form-data">
				<p><label>* Nom du Client:</label> <input type="text" name="nom" size="28" class="champ" required /></p>
				<p><label>* Prénom:</label> <input type="text" name="prenom" size="28" class="champ" required /></p>
				<p><label>* Téléphone:</label> <input type="tel" name="telephone" size="28" class="champ" required /></p>
				<p><label>* Adresse:</label> <input type="text" name="adresse" size="28" class="champ" required /></p>
				<p><label> Email:</label> <input type="email" name="email" size="28" class="champ" required /></p>
				<p><label> Mot de passe:</label> <input type="password" name="password" size="28" class="champ" required /></p>
				<p><label>profil de profil: <label><input type="file" name="avatar" class="champ" /></p><br/>
				<h3 class="send">
				<button type="submit" name="submit"><img src="images/add.png" /><i>Ajouter</i></button>
				<a href="clients.php"><img src="images/retour.png" /> Retour</a>
			</h3><br/>
			</form>
		</div>
		<br/><br/>
<?php include("includes/pied.php"); ?>