<?php 
session_start();
include("includes/connect.php");
?>
<?php include("includes/entete_deconnecter.php"); ?>
<?php
$reponse = "";
if(empty($_POST['email'])) 
{
	$reponse = "Veuillez entrer votre adresse email.";
	echo '<script> alert("Veuillez entrer votre adresse email."); </script>';
}
else
{
	$email = htmlentities($_POST['email']);
	$req = "SELECT COUNT(*) AS numrows FROM client WHERE email = '".$email."'";
	$verif = mysqli_query($db, $req) or die("Echec de la vérification");
	$data = mysqli_fetch_array($verif);
	$ligne = $data['numrows'];
	if($ligne != 1) 
	{
		$reponse = "<img src='images/alerte.gif' style='border-radius:10px;' width='120' height='120' /><br/><br/>L'adresse email entrée n'existe pas.Veuillez rééssayer.";
				echo '<script> alert("L\'adresse email entrée n\'existe pas.Veuillez rééssayer."); </script>';
	} 
	else
	{
		$sql = mysqli_query($db, "SELECT * FROM client WHERE email='$email'"); //On recupère les infos du membre si son e-mail est bonne
		$donnees = mysqli_fetch_array($sql);
		$pseudo = $donnees['nom'];
		$pass = $donnees['password'];
		$adresse_entreprise = "tnc_informatique@gmail.com";
		$site_name = "tnc_informatique";
		//Contenu de l'email
		$message = "";
		$message .= 'M/Mme'.$pseudo.', <br>Une demande de mot de passe perdu viens d\'être demandée.<br>';
		$message .= 'Votre compte est actuellement inactif.<br>';
		$message .= 'Vous ne pouvez pas l\'utiliser tant que vous n\'aurez pas visiter le lien suivant:<br>';
		$message .= '<a href="';
		$message .= 'http://www.guisx.com/index.php?guisx=confirm&pseudo='.str_replace(' ','%20',$pseudo);
		$message .= '">ICI</a><br>';
		$message .= 'Veuillez conserver cet email dans vos archives.<br>';
		$message .= 'Voici les informations concernant votre compte:<br><br>';
		$message .= '----------------------------<br>';
		$message .= 'Nom d\'utilisateur: '.$pseudo.'<br>';
		$message .= 'Mot de passe: '.$pass.'<br>';
		$message .= '----------------------------<br><br>';
		$message .= 'Merci de vous être enregistré.<br>';
		$message .= 'Cordialement l\'équipe '.$site_name.'';
		//Entete		
		$entete = "MIME-Version: 1.0\r\n";
		$entete .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$entete .= "From: <$adresse_entreprise>\r\n";
		$entete .= "Reply-To: $adresse_entreprise\r\n";	   
		//Envoi du mail	
		@mail($email,'Rappel de vos identifiants.' , $message, $entete);
		if(@mail($email,'Rappel de vos identifiants.' , $message, $entete)==TRUE)
		{
			//Texte vu sur le site par le nouvel inscrit
			$reponse = 'Votre compte a été modifié.<br> Toutefois, ce site requière l\'activation du compte,<br>
			une clef d\'activation a été envoyée vers l\'adresse email que vous avez fournie.<br>
			Veuillez vérifier votre boîte email pour de plus amples informations.';
		}
		else
		{
			$reponse = "La Récuperation de votre mot de passe a échoué...Veuillez rééssayer plutard.";
		}
	}
}
?>
<div class="password_oublier">
	<p><?php echo $reponse; ?></p><br/>
	<h4><a href="connexion.php" class='retour'> &nbsp; &nbsp; <img src='images/retour.png' width='20' height='25'/> Retour &nbsp; &nbsp;</a></h4>
</div>
<?php include("includes/pied.php"); ?>