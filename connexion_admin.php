<?php
session_start();
include('includes/connect.php');
?>
<?php
$erreur = "";
if(empty($_POST['nom']) or empty($_POST['password'])) 
{
	$erreur = "Veuillez entrer votre nom et mot de passe pour acceder à votre compte.";
}
else
{	
	$req = "SELECT * FROM admin WHERE nom = '".$_POST['nom']."'";
	$verif = mysqli_query($db, $req) or die("Echec de la vérification");
	$data = mysqli_fetch_array($verif);
	if($_POST['password'] == $data['password']) {
		$_SESSION['id'] = $data['id'];
		$_SESSION['nom'] = $data['nom'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['photo'] = $data['photo'];
		header("location: admin/index.php");
	} 
	else 
	{
		$erreur = "Le nom ou le mot de passe entré est incorrect";
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
			<form action="connexion_admin.php" method="post" id="form_contact" enctype="multipart/form-data">
				<div class="bloc_inscription">
					<div class="bloc-erreur" id="bloc_erreur">
    					<p class="erreur"><?php echo @$erreur; ?><img src="images/bas.png" width="30" height="20" /></p>
					</div>
					<p><label>Nom de l'admin<i> * </i></label><input maxlength="30" type="text" name="nom"  required /></p>
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
			<form action="verif_pass.php" method="post">
				<img id="close" src="images/close.png" width="20" height="20" />
				<img src="images/personne.png" width="80" height="60" />
				
				<p>Veuillez répondre aux questions suivantes :</p>
				<p>Quel est votre date de naissance ? <br/><input type="text" name="date_naissance" placeholder="03/05/2002" required /></p>
				<p>Quelle est votre passion? <br/><input type="text" name="passion" required /></p>
				<p><input type="submit" value="Valider"/></p>
			</form>
		</div><hr/>
		<div class="mot_pass">
			<p id="pass"><a href="#">Mot de passe oublié ?</a></p>
			<p><a href="inscription.php">Créer un compte ?</a></p>
		</div>
		<?php include("includes/pied.php"); ?>

		<script type="text/javascript">
			var pass = document.getElementById('pass');
			var page_pass = document.getElementById('page_pass');
			pass.onclick = function(){
				if(page_pass.style.marginTop=="0") {
					page_pass.style.marginTop="-1500px";
				} else {
					page_pass.style.marginTop="0";
					page_pass.style.opacity="1";
					document.getElementById('formule').style.marginLeft="-1500px";
				}
			}
			var close = document.getElementById('close');
			close.onclick = function(){
				page_pass.style.marginTop="-1500px";
				document.getElementById('formule').style.margin="auto";
			} 
		</script>
	</body>
</html>
