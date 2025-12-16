<?php 
session_start();
include("includes/connect.php");
$id_client = $_GET['id_client'];
?>
<html>
	<head>
		<title><link rel="icon" type="image/x-icon" href="images/logo.png">
		<title>Tnc Informatique</title></title>
		<meta charset="utf-8" />
		<script type="text/javascript" src="FichierScript/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="FichierScript/fichier.js"></script>
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
		<h4><a href="statistiques.php">Acceuil</a> > <a href="commandes_aujourdhui.php">Liste Commandes</a> > <a href="" class="lieu">Commandes Client <i>"<?php echo $client['nom']; ?>"</i></a></h4>
		<p>
			<a id="impression" class="imprimer2" data-tooltip="Mont Yamoho c'est long" target="corps" title="Imprimer la commande">
			<img style="position: relative; top: 4px;" class="icones" src="images/imprimer.png" width="20" height="20" /> Imprimer</a>
		</p>
		<div id="form" >
		<form action="impression/impression_commandes_client.php?id_client=<?php echo $id_client; ?>&nom=<?php echo $client['nom'];?>&prenom=<?php echo $client['prenom']; ?>" target="_top" method="post" id="ajouter" enctype="multipart/form-data">
			<label> Date Début:</label>
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
		<table border="1" class="liste">
			<?php 
			echo "<img id='com_photo' src='./../images/clients/".$nom_photo."' width='100' height='100'/>
			<br/><strong>Téléphone => ".$client['telephone']."<br/>Email => ".$client['email']."<br/>Adresse => ".$client['adresse']."</strong>"; ?>
			
			<tr>
			<th>Date</th><th>Photo</th><th>Nom de l'article</th><th>prix unitaire</th><th>Quantité</th><th>Sous-total</th><th>Opération</th>
		</tr>
<?php
	$req = "SELECT * FROM commande, produit, client WHERE commande.id_client='".$id_client."' 
	and commande.id_produit = produit.id_produit and commande.id_client = client.id_client
	ORDER BY id_commande DESC";
	$verif = mysqli_query($db, $req) or die("Echec de l'affichage");
	while($pannier = mysqli_fetch_array($verif))
	{
		echo"<tr>
				<td>".$pannier['date_commande']."</td>
				<td><img src='./../images/produits/".$pannier['photo']."' width='50' height='50'/></td>
				<td><a class='lien_client' href='detail_produit.php?id_produit=".$pannier['id_produit']."' title='Cliquer pour voir toutes les commandes de ce client'>".$pannier['nom_produit']."</a></td>
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
