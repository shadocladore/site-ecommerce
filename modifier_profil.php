<?php 
session_start();
include("includes/connect.php");
include("includes/functions.php");

$reponse = mysqli_query($db, "SELECT * FROM client WHERE id_client = '".$_SESSION['id_client']."'")
or die ("Echec de l'affichage");
$client = mysqli_fetch_array($reponse);
?>
<?php
if(isset($_POST['submit']))
{
	$nomavatar = "";
	if(empty($_FILES['avatar']['size'])) {
		$nomavatar = $client['photo_client'];
	} else {
		$nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'';
	}
	$reponse = mysqli_query($db, "UPDATE client SET nom='".$_POST['nom']."', telephone='".$_POST['telephone']."', email='".$_POST['email']."',
	adresse='".$_POST['adresse']."', photo_client='".$nomavatar."', password='".$_POST['password']."'  WHERE id_client = '".$_SESSION['id_client']."'") 
	or die ("Echec de la modification");
			
	echo "<script> alert('La modification de votre profil a été effectuée avec succès.Veuillez cliquer sur le bouton actualiser qui apparaitra.'); </script>";
	$bouton = "<p><a id='actualiser' href='modifier_profil.php'><img src='images/actualiser.png' width='20' height='20'/>
		Actualiser</a></p>";
}
?>
		<?php include("includes/entete_connecter.php"); ?>
    	<br/><br/>
    	<div class="bloc">
			<form action="" method="post" id="form_contact" enctype="multipart/form-data">
				<div class="bloc_inscription">
					<p class="msg">modification<br/>de votre profil !</p>
					<div class="bloc-prof">
    					<?php echo @$bouton; ?><br/>
						<img id="profil" src="images/clients/<?php echo $nom_photo; ?>" width="90%" height="140"/>
					</div>
					<p><label>Nom<i> * </i></label><br/><input type="text" name="nom" value="<?php echo $client['nom']; ?>" size="30" class="champ" required /></p>
					<p><label>Téléphone<i> * </i></label><br/><input type="text" name="telephone" value="<?php echo $client['telephone']; ?>" size="30" class="champ" required /></p>
					<p><label>Adresse<i> * </i></label><br/><input type="text" name="adresse" value="<?php echo $client['adresse'];?>"size="30" class="champ" required /></p>
					<p><label>Email<i> * </i></label><br/><input type="text" name="email" value="<?php echo $client['email'];?>"  size="30" class="champ" required /></p>
					<p><label>Photo profil</label><br/><input type="file" name="avatar" class="champ" /></p>
					<p>
						<label>Mot de passe<i> * </i></label><br/><input type="password" name="password" value="<?php echo $client['password'];?>" size="30" class="champ" required />
						<img src="images/voir.png" width="20" height="20" id="eye" />
					</p>
				</div>	
				<p><input type="submit" name="submit" class="champ" value="Modifier"/></p>
			</form>
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
			</div>
		</div>
	</body>
<?php include("includes/pied.php") ?>	
</html>
