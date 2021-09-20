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



try{
//SE CONNECTER
$db=connexionDB();

 if(isset($_GET['idg'])){
    

  $idg=$_GET['idg'];
    
    $sql=$db->prepare('');
    
    $sql->execute(array('idg'  =>$idg));
    
    echo '<h2 class="text-success"><strong><center>Supression effectue</strong></center></h2>';
    
}


 $stmt = $db->prepare('SELECT *FROM groups');
 $stmt->execute();
 ?>
 
 
 <div class="col-md-6">
     </div>
     <div class="col-md-6 text-left">
     </div>
 <?php 
 echo'<table class="table table-striped" style="background-color:#B0C4DE;">';
 echo '<h1 style="text-align:center; color:#000080; font-family:cursive;"><strong>Liste des Groupes</strong></h1>';
 echo'<div style="height: 30px; background-color:#E6E6FA; width: 100%;  "><tr style="color:white; background-color:#000080; font-family:cursive; "><td >Icon</td><td >Nom du groupe</td><td >Contacts</td><td >Actions</td></tr>';
 
 $linkadd='<a href= "group.php"  ><center><button type="submit" class="btn btn-secondary"><strong>Ajouter un nouveau groupe </strong> </button></center></a>'; //Modification
 $linkrech='<a href= "rechercheGroup.php"  ><center><button type="submit" class="btn btn-primary"><strong>Rechercher group </strong> </button></center></a>'; //Modification
 $linkmenu='<a href= "MenuContact.php"  ><center><button type="submit" class="btn btn-danger"><strong>Retour menu </strong> </button></center></a>'; //Modification
 
 echo '<br><h2>'.$linkadd.'</h2>';

 echo '<br><h2>'.$linkrech.'</h2>';
 echo '<br><h2>'.$linkmenu.'</h2>';
 while($data=$stmt->fetch()){
     
     $linkDel='<a href= "deleteGroup.php?idg='.$data['idg'].'"  ><button type="submit" class="btn btn-danger">Supprimer</button></a>'; //SUPPRESSION
     $linkuprech='<a href= "rechercheContact.php?idg='.$data['idg'].'"  ><button type="submit" class="btn btn-secondary">Rechercher  </button></a>'; //Modification
     $linkcontact='<a href= "afficherContact.php?idg='.$data['idg'].'"  ><button type="submit" class="btn btn-secondary">Afficher contact  </button></a>'; //Modification
     
     
     echo'<tr><td><img  width="50" height="50" ; src="'  . $data['icon'] . '"></td><td>'.$data['nomg'].'</td><td>'. $linkcontact .  '</td><td>'. $linkDel .  '</td></tr>';
 }
 echo'<table>';


}catch(PDOExecption $ex) {
    echo '<h2 class="text-success"><strong><center>Erreur d ajout</strong></center></h2>';
}
?>