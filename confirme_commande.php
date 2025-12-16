<?php 
session_start();
include("includes/connect.php");
$date = date('H:i, \l\e j-m-Y');
?>
<?php
if(isset($_SESSION['id_client']))
{
?>
<?php include("includes/entete_connecter.php"); ?>
	<div id="bloc_commande">
		<h6 id="titre_h6">Résultats de la Commande</h6>
		<h3 class="first"><img class='icone_home' src='images/time2.png' width='27' height='27'/> Commmande traitée à <?php echo $date; ?></h3>
		<h3><img class='icone_home' src='images/recapitulatif.png' width='27' height='27'/> Récapitulatif de votre commande :</h3>
		<table  id="tableau" border="2">
			<caption>Facture de la commande</caption>
			<tr>
				<th>Photo</th><th>Nom de l'article</th><th>prix unitaire</th><th>Quantité</th><th>Sous-total</th>
			</tr>
<?php
	$req = "SELECT * FROM pannier, produit WHERE id_client='".$_SESSION['id_client']."'
	and pannier.id_produit = produit.id_produit";
	$verif = mysqli_query($db, $req) or die("Echec de l'affichage");
	while($pannier = mysqli_fetch_array($verif))
	{
		echo"<tr>
				<td width='5%' height='80px'><img src='images/produits/".$pannier['photo']."' width=100% height=100% /></td>
				<td>".$pannier['nom_produit']."</td><td>".$pannier['prix']."F</td>
				<td>".$pannier['quantite_produit']."</td><td>".$pannier['montant_total']."F</td>
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
		<h3><img class='icone_home' src='images/adresse.png' width='25' height='25'/> Adresse de livraison :  <?php echo $_SESSION['adresse']; ?></h3>
		<p class="monsieur">
			<img class='icone_home' src='images/happy.png' width='25' height='25'/> 
			M/Mme <?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?> nous vous remerçions d'avoir passer votre Commande et nous vous conctacterons pour une livraison 
			à domicile au plutard dans les 24heures qui suivent.<br/>
			Veuillez cliquer sur valider afin de finaliser la commande et que votre commande soit prise en compte.<br/>
		<p class="confirm"><a href="confirme_commande_ok.php" class='bouton_valider'><img class='icone_valider' src='images/valider.png' width='23' height='23'/>Valider&nbsp;</a></p>
	</div>
<?php include("includes/pied.php"); ?>
<?php
}
else
{
	header("location: connexion.php");
}
?>