<?php 
include("includes/connect.php");
include("includes/functions.php");

$erreur = "";
if(empty($_POST['nom']) or empty($_POST['telephone']) or empty($_POST['email']) or empty($_POST['adresse'])
or empty($_POST['password']))
{
	$erreur = "Retenez bien vos identifiants [ Email et Mot de passe ]";
}
else
{	
	$result = mysqli_query($db, "SELECT COUNT(*) AS numrows FROM client WHERE email = '".$_POST['email']."'")or die ("Echec de l'exécution de la requête");
	$rows = mysqli_fetch_array($result);
	$ligne = $rows['numrows'];
	{
		if($ligne != 0)
		{
			$erreur = "<p class='reponse_compte'>L'email entré est déja utilisé par un autre client.
			<img src='images/bas_compte.png' width='30' height='20' /></p>";
		}
		else
		{
			$nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'';
			$reponse = mysqli_query($db, "INSERT INTO client VALUES ('', '".$_POST['nom']."', '".$_POST['telephone']."', '".$_POST['email']."',
			'".$_POST['adresse']."', '".$nomavatar."', '".$_POST['password']."')") or die ("Echec de l'exécution de la requête");
			$erreur = "La création de votre compte a été effectuée avec succès";
			header("location: chargement/chargement_inscription.php?erreur=".$erreur."");
		} 
	}
}
?>
		<?php include("includes/entete_deconnecter.php"); ?>
    	<br/><br/>
    	<div class="bloc">
			<form action="inscription.php" method="post" id="form_contact" enctype="multipart/form-data">
				<div class="bloc_inscription">
					<p class="msg">Veuillez créer votre<br/>compte afin d'acheter un produit !</p>
					<div class="bloc-erreur" id="bloc_erreur">
    					<p class="erreur"><?php echo @$erreur; ?><img src="images/bas.png" width="30" height="20" /></p>	
					</div>
					<p><label>Nom<i> * </i></label><br/><input type="text" name="nom" size="28" required /></p>
					<p><label>Téléphone<i> * </i></label><br/><input type="tel" name="telephone" size="28" required /></p>
					<p><label>Adresse<i> * </i></label><br/><input type="text" name="adresse" size="28" required /></p>
					<p><label>Email<i> * </i></label><br/><input type="email" name="email" size="28" required /></p>
					<p><label>Photo</label><br/><input type="file" name="avatar" class="champ" />
					<p><label>Mot de passe<i> * </i></label><br/><input name="password"  type="password" required />
					<img src="images/voir.png" width="20" height="20" id="eye" />
					</p>
				</div>
				<h4 id="conditions">
					<input type="checkbox" name="conditions" value="oui" required />Recevoir les newsletters de tnc informatique.
				</h4>
				<p><input id="envoyer" type="submit" name="submit" value="Inscription"/></p>
			</form>
			
		</div>
		<script>
			/* Afficher et masquer le mot de passe */
			var eye = document.getElementById('eye');
			var password = document.getElementsByTagName('input')['password'];
			eye.onclick = function() {
				if(password.type=="password") {
					password.type="text";
					eye.src="images/masquer.png";
				} else {
					password.type="password";
					eye.src="images/voir.png";
				}
			}
		</script>
		<?php include("includes/pied.php"); ?>
	</body>
</html>
	