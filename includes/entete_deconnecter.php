<!Doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="images/logo.png">
		<title>Tnc Informatique</title>
		<script type="text/javascript" src="fichier.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div id="header">
			<div class="slogan">
				<div>
					<img src="images/menu.png" width="33" height="30" id="bouton_menu"/>
					<span>tncinfos</span>
				</div>
				<div class="logo"><img src="images/logo.png" width="60" height="46" />
					Tnc<br/><i> infos</i>
				</div>
				<div class="lieu_livraison"><em>Délivrer au</em><br/> cameroun </div>
				<div class="blog_recherche">
					<form action="recherche.php" method="post">
						<a class="bout_cat" href="#"><div id="bouton_cat">Tous <img src="images/bas2.png" width="10" height="10" /></div></a><div class="champ"><input type="search" name="recherche" required placeholder="Recherche..."/></div><div class="search"><input type="image" src="images/searche.png"/></div>
					</form>
				</div>
				<div class="compte">
					<a class="aide" href="#"><img src="images/aide.png" width="23" height="27" id="aide" title="Recevoir de l'aide"/></a>
					<a href="connexion.php"><img src="images/compte.png" width="19" height="21" id="compte" title="votre compte" /></a>
					<em>0</em>
					<a href="pannier.php"><img src="images/cart_menu.png" width="23" height="27" id="cart" title="votre pannier"/></a>
					</div>
				<div class="lieu_livraison2">
					<img src="images/adresse.png" width="15" height="15"/><i> Votre adresse de livraison: Cameroun </i>
				</div>
			</div>
			<div id="nav">	
				<ul class="menu">
					<li><img src="images/home.png" width="25" height="25"/><a href="accueil.php"> Accueil</a></li>
					<li><img src="images/services.png" width="25" height="25"/><a href="#"> Boutique</a></li>
					<li id="categories"><img src="images/categorie.png" width="25" height="23"/><a data-tooltip="Mont Yamoho c'est long"> Catégories</a><img src="images/bas_cat.png" id="bas" width="26" height="23"/>
						<ul id="bloc_cat">
						<?php
						$reponse = mysqli_query($db, "SELECT * FROM categorie") or die("Echec de l'exécution de la requete");
						while($categorie = mysqli_fetch_array($reponse))
						{
						?>
							<li><a href="<?php echo $categorie['nom_categorie'];?>.php"><?php echo $categorie['nom_categorie'];?></a></li>
						<?php
						}
						?>
						</ul>
					</li>
					<li><img src="images/propos.png" width="25" height="25"/><a id="propos" href="formation.php"> Formation</a></li>
					<li><img src="images/propos.png" width="25" height="25"/><a id="propos" href="services.php"> Services</a></li>
					<li><img src="images/contact.png" width="25" height="25"/><a href="contact.php"> Contact</a></li>
					<li><img src="images/propos.png" width="25" height="25"/><a href="actualites.php"> A propos</a></li>
				</ul>
			</div>
		</div>
		<div id="bloc_cat_ord">
			<p>Tous les départements</p>
			<?php
				$reponse = mysqli_query($db, "SELECT * FROM categorie") or die("Echec de l'exécution de la requete");
				while($categorie = mysqli_fetch_array($reponse))
				{
			?>
			<span><a href="<?php echo $categorie['nom_categorie'];?>.php"><?php echo $categorie['nom_categorie'];?></a></span>
			<?php
				}
			?>
		</div>
		<div id="bloc_aide">
			<div class="besoin">
				<img src="images/direction.png" width="25" height="20" class="direction"/>
				<h3>BESOIN D'AIDE ?</h3>
				<p><a href="#">Pourquoi acheter sur tncinfos.com ?</a><p>
				<p><a href="#">Aide en ligne</a></p>
				<p><a href="#">Les questions fréquentes</a></p>
				<p><a href="#">Télécharger nos applications</a></p>
			</div>
			<div class="numero">
				<p><img src="images/phone.png" width="30" height="40" class="phone"/></p>
				<p class="para">Appelez nous au <i><a href="tel:+237679808029">+237 679 80 80 29</a></i><br/><span>( du lun. au ven. de 10h à 12h et de 14h à 16h )</span></p>
			</div>
		</div>
	
	<script type="text/javascript">
			// Masquer et aficher le menu
var bouton_menu = document.getElementById('bouton_menu');
var nav = document.getElementById('nav');
bouton_menu.onclick = function(){
    if(nav.style.display=="block") {
	//	document.getElementById('header').style.height="auto";
        nav.style.display="none";
        bouton_menu.src="images/menu.png";
       
    } else {
		nav.style.display="block";
		//document.getElementById('header').style.height="100px";
        bouton_menu.src="images/close_menu.png";
    }
} 
			// Masquer et aficher le bloc d'aide
var aide = document.getElementById('aide');
var bloc_aide = document.getElementById('bloc_aide');
aide.onclick = function() {
	if(bloc_aide.style.marginTop=="0px") {
        bloc_aide.style.marginTop="-1000px";
    } else {
        bloc_aide.style.marginTop="0px";
    }
}

// Masquer et afficher le menu 
var categories = document.getElementById('categories');
        var bloc_cat = document.getElementById('bloc_cat');
        categories.onclick = function(){
            if(bloc_cat.style.display=="block"){
                bloc_cat.style.display="none";
                document.getElementById('bas').src="images/bas_cat.png";
            } else {
                bloc_cat.style.display="block";
                document.getElementById('bas').src="images/haut_cat.png";
            }
        };

		var bouton_cat = document.getElementById('bouton_cat');
        var bloc_cat_ord = document.getElementById('bloc_cat_ord');
        bouton_cat.onclick = function(){
            if(bloc_cat_ord.style.display=="block"){
                bloc_cat_ord.style.display="none";
            } else {
                bloc_cat_ord.style.display="block";
            }
        };
/* Affichage de la pubs à la page d'accueil */
//Creation des animations graphiques
    var urls;
// l'argument "pos" de animate() determine la postion de l'image suivante à afficher.
    function animate(pos) {
// permet l'affichage des images en boucle en infinité : (pos %= urls.length;)
// permet de stopper la boucle apres la derniere image(Recommandé!!!)
    if (pos == urls.length) {
        return false;
    }
// On recupère l'image par son nom(animation) dans la page html.
    document.images["animation"].src = urls[pos]; 
// on fixe un temps de passage des images en millisecondes: 1000ms = 1s
    window.setTimeout("animate(" + (pos + 1) + ");", 2000);
}
window.onload = function() {
    urls = new Array(
        "images/images_pubs/13.jpg", "images/images_pubs/6.jpg", "images/images_pubs/1.jpg", "images/images_pubs/11.jpg", "images/images_pubs/2.png", 
        "images/images_pubs/3.png", "images/images_pubs/4.png", "images/images_pubs/5.jpeg", "images/images_pubs/7.png", "images/images_pubs/4.png",
        "images/images_pubs/8.jpg", "images/images_pubs/9.jpg", "images/images_pubs/10.gif", "images/images_pubs/6.jpg", 
        "images/images_pubs/13.jpg", "images/images_pubs/9.jpg"
    );
animate(0);   
}	
		</script>
	</body>
</html>
