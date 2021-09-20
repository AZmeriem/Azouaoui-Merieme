<html>
<head>
<meta charset="utf-8">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="contact.css">

</head>

<body style="background-color:#E6E6FA;">
<form  enctype="multipart/form-data"  action="AjouterGroup.php" method="post">

 <div class="col-md-6">
     </div>
     <div class="col-md-6 text-left">
     </div>
 <?php 


require_once 'FunctionsGroup.php';

session_start();
$ValidationErros = [];
if ($_SESSION['validation_form']) {
    $ValidationErros = $_SESSION['validation_form'];
}


try{
//SE CONNECTER
$db=connexionDB();

 if(isset($_GET['id'])){
    

  $id=$_GET['id'];


    
    
}


 $stmt = $db->prepare('SELECT *FROM contact');
 $stmt->execute();

 echo'<table class="table table-hover" style="background-color:#B0C4DE;">';
 echo '<h1 style="text-align:center; color:#4169E1; font-family:cursive;"><strong>Cr&egrave;er group</strong></h1>';
 echo'<div style="height: 30px; background-color:#E6E6FA; width: 100%;  ">';echo'<div style="height: 6px; background-color: #4169E1; width: 100%; border: none;">';
 echo'<table>';

 echo'<div class="form-group">
 <center><label><strong>Nom du Groupe:</strong><span>*</span></label>
        <input style="width:30%;" type="text" id="nom" name="nomg" placeholder="Nom"/>
		</div></center>';
 echo'<div class="form-group">
 <center><label><strong>Icon: </strong><span>*</span></label>
        <input style="width:20%;"  type="file" id="subject" name="icon" />
		</div></center>';
 echo'<div class="">
 <center><label><strong>Selectionner les contacts:</strong><span>*</span></label>
		</div>';
  echo'<class="container"><center>';
 $comList = getCommunities();

 printSetOfCheckBox($comList, 'id', 'nom','prenom', getValidationError($ValidationErros,'contact'));
 
echo '<input style="width:40%;"type="submit" name="send" value="Enregistrer"/>';

 
 // clear session
 $_SESSION['validation_form'] =null;

 
}catch(PDOExecption $ex) {
    echo '<h2 class="text-success"><strong><center>Erreur d ajout</strong></center></h2>';
}
?>
</body>
</html>