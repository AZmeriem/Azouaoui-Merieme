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
<?php 
require_once 'FunctionsGroup.php';
 
if(isset($_GET['idg'])){
    
    $db=connexionDB();
    
    $sql=$db->prepare('SELECT *FROM contact WHERE id IN (SELECT idContact FROM contactgroup WHERE idGroup='.$_GET['idg'].')');
    $sql->execute();

    
}
?>
 <div class="col-md-6">
     </div>
     <div class="col-md-6 text-left">
     </div>
 <?php 
 echo'<table class="table table-striped" style="background-color:#B0C4DE;">';
 echo '<h1 style="text-align:center; color:#000080; font-family:cursive;"><strong>Contact de ce groupe</strong></h1>';
 echo'<div style="height: 30px; background-color:#E6E6FA; width: 100%;  "><tr style="color:white; background-color:#000080; font-family:cursive; "><td >Photo</td><td >Nom</td><td>Prenom</td><td>Tel 1</td><td>Tel 2</td>
  <td>Adresse</td><td>Email personnel</td><td>Email professionnel</td><td>Genre</td></tr>';
 
 $linkrech='<a href= "rechercheContact.php"  ><center><button type="submit" class="btn btn-secondary"><strong>Rechercher  contact </strong> </button></center></a>'; //Modification
 $linkadd='<a href= "contact.php"  ><center><button type="submit" class="btn btn-primary"><strong>Ajouter nv contact </strong> </button></center></a>'; //Modification
 $linkReturn='<a href= "MenuContact.php"  ><center><button type="submit" class="btn btn-danger"><strong>Retour menu</strong> </button></center></a>'; //Modification
 
 echo '<br><h2>'.$linkrech.'</h2>';
 
 echo '<br><h2>'.$linkadd.'</h2>';
 echo '<br><h2>'.$linkReturn.'</h2>';
 while($data=$sql->fetch()){
     
     $linkDel='<a href= "gestionContact.php?id='.$data['id'].'"  ><button type="submit" class="btn btn-danger">Supprimer</button></a>'; //SUPPRESSION
     $linkupdate='<a href= "updateContact.php?id='.$data['id'].'"  ><button type="submit" class="btn btn-secondary">Modifier  </button></a>'; //Modification
     $linkuprech='<a href= "rechercheContact.php?id='.$data['id'].'"  ><button type="submit" class="btn btn-secondary">Rchercher  </button></a>'; //Modification
     
     
     echo'<tr><td><img  width="50" height="50" ; src="'  . $data['photo'] . '"></td><td>'.$data['nom'].'</td><td>'.$data['prenom'].'</td><td>'.$data['telephone1'].
     '</td><td>'.$data['telephone2']. '</td><td>'.$data['adresse'].'</td><td>'.$data['emailPersonnel'].
     '</td><td>'.$data['emailProfessionnel'].'</td><td>'.$data['genre'].'</td></tr>';
 }
 echo'<table>';

?>
