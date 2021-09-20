<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="contact.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<title>Update Contact</title>
</head>
<body style="background-color:#E6E6FA;">



<?php

require_once 'functions.php';

if(isset($_POST['send'])){
    
    $nom = sanitaze ($_POST["nom"]);
    $prenom = sanitaze($_POST["prenom"]);
    $photo = $_FILES["photo"]["name"];
    $telephone1 = sanitaze($_POST["telephone1"]);
    $telephone2 = sanitaze($_POST["telephone2"]);
    $adresse = sanitaze($_POST["adresse"]);
    $emailPersonnel = sanitaze($_POST["emailPersonnel"]);
    $emailProfessionnel = sanitaze($_POST["emailProfessionnel"]);
    $genre=sanitaze($_POST["genre"]);
    $posteId=sanitaze($_POST["id"]);
    try {
        $db=connexionDB();
        $sql=$db->prepare('UPDATE contact SET nom=:nom,prenom=:prenom,photo=:photo,telephone1=:telephone1,telephone2=:telephone2,adresse=:adresse,
emailPersonnel=:emailPersonnel,emailProfessionnel=:emailProfessionnel,genre=:genre WHERE id='.$posteId);
        
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
        echo'hello';
        
        echo 'Operation effectue';
        
        header('location:gestionContact.php?statut=1');
        exit;
        
    } catch (Exception $e) {
        echo $e->getMessage();
        
        echo 'Operation non effectue';
        
    }
}
$id = sanitaze($_GET['id']);

try{
    //SE CONNECTER
    $db=connexionDB();
    
            
        $sql=$db->prepare('SELECT *FROM contact WHERE id=:id');
        
        $sql->execute(array('id'  =>$id));
     
        if($data = $sql->fetch()){
            
            ?>
            <div class="container register"> </div>
<div class="row" style="position:relative; right:150px; top:90px;">

<h1> Contact</h1>

            <form  enctype="multipart/form-data"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<div class="col-md-9 register-right" style="position:absolute; top:4O%;">

<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="row register-form" ><h2>Modifier Contact</h2>
<div class="col-md-6">
 
<input type="hidden" name="id" value="<?php echo $data['id']?>">

<div class="form-group">
<label>Nom: <span>*</span></label>
<input type="text" id="nom" name="nom" value="<?php echo $data['nom']?>" placeholder="Nom"/>
</div>
<div class="form-group">
<label>prenom: <span>*</span></label><span id="info" class="info"></span>
<input type="text" id="prenom" name="prenom" value="<?php echo $data['prenom']?>" placeholder="Prenom"/>
</div>
<div class="form-group">
<label>Photo: <span>*</span></label>
<input type="file" id="subject" value="<?php echo $data['photo']?>" name="photo" />
</div>
<div class="form-group">
<label>Telephone1:</label>
<input type="number" id="telephone1" name="telephone1" value="<?php echo $data['telephone1']?>" placeholder="Telephone 1"/>
</div>
</div>

<div class="col-md-6">
<div class="form-group">

<label>Telephone2:</label>
<input type="number" id="telephone2" name="telephone2" value="<?php echo $data['telephone2']?>" placeholder="Telephone 2"/>
</div>


<div class="form-group">
<label>Adresse:</label>
<input type="text" id="adresse" name="adresse" value="<?php echo $data['adresse']?>" placeholder="Adresse"/></div>
<div class="form-group">
<label>Email personnel:</label>
<input type="email" id="email" name="emailPersonnel" value="<?php echo $data['emailPersonnel']?>" placeholder="Email personnel"/></div>
<div class="form-group">
<label>Email professionnel:</label>
<input type="email" id="email" name="emailProfessionnel" value="<?php echo $data['emailProfessionnel']?>" placeholder="Email professionnel"/></div>
<div class="form-group">
<div class="maxl">
<label class="radio inline">
<input type="radio" name="genre" value="<?php echo $data['genre']?>" value="male" checked>
<span> Male </span>
</label>
<label class="radio inline">
<input type="radio" name="genre" value="female">
<span>Female </span>
</label>
</div>
</div>

<input type="submit" name="send" value="Modifier"/>
</div>

      </form>
            
            <?php 
        }
        else{
            echo "Le contact n'existe pas";
        }
          
}catch(PDOException $ex) {
echo $ex->getMessage();
}
    
?>
      </div>
      </div>
      <?php 
       
      ?>
  </body>
</html>