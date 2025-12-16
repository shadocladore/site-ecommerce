<?php $reponse = $_GET['erreur']; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Traitement de données</title>
		<meta http-equiv="refresh" content="3; URL=../connexion.php?reponse=<?php echo $reponse; ?>">
		<style type="text/css">
			body { width: auto; background: hsl(240, 100%, 13%); padding: 5%;
			 font-family: Century Gothic; }
			div#chargement { width: 60%; margin: auto; margin-top: 14%; text-align: center; }
			div#chargement span { color: white; font-size: 1.8em; font-weight: normal; }
		</style>
	</head>
	<body>
		<div id="chargement">
			<span>Le traitement de vos donées est en cours<br/>Veuillez patienter...</span><br/>
			<img src="adept_notifier_ok.png"><br />
			<img src="loading6.gif" >
		</div>
	</body>
</html>
	
