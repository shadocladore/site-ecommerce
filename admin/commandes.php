<?php 
session_start();
include("includes/connect.php");
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
		<h4><a href="statistiques.php">Acceuil</a> > <a class="lieu" href="commandes.php">Liste Commandes</a></h4>
		<a class="nouveau" href="ajouter_commandes.php" target="corps" title="Ajouter une nouvelle commande">
		<img class="icones" src="images/add.png" width="25" height="25" />Nouveau</a>
		
			<a id="impression" class="imprimer" data-tooltip="Mont Yamoho c'est long" target="corps" title="Imprimer la commande">
			<img class="icones" src="images/imprimer.png" width="20" height="20" /> Imprimer</a>
		
		<div id="form" >
		<form action="impression/impression_commandes.php?" target="_top" method="post" id="ajouter" enctype="multipart/form-data">
			<br/><label> Date Début:</label>
			<input type="text" name="date_debut" size="10" placeholder="01-01-1970" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])[-](0[1-9]|1[012])[-][0-9]{4}" required="required"/>
			<br/><label> Date Fin:</label> 
			<input type="text" name="date_fin" size="10" placeholder="01-01-1970" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])[-](0[1-9]|1[012])[-][0-9]{4}" required="required"/>
			<br/><input type="submit" name="submit" value="Valider"/>
		</form>
		</div>
		<script type="text/javascript">
		// Masquer le formulaire de validation de l'impression :
		var impression = document.getElementById('impression');
		var nav = document.getElementById('form');
		impression.onclick = function(e){
			if(nav.style.display=="block"){
				nav.style.display="none";
			}else{
				nav.style.display="block";
			}
		};
		</script>
		<?php echo @$_GET['reponse']; ?><br/>
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

$query = "SELECT COUNT(id_commande) AS numrows from commande";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$numrows = $row['numrows'];
// how many pages we have when using paging?
$maxPage = ceil($numrows/$rowsPerPage); 
?>
<?php
	$req = "SELECT * FROM commande, produit, client WHERE 
	commande.id_produit = produit.id_produit and commande.id_client = client.id_client
	ORDER BY id_commande DESC LIMIT $offset, $rowsPerPage";
	$verif = mysqli_query($db, $req) or die("Echec de l'affichage");
	while($pannier = mysqli_fetch_array($verif))
	{
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
					<a href="editer_commande.php?id_commande=<?php echo $pannier['id_commande']; ?>"><img class="icone" src="images/editer.png" title="éditer la commande."></a>
					<a id="confirmation" href="supprimer.php?id_commande=<?php echo $pannier['id_commande']; ?>"><img class="icone" src="images/supprimer.png" title="supprimer la commande."></a>
				</td>
				
	
			<tr/>
<?php	
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
