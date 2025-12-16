<?php 
session_start();
include("includes/connect.php");

@$nom_categorie = $_GET['nom_categorie'];
if(isset($_SESSION['id_client'])) {
?>
<?php include("includes/entete_connecter.php"); ?>
	<div id="corps">
	<h6>Catégorie : [ <?php echo $nom_categorie; ?> ]</h6>
<?php 
$rowsPerPage =30;  $pageNum = 1;
if(isset($_GET['page'])) {
	$pageNum = $_GET['page'];
} else { 
	$page=1;
}
$offset = ($pageNum - 1) * $rowsPerPage;

$query = "SELECT COUNT(id_produit) AS numrows from produit WHERE nom_categorie = '".$nom_categorie."'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$numrows = $row['numrows'];
// how many pages we have when using paging?
$maxPage = ceil($numrows/$rowsPerPage); 
?>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit WHERE nom_categorie = '".$nom_categorie."'
 ORDER BY id_produit DESC LIMIT $offset, $rowsPerPage") or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
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
?>
<br/><br/>
<?php
 // print the link to access each page
$self = $_SERVER['PHP_SELF'];

for($page = 1; $page <= $maxPage; $page++)
{
	if ($page == $pageNum)
		{
			echo '&nbsp;&nbsp;<em class="em"> '.$page.' </em>&nbsp;';   // no need to create a link to current page
		}
		else
		{
			echo "&nbsp;<i class='i'><a href=\"$self?page=$page\"> ".$page."&nbsp;</a></i>";
		}
}	
?>
		</div>
		</div>
		
<?php include("includes/pied.php"); ?>

<?php
}
else
{
?>
<?php include("includes/entete_deconnecter.php"); ?>
<div id="corps">
	<h6>Catégorie : [ <?php echo $nom_categorie; ?> ]</h6>
<?php 
$rowsPerPage =30;  $pageNum = 1;
if(isset($_GET['page'])) {
	$pageNum = $_GET['page'];
} else { 
	$page=1;
}
$offset = ($pageNum - 1) * $rowsPerPage;

$query = "SELECT COUNT(*) AS numrows from produit WHERE nom_categorie = '".$nom_categorie."'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$numrows = $row['numrows'];
// how many pages we have when using paging?
$maxPage = ceil($numrows/$rowsPerPage); 
?>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit WHERE nom_categorie = '".$nom_categorie."'
 ORDER BY id_produit DESC LIMIT $offset, $rowsPerPage") or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
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
?>
<br/><br/>
<?php
 // print the link to access each page
$self = $_SERVER['PHP_SELF'];

for($page = 1; $page <= $maxPage; $page++)
{
	if ($page == $pageNum)
		{
			echo '&nbsp;&nbsp;<em class="em"> '.$page.' </em>&nbsp;';   // no need to create a link to current page
		}
		else
		{
			echo "&nbsp;<i class='i'><a href=\"$self?page=$page\"> ".$page."&nbsp;</a></i>";
		}
}	
?>
		</div>
		</div>
	
	<?php include("includes/pied.php"); ?>
<?php
}
?>