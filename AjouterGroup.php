<?php 
header('Content-Type: text/html; charset=utf-8');
require_once'FunctionsGroup.php';
require_once'message.php';
require_once'messagesFunctions.php';

session_start();



$nomg = sanitazePost('nomg');
$icon= $_FILES["icon"]["name"];


$erros = [];

// Valider les données


if (empty($nomg)) {
    $erros['nomg'][1] = getValidationMessage('required_field', [
        '1' => $lab['nomg'][getLanguage()]
    ]);
}

if (empty($icon)) {
    $erros['icon'][0] = getValidationMessage('required_field', [
        '1' => $lab['icon'][getLanguage()]
    ]);
}


$erros = null;
if (! empty($erros)) {
    
    
    $_SESSION['validation_form'] = $erros;
    
    header('location: gestionGroup?hello=1.php');
    exit();
   
}


try{
//SE CONNECTER
$db=connexionDB();
//ENREGISTREMENT DES DONNEES

$sql=$db->prepare('INSERT INTO groups (nomg,icon) VALUES (:nomg,:icon)');

$sql->execute(array(
    'nomg'               =>$nomg, 
    'icon'            => $icon  
    ));
$idg=$db->lastInsertId();
$table=$_POST["contactgroup"];
foreach($table as $it ){
    $sql=$db->prepare('INSERT INTO contactgroup (idGroup,idContact) VALUES(:idg,:idc)');
    $sql->execute(array(
        'idg'               =>$idg,
        'idc'            => $it
    ));
}
 echo '<h2 class="text-success"><strong><center>Contact ajoute</strong></center></h2>';
 header('location:gestionGroup.php?statut=1');
}catch(Exception $ex) {
    echo '<h2 class="text-success"><strong><center>Erreur d ajout</strong></center></h2>';
}
?>