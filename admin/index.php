<?php 
session_start();
include("includes/connect.php"); 
?>
<?php 
if(isset($_SESSION['id']))
{
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>TNC INFORMATIQUE</title>
	</head>
	<frameset rows="50,*">
		<frame src="entete.php" name="titre" marginwidth=5  framespacing="0" marginwidth=0 marginheight=0 
		scrolling="no" noresize border=0>
	<frameset cols="170,*">
		<frame src="menu.php" name="menu" marginwidth=0  framespacing="0" marginwidth=0 marginheight=0 
		scrolling="no" border="0" noresize >
		<frame src="statistiques.php" name="corps" framespacing="0" marginwidth=0 marginheight=0 
		scrolling="yes" border="0" noresize>
	</frameset>
<?php 
}
else 
{
	echo header("location: ./../connexion_admin.php");
}
?>		
	