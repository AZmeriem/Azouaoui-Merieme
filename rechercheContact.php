<?php
require_once'functions.php';

?>
<!DOCTYPE html>
<html>
 <head> <!-- Entête HTML -->
    <meta charset="utf-8" />
    <title>Recherche par crit&egrave;res</title>
	<link href="contact.css" rel="stylesheet" type="text/css" /> 
 </head>
 <body style="background-color:#D3D3D3;">
   <?php
   if (!empty($_POST['rechercher_critere']))
   {
    $crit_recherche = $_POST['CritRech'];
    $val_recherche  = $_POST['ValRech'] ;
    // --- Protection de l'injection HTML ---
    $crit_recherche = strip_tags($crit_recherche);
    $val_recherche  = strip_tags($val_recherche) ;
    // --- élement du texte du message ---
    switch($crit_recherche)
    {
       case 'nom'    :$egal_contient=" = "; $deb_msg="";$fin_msg="";break;
      case 'telephone1': case 'telephone2' :$egal_contient=" contient ";$deb_msg="\"";$fin_msg="\"";break;
    }
    // --- Recherche ---
    $tab_personnes=Recherche_sur_critere($crit_recherche,$val_recherche);
    if (count($tab_personnes) == 0)
    {
     $TitreMessage="Aucun Contact trouv&eacute;e";
     $TexteMessage="La recherche pour : $crit_recherche".$egal_contient."$val_recherche".WEB_EOL." n'a trouv&eacute; aucune personne ! ";
     affiche_message_erreur($TitreMessage,$TexteMessage);
    }
    else
    {
     // --- Affichage du tableau ---
     ?>
     
     <div  style="height: 40px; background-color:#E6E6FA; width: 100%;  "></div>
     <h2><strong>Affichage Contact Recherch&eacute;</strong></h2>
     <div  style="height: 20px; background-color:#E6E6FA; width: 100%;  "></div>
     
     <?php 
     $linkrech='<a href= "rechercheContact.php"  ><center><button type="submit" class="btn btn-secondary"><strong>Rechercher un autre contact </strong> </button></center></a>'; //Modification
      $linkadd='<a href= "contact.php"  ><center><button type="submit" class="btn btn-primary"><strong>Ajouter nv contact </strong> </button></center></a>'; //Modification
      $linkReturn='<a href= "MenuContact.php"  ><center><button type="submit" class="btn btn-danger"><strong>Retour menu</strong> </button></center></a>'; //Modification
       echo '<br><h2>'.$linkrech.'</h2>';
       echo '<br><h2>'.$linkadd.'</h2>';
       echo '<br><h2>'.$linkReturn.'</h2>';
 ?>
  <div  style="height: 50px; background-color:#DCDCDC; width: 100%;  "></div>
     <?php 
     $titre=" 

";
     affichage_liste_contact($titre,$tab_personnes);
    }
   }
   else
   {
    // --- formulaire de saisie des informations pour la recherche
    ?>
    <br/>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <fieldset>
    <legend style="text-align:center;font-family:cursive;font-size: 30px;color:#4169E1;">Saisissez les crit&egrave;res de recherche :</legend><br/>
    S&eacute;lectionnez le crit&egrave;re de recherche : <br/><br/> 
    <strong>Nom</strong><input type="radio" name="CritRech" value="nom"> 
    <strong>Telephone1 :</strong><input type="radio" name="CritRech" value="telephone1"> 
    <strong>Telephone2 :</strong><input type="radio" name="CritRech" value="telephone2"> <br/><br/>
    <strong>Donner la valeur selon le crit&egrave;re : </strong><input type="text" name="ValRech" size="20" maxlength="20" autofocus/><br/><br/>
    <input type="submit" name="rechercher_critere" value="Rechercher" />
    <input type="reset" value="Annuler" />
    </fieldset>
    </form>
    <?php
   }

   ?>
 </body>
</html>