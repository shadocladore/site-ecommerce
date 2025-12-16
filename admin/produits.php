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
	<body class="body_contenu" style="background: #fff;">
		<div id="bloc">
		<h4><a href="statistiques.php">Acceuil</a> > <a class="lieu" href="produits.php">Liste Produits</a></h4>
			<a class="nouveau" href="ajouter_produits.php" target="corps" title="Ajouter un nouveau produit"><img class="icones" src="images/add.png" width="25" height="25" />Nouveau</a>
		<?php echo @$_GET['reponse']; ?><br/>
		<form action="recherche_produits.php" method="post" id="search" target="corps">
			<p><input type="image" src="images/search.png" title="Cliquer sur le bouton pour effectuer la recherche"/><input type="search" value="<?php echo @$_POST['recherche']; ?>" name="recherche" required size="40" placeholder="Rechercher un produit par son nom..."/>
		</form>
		<table border="1" class="liste">
			<tr>
				<th >Date<br/>d'ajout</th></th><th>Photo</th><th width="10%">Nom</th><th>Prix</th><th>Quantité<th>Catégorie</th><th>Opération</th>
			</tr>
<?php 
$rowsPerPage =10;  $pageNum = 1;
if(isset($_GET['page'])) {
	$pageNum = $_GET['page'];
} else { 
	$page=1;
}
$offset = ($pageNum - 1) * $rowsPerPage;

$query = "SELECT COUNT(id_produit) AS numrows from produit";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$numrows = $row['numrows'];
// how many pages we have when using paging?
$maxPage = ceil($numrows/$rowsPerPage); 
?>
	<?php
		$requete = "SELECT * FROM produit ORDER BY id_produit DESC LIMIT $offset, $rowsPerPage";
		$reponse = mysqli_query($db, $requete) or die("Echec de l'enregistrement");
		while($data = mysqli_fetch_array($reponse)) {
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
		