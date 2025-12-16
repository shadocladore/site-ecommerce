<?php 
session_start();
include("includes/connect.php");
//include("includes/connect.php"); 

if(isset($_SESSION['id_client'])) {
?>
<?php include("includes/entete_connecter.php"); ?>
	<body id="body_recherche">
	<div id="corps">
		<form action="recherche.php" method="post" id="form_recherche" target="_top">
			<div class="bloc_recherche">
				<input type="image" src="images/search.png" name="submit"/><input placeholder="Rechercher..." value="<?php echo @$_POST['recherche']; ?>" name="recherche" required />
			</div>
		</form>
<?php
$recherche = htmlentities(@$_POST['recherche'], ENT_QUOTES);
$recherche = stripslashes(htmlspecialchars($recherche));
if (strlen($recherche)<3)
{
	echo "<h3 style=\" color:orange; text-align:center; font-family:palatino Linotype;\">
	Vous devez saisir au moins 3 caracteres!</h3>";
} 
else
{
	$luka="select * from produit where upper(nom_produit) or lower(nom_produit) 
	like '%$recherche%' order by nom_produit";
	
	$eyano=mysqli_query($db, $luka) or die(mysql_error());
	$compter=mysqli_num_rows($eyano);
	if ($compter<=0){
		echo "<h3 style=\" color:orange; text-align:center; font-family:palatino Linotype;\">
		Désolé le nom du produit entré ne fait pas parti de la liste de nos produits!</h3>";
	}
	else 
	{
?>
		<h6>Recherche sur [ <?php echo @$_POST['recherche']; ?> ]</h6>
<?php		
		while($produit = mysqli_fetch_array($eyano))
		{
?>		
		<div id='bloc_produit'>
			<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
			echo "
			<p class='nom'>".$produit['nom_produit']."</p>
			<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
			<p id="add-cart"><a href="ajouter_pannier.php?id_produit=<?php echo $produit['id_produit']; ?>">
				<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> </a>
			</p><br/>
		</div>
<?php
		}
	}
?>
		</div>
		</div>
<?php include("includes/pied.php"); ?>

<?php
	}
}
else
{
?>
<?php include("includes/entete_deconnecter.php"); ?>
	<body id="body_recherche">
	<div id="corps">
		<form action="recherche.php" method="post" id="form_recherche" target="_top">
			<div class="bloc_recherche">
				<input type="image" src="images/search.png" name="submit"/><input placeholder="Rechercher..." value="<?php echo @$_POST['recherche']; ?>" name="recherche" required />
			</div>
		</form>
<?php
$recherche = htmlentities(@$_POST['recherche'], ENT_QUOTES);
$recherche = stripslashes(htmlspecialchars($recherche));
if (strlen($recherche)<3)
{
	echo "<p class='erreur'>Vous devez saisir au moins 3 caracteres!</p>";
} 
else
{
	$luka="select * from produit where upper(nom_produit) or lower(nom_produit) 
	like '%$recherche%' order by nom_produit";
	
	$eyano=mysqli_query($db, $luka) or die(mysql_error());
	$compter=mysqli_num_rows($eyano);
	if ($compter<=0){
		echo "<p class='erreur'>
			Désolé le nom du produit entré ne fait pas parti de la liste de nos produits!
		</p>";
	}
	else 
	{
?>
	<h6>Recherche sur [ <?php echo @$_POST['recherche']; ?> ]</h6>
<?php
		while($produit = mysqli_fetch_array($eyano))
		{
?>
		<div id='bloc_produit'>
			<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
			echo "
			<p class='nom'>".$produit['nom_produit']."</p>
			<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
			<p id="add-cart"><a href="ajouter_pannier.php?id_produit=<?php echo $produit['id_produit']; ?>">
				<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> </a>
			</p><br/>
		</div>
<?php
		}
	}
}
?>
		</div>
		</div>
<?php include("includes/pied.php"); ?>
<?php
}
?>