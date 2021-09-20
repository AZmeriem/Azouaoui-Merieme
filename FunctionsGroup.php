<?php 
require_once'message.php';
define("WEB_EOL","<br/>");
$TYPE_DBB="mysql";
$SERVEUR="localhost";
$BASEDD="dev3";
$TABLECONTACT="groups";
$LOGIN_ADM="root";
$MDP_ADM="";
function connexionDB()
{
    
    global $TYPE_DBB,$SERVEUR,$BASEDD,$TABLECONTACT,$LOGIN_ADM,$MDP_ADM;
    
    try{
        
        $db = new PDO("mysql:host=$SERVEUR;dbname=$BASEDD", $LOGIN_ADM, $MDP_ADM);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
    
    catch(Exception $e){
        echo "Erreur : " . $e->getMessage();
    }
    
    return $db;
}
function randomizeFileName($file)
{
    $number = rand(1111111111, 9999999999);
    
    $dateString = 'photo_' . $number . date('Y_m_d_H_i_s_u') . $file;
    
    return $dateString;
}



function affiche_message_erreur($titre,$message)
{
    ?>
 <fieldset>
 <legend><?php echo $titre ?></legend><br/>
 <b><?php echo $message ?></b><br />
 </fieldset>
 <?php
}
function sanitaze($var)
{
    $r = isset($var) ? htmlspecialchars(trim($var)) : "";
    
    // TODO : on doit faire ...
    
    return $r;
}
function getValidationError($ValidationErros, $key)
{
    $errors = '';
    if (isset($ValidationErros[$key])) {
        
        $errors = arrayToUL($ValidationErros[$key], 'text-danger');
    }
    
    return $errors;
}

/**
 * Permet d'afficher les erreurs
 */
function printValidationError($ValidationErros, $key)
{
    echo getValidationError($ValidationErros, $key);
}
function uploadFile($target_dir, $fileToUpload, $extensions, &$fileName)
{
    $uploadOk = true;
    
    $upperExtensions = [];
    foreach ($extensions as $i) {
        $upperExtensions[] = strtoupper($i);
    }
    
    // On normalise le nom du fichier
    $fileNameRand = randomizeFileName(basename($_FILES[$fileToUpload]["name"]));
    $fileName = $fileNameRand;
    
    // $target_dir le dossier qui va contenir les fichier
    $target_file = $target_dir . $fileNameRand;
    
    // Obtenir l'extension du fichiers
    $imageFileType = strtoupper(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Vérifier que cette extension est acceptable
    if (! in_array($imageFileType, $upperExtensions)) {
        $uploadOk = false;
    }
    
    // TODO: TRES IMPORTANT : Il reste à vérifier si le fichier est une image ou non
    
    // Vérifier la taille du fichier
    if ($_FILES[$fileToUpload]["size"] > 4096) {
        
        $uploadOk = false;
    }
    
    // Si y a pas de problèmes
    if ($uploadOk) {
        
        // Déplacer le fichier vers son emplacement sur le serveur
        $upload = move_uploaded_file($_FILES[$fileToUpload]["tmp_name"], $target_file);
        
        // On retourne le status de l'upload
        return $upload;
    }
    
    return false;
}

/**
 * Neutralise la chaine de caractère envoyée par POST
 */
function sanitazePost($var)
{
    $r = isset($_POST[$var]) ? sanitaze($_POST[$var]) : "";
    
    return $r;
}

/**
 * Neutralise la chaine de caractère envoyée par GET
 */
function sanitazeGet($var)
{
    $r = isset($_GET[$var]) ? sanitaze($_GET[$var]) : "";
    
    return $r;
}

function getLanguage()
{
    if (isset($_SESSION['LANG'])) {
        return $_SESSION['LANG'];
    }
    
    return 'FR';
}

function printCheckBox($key, $lab,$lab1, $msg = '')
{
    $check = '<center><div class="form-check"></center>
    <input  name="contactgroup[]"   class="form-check-input" type="checkbox" value="' . $key . '">
    <label class="form-check-label"> ' . $lab . '&nbsp;' . $lab1 . ' </label>
			</div><br>';
    
    $check .= $msg;
    
    echo $check;
}


/**
 * Affiche un groupe de check box avec possiblité d'affiche d'un message d'erreur de validation
 *
 */
function printSetOfCheckBox($comList, $key, $lab,$lab1, $msg = '')
{
    $check = '';
    foreach ($comList as $it) {
        printCheckBox($it[$key], $it[$lab],$it[$lab1], '');
    }
    
    echo $check;
    echo $msg;
}

function getCommunities()
{
    $result = array();
    
    try {
        
        $bd = connexionDB();
        // Enregistrer les données dans la base de données
        $stmt = $bd->prepare('select *from contact ');
        $stmt->execute();
        while ($data = $stmt->fetch()) {
            $result[] = $data;
        }
    } catch (Exception $ex) {
        // TODO :
    }
    
    return $result;
}

function affichage_liste_contact($titre,$contact)
{
    // --- affichage entÃªte du tableau ---
    reset($contact);
    $une_personne=current($contact);
    $liste_champs=array_keys($une_personne);
    ?>
    <html>
<head>
<meta charset="utf-8">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="">

</head>

<body style="background-color:#E6E6FA;">
</body>
</html>
 <table summary="Tableau de r&eacute;sultat">
  <caption><?php echo $titre;?></caption>
  <thead>
  <tr>
  <!-- entÃªte du tableau -->
  <?php
  
  
  echo'<table class="table table-hover " style="background-color:#B0C4DE;" >';
 
  $nbchamps=0;
  
  echo'<div style="height: 30px; background-color:#E6E6FA; width: 100%;  "><tr style="color:white; background-color:#4169E1; font-family:cursive; "><td >Icon</td><td >Nom du groupe</td><td>Action</td></tr>';
      
      $nbchamps++;
   $nbchamps++;
   $nbchamps++;
   $nbchamps++;
   $nbchamps++;
   $nbchamps++;
   $nbchamps++;
   $nbchamps++;
   $nbchamps++;
  // --- affichage des lignes du tableau ---
  if (count($contact) ==0)
  {
   echo "<td colspan=\"$nbchamps\"><b>Aucune personne &agrave; afficher</b></td>";
  }
  else
  {
      foreach ($contact as $indice => $une_personne)
      {
          
          
    echo "<tr>";
    $linkDel='<a href= "deleteGroup.php"  ><button type="submit" class="btn btn-danger">Supprimer</button></a>'; //SUPPRESSION
    
    extract($une_personne,EXTR_OVERWRITE);
    echo'<tr><td><img  width="50" height="50" src="'  . $icon. '"></td><td>'.$nomg.'</td><td>'.$linkDel.'</td></tr>';
 
    echo "</tr>";
    echo"</table>";
   }
  }
  ?>
 </table>
 <?php
}
function Recherche_sur_critere($crit_recherche,$val_recherche)
{
    global $TYPE_DBB,$SERVEUR,$BASEDD,$TABLECONTACT,$LOGIN_ADM,$MDP_ADM;
    $tab_personnes_retourne=array();
    switch($crit_recherche)
    {
        
        case 'nomg'   :$val_recherche="%".normalisation_Nom($val_recherche)."%";break;
        
    }
    try
    {
        if (!empty($val_recherche) && $val_recherche!="%%")
        {
            // -- contexte pour le message d'erreur ---
            $contexte="Probl&egrave;me de recherche sur la table.";
            // === connexion de la base de donnÃ©es ===
            $bdd = new PDO($TYPE_DBB.":host=".$SERVEUR.";dbname=".$BASEDD,$LOGIN_ADM,$MDP_ADM,
            array(PDO::ATTR_PERSISTENT => true));
            // --- initialisation des Exceptions PDO  ---
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // --- dÃ©finition du codage en UTF8 ---
            $bdd->exec("SET CHARACTER SET utf8");
            // --- exÃ©cution de la requÃªte ---
            $requete_sql='SELECT * FROM '.$TABLECONTACT.' WHERE '.$crit_recherche.' LIKE :val_recherche';
            $RequetePreparee = $bdd->prepare($requete_sql);
            // --- liaison avec les paramÃ¨tres ---
            switch($crit_recherche)
            {
                case 'nomg'    : $RequetePreparee->bindParam(':val_recherche', $val_recherche, PDO::PARAM_STR, 50);break;
                 }
            // --- exÃ©cution de la requÃªte prÃ©parÃ©e ---
            $RequetePreparee->execute();
            // ---retourne un tableau associatif ---
            $RequetePreparee->setFetchMode(PDO::FETCH_ASSOC);
            // --- boucle de traitement de chaque personne ---
            unset($tab_personnes);
            unset($tab_personnes_retourne);
            // --- boucle de traitement de chaque personne ---
            $tab_personnes=$RequetePreparee->fetchAll();
            foreach($tab_personnes as $une_personne)
            {
                extract($une_personne,EXTR_OVERWRITE);
                $tab_personnes_retourne[$nomg]=$une_personne;
            }
            if ($tab_personnes_retourne)
                $tab_personnes_retourne=array_unique($tab_personnes_retourne,SORT_REGULAR);
        }
    }
    catch(Exception $e)
    {
        affiche_message_erreur($contexte,$e->getMessage());
    }
    return $tab_personnes_retourne;
}
function normalisation_nom($chaine)
{
    // tableau des motifs de recherche
    $tab_motif=array('/[^a-zA-Z -]/', '/[ -]+/', '/^-|-$/');
    // tableau des caract&egrave;res de remplacement
    $tab_remplacement=array('', '-', '')     ;
    // chaine de caract&egrave;res sur laquelle s'effectue le remplacement
    $chaine_contexte=supprime_accent($chaine);
    // retour de la fonction
    return strtoupper(preg_replace($tab_motif,$tab_remplacement, $chaine_contexte));
}
function normalisation_numerique($numero)
{
    // tableau des motifs de recherche
    $tab_motif=array('/[^0-9,.]/');
    // tableau des caract&egrave;res de remplacement
    $tab_remplacement=array('')     ;
    // retour de la fonction
    $numero_retour=intval(preg_replace($tab_motif,$tab_remplacement, $numero));
    return $numero_retour;
}
function supprime_accent($chaine)
{
    // tableau des caractÃ¨res accentuÃ©s Ã  remplacer
    $caracteres_a_remplacer     = array( );
    // tableau des caractÃ¨res sans accent de remplacement
    $caracteres_de_remplacement = array( );
    // retour de la fonction
    return str_replace($caracteres_a_remplacer, $caracteres_de_remplacement, $chaine);
}