<?php 
session_start();
include("includes/connect.php");

$erreur = "";
if(empty($_POST['email']) or empty($_POST['password'])) 
{
	$erreur = "Veuillez entrer votre email et mot de passe pour acceder à votre compte.";
}
else
{
	$req = "SELECT * FROM client WHERE email = '".$_POST['email']."'";
	$verif = mysqli_query($db, $req) or die("Echec de la vérification");
	$data = mysqli_fetch_array($verif);
	if($_POST['password'] == $data['password']) 
	{
		$_SESSION['id_client'] = $data['id_client'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['nom'] = $data['nom'];
		$_SESSION['prenom'] = $data['prenom'];
		$_SESSION['adresse'] = $data['adresse'];
		header("location: accueil.php");
	} 
	else
	{
		$erreur = "L'email ou le mot de passe entré est incorrect";
	}
}
?>
<?php include("includes/entete_deconnecter.php"); ?>
    <br/>
		<div class="bloc-erreur" id="bloc_erreur">
			<?php echo @$_GET['reponse']; ?>
		</div>
			<br/><br/>
    	<div class="bloc">
			<form action="connexion.php" method="post" id="form_contact" enctype="multipart/form-data">
				<div class="bloc_inscription">
					<div class="bloc-erreur" id="bloc_erreur">
    					<p class="erreur"><?php echo @$erreur; ?><img src="images/bas.png" width="30" height="20" /></p>
					</div>
					<p><label>Email<i> * </i></label><br/><input type="email" name="email" size="28" required /></p>
					<p><label>Mot de passe<i> * </i></label><br/><input name="password"  type="password" required />
						<img src="images/voir.png" width="20" height="20" id="eye" />
					</p>
					</div>
					<h4 id="conditions">
						<input type="checkbox" name="conditions" value="oui" />Se souvenir de moi !
					</h4>
					<p>
					<input id="envoyer" type="submit" name="submit" value="Connexion"/>
				</p>
			</form>
		</div>
		<div id="page_pass">
			<form action="password_oublier.php" method="post">
				<img id="close" src="images/close.png" width="20" height="20" />
				<img src="images/personne.png" width="80" height="60" />
				
				<p class="rec_pass">Récupération du mot de passe.</p>
				<p>Entrer votre adresse mail et un lien mail vous serait envoyé dans votre 
				boite email. Veuillez cliquer sur ce lien pour mettre à jour votre compte.<br/><br/>
				<input type="email" name="email" placeholder="exemple@gmail.com" required /></p>
				<p><input type="submit" value="Soumettre"/></p>
			</form>
		</div><hr/>
		<div class="mot_pass">
			<p id="pass"><a href="#">Mot de passe oublié ?</a></p>
			<p><a href="inscription.php">Créer un compte ?</a></p>
		</div>
		<?php include("includes/pied.php"); ?>

		<script type="text/javascript">
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

		var pass = document.getElementById('pass');
			var page_pass = document.getElementById('page_pass');
			pass.onclick = function(){
				if(page_pass.style.marginTop=="0") {
					page_pass.style.marginTop="-1500px";
				} else {
					page_pass.style.marginTop="0";
					document.getElementById('formule').style.marginLeft="-1500px";
					document.getElementById('video').autoplay=true;
				}
			}
			var close = document.getElementById('close');
			close.onclick = function() {
				page_pass.style.marginTop="-1500px";
				document.getElementById('formule').style.margin="auto";
				document.getElementById('music').autoplay="true";
			} 

			
		</script>
	</body>
</html>