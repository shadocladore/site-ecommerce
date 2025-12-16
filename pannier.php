<?php 
session_start();
include("includes/connect.php");

if(isset($_SESSION['id_client']))
{
?>
<?php include("includes/entete_connecter.php"); ?>

<?php

if($nbr_produit == 0) 
{
?>	
	<p class="erreur">Vous avez 0 article(s) dans votre pannier pour le moment.</p><br/>	
	<center>
		<p id="valider-commande"> 
			<a href="accueil.php" class='bouton_retour'>&nbsp; &nbsp;<img class='icone' src='images/retour.png' width='20' height='25'/>Retour &nbsp; &nbsp;</a>
		</p>
	</center>
	<br/><br/>
	<?php include("includes/pied.php"); ?>
	<?php
	}
	else   
	{
	?>
		<table border="2" id="tableau">
			<h6 id="titre_h6">Contenu de Votre Pannier :</h6>
			<?php echo @$_GET['reponse']; ?>
			<div class="bloc-erreur">
				<p class="erreur">
					Vous avez à présent <?php echo $nbr_produit; ?> article(s) dans votre pannier.<br/>
					<img src="images/bas.png" width="30" height="20" />
				</p>
				
			</div>
		<tr>
			<th>Photo</th><th>Nom</th><th>Prix<br/>unitaire</th><th>Qté</th><th>Sous<br/>total</th><th>Action</th>
		</tr>
	<?php
	$req = "SELECT * FROM pannier, produit WHERE id_client='".$_SESSION['id_client']."'
	and pannier.id_produit = produit.id_produit";
	$verif = mysqli_query($db, $req) or die("Echec de l'affichage");
	while($pannier = mysqli_fetch_array($verif))
	{
		echo"<tr>
				<td width='5%' height='80px'><img src='images/produits/".$pannier['photo']."' width=100% height=100% /></td>
				<td width='10%'>".$pannier['nom_produit']."</td><td width='5%'>".$pannier['prix']."F</td>
				<td width='3%'>".$pannier['quantite_produit']."</td><td <th width='5%'>".$pannier['montant_total']."F</td>
				<td width='5%'>
					<a class='supp' href='editer_pannier.php?id_commande=".$pannier['id_commande']."'>
						<img src='images/editer.png' width='27' height='27'/>
					</a>
					<a id='confirmation' class='supp'  href='supprimer_commande.php?id_commande=".$pannier['id_commande']."'>
						<img src='images/delete.png' width='25' height='25'/>
					</a>
				</td>
			<tr/>";
		
	}
?>
<?php
$reponse = mysqli_query($db, "SELECT * FROM pannier, produit WHERE id_client='".$_SESSION['id_client']."'
and pannier.id_produit = produit.id_produit");
$prix_total_unitaire = 0;
while($rows = mysqli_fetch_array($reponse))
{
	$prix_total_unitaire += $rows['prix'];
}
?>
<?php
$result = mysqli_query($db, "SELECT * FROM pannier, produit WHERE id_client='".$_SESSION['id_client']."'
	and pannier.id_produit = produit.id_produit");
$quantite_total = 0;
while($rows = mysqli_fetch_array($result))
{
	
	$quantite_total += $rows['quantite_produit'];
}
?>
<?php
$resultat = mysqli_query($db, "SELECT * FROM pannier, produit WHERE id_client='".$_SESSION['id_client']."'
	and pannier.id_produit = produit.id_produit");
$total = 0;
while($rows = mysqli_fetch_array($resultat))
{
	$subtotal = $rows['prix'] * $rows['quantite_produit'];
	$total += $subtotal;
}
?>
		<tr>
				<th colspan=2>Totaux >>></th><td><?php echo $prix_total_unitaire; ?>F</td><td><?php echo $quantite_total; ?></td><td style="color:red;font-weight:bold;"><?php echo $total; ?>F</td>
			</tr>
		</table>
		<br/>
		<div id="valider-commande">
			<p><a href="commande.php?nbr_produit=<?php echo $nbr_produit; ?>" class="bouton_commander"><img class='icone' src='images/commander.png' width='20' height='20'/>Commander</a></p>
			<p><a href="accueil.php" class='bouton_retour'>&nbsp; &nbsp;<img class='icone' src='images/retour.png' width='20' height='25'/>Retour &nbsp; &nbsp;</a></p>
		</p>
	<?php include("includes/pied.php"); ?>
<?php
	}
}
else
{
	echo header("location: connexion.php");
}
?>