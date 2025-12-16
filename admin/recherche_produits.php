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
		<h4><a href="statistiques.php">Acceuil</a> > <a href="produits.php">Liste Poduits</a> > <a class="lieu">Recherche sur "<?php echo @$_POST['recherche']; ?>"</a> </h4>
		<form action="recherche_produits.php" method="post" id="search" target="corps">
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
	$luka="SELECT * FROM produit WHERE upper(nom_produit) or 
	lower(nom_produit) like '%$recherche%' ORDER BY nom_produit";
	
	$eyano=mysqli_query($db, $luka) or die("Erreur survenue lors de la recherche");
	$compter=mysqli_num_rows($eyano);
	if ($compter<=0){
		echo "<p class='erreur'>Désolé ce produit n'est pas reconnue dans la liste 
		des produits du catalogue!</h3>";
	}
	else 
	{
?>
	<table border="1" class="liste">
			<tr>
				<th>Date<br/>d'ajout</th></th><th>Photo</th><th>Nom</th><th>Prix</th><th>Quantité<th>Catégorie</th><th>Opération</th>
			</tr>
<?php
		while($data = mysqli_fetch_array($eyano)) {
			$id = $data['id_produit'];
			echo "<tr>
					<td>".$data['date']."</td>
					<td><img src='./../images/produits/".$data['photo']."' width='50' height='50'/></td>
					<td>".$data['nom_produit']."</td><td>".$data['prix']."</td>
					<td>".$data['quantite']."</td>
					<td>".$data['nom_categorie']."</td>";
	?>
			<td width="100">
				<a href="detail_produit.php?id_produit=<?php echo $id; ?>"><img class="icone" src="images/voir.png" title="Voir la description du produit."></a>
				<a href="editer_produit.php?id_produit=<?php echo $id; ?>"><img class="icone" src="images/editer.png" title="Modifier les informations du produit."></a>
				<a id="confirmation" href="supprimer.php?id_produit=<?php echo $id; ?>"><img class="icone" src="images/supprimer.png" title="supprimer le produit."></a>
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