<?php 
session_start();
include("includes/connect.php");
//include("includes/connect.php"); 

if(isset($_SESSION['id_client'])) {
?>
<?php include("includes/entete_connecter.php"); ?>
<br/><br/>
	<div class="bloc">
      <p class="msg">Veuillez nous<br/> laisser un message !</p>
          <form action="" method="post" id="form_contact">
          <div class="bloc_inscription">
         <p>
            <label>Nom<i> *</i></label><br/>
          <input type="text" name="nom">
        </p>
        <p>
        <label>Email<i> *</i></label><br />
        <input type="email" name="nom">
        </p>
        <p>
        <label>Téléphone<i> *</i></label><br />
        <input type="tel" name="nom">
        </p>
        <p>
        <label>Sujet<i> *</i></label><br />
        <input type="text" name="sujet">
        </p>
        <p>
        <label>Message<i> *</i></label><br />
        <textarea name="message"></textarea>
        </p>
        </div>
        <p>
            <input type="submit" name="submit" value="ENVOYER">
        </p>
      </form>
</div>
	  
<?php include("includes/pied.php"); ?>	
<?php
}
else
{
?>
<?php include("includes/entete_deconnecter.php"); ?>
 <!-- Page contact -->
 <body id="body_contact">
    <br/><br/>
    <div class="bloc">
    <div class="conteneur">
    <div id="fond"></div>
      <p class="msg">Veuillez nous<br/> laisser un message !
      </p>
      <form action="" method="post" id="form_contact">
      <div class="bloc_inscription">
        <p><label>Nom<i> *</i></label><br/><input type="text" name="nom"></p>
        <p><label>Email<i> *</i></label><br /><input type="email" name="email"></p>
        <p> <label>Téléphone<i> *</i></label><br/> <input type="tel" name="tel"></p>
        <p><label>Sujet<i> *</i></label><br /><input type="text" name="sujet"></p>
        <p><label>Message<i> *</i></label><br /> <textarea name="message"></textarea></p>
      </div>
      <p><input type="submit" name="submit" value="Soumettre"/></p>
      </form>
	</div>
</div>
	
<?php include("includes/pied.php"); ?>
<?php
}
?>