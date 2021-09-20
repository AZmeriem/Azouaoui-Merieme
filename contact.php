<?php
require_once'functions.php';
require_once'message.php';
require_once'messagesFunctions.php';

session_start();
$ValidationErros = [];
if ($_SESSION['validation_form']) {
    $ValidationErros = $_SESSION['validation_form'];
}


?>
<html>
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="contact.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <script type="text/javascript" src="contact.js"></script>
  </head>
  <body>
  
  <div class="container register">
                <div class="row">
				      
                        <h1> Contact</h1>
						<div class="col-md-3 register-left">
                        
                          </div>
                          
 
      <form  enctype="multipart/form-data"  action="AjouterContact.php" method="post">
        
		<div class="col-md-9 register-right">
                        
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
        <div class="row register-form"><h2>Formulaire Contact</h2>
         <div class="col-md-6">
		 
         <div class="form-group">
        <label><?php echo $lab['nom'][getLanguage()]?>:<span>*</span></label> 
        <input type="text" id="nom" name="nom" placeholder="Nom"/>
        <?php 
        if(isset($ValidationErros['nom']) ){
            
            echo arrayToUL($ValidationErros['nom'],'text-danger');
            }
        ?>
		</div>
		<div class="form-group">
        <label><?php echo $lab['prenom'][getLanguage()]?>: <span>*</span></label><span id="info" class="info"></span>
        <input type="text" id="prenom" name="prenom" placeholder="Prenom"/>
        <?php 
        if(isset($ValidationErros['prenom'])){
            echo arrayToUL($ValidationErros['prenom'],'text-danger');
        }?>
		</div>
		<div class="form-group">
        <label><?php echo $lab['photo'][getLanguage()]?>: <span>*</span></label>
        <input type="file" id="subject" name="photo" />
        <?php 
        if(isset($ValidationErros['photo'])){
            echo arrayToUL($ValidationErros['photo'],'text-danger');
        }?>
		</div>
		<div class="form-group">
        <label><?php echo $lab['telephone1'][getLanguage()]?>:</label>
        <input type="text" id="telephone1" name="telephone1" placeholder="Telephone 1"/>
		</div>
		 <?php 
        if(isset($ValidationErros['telephone1'])){
            echo arrayToUL($ValidationErros['telephone1'],'text-danger');
        }?>
         
		</div>
		
		<div class="col-md-6">
		<div class="form-group">
		
        <label><?php echo $lab['telephone2'][getLanguage()]?>:</label>
        <input type="text" id="telephone2" name="telephone2" placeholder="Telephone 2"/>
        <?php 
        if(isset($ValidationErros['telephone2'])){
            echo arrayToUL($ValidationErros['telephone2'],'text-danger');
        }?>
         
		</div>
	
         
		 <div class="form-group">
        <label><?php echo $lab['adresse'][getLanguage()]?>:</label>
        <input type="text" id="adresse" name="adresse" placeholder="Adresse"/>
        <?php 
        if(isset($ValidationErros['adresse'])){
            echo arrayToUL($ValidationErros['adresse'],'text-danger');
        }?>
        </div>
        
		<div class="form-group">
        <label><?php echo $lab['emailPersonnel'][getLanguage()]?>:</label>
        <input type="email" id="email" name="emailPersonnel" placeholder="Email personnel"/>
        <?php 
        if(isset($ValidationErros['emailPersonnel'])){
            echo arrayToUL($ValidationErros['emailPersonnel'],'text-danger');
        }?>
        </div>
        
		<div class="form-group">
        <label><?php echo $lab['emailProfessionnel'][getLanguage()]?>:</label>
        <input type="email" id="email" name="emailProfessionnel" placeholder="Email professionnel"/>
          <?php 
        if(isset($ValidationErros['emailProfessionnel'])){
            echo arrayToUL($ValidationErros['emailProfessionnel'],'text-danger');
        }?>
        </div>
        
		<div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="genre" value="male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="genre" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
          
        <input type="submit" name="send" value="Enregistrer"/>
		</div>
      <div id="statusMessage"> 
            <?php if (! empty($db_msg)) { ?>
              <p class='<?php echo $type_db_msg; ?>Message'><?php echo $db_msg; ?></p>
            <?php } ?>
            <?php if (! empty($mail_msg)) { ?>
              <p class='<?php echo $type_mail_msg; ?>Message'><?php echo $mail_msg; ?></p>
            <?php } ?>
            </div>
      </form>
      </div>
  </body>
</html>