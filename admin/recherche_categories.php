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
		<h4><a href="statistiques.php">Acceuil</a> > <a href="categories.php">Liste Catégories</a> > <a class="lieu">Recherche sur "<?php echo @$_POST['recherche']; ?>"</a> </h4>
		<form action="recherche_categories.php" method="post" id="search" target="corps">
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
	$luka="SELECT * FROM categorie WHERE upper(nom_categorie) or 
		lower(nom_categorie) like '%$recherche%' ORDER BY nom_categorie";
	$eyano=mysqli_query($db, $luka) or die("Erreur survenue lors de la recherche");
	$compter=mysqli_num_rows($eyano);
	if ($compter<=0){
		echo "<p class='erreur'>Désolé cette catégorie n'est pas reconnue dans la liste des catégories de produits du catalogue.</h3>";
	}
	else 
	{
?>
	<table border="1" class="liste">
		<tr>
			<th>No</th><th>Photo</th><th>Nom categorie</th><th>Date<br/>d'ajout</th><th>Opérations</th>
		</tr>
	<?php
		while($data = mysqli_fetch_array($eyano)) {
			$id = $data['id_categorie'];	
			echo "<tr>
					<td>".$data['id_categorie']."</td>
					<td><img src='./../images/categories/".$data['photo_categorie']."' width=50 height=50/></td>
					<td>".$data['nom_categorie']."</td>
					<td>".$data['date']."</td>";
	?>
			<td width="100">
				<a href="editer_categorie.php?id_categorie=<?php echo $id; ?>"><img class="icone" src="images/editer.png" title="Modifier les informations de la catégorie."></a>
				<a id="confirmation" href="supprimer.php?id_categorie=<?php echo $id; ?>"><img class="icone" src="images/supprimer.png" title="supprimer la categorie."></a>
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