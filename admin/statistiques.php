<?php 
session_start();
?>
<html>
	<head>
		<title>Entete</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="body_contenu">
	<div id="bloc">
		<h4><a href="statistiques.php">Accueil</a> > <a class="lieu">Statistiques</a></h4>
	</div>
	<?php
	require "includes/connect.php";
	
	$reponse = mysqli_query($db, "SELECT COUNT(id_commande) AS numrows FROM commande")
	or die("Echec sur total commandes");
	$data = mysqli_fetch_array($reponse);
	$total_commandes = $data['numrows'];
	
	$reponse = mysqli_query($db, "SELECT COUNT(id_produit) AS numrows FROM produit")
	or die("Echec sur nombre produits");
	$data = mysqli_fetch_array($reponse);
	$total_produits = $data['numrows'];
	
	$reponse = mysqli_query($db, "SELECT COUNT(id_client) AS numrows FROM client")
	or die("Echec sur nombre clients");
	$data = mysqli_fetch_array($reponse);
	$total_clients = $data['numrows'];
	
	$date = date('d-m-Y');
	$reponse = mysqli_query($db, "SELECT COUNT(id_commande) AS numrows FROM commande WHERE date_commande = '".$date."'")
	or die("Echec sur nbre commande du jour");
	$data = mysqli_fetch_array($reponse);
	$total_commande_jour = $data['numrows'];
	?>
		<table id="stat">
			<tr>
				<td id="ser"><a href="commandes_aujourdhui.php"><img class="ind" src="images/pannier3.png" width="55" height="50"/><br>Commandes d'Aujourd'hui<p><?php echo $total_commande_jour; ?></p></a></td>
				<td id="con"><a href="produits.php"><img class="ind" src="images/nbr_produit.png" width="55" height="50"/><br/>Nombre de Produits <p><?php echo $total_produits; ?></p></a></td>
			</tr>
			<tr>
				<td id="dep"><div><a href="clients.php"><img class="ind" src="images/client_stat.png" width="65" height="70"/><br/> Nombre de Clients <p><?php echo $total_clients; ?></a></p></div></td>
				<td id="cli"><a href="commandes.php"><img class="ind" src="images/pannier2.png" width="55" height="50"/><br> Total Commandes <p><?php echo $total_commandes; ?></p></a></td>
			<tr/>
		</table>
		<br/><br/>
		<?php require "includes/pied.php"; ?>
	</body>
</html>
