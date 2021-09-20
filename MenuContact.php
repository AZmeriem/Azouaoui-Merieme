<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

?>
<!DOCTYPE html>
<html>
 <head> <!-- Entête HTML -->
    <meta charset="utf-8" />
    <title>Gestion d'une base de donn&eacute;es de personnes</title>
	<link href="contact1.css" rel="stylesheet" type="text/css" /> 
</head>
 <body style="background-color:#F8F8FF;">
 <?php
 //unset ($_SESSION['Afficher_Messages_Champs']);
 $_SESSION['Afficher_Messages_Champs']=false;
 $_SESSION['tab_personnes_saisies']=array();
 ?>
  <fieldset>
  <legend><h2><center>Gestion  de contact</center></h2></legend>
  <div class="menu" style="background-color:#D3D3D3;">
   
    <center><li><a class="menu" href="contact.php"><strong style="font-family:cursive;">Saisie d'une liste de contacts</strong></a></li></center><br>
    
    <center><li><a class="menu" href="gestionContact.php"><strong style="font-family:cursive;">Liste des contacts</strong></a></li></center><br>
    
    <center><li><a class="menu" href="gestionContact.php"><strong style="font-family:cursive;">Supprimer /modifier un contact</strong></a></li> </center><br>
    
    
    <center><li><a class="menu" href="rechercheContact.php"><strong style="font-family:cursive;">Recherche un contact par crit&egrave;re </strong></a></li> <br>
    
    <center><li><a class="menu" href="group.php"><strong style="font-family:cursive;">Cr&egrave;er un group de contact </strong></a></li> <br>
       
     <center><li><a class="menu" href="gestionGroup.php"><strong style="font-family:cursive;">Liste des groupes </strong></a></li> <br>
     
     <center><li><a class="menu" href="rechercheGroup.php"><strong style="font-family:cursive;">Recherche un groupe </strong></a></li> <br>
     
    <br/></center>
    
    
   
   
  </div>
  </fieldset>
  <h1 style="color:#191970;font-style: oblique 90deg; font-family:cursive; "><i>R&eacute;alis&eacute; par: Merieme Azouaoui </h1>
 </body>
</html>
