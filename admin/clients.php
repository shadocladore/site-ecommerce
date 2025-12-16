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
		<h4><a href="statitisques.php">Accueil</a> > <a href="clients.php" class="lieu">Liste Clients</a></h4>
			
			<a class="nouveau" href="ajouter_clients.php" target="corps" title="Ajouter une nouvelle commande"><img class="icones" src="images/add.png" width="25" height="25" />Nouveau</a>
			
			<?php echo @$_GET['reponse']; ?><br/>
		
		<form action="recherche_clients.php" method="post" id="search" target="corps">
			<p><input type="image" src="images/search.png" title="Cliquer sur le bouton pour effectuer la recherche"/><input type="search" value="<?php echo @$_POST['recherche']; ?>" name="recherche" required size="40" placeholder="Rechercher un client par son nom..."/>
		</form>
		
		<table border="1" class="liste">
			<tr>
				<th>No</th><th>Photo</th><th>Nom</th><th>Contact</th><th>Adresse</th><th>Opérations</th>
			</tr>
<?php 
$rowsPerPage =10;  $pageNum = 1;
if(isset($_GET['page'])) {
	$pageNum = $_GET['page'];
} else { 
	$page=1;
}
$offset = ($pageNum - 1) * $rowsPerPage;

$query = "SELECT COUNT(id_client) AS numrows from client";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$numrows = $row['numrows'];
// how many pages we have when using paging?
$maxPage = ceil($numrows/$rowsPerPage); 
?>
	<?php
		$requete = "SELECT * FROM client ORDER BY id_client DESC LIMIT $offset, $rowsPerPage";
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
		