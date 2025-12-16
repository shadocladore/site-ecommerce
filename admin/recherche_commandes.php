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
		<h4><a href="statistiques.php">Acceuil</a> > <a href="commandes.php">Liste commandes</a> ><a class="lieu"> Recherche sur "<?php echo @$_POST['recherche']; ?>"</a> </h4>
		<form action="recherche_commandes.php" method="post" id="search" target="corps">
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
	$luka="SELECT * FROM commande, produit, client WHERE lower(nom_produit) like '%$recherche%' 
	and commande.id_produit = produit.id_produit and commande.id_client = client.id_client
	ORDER BY nom_produit";
	
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
			<th>Date</th><th>Client</th><th>Photo</th><th>Nom de l'article</th><th>prix unitaire</th><th>Quantité</th><th>Sous-total</th><th>Opération</th>
		</tr>
<?php
		while($pannier = mysqli_fetch_array($eyano)) {
			$id = $pannier['id_commande'];
		echo"<tr>
				<td>".$pannier['date_commande']."</td>
				<td><a class='lien_client' href='commandes_client.php?id_client=".$pannier['id_client']."' title='Cliquer pour voir toutes les commandes de ce client'>".$pannier['nom']."</a></td>
				<td><img src='./../images/produits/".$pannier['photo']."' width='50' height='50'/></td>
				<td><a class='lien_client' href='detail_produit.php?id_produit=".$pannier['id_produit']."' title='Cliquer pour les détails sur ce produit'>".$pannier['nom_produit']."</a></td>
				<td>".$pannier['prix']."F</td>
				<td>".$pannier['quantite_produit']."</td>
				<td>".$pannier['montant_total']."F</td>";
?>
				<td>
					<a href="editer_commande.php?id_commande=<?php echo $id; ?>"><img class="icone" src="images/editer.png" title="éditer la commande."></a>
					<a id="confirmation" href="supprimer.php?id_commande=<?php echo $id; ?>"><img class="icone" src="images/supprimer.png" title="supprimer la commande."></a>
				</td>
				
	
			<tr/>
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