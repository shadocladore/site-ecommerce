<?php 
session_start();
include("includes/connect.php");
$date = date('d-m-Y');
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
		<h4><a href="statistiques.php">Accueil</a> > <a class="lieu" href="">Liste Commandes d'aujourd'hui</a></h4>
<?php
	$req = "SELECT * FROM client, commande";
	$verif = mysqli_query($db, $req) or die("Echec de l'affichage");
	while($client = mysqli_fetch_array($verif))
	{ 
		$id_client = $client['id_client'];
	}
?>		<form action="impression/impression_commandes.php" target="_top" method="post" id="ajouter" enctype="multipart/form-data">
			<button type="submit" name="submit" class="boutone" data-tooltip="Mont Yamoho c'est long" value=""/><a target="corps" title="Imprimer la commande">
			<img style="position:relative; top:2px;" class="icones" src="images/imprimer.png" width="20" height="20" /> Imprimer</a>
			</button>
			<div hidden="hidden">
				<label> Date Début:</label>
				<input type="text" name="date_debut" size="8" value="<?php echo date('d-m-Y'); ?>" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])[-](0[1-9]|1[012])[-][0-9]{4}" required="required"/>
				<br/><label> Date Fin:</label> 
				<input type="text" name="date_fin" size="8" value="<?php echo date('d-m-Y'); ?>" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])[-](0[1-9]|1[012])[-][0-9]{4}" required="required"/>
			</div>
		</form>
		<form action="recherche_commandes.php" method="post" id="search" target="corps">
			<p><input type="image" src="images/search.png" title="Cliquer sur le bouton pour effectuer la recherche"/><input type="search" value="<?php echo @$_POST['recherche']; ?>" name="recherche" required size="40" placeholder="Rechercher une commande par le nom de l'article..."/>
		</form>
		<table border="1" class="liste">
			<tr>
				<th>Date</th><th>Client</th><th>Photo</th><th>Nom de l'article</th><th>prix unitaire</th><th>Quantité</th><th>Sous-total</th><th>Opération</th>
			</tr>
<?php 
$rowsPerPage =10;  $pageNum = 1;
if(isset($_GET['page'])) {
	$pageNum = $_GET['page'];
} else { 
	$page=1;
}
$offset = ($pageNum - 1) * $rowsPerPage;

$query = "SELECT COUNT(*) AS numrows from commande WHERE date_commande = '".$date."'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$numrows = $row['numrows'];
// how many pages we have when using paging?
$maxPage = ceil($numrows/$rowsPerPage); 
?>
<?php
	
	$req = "SELECT * FROM commande, produit, client WHERE date_commande = '".$date."'
	and commande.id_produit = produit.id_produit and commande.id_client = client.id_client
	ORDER BY id_commande DESC LIMIT $offset, $rowsPerPage";
	$verif = mysqli_query($db, $req) or die("Echec de l'affichage");
	while($pannier = mysqli_fetch_array($verif))
	{
		echo"<tr>
				<td>".$pannier['date_commande']."</td>
				<td><a class='lien_client' href='commandes_client_aujourdhui.php?id_client=".$pannier['id_client']."' title='Cliquer pour voir les commandes d'aujourd'hui de ce client'>".$pannier['nom']."</a></td>
				<td><img src='./../images/produits/".$pannier['photo']."' width='50' height='50'/></td>
				<td><a class='lien_client' href='detail_produit.php?id_produit=".$pannier['id_produit']."' title='Cliquer pour les détails sur ce produit'>".$pannier['nom_produit']."</a></td>
				<td>".$pannier['prix']."F</td>
				<td>".$pannier['quantite_produit']."</td>
				<td>".$pannier['montant_total']."F</td>";
?>
				<td>
					<a id="confirmation" href="supprimer.php?id_commande=<?php echo $pannier['id_commande']; ?>" onclick='confirm("Souhaitez-vous vraiment supprimer cette commande?");' ><img class="icone" src="images/supprimer.png" title="supprimer la commande."></a>
				</td>
				
			<tr/>
<?php	
	}
?>
		</table>
		<br/><script type="text/javascript">
				// Confirmation de déconnexion ou de suppression.
				var confirmation = document.getElementById('confirmation');
				confirmation.onclick = function(e){
				// On affiche une fenêtre de confirmation
				var c = confirm("êtes-vous certain de vouloir effectuer cette suppression?");
				// On retourne la réponse de l'utilisateur
				return c;
				};
			</script>

<?php
 // print the link to access each page
$self = $_SERVER['PHP_SELF'];

echo '<span style="color: rgb(0, 25, 40);">Page : </span>';
for($page = 1; $page <= $maxPage; $page++)
{
	if ($page == $pageNum)
		{
			echo '<em> '.$page.' </em>';   // no need to create a link to current page
		}
		else
		{
			echo "<i><a href=\"$self?page=$page\">".$page."</a></i>";
		}
}	
?><p id="espace"> </p>
		</div>
	<?php include("includes/pied.php");	?>	
	</body>
</html>
