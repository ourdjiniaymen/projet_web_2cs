<?php 
$user_id=-1;
$msg = '';
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != "") { // user authentifier

  $user_id= $_SESSION['sess_user_id'];
  $nom = $_SESSION['sess_user_name'];
  $prenom = $_SESSION['sess_prenom'];
  $email = $_SESSION['sess_email'] ;
  $type=$_SESSION['sess_type'] ;
  $msg=  $_SESSION['sess_errormsg'] ;
 
  
} 



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="././sources/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="././sources/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="././sources/Js.js"></script>


    <title>TP2CS</title>
</head>


<body class="pr-5 pl-5 ">

    <div class="d-flex header pt-3 border-bottom mb-3 pb-2">
        <div class="mr-auto mb-auto mt-auto">
            <a href="#"> <img src="././images/Logo.png" alt="Logo" class="logo " /></a>
        </div>

        <div class="d-flex mb-auto mt-auto">
          <a href="https://www.facebook.com/" target="_blank"> <img src="././images/Facebook.png" alt="Facebook" class="Social-Media mr-4" /></a>
          <a href="https://www.linkedin.com/" target="_blank"> <img src="././images/linkedin.png" alt="linkedin" class="Social-Media mr-4" /></a>
          <a href="https://www.gmail.com/" target="_blank"> <img src="././images/gmail.png" alt="gmail" class="Social-Media mr-4" /></a>
        </div>
    </div>



    

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto p-1">
      <li class="nav-item active mr-3">
        <a class="nav-link" href="././index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item mr-3">
                <a class="nav-link" href="View/type_traduction.php"> Type de traduction offerte</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="View/list_traducteurs.php"> Traducteurs</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="View/blog.php">Blog</a>
            </li>
           
            <li class="nav-item mr-3">
                <a class="nav-link" href="View/Recrutement.php">Recrutement</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="View/a_propos.php">à propos</a>
            </li>
           
    </ul>
    <span class="navbar-text">
    <?php 
    if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != ""){ // user authentifier
    ?>
    

    <ul class="navbar-nav mr-auto p-1">
      
            <li class="nav-item mr-3">
                <a class="nav-link" href="#" onclick="document.getElementById('id01').style.display='block'"> Mettre a jour</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="?action=logout"> Logout</a>
            </li >
            <li class="nav-item mr-3">
                <a class="nav-link" href="?action=consulter&id=<?= $_SESSION['sess_user_id'] ?>">Profile(<?= $nom ?>)</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="#" onclick="document.getElementById('id02').style.display='block'"> Signaler probleme</a>
            </li>  
           
    </ul>
    <?php } ?>
    </span>
  </div>
</nav>
    
<center>
   <div id="demo" class="carousel slide mt-5 mb-5  " data-ride="carousel"  data-interval="3000" >

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        
        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="././images/traduction1.jpg" alt="traduction1" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="././images/traduction2.jpg" alt="traduction2" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="././images/traduction3.jpg" alt="traduction3" width="1100" height="500">
          </div>
        </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </center>
    <hr />
    <div class="row mt-5 mb-5 ">
        <div class="col-sm-6">
            <div class="row">
            <?php while ($r = $data->fetch()){ ?>
                <div class="col-sm-4 mt-3">
                    <div class="card article p-3 shadow">
                        <p class="h3">Article <?= $r['id']?></p>
                        <div class="card-body">
                            <h4 class="card-title"><?= $r['auteur']?></h4>
                            <p class="card-text"><?= $r['titre']?></p>
                            <div id="demo<?= $r['id']?>" class="collapse hide mb-4">
                                <?= $r['contenu']?>
                            </div>
                            <button type="button" class="btn myButton btn-block " data-toggle="collapse"
                                data-target="#demo<?= $r['id']?>"><span style="color: white;">lire la suite ...</span></button>

                        </div>
                    </div>
                </div>
            <?php }; ?>
                
            </div>
        </div>
        <div class="col-sm-6">
          <?php 
          if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != "") { 
          }else{
         ?>
           <div class="row ">
             <div class="col-sm-6">
                <button type="button" class="btn myButton btn-block mt-3 " id="login"><span style="color: white;">Login</span></button>
             </div>
             
             <div class="col-sm-6">
                <button type="button" class="btn myButton btn-block mt-3 " id="Registre"><span style="color: white;">Registre</span></button>
             </div>
            </div>
            <?php
          }
          ?>
         
         <h5 class="p-3" style="color: red;">
         
         <?php
        
           if (isset($_GET['msg'])){
             echo $_GET['msg'];
           }
             
          
          ?>
        
        
        
        </h5>
         <form action="?action=login" method="post" id="loginForm" class="mt-4 shadow">
           
          
            <div class="container">
              <label for="uname"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="uname" required>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" required>
              
              <label for="choix"><b>Vous etes </b></label>
              <INPUT TYPE="radio" name= "choix" VALUE="client" CHECKED> Client
              <INPUT TYPE="radio" NAME= "choix" VALUE="traducteur">Traducteur 
           
              <div class="clearfix">
                <button type="button" class="cancelbtn" id="cancelForm2">Cancel</button>
                <button type="submit" class="signupbtn">Login</button>
              </div>
              
            </div>
          
          
          </form>
          <form action="?action=signup"  method="POST" class="mt-4 shadow" id="RegistreForm">
            <div class="container">
              <h1>S'inscrire</h1>
              <p>Veuillez remplir ce formulaire pour créer un compte.</p>
              <hr>
              <label for="nom"><b>Nom </b></label>
              <input type="text" placeholder="Votre Nom" name="nom" required>

              <label for="prenom"><b>Prenom </b></label>
              <input type="text" placeholder="Votre Prenom" name="prenom" required>

              <label for="wilaya"><b>Wilaya </b></label>
              <input type="text" placeholder="Votre Wilaya" name="wilaya" required>
              
              <label for="commune"><b>Commune </b></label>
              <input type="text" placeholder="Votre Commune" name="commune" required>

              <label for="adresse"><b>Adresse </b></label>
              <input type="text" placeholder="Votre Adresse" name="adresse" required>

              <label for="telephone"><b>Telephone </b></label>
              <input type="text" placeholder="Votre Telephone" name="telephone" required>

              <label for="fax"><b>Fax </b></label>
              <input type="text" placeholder="Votre Fax" name="fax" required>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Votre Email" name="email" required>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Votre Password" name="psw" required>
          
              
          
              
          
              <p>En créant un compte, vous acceptez nos <a href="#" style="color:dodgerblue">Conditions et confidentialité</a>.</p>
          
              <div class="clearfix">
                <button type="button" class="cancelbtn" id="cancelForm1">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
              </div>
            </div>
          </form>


          <form action="?action=listtc&user_id=<?= $user_id ?>" class="shadow" id="ddt" method="POST" enctype="multipart/form-data">
            <div class="container">
              <h1>Demande de devis de traduction </h1>
              
              <hr>

              <label for="Nom"><b>Nom </b></label>
              <input type="text" placeholder="Votre Nom" name="nom" required>

              <label for="email"><b>Prenom </b></label>
              <input type="text" placeholder="Votre Prenom" name="prenom" required>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Votre Email" name="email" required>
              
              <label for="numero"><b>Numero de telephone</b></label>
              <input type="text" placeholder="Votre Numero de telephone" name="numero" required>

             
              <label for="adress"><b>Adresse</b></label>
              <input type="text" placeholder="Votre adresse" name="adress" required>
              <label for="tot1"><b> langues d’origine </b></label>
              <SELECT name="tot1" size="1" required>
                  <OPTION value="1">Arabe 
                  <OPTION value="2">Francais
                  <OPTION value="3"> Anglais
                  <OPTION value="4">Turque
                  <OPTION value="5">Espagnol
                  <OPTION value="6">Chinois
              </SELECT>
              <br>
              <label for="tot2"><b>langues sources</b></label>
              <SELECT name="tot2" size="1" required>
                  <OPTION value="1">Arabe 
                  <OPTION value="2">Francais
                  <OPTION value="3"> Anglais
                  <OPTION value="4">Turque
                  <OPTION value="5">Espagnol
                  <OPTION value="6">Chinois
              </SELECT>
              <br>
              <label for="type"><b>Type de traduction</b></label>
              <SELECT name="type" size="1" required>
                  <OPTION>General   
                  <OPTION>scientifique
                  <OPTION>site web
              </SELECT>
              <br>
              <label for="tot3"><b>Vous voulez un traducteur assermente </b></label>
              <INPUT TYPE="radio" name= "tot3" VALUE="oui" CHECKED> Oui 
              <INPUT TYPE="radio" NAME= "tot3" VALUE="non">Non 
              <br>
              <label for="file">Add Your File</label>
              <input type="file" class="form-control-file p-3" id="exampleFormControlFile1" name="file" required>
              <TEXTAREA name="com" class="p-3 mb-3" rows=4 cols=40>Comentaires/ demandes spécifiques</TEXTAREA>
              <div class="clearfix">
              
                <button type="submit" class="signupbtn ">Valider</button>
              </div>
            </div>
           
          </form>
          

        </div>
    </div>



    <footer class="mt-2 border-top mb-5">
      
        <center>
            
            <div class="row">
                <div class="col-12 col-md">
                 
                    <ul class="listf p-1 d-flex mt-3">
                      <li class=" active mr-3">
                          <a  href="././index.php"> Accueil</a>
                      </li>
                      <li class=" mr-3">
                          <a  href="View/type_traduction.php"> Type de traduction offerte</a>
                      </li>
                      <li class=" mr-3">
                          <a  href="View/list_traducteurs.php"> Traducteurs</a>
                      </li>
                      <li class=" mr-3">
                          <a  href="View/blog.php">Blog</a>
                      </li>
                      
                      <li class=" mr-3">
                          <a  href="View/recrutement.php">Recrutement</a>
                      </li>
                      <li class=" mr-3">
                          <a  href="View/a_propos">à propos</a>
                      </li>
          
          
                  </ul>
                  
                  
                    <img src="././././assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                    <small class="d-block text-muted">Cpyright &ensp; &copy; 2019-2020 &ensp; Higher School Of Computer Science</small>
                </div>
        </center>


    </footer>
    </div>
    <?php
    if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != "") {
      ?>
          <div id="id01" class="modal">
  
  <form class="modal-content animate" action="?action=upuser&id=<?= $_SESSION['sess_user_id'] ?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      <label for="nom"><b>Nom</b></label>
      <input type="text" value="<?= $nom ?>" name="nom" required>

      <label for="prenom"><b>Prenom</b></label>
      <input type="text"  value="<?= $prenom ?>" name="prenom" required>
      <label for="email"><b>Email</b></label>
      <input type="text" value="<?= $email ?>" name="email" required>
      <label for="psw"><b>Password</b></label>
      <input type="password"  name="psw" required>
        
      <button type="submit">Save</button>
      
    </div>

    
  </form>
</div>
      <?php
    }
    ?>
    
    <?php
    if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != "") {
      ?>
          <div id="id02" class="modal">
  
  <form class="modal-content animate" action="././index.php?action=signaler&id=<?= $_SESSION['sess_user_id'] ?>&type=<?= $type ?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      <label for="contenu"><b>Signal</b></label><br>
      <TEXTAREA name="contenu" class="p-3 mb-3" rows=4 cols=40>Ecrire ici</TEXTAREA>


      
        
      <button type="submit">Save</button>
      
    </div>

    
  </form>
</div>
      <?php
    }
    ?>




</body>

</html>

