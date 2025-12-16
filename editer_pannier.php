<?php 
session_start();
include("includes/connect.php");

$id_commande = $_GET['id_commande'];
$id_client = $_SESSION['id_client'];
if(isset($_SESSION['id_client']))
{
?>
<?php include("includes/entete_connecter.php"); ?>
	
<table border="2" id="tableau">
	<h6>Edition du Contenu de Votre Pannier</h6>
	<caption>Confirmer l'ajout de cet article dans votre pannier</caption>
		<tr>
			<th>photo</th><th>Nom Article</th><th>Prix unitaire</th><th>Quantité</th>
		</tr>

<?php
	$reponse = mysqli_query($db, "SELECT * FROM pannier, produit WHERE id_client='".$id_client."'
	and id_commande='".$id_commande."'and pannier.id_produit = produit.id_produit") or die ("Echec de l'affichage");
	while($produit = mysqli_fetch_array($reponse)) {
	echo "<form action='editer_pannier_ok.php?id_commande=".$id_commande."' method='post'>";
?>
		<tr>
			<td><img width="50px" height="50" src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></td>
<?php
		echo "<td>".$produit['nom_produit']."</td>
			<td>".$produit['prix']."".$produit['monnaie']."</td>
			<td><input id='quantite' type='text' name='quantite' size='2' value='".$produit['quantite_produit']."' required /></td>
		</tr>";
}
?>
	</table>
	<br/>
		<div id="valider-commande">
			<p><input type="submit" class="bouton_modifier" name="submit" value="Modifier"/></p>
			<p><a href="pannier.php" class='bouton_retour'>&nbsp; &nbsp;<img class='icone' src='images/retour.png' width='20' height='25'/> Retour &nbsp; &nbsp;</a></p>
		</div>
	</form>
	
<?php include("includes/pied.php"); ?>
<?php
}
else
{
	header("location: connexion.php");
}
?>