<?php
require_once 'FunctionsGroup.php';
?>
<!DOCTYPE html>
<html>
 <head> <!-- Entête HTML -->
    <meta charset="utf-8" />
    <title>Recherche par nom</title>
	<link href="contact.css" rel="stylesheet" type="text/css" /> 
 </head>
 <body style="background-color:#D3D3D3;">

   <?php
   // --------------------------------------------------------------
   if (!empty($_POST['rechercher_nom']))
   {
    
     $nom_recherche=$_POST['nomg'];
     $nom_recherche = strip_tags($nom_recherche);
     // --- recherche ---
     $tab_personnes=Recherche_sur_critere('nomg',$nom_recherche);
     if (count($tab_personnes) == 0)
     {
      $Message="La personne ayant le nom ".$nom_recherche." n'a pas &eacute;t&eacute; trouv&eacute;e !";
      affiche_message_erreur("Aucune personne trouv&eacute;e",$Message);
     }
     else
     {
      // --- Affichage du tableau ---
         $linkhead='<h2  ><center><strong>Liste de groupe recherch&eacute; </strong> </center></h2>'; //Modification
         echo '<br><h2>'.$linkhead.'</h2>';
         $linkrech='<a href= "rechercheContact.php"  ><center><button type="submit" class="btn btn-secondary"><strong>Rechercher un autre group </strong> </button></center></a>'; //Modification
         $linkadd='<a href= "group.php"  ><center><button type="submit" class="btn btn-primary"><strong>Ajouter nv group </strong> </button></center></a>'; //Modification
         $linkReturn='<a href= "MenuContact.php"  ><center><button type="submit" class="btn btn-danger"><strong>Retour menu</strong> </button></center></a>'; //Modification
        
         
         echo '<br><h2>'.$linkrech.'</h2>';
         echo '<br><h2>'.$linkadd.'</h2>';
         echo '<br><h2>'.$linkReturn.'</h2>';
      $titre="<h3>Groupe trouv&eacute; pour : Nom  \"".$nom_recherche."\"</h3>";
      affichage_liste_contact($titre,$tab_personnes);
     }
    
   }
   else
   {
    // --- formulaire de saisie des informations pour la recherche
    ?>
    <br/>
    <!-- <form action="MySQL_PDO_liste_personnes_recherche_nom_web.php" method="post"> -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <h2>Formulaire de recherche de groupe</h2>
    <fieldset>
    
    <legend><strong style="color:blue; font-size:20px;">Saisissez le nom du groupe sue vous voulez recherch&eacute;  :</strong></legend><br/>
    <label><strong>Donner le nom du groupe (ex :famille) :</strong></label> <input type="text" name="nomg" size="20" maxlength="20" autofocus/><br/><br/>
    <input type="submit" name="rechercher_nom" value="Rechercher" />
        <input type="reset" value="Effacer le formulaire" />
        </fieldset>
       </form>
       <?php
    //}
   }
 
   ?>
 </body>
</html>
