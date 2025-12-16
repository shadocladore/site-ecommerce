<?php 
session_start();
include("includes/connect.php");
//include("includes/connect.php"); 

if(isset($_SESSION['id_client'])) {
?>
<?php include("includes/entete_connecter.php"); ?>
    <div id="pubs">
		<a href="#" target=""><img src="images/images_pubs/12.gif" /></a><a href="#" target=""><img src="images/images_pubs/1.jpg" name="animation"/></a>
	</div>
	<?php echo @$_GET['reponse']; ?>
	<div class="bloc_iframe">
		<h6>Découvrez nos meilleurs deals</h6>
       <iframe src="includes/nouveautes.html" width="90%" height="250"></iframe>
    </div>
	   <div id="corps">
		<h6>Les meilleurs Laptop de travail</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='Laptop' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="ajouter_pannier.php?id_produit=<?php echo $produit['id_produit']; ?>">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i>
	</p><br/>
	</div> 
</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=Laptop"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Télévisions</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='Televiseur' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="ajouter_pannier.php?id_produit=<?php echo $produit['id_produit']; ?>">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
	</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=Televiseur"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Smartphones de l'heure</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='smartphone' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="ajouter_pannier.php?id_produit=<?php echo $produit['id_produit']; ?>">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=smartphone"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Montres</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='montre' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="ajouter_pannier.php?id_produit=<?php echo $produit['id_produit']; ?>">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=montre"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Caméras pour votre sécurité</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='Camera' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="ajouter_pannier.php?id_produit=<?php echo $produit['id_produit']; ?>">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=Camera"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Ordinateurs de bureau</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='Desktop' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
	<a href="ajouter_pannier.php?id_produit=<?php echo $produit['id_produit']; ?>">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=Desktop"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Imprimantes Lasers</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='imprimante' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="ajouter_pannier.php?id_produit=<?php echo $produit['id_produit']; ?>">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
	</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=imprimante"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
	</div>
	<div class="chatbot">
		<a href="chatbot/index.php"><img src="images/chatbot.png" id="chat" width="20" height="20" /></a>
	</div>
	<?php include("includes/pied.php"); ?> 
<?php
}
else
{
?>
</div>
<?php include("includes/entete_deconnecter.php"); ?>
    <div id="pubs">
		<a href="#" target=""><img src="images/images_pubs/12.gif" /></a><a href="#" target=""><img src="images/images_pubs/1.jpg" name="animation"/></a>
	</div>
	<?php echo @$_GET['reponse']; ?>
	<div class="bloc_iframe">
		<h6>Découvrez nos meilleurs deals</h6>
       <iframe src="includes/nouveautes.html" width="90%" height="250"></iframe>
    </div>
	   <div id="corps">
		<h6>Les meilleurs Laptop de travail</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='Laptop' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="connexion.php">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i>
	</p><br/>
	</div> 
</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=Laptop"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Télévisions</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='Televiseur' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="connexion.php">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
	</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=Televiseur"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Smartphones de l'heure</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='smartphone' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="connexion.php">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=smartphone"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Montres</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='montre' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="connexion.php">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=montre"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Caméras pour votre sécurité</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='Camera' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="connexion.php">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=Camera"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Ordinateurs de bureau</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='Desktop' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="connexion.php">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=Desktop"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
<h6>Les meilleurs Imprimantes Lasers</h6>
<?php
$reponse = mysqli_query($db, "SELECT * FROM produit where nom_categorie='imprimante' ORDER BY id_produit DESC LIMIT 8")
or die("Echec de l'exécution de la requete");
while($produit = mysqli_fetch_array($reponse)) {
?>
    <a href="connexion.php">
	<div id='bloc_produit'>
		<p class="img"><img src="images/produits/<?php echo $produit['photo']; ?>" alt=""/></p>
<?php
	echo "
		<p class='nom'>".$produit['nom_produit']."</p>
		<p class='prix'>".$produit['prix']."".$produit['monnaie']."</p>";
?>
	<p id="add-cart">
		<img src='images/cart.png' width="10" height="10" /><i>Ajouter</i> 
	</p><br/>
	</div>
	</a>
<?php
}
?>
<p class="voir-plus">
	<a href="categorie_ok.php?nom_categorie=imprimante"> Voir plus <img class="fleche-droite" src="images/fleche-droite.png" width="35" height="15" /> </a>
</p>
	</div>
	<div class="chatbot">
		<a href="chatbot/index.php"><img src="images/chatbot.png" id="chat" width="20" height="20" /></a>
	</div>
<?php include("includes/pied.php"); ?>
<?php
}
?>
	
	
	