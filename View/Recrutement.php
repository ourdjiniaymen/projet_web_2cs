
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../sources/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../sources/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    


    <title>TP2CS</title>
</head>
<script>
  $(document).ready(function(){
    $("#oui").click(function(){
    
    $("#label").show();

  });
  $("#non").click(function(){
    
    $("#label").hide();

  });
  });
</script>

<body class="pr-5 pl-5 ">

    <div class="d-flex header pt-3 border-bottom mb-3 pb-2">
        <div class="mr-auto mb-auto mt-auto">
            <a href="#"> <img src="../images/Logo.png" alt="Logo" class="logo " /></a>
        </div>

        <div class="d-flex mb-auto mt-auto">
          <a href="https://www.facebook.com/" target="_blank"> <img src="../images/Facebook.png" alt="Facebook" class="Social-Media mr-4" /></a>
          <a href="https://www.linkedin.com/" target="_blank"> <img src="../images/linkedin.png" alt="linkedin" class="Social-Media mr-4" /></a>
          <a href="https://www.gmail.com/" target="_blank"> <img src="../images/gmail.png" alt="gmail" class="Social-Media mr-4" /></a>
        </div>
    </div>



    

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto p-1">
      <li class="nav-item  mr-3">
        <a class="nav-link" href="../index.php">Accueil </a>
      </li>
      <li class="nav-item mr-3">
                <a class="nav-link" href="type_traduction.php"> Type de traduction offerte</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="list_traducteurs.php"> Traducteurs </a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="blog.php">Blog </a>
            </li>
           
            <li class="nav-item active mr-3">
                <a class="nav-link" href="Recrutement.php">Recrutement <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="a_propos.php">à propos</a>
            </li>
           
    </ul>
   
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
            <img src="../images/traduction1.jpg" alt="traduction1" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="../images/traduction2.jpg" alt="traduction2" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="../images/traduction3.jpg" alt="traduction3" width="1100" height="500">
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
    
        <!--contenu de la page-->
        <h5 class="p-3" style="color: red;">
         <?php
            if (isset($_GET['msg'])){
                echo $_GET['msg'];
            }
        ?>
       </h5>
        <form action="../index.php?action=ajouterTraducteur"  method="POST" class="mt-4 shadow">
            <div class="container">
              <h1>  Création d'un compte traducteur</h1>
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

              <label for="langue"><b>Langues</b></label><br>
              <input id ="checkbox1" type="checkbox" name="langue1" value="Arabe">Arabe 
              <input id ="checkbox2"type="checkbox" name="langue2" value="Francais"> Francais
              <input id ="checkbox3"type="checkbox" name="langue3" value="Anglais"> Anglais
              <input id ="checkbox4"type="checkbox" name="langue4" value="Turque"> Turque
              <input id ="checkbox5"type="checkbox" name="langue5" value="Espagnol"> Espagnol
              <input id ="checkbox6"type="checkbox" name="langue6" value="Chinois"> Chinois<br><br>
              <label for="type"><b>Type de traduction</b></label><br>
              <SELECT name="type" size="1" required>
                  <OPTION>General   
                  <OPTION>scientifique
                  <OPTION>site web
              </SELECT>
              <br><br>
              <label for="assermente"><b>Vous etes un traducteur assermente </b></label>
              <input id="oui" TYPE="radio" name= "assermente" VALUE="oui" CHECKED> Oui </input>
              <input id="non" TYPE="radio" NAME= "assermente" VALUE="non">Non </input>
              
              <br>
              <div id="label">
                <label  for="input">ajouter un fichier pour prouver votre assermentation</label>
                <input type="file" class="form-control-file p-3" > </input>
              </div>
              <label for="exampleFormControlFile1"><b>ajouter votre CV (pdf)</b></label>
              <input type="file" class="form-control-file p-3" id="exampleFormControlFile1" required>
              <br><br>
              <label ><b>Références(optionnel) </b></label>
              
              <input type="file" class="form-control-file p-3" id="reference1" >
              <input type="file" class="form-control-file p-3" id="reference2" >
              <input type="file" class="form-control-file p-3" id="reference3" >
              <p>En créant un compte, vous acceptez nos <a href="#" style="color:dodgerblue">Conditions et confidentialité</a>.</p>
          
              <div class="clearfix">
                <button type="button" class="cancelbtn" id="cancelForm1">Cancel</button>
                <button type="submit" class="signupbtn">s'inscrire</button>
              </div>
            </div>
          </form>
        <footer class="mt-2 border-top mb-5">
      
      <center>
          
          <div class="row">
              <div class="col-12 col-md">
               
                  <ul class="listf p-1 d-flex mt-3">
                    <li class="  mr-3">
                        <a  href="../index.php"> Accueil</a>
                    </li>
                    <li class=" mr-3">
                        <a  href="type_traduction.php">Type de traduction offerte</a>
                    </li>
                    <li class=" mr-3">
                        <a  href="list_traducteurs.php"> Traducteurs</a>
                    </li>
                    <li class=" mr-3">
                        <a  href="blog.php">Blog</a>
                    </li>
                   
                    <li class=" active mr-3">
                        <a  href="recrutement.php">Recrutement</a>
                    </li>
                    <li class=" mr-3">
                        <a  href="a_propos">à propos</a>
                    </li>
        
        
                </ul>
                
                
                  <img src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                  <small class="d-block text-muted">Cpyright &ensp; &copy; 2019-2020 &ensp; Higher School Of Computer Science</small>
              </div>
      </center>


  </footer>
    </div>
   
    
    

   



</body>

</html>

