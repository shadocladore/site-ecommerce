<html>
	<head>
		<title>Entete</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script type="text/javascript">
		function Horloge() {
			maintenant=new Date();
			heures=maintenant.getHours();
			minutes=maintenant.getMinutes();
			secondes=maintenant.getSeconds();
			if(heures<10) {
				heures="0"+heures;
			}
			if(minutes<10) {
				minutes="0"+minutes;
			}
			if(secondes<10) {
				secondes="0"+secondes;
			}
			document.form1.Pendule.value=heures+":"+minutes+":"+secondes;
			setTimeout("Horloge()", 1000);
		}
	</script>
	</head>
	<body id="body_entete" onLoad="Horloge()">
	<?php
		$Today = date('j/m/Y');
		// $new = date('l, F d Y',strtotime($Today));
	?><form name="form1" id="form1" method="post" action="">
		<p id="titre">
		 TNC INFORMATIQUE - Admininistration &nbsp; 
			&nbsp;<img id="time" src="images/time.png" width="30" height="30" /> <?php echo $Today." 
			&nbsp;&nbsp;<input name='Pendule' type='text'id='Pendule' size='12'>" ?>
		</form>
		<style> 
			#form1 input { font-size: 1.1em; background: rgb(0,25,40); color: white;
			outline: none; border: 0; font-weight: bold;}
		</style>
	</p>
	</body>
</html>


