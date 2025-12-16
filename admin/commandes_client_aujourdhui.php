<?php 
session_start();
include("includes/connect.php");
$id_client = $_GET['id_client'];
$date = date('d-m-Y');
?>
<html>
	<head>
		<title>Entete</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="body_contenu">
		<div id="bloc">
<?php
	$req = "SELECT * FROM client WHERE id_client='".$id_client."'";
	$verif = mysqli_query($db, $req) or die("Echec de l'affichage");
	$client = mysqli_fetch_array($verif);
	if($client['photo_client'] == "") {
		$nom_photo = "anonyme.png";
	} else {
		$nom_photo = $client['photo_client'];
	}
?>
		<h4><a href="statistiques.php">Accueil</a> > <a class="lieu" href="">Commandes d'aujoud'hui de <i>"<?php echo $client['nom']; ?>"</i></a></h4>
			<form action="impression/impression_commandes_client.php?id_client=<?php echo $id_client; ?>&nom=<?php echo $client['nom'];?>&prenom=<?php echo $client['prenom']; ?>" target="_top" method="post" id="ajouter" enctype="multipart/form-data">
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
		<table border="1" class="liste">
			<?php 
			echo "<img id='com_photo' src='./../images/clients/".$nom_photo."' width='100' height='100'/>
			<br/><strong>Téléphone => ".$client['telephone']."<br/>Email => ".$client['email']."<br/>Adresse => ".$client['adresse']."</strong>"; ?>
			
			<tr>
			<th>Date</th><th>Photo</th><th>Nom de l'article</th><th>prix unitaire</th><th>Quantité</th><th>Sous-total</th><th>Opération</th>
		</tr>
<?php
	
	$req = "SELECT * FROM commande, produit, client WHERE commande.id_client='".$id_client."' 
	and date_commande = '".$date."' and commande.id_produit = produit.id_produit 
	and commande.id_client = client.id_client ORDER BY id_commande DESC";
	$verif = mysqli_query($db, $req) or die("Echec de l'affichage");
	while($pannier = mysqli_fetch_array($verif))
	{
		echo"<tr>
				<td>".$pannier['date_commande']."</td>
				<td><img src='./../images/produits/".$pannier['photo']."' width='50' height='50'/></td>
				<td><a class='lien_client' href='detail_produit.php?id_produit=".$pannier['id_produit']."' title='Cliquer pour les détails sur ce produit'>".$pannier['nom_produit']."</a></td>
				<td>".$pannier['prix']."F</td>
				<td>".$pannier['quantite_produit']."</td>
				<td>".$pannier['montant_total']."F</td>";
?>
				<td>
					<a href="supprimer.php?id_commande=<?php echo $pannier['id_commande']; ?>" onclick='confirm("Souhaitez-vous vraiment supprimer cette commande?");' ><img class="icone" src="images/supprimer.png" title="supprimer la commande."></a>
				</td>
			<tr/>
<?php	
	}
?>
		</table>
		<br/>
<p id="espace"> </p>
		</div>
	<?php include("includes/pied.php");	?>	
	</body>
</html>
