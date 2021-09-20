<html>
<head>
<meta charset="utf-8">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="">

</head>

<body >
</body>
</html>
<?php

require_once 'FunctionsGroup.php';



try{
    //SE CONNECTER
    $db=connexionDB();
    //ENREGISTREMENT DES DONNEES
    
    if(isset($_GET['idg'])){
        
       
       
        $sql=$db->prepare('DELETE FROM contactgroup WHERE idGroup=:idg');
        
        $sql->execute(array('idg'  =>$_GET['idg']));
        
        $sql1=$db->prepare('DELETE FROM groups WHERE idg=:idg');
        
        $sql1->execute(array('idg'  =>$_GET['idg']));
         
        header('location:gestionGroup.php?statut=1');
        
        echo '<h2 class="text-success"><strong><center></strong></center></h2>';
      }
    
  } catch(Exception $ex) {
    echo'<h2 class="text-success"><strong><center>Erreur de suppression</strong></center></h2>';
}
