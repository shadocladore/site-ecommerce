<?php 
session_start();
include("includes/connect.php");
?>
<?php

?>
<html>
	<head>
		<title>Entete</title>
		<meta charset="utf-8" />
		<script type="text/javascript" src="FichierScript/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="FichierScript/fichier.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="body_contenu">
		<div id="bloc">
		<h4><a href="statistiques.php">Acceuil</a> > <a href="clients.php">Liste Clients</a> > <a class="lieu">Recherche sur "<?php echo @$_POST['recherche']; ?>"</a> </h4>
		<form action="recherche_clients.php" method="post" id="search" target="corps">
			<p><input type="image" src="images/search.png"/><input type="search" value="<?php echo @$_POST['recherche']; ?>" name="recherche" required size="40" placeholder="Rechercher un client par son nom..."/>
		</form>
		<?php
$recherche = htmlentities(@$_POST['recherche'], ENT_QUOTES);
$recherche = stripslashes(htmlspecialchars($recherche));
if (strlen($recherche)<3)
{
	echo "<p class='erreur'>Vous devez saisir au moins 3 caracteres!</p>";
} 
else
{
	$luka="SELECT * FROM client WHERE upper(nom) or 
	lower(nom) like '%$recherche%' ORDER BY nom";
	
	$eyano=mysqli_query($db, $luka) or die("Erreur survenue lors de la recherche");
	$compter=mysqli_num_rows($eyano);
	if ($compter<=0){
		echo "<p class='erreur'>Désolé ce nom n'est pas reconnue dans la liste des clients.</h3>";
	}
	else 
	{
?>
	<table border="1" class="liste">
			<tr>
				<th>No</th><th>Photo</th><th>Nom &<br/> Prenom</th><th>Contact</th><th>Adresse</th><th>Opérations</th>
			</tr>
	<?php
		$requete = "SELECT * FROM client WHERE upper(nom) or 
		lower(nom) like '%$recherche%' ORDER BY nom";
		$reponse = mysqli_query($db, $requete) or die("Echec de l'enregistrement");
		while($data = mysqli_fetch_array($reponse)) {
			$id = $data['id_client'];
			
		if($data['photo_client'] == "")
		{
			$nom_photo = "anonyme.png";
		}
		else
		{
			$nom_photo = $data['photo_client'];
		}			
			echo "<tr>
					<td>".$data['id_client']."</td>
					<td><img src='./../images/clients/".$nom_photo."' width='50' height='60'/></td>
					<td>".$data['nom']."</td><td>".$data['telephone']."</td>
					<td>".$data['adresse']."</td>";
	?>
					<td width="100">
						<a href="editer_client.php?id_client=<?php echo $id; ?>"><img class="icone" width="40" height="20" src="images/editer.png" title="editer les informations du client."></a>
						<a id="confirmation" href="supprimer.php?id_client=<?php echo $id; ?>"><img style="position:relative; top:1.6px;" class="icone" width="30" height="20" src="images/supprimer.png" title="supprimer le client."></a>
						<p style="position:relative; top:-10px;"><a class="button" href="commandes_client.php?id_client=<?php echo $id; ?>"><img style="position:relative; top:5px;" width="20" height="20" src="images/pannier.png" title="Voir toutes les commandes du client.">voir</a>
					</td>
				
				</tr>
	<?php			 
		}
	}
}
	?>
		</table>
	<br/>
			<script type="text/javascript">
				// Confirmation de déconnexion ou de suppression.
				var confirmation = document.getElementById('confirmation');
				confirmation.onclick = function(e){
				// On affiche une fenêtre de confirmation
				var c = confirm("êtes-vous certain de vouloir effectuer cette suppression?");
				// On retourne la réponse de l'utilisateur
				return c;
				};
			</script>
		<p id="espace"> </p>
		</div>
		<?php include("includes/pied.php");	?>	
	</body>
</html>