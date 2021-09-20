<html>
<head>
<meta charset="utf-8">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="">
<head> <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="background-color:#E6E6FA;">

<?php 

require_once 'functions.php';



try{
//SE CONNECTER
$db=connexionDB();

 if(isset($_GET['id'])){
    

  $id=$_GET['id'];


    
    $sql=$db->prepare('DELETE FROM contact WHERE id=:id');
    
    $sql->execute(array('id'  =>$id));
    
    echo '<h2 class="text-success"><strong><center></strong></center></h2>';
    
}


 $stmt = $db->prepare('SELECT *FROM contact');
 $stmt->execute();?>
 <div class="col-md-6">
     </div>
     <div class="col-md-6 text-left">
     </div>
 <?php 
 
 echo'<table class="table table-striped" style="background-color:#B0C4DE;">';
 echo '<h1 style="text-align:center; color:#000080; font-family:cursive;"><strong>Liste Contact</strong></h1>';
 echo'<div style="height: 30px; background-color:#E6E6FA; width: 100%;  "><tr style="color:white; background-color:#000080; font-family:cursive; "><td >Photo</td><td >Nom</td><td>Prenom</td><td>Tel 1</td><td>Tel 2</td>
  <td>Adresse</td><td>Email personnel</td><td>Email professionnel</td><td>Genre</td><td >Actions</td></tr>';
 
 $linkrech='<a href= "rechercheContact.php"  ><center><button type="submit" class="btn btn-secondary"><strong>Rechercher  contact </strong> </button></center></a>'; //Modification
 $linkadd='<a href= "contact.php"  ><center><button type="submit" class="btn btn-primary"><strong>Ajouter nv contact </strong> </button></center></a>'; //Modification
 $linkReturn='<a href= "MenuContact.php"  ><center><button type="submit" class="btn btn-danger"><strong>Retour menu</strong> </button></center></a>'; //Modification
 
 echo '<br><h2>'.$linkrech.'</h2>';
 
 echo '<br><h2>'.$linkadd.'</h2>';
 echo '<br><h2>'.$linkReturn.'</h2>';
 while($data=$stmt->fetch()){
     
     $linkDel='<a href= "gestionContact.php?id='.$data['id'].'"  ><button type="submit" class="btn btn-danger">Supprimer</button></a>'; 
     $linkupdate='<a href= "updateContact.php?id='.$data['id'].'"  ><button type="submit" class="btn btn-secondary">Modifier  </button></a>'; 
     $linkuprech='<a href= "rechercheContact.php?id='.$data['id'].'"  ><button type="submit" class="btn btn-secondary">Rchercher  </button></a>'; 
     
     
     echo'<tr><td><img style="	" width="50" height="50" ; src="'  . $data['photo'] . '"></td><td>'.$data['nom'].'</td><td>'.$data['prenom'].'</td><td>'.$data['telephone1'].
     '</td><td>'.$data['telephone2']. '</td><td>'.$data['adresse'].'</td><td>'.$data['emailPersonnel'].
     '</td><td>'.$data['emailProfessionnel'].'</td><td>'.$data['genre'].'</td><td>'. $linkDel . '<br>' . $linkupdate . '</td></tr>';
}
 echo'<table>';

 echo'</div>';
}catch(PDOExecption $ex) {
    echo '<h2 class="text-success"><strong><center>Erreur d ajout</strong></center></h2>';
}
?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>



</body>
</html>