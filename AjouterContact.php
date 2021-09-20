<?php 
header('Content-Type: text/html; charset=utf-8');
require_once'functions.php';
require_once'message.php';
require_once'messagesFunctions.php';

session_start();



$nom = sanitazePost('nom');
$prenom = sanitazePost('prenom');
$photo = $_FILES["photo"]["name"];
$telephone1 = sanitazePost('telephone1');
$telephone2 = sanitazePost('telephone2');
$adresse = sanitazePost('adresse');
$emailPersonnel = sanitazePost('emailPersonnel');
$emailProfessionnel = sanitazePost('emailProfessionnel');
$genre=sanitazePost('genre');


$erros = [];

// Valider les données


if (empty($nom)) {
    $erros['nom'][1] = getValidationMessage('required_field', [
        '1' => $lab['nom'][getLanguage()]
    ]);
}
if (empty($prenom)) {
    $erros['prenom'][1] = getValidationMessage('required_field', [
        '1' => $lab['prenom'][getLanguage()]
    ]);
}
if (empty($photo)) {
    $erros['photo'][0] = getValidationMessage('required_field', [
        '1' => $lab['photo'][getLanguage()]
    ]);
}
if (empty($emailPersonnel)) {
    $erros['emailPersonnel'][0] = getValidationMessage('required_field', [
        '1' => $lab['emailPersonnel'][getLanguage()]
    ]);
}
if (empty($emailProfessionnel)) {
    $erros['emailProfessionnel'][1] = getValidationMessage('required_field', [
        '1' => $lab['emailProfessionnel'][getLanguage()]
    ]);
}
if (empty($adresse)) {
    $erros['adresse'][0] = getValidationMessage('required_field', [
        '1' => $lab['adresse'][getLanguage()]
    ]);
}

if (empty($telephone1)) {
    $erros['telephone1'][0] = getValidationMessage('required_field', [
        '1' => $lab['telephone1'][getLanguage()]
    ]);
}
if (empty($telephone2)) {
    $erros['telephone2'][0] = getValidationMessage('required_field', [
        '1' => $lab['telephone2'][getLanguage()]
    ]);
}
if (! isset($_POST['genre']) || empty($_POST['genre'])) {
    $erros['genre'][0] = getValidationMessage('empty_choice', array(
        '1' => 'genre'
    ));
}


if (! empty($erros)) {
    
    // On stocke les erreurs dans la session
    $_SESSION['validation_form'] = $erros;
    
    // Rederiger vers form.php et arreter l'execution
    header('location: contact.php');
    exit();
   
}


try{
//SE CONNECTER
$db=connexionDB();
//ENREGISTREMENT DES DONNEES

$sql=$db->prepare('INSERT INTO contact (nom,prenom,photo,telephone1,telephone2,adresse,emailPersonnel,emailProfessionnel,genre) 
VALUES (:nom,:prenom,:photo,:telephone1,:telephone2,:adresse,:emailPersonnel,:emailProfessionnel,:genre)');

$sql->execute(array(
    'nom'               =>$nom, 
    'prenom'            => $prenom , 
    'photo'             => $photo ,
    'telephone1'        => $telephone1,
    'telephone2'        => $telephone2,
    'adresse'           => $adresse ,
    'emailPersonnel'    => $emailPersonnel,
    'emailProfessionnel'=> $emailProfessionnel,
    'genre'             => $genre));

 echo '<h2 class="text-success"><strong><center>Contact ajoute</strong></center></h2>';
 header('location:gestionContact.php?statut=1');
}catch(Exception $ex) {
    echo '<h2 class="text-success"><strong><center>Erreur d ajout</strong></center></h2>';
}
?>