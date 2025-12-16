<?php 
require "../includes/connect.php";


if(isset($_POST['submit']))
{	
	$id_client = $_GET['id_client'];
	$date_debut = $_POST['date_debut'];  $date_fin = $_POST['date_fin'];

		$nom_entreprise = " Entreprise Tnc Informatique";
		$adresse = "Douala (Dakar derrière Sorepco)";
		$contact = "653 02 56 00";
		$email = "tnc_informatique@gmail.com";
		$services = "Services de vente de produits électroniques de hautes qualités.";
		$Today = date('j-m-Y');
		$date = date('l, F d Y',strtotime($Today));
		$heure =  date('H:i:s');
		
		require_once('tcpdf/tcpdf.php');  
	    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
	    $pdf->SetCreator(PDF_CREATOR);  
	    $pdf->SetTitle('Rapport Commandes');  
	    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	    $pdf->SetDefaultMonospacedFont('helvetica');  
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
	    $pdf->setPrintHeader(false);  
	    $pdf->setPrintFooter(false);  
	    $pdf->SetAutoPageBreak(TRUE, 10);  
	    $pdf->SetFont('helvetica', '', 11);  
	    $pdf->AddPage();  
	    $content = '';  
	    $content .= '
		
			<table width="100%">
				<tr>
					<th><h3>'.$nom_entreprise.'</h3></th>
					<th align="justify"><h4>'.$services.'</h4></th>
				</tr>
				<tr><td><h4> Adresse : '.$adresse.'</h4></td></tr>
				<tr><td><h4> Email : '.$email.'</h4></td></tr>
				<tr><td><h4> Téléphone : '.$contact.'</h4></td></tr>
			</table>	
			<h3 align="center">Rapport Commandes</h3>
			<h4 align="center">'.$date_debut.' - '.$date_fin.'</h4>
			<h3 align="left">Nom du Client : '.$_GET['nom'].'</h3>
	   
		  <table border="1"  width="100%" cellspacing="3" cellpadding="3">  
			   <tr>  
	           		<th width="38.5%" align="center"><b>Nom de l\'article</b></th>
	                <th align="center" width="20%"><b>Prix</b></th>
					<th align="center" width="17%"><b>Quantité</b></th>
					<th align="center"><b>Sous-total</b></th>  
	           </tr>';
			  
	
	$date = date('d-m-Y');
	$req = "SELECT * FROM commande, produit, client WHERE commande.id_client='".$id_client."' 
	and date_commande >= '".$date_debut."' and date_commande <= '".$date_fin."' 
	and commande.id_produit = produit.id_produit and commande.id_client = client.id_client";
	
	$verif = mysqli_query($db, $req) or die("Echec de l'affichage");
	while($pannier = mysqli_fetch_array($verif))
	{
		$nom_produit = $pannier['nom_produit'];
		$prix = $pannier['prix'];
		$quantite_produit = $pannier['quantite_produit'];
		$montant_total = $pannier['montant_total'];
			   
		$content .=  '
			<tr>  
	           	<th align="center" width="38.5%"><b>'.$nom_produit.'</b></th>
	            <th align="center" width="20%"><b>'.$prix.'</b></th>
				<th align="center" width="17%"><b>'.$quantite_produit.'</b></th>
				<th align="center"><b>'.$montant_total.'</b></th>  
	        </tr>'; 
	}         
	
	$reponse = mysqli_query($db, "SELECT * FROM commande, produit WHERE id_client='".$id_client."'
	and date_commande >= '".$date_debut."' and date_commande <= '".$date_fin."'
	and commande.id_produit = produit.id_produit");
	$prix_total_unitaire = 0;
	while($rows = mysqli_fetch_array($reponse))
	{
		$prix_total_unitaire += $rows['prix'];
	}

	$result = mysqli_query($db, "SELECT * FROM commande, produit WHERE id_client='".$id_client."'
	and date_commande = '".$date."' and commande.id_produit = produit.id_produit");
	$quantite_total = 0;
	while($rows = mysqli_fetch_array($result))
	{
		$quantite_total += $rows['quantite_produit'];
	}

	$result = mysqli_query($db, "SELECT * FROM commande, produit WHERE id_client='".$id_client."'
	and date_commande >= '".$date_debut."' and date_commande <= '".$date_fin."'
	and date_commande >= '".$date_debut."' and date_commande <= '".$date_fin."'
	and date_commande >= '".$date_debut."' and date_commande <= '".$date_fin."'
	and date_commande >= '".$date_debut."' and date_commande <= '".$date_fin."'
	and commande.id_produit = produit.id_produit");
	$total = 0;
	while($rows = mysqli_fetch_array($result))
	{
		$subtotal = $rows['prix'] * $rows['quantite_produit'];
		$total += $subtotal;
	}
		$content .= '
			<tr>
				<th align="center"colspan=2><b>Totaux >>></b></th>
				<th align="center"><b>'.$prix_total_unitaire.'F</b></th>
				<th align="center"><b>'.$quantite_total.'</b></th>
				<th align="center"><b>'.$total.'F</b></th>
			</tr>
		</table><br/><br/><br>';
				
	   $content .= '
		<table border="1" cellspacing="10" cellpadding="3">
			<tr>
				<th align="center"><h4>Signature du Livreur</h4></th>
				<th align="center"><h4>Signature du Client</h4></th>
			</tr>
			<tr>
				<th height="40"></th>
				<th></th>
			</tr>
		</table>';  
	    $pdf->writeHTML($content);  
	    $pdf->Output('commande_de_'.$_GET['nom'].'.pdf', 'I');
	
		exit;
}


?>