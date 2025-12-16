<?php 
session_start();
include("includes/connect.php");
include("includes/functions.php");

$reponse = mysqli_query($db, "SELECT * FROM admin WHERE id = '".$_SESSION['id']."'")
or die ("Echec de l'affichage");
$admin = mysqli_fetch_array($reponse);
?>
<?php
$bouton_actualiser = "";
if(isset($_POST['submit']))
{
	$bouton_actualiser = '<a class="nouveau" href="index.php" target="_top">
	<img id="actualiser" src="images/actualiser.png" width=20" height=20" /> Actualiser </a>';
	
	$nomavatar = "";
	if(empty($_FILES['avatar']['size'])) {
		$nomavatar = $admin['photo'];
	} else {
		$nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'';
	}
	$nom = addslashes($_POST['nom']);
	$password = addslashes($_POST['password']);
	$date_naissance = addslashes($_POST['date_naissance']);
	$passion = addslashes($_POST['passion']);
	
	$requete = "UPDATE admin SET nom='" . $nom. "', password='" .$password. "', passion='" . $passion. "', 
	date_naissance='" . $date_naissance. "', photo='" . $nomavatar . "' WHERE id='".$_SESSION['id']."'";
	
	$reponse = mysqli_query($db, $requete) or die("Echec de l'enregistrement");
	echo "<script> alert('La modification de votre profil a été effectuée avec succès Veuillez Cliquer sur le bouton Actualiser qui appararaîtra afin que la modification prenne effet.'); </script>";
}
else
{
	echo "<script> alert('Après la Modification de votre de votre Profil, Veuillez Cliquer sur le bouton Actualiser afin que la modification prenne effet.'); </script>";
}
?>
<html>
	<head>
		<title>Entete</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="body_contenu">
		<div id="bloc">
		<h4><a href="statistiques.php">Accueil</a> > <a href="" class="lieu">Modification Profil</a></h4>
<?php 
$requete = "SELECT * FROM admin WHERE id = '".$_SESSION['id']."'";
$reponse = mysqli_query($db, $requete) or die("Echec de l'enregistrement");
$profil = mysqli_fetch_array($reponse);
?>
			<form action="" method="post" id="client" enctype="multipart/form-data">
				<p>
					<?php echo $bouton_actualiser; ?>
				</p>
				<h6>
					<img src="images/<?php echo $profil['photo']; ?>" width="200" height="150" />
				</h6>
				<p>
					<label>Nom Utilisateur  : <label><input class="champ" type="text"  maxlength="9" value="<?php echo $profil['nom']; ?>" name="nom" size=20 required />
				</p>
				<p>
					<label>Mot de passe : <label><input type="text" style="margin-left: 10px;" class="champ" value="<?php echo $profil['password']; ?>"  size=20 name="password" required />
				</p>
				<p>
					<label>Date de naissance : <label><input type="text" style="margin-left: 10px;" class="champ" value="<?php echo $profil['date_naissance']; ?>"  size=20 name="date_naissance" required />
				</p>
				<p>
					<label>Votre passion : <label><input type="text" style="margin-left: 10px;" class="champ" value="<?php echo $profil['passion']; ?>"  size=20 name="passion" required />
				</p>
				
				<p>
					<label>Photo de profil :<label><input type="file" name="avatar" class="champ"/>
				</p>
				<h3 class="send">
					<button type="submit" name="submit"><img src="images/add.png" /><i>Modifier</i></button>
					<a href="statistiques.php"><img src="images/retour.png" /> Retour</a>
				</h3><br/>
			</form>
		</div>
	<br/><br/>
	<?php include("includes/pied.php");	?>