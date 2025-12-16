<?php 
include("includes/connect.php");
include("includes/functions_clients.php");

@$id_client = $_GET['id_client'];
$requete = "SELECT * FROM client WHERE id_client = '".$id_client."'";
$reponse = mysqli_query($db, $requete) or die("Echec de l'enregistrement");
$client = mysqli_fetch_array($reponse);	
if(isset($_POST['submit']))
{	
	$nomavatar = "";
	if(empty($_FILES['avatar']['size'])) {
		$nomavatar = $client['photo_client'];
	} else {
		$nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'';
	}
	$reponse = mysqli_query($db, "UPDATE client SET nom = '".$_POST['nom']."', telephone = '".$_POST['telephone']."', 
	email = '".$_POST['email']."', adresse = '".$_POST['adresse']."', photo_client = '".$nomavatar."', password = '".$_POST['password']."'
	WHERE id_client = '".$id_client."'") or die ("Echec de l'exécution de la requête");
			
	$reponse = "<p class='erreur'>Les informations du client ont été éditées avec succès.</p>";
	header("location: clients.php?reponse=".$reponse."");

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
		<h4><a href="statistiques.php">Acceuil</a> > <a href="clients.php">Liste Clients</a> > <a href="" class="lieu" href="">Edition Client</a></h4>
			<form action="" method="post" id="client" enctype="multipart/form-data">	
				<center><h6><img src="../images/clients/<?php echo $client['photo_client']; ?>" width=100 height=100 /></h6></center>
				<p><label>* Nom du Client:</label> <input type="text" value="<?php echo $client['nom']; ?>" name="nom" size="15" class="champ" required /></p>
				<p><label>* Téléphone:</label> <input type="tel" value="<?php echo $client['telephone']; ?>" name="telephone" size="15" class="champ" required /></p>
				<p><label>* Adresse:</label> <input type="text" name="adresse" value="<?php echo $client['adresse']; ?>" size="25" class="champ" required /></p>
				<p><label> Email:</label> <input type="email" name="email" size="25" value="<?php echo $client['email']; ?>"  class="champ" required /></p>
				<p><label> Mot de passe:</label> <input type="text" value="<?php echo $client['password']; ?>" name="password" size="15" class="champ" required /></p>
				<p><label>profil de profil: <label><input type="file" name="avatar" class="champ" /></p><br/>
				<h3 class="send">
					<button type="submit" name="submit"><img src="images/add.png" /><i>Editer</i></button>
					<a href="eleves.php"><img src="images/retour.png" /> Retour</a>
				</h3><br/>
			</form>
		</div>
		<br/><br/><br/><br/>
<?php include("includes/pied.php"); ?>