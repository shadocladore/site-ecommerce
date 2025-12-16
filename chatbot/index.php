<?php 
$db = mysqli_connect("localhost", "root", "", "chatbot");
if(!$db) {
	echo "Echec de connexion à la base de données";
	exit;
}
?>
<?php
if(empty($_POST['questions']))
{
    $questions = "";
}
else
{
    $erreur = '<div class="assistant"><p>Désolé je ne comprends pas votre question.
        <img class="bas" src="../images/bas.png" width="20" height="20" /></p></div>';

    $questions = '<div class="client"><p>'.$_POST["questions"].'<img class="bas" src="../images/bas_compte.png" width="20" height="20" /></p></div>';
	$insert = mysqli_query($db, "INSERT INTO conversations VALUES ('','".$questions."')") 
    or die("Echec de l'insertion de la question"); 

    $result = mysqli_query($db, "SELECT COUNT(*) AS numrows FROM questions WHERE 
    question = '".@$_POST['questions']."'") or die ("Echec de l'exécution du comptage");
	$rows = mysqli_fetch_array($result);
	$ligne = $rows['numrows'];
	{
		if($ligne != 0)  
		{
            $resultat1 = mysqli_query($db, "SELECT * FROM questions, reponses where 
            questions.question = '".$_POST['questions']."' and questions.reponse_id = reponses.id")
            or die("Echec de l'exécution de la selection de la reponse comprise");
            $conversation = mysqli_fetch_array($resultat1);

			$dialogue1 = '<div class="assistant"><p>'.$conversation["reponse_message"].'
                     <img class="bas" src="../images/bas.png" width="20" height="20" /></p></div>';
            $insert1 = mysqli_query($db, "INSERT INTO conversations VALUES ('','".$dialogue."')") 
                     or die("Echec de l'insertion du msg compris"); 
        }
        else 
        {
		    $insert2 = mysqli_query($db, "INSERT INTO conversations VALUES ('','".$erreur."')") 
            or die("Echec de l'insertion du msg non compris");  
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
                <?php
                    $resultat = mysqli_query($db, "SELECT * FROM conversations")
                    or die("Echec de l'affichage");
                    while($conversation = mysqli_fetch_array($resultat)) {
                        echo $conversation['dialogue'];
                    }
                ?>
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
