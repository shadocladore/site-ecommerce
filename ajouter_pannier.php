<?php 
session_start();
include("includes/connect.php");
 
if(isset($_SESSION['id_client']))
{
	$id_produit = $_GET['id_produit'];
?>
<?php include("includes/entete_connecter.php"); ?>
<?php
	$reponse = mysqli_query($db, "SELECT * FROM produit WHERE id_produit='".$id_produit."'")
	or die ("Echec de l'exécution de la requête");
	$produit = mysqli_fetch_array($reponse);
	echo "<form action='ajouter_pannier_ok.php?id_produit=".$produit['id_produit']."&nom_produit=".$produit['nom_produit']."&prix=".$produit['prix']."' method='post'>";
?>
	<h6 id="titre_h6">Ajout d'un produit du pannier</h6>
	<div id="detail_produit">
		<div class="detail1">
			<img width="50px" height="50" src="images/produits/<?php echo $produit['photo']; ?>" alt=""/>
		</div>
		<div class="detail2">
			<?php echo "<p class='nom'>".$produit['nom_produit']."</p>
			<p><span class='qte'>En stock :".$produit['quantite']."</span></p>
			<p><span class='prix'>Prix : ".$produit['prix']."FCFA</span></p>
			<p class='put_qte'><span>Quantité : <input id='quantite' type='text' autofocus name='quantite' value='1' maxlength='2' required />";
			?>
			<p>
				<button type="submit" name="submit">
					<img src="images/pannier.png" width="20" height="20" /><i>Ajouter au Pannier</i>
				</button>
			</p>
		</div>
		<div class="description">
			<h5>Description :</h5>
			<p>
				<?php echo $produit['description']; ?>
			</p>
		</div>
	</div>
	</form>
	
	<div id="produits-similaires">
		
		<div id="corps">
			<h3>Produits Similaires</h3>
	<?php
		$reponse = mysqli_query($db, "SELECT * FROM produit WHERE nom_categorie = '".$produit['nom_categorie']."' ORDER BY id_produit DESC")
		or die("Echec de l'exécution de la requete");
		while($produit = mysqli_fetch_array($reponse)) {
	?>
		<div id='bloc_produit'>
			<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
		echo "<p class='nom'>".$produit['nom_produit']."</p>
			<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
			<p id="add-cart"><a href="ajouter_pannier.php?id_produit=<?php echo $produit['id_produit']; ?>">
				<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> </a>
			</p><br/>
		</div>
<?php
}
?>
	</div>
	</div>
<?php include("includes/pied.php"); ?>
<?php
}
else
{
	header("location: connexion.php");
}
?>

		
		
		
		
		
		
		
