<?php 
session_start();
include("includes/connect.php"); 
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Menu</title>
		<script type="text/javascript" src="FichierScript/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="FichierScript/fichier.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body id="body_menu">
	
		<div id="profil" title="Veuillez Cliquer sur votre photo pour modifier votre profil">
		<?php
		$reponse = mysqli_query($db, "SELECT * FROM admin WHERE id='".@$_SESSION['id']."' ")
		or die("Echec d'affichage");
		$data = mysqli_fetch_array($reponse);
		?>
			<div id="bouton">
				<img id="photo" src="images/<?php echo $data['photo']; ?>" width="50" height="50" alt="" />
				<span>
				<i><?php echo $data['nom']; ?></i> <br/> <img id="photo" src="images/ligne.png" width="10" height="10" alt="" /> <em>En ligne</em>
				</span>
			</div>
		</div>
		<div id="block_menu">
			<p><img class="ico" src="images/home.png" width="25" height="23"/> <a href="statistiques.php" TARGET="corps">Statistiques</a></p>
			<p><img class="ico" src="images/pannier.png" width="23" height="23"/> <a href="commandes.php" TARGET="corps">Commandes</a></p>
			<p><img class="ico" src="images/client.png" width="23" height="25"/> <a href="clients.php" TARGET="corps">Clients</a></p>
			<p><img class="ico" src="images/services.png" width="20" height="23"/> <a href="produits.php" TARGET="corps">Produits</a></p>
			<p><img class="ico" src="images/produit.png" width="23" height="23"/> <a href="categories.php" TARGET="corps">Categories</a></p>
			<p id="deconnexion"><img class="ico" src="images/power.png" width="20" height="20"/> <a  href="../connexion_admin.php" TARGET="_top">Déconnexion</a></p>
		<script type="text/javascript">
		// Confirmation de déconnexion ou de suppression.
		var deconnexion = document.getElementById('deconnexion');
		deconnexion.onclick = function(e){
		// On affiche une fenêtre de confirmation
			var c = confirm("êtes-vous certain de vouloir effectuer cette action ?");
			// On retourne la réponse de l'utilisateur
			return c;
		};
		</script>
		</div>
		<strong id="modifier" hidden="hidden">
			<a href="Modifier_profil.php" TARGET="corps">Modifier Profil</a>
		</strong>
		<script type="text/javascript">
		var bouton = document.getElementById('bouton');
		var modifier = document.getElementById('modifier');
		bouton.onclick = function(e){
			if(modifier.style.display=="block"){
				modifier.style.display="none";
			}else{
				modifier.style.display="block";
			}
		};
		</script>
	</body>
</html>

