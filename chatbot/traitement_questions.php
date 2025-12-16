<?php 
$db = mysqli_connect("localhost", "root", "", "chatbot");
if(!$db) {
	echo "Echec de connexion à la base de données";
	exit;
}
?>
<?php
function conversations($question)
if(empty($_POST['questions']))
{
    $reponse_message = "";
    $question = "";
}
else
{
	$result = mysqli_query($db, "SELECT COUNT(*) AS numrows FROM questions WHERE 
    question = '".@$_POST['questions']."'") or die ("Echec de l'exécution de la requête");
	$rows = mysqli_fetch_array($result); 
	@$question = '<div class="client"><p>'.rows["question"].'<img class="bas" src="../images/bas_compte.png" width="20" height="20" /></p></div>';
	$ligne = $rows['numrows'];
	{
		if($ligne != 0)
		{
            $resultat = mysqli_query($db, "SELECT * FROM questions, reponses where 
            questions.question = '".$_POST['questions']."'and questions.reponse_id = reponses.id")
            or die("Echec de l'exécution de la requete");
            $conversation = mysqli_fetch_array($resultat);
			$reponse_message = '<div class="assistant"><p>'.$conversation["reponse_message"].'
                            <img class="bas" src="../images/bas.png" width="20" height="20" /></p></div>';
		}
		else
		{
			$reponse_message = '<div class="assistant"><p>Désolé je ne comprends pas votre question.svp rephrasez votre questions
                     et assurez-vous qu\'elle a un lien avec le site !
                     <img class="bas" src="../images/bas.png" width="20" height="20" /></p></div>';
		} 
	}
   
}
?>
<!Doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="images/logo.png">
		<title>Tnc Informatique</title>
		<script type="text/javascript" src="fichier.js"></script>
		<link rel="stylesheet" type="text/css" href="chatbot.css" />
	</head>
	<body>
        <div id="chat">
		    <div class="titre">
                <img src="../images/assistant.png" width="40" height="40" /> 
                <span>Assistant Virtuel de tnc Infos !</span>
            </div>
            <div class="bloc_conversation">
                <div class="assistant">
                    <p>
                          Salut je suis l'assistant virtuel de tnc infos !
                        <img class="bas" src="../images/bas.png" width="20" height="20" />
                    </p>
                </div>
                <?php echo @$question; ?>
                <?php echo @$reponse_message; ?>

           </div>
            <div class="commentaire">
                <form action="" method="post" id="formulaire">
                    <div class="champ">
                        <textarea name="questions" required placeholder="Taper pour écrire . . ."></textarea><button type="submit"><em>OK</em></button>
                     </div>
                </form>
            </div>
        </div>
    </body>
</html>
