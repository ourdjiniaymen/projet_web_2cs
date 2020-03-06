<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="././sources/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="././sources/Js.js"></script>


    <title>TP2CS</title>
</head>

<body class="pr-5 pl-5 ">
<script>
$(document).ready(function(){
    $("#label").hide();
    $("#input").hide();
    $("#select1").click(function(){
    $("#label").hide();
    $("#input").hide();
  });
  $("#select2").click(function(){
    $("#label").show();
    $("#input").show();
  });
  $("#select3").click(function(){
    $("#label").show();
    $("#input").show();
  });
});



</script>
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
      <li class="nav-item  mr-3">
        <a class="nav-link" href="?action=home">Gestion des traducteurs </a>
      </li>
      <li class="nav-item  mr-3">
                <a class="nav-link" href="?action=getListClient"> Gestion des clients </a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="?action=getListDoc"> Gestion des documents </a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="?action=getListDemande"> Gestion des demandes </a>
            </li>
            <li class="nav-item  active mr-3">
                <a class="nav-link" href="#">Statistique <span class="sr-only">(current)</span></a>
            </li>
    </ul>
    <span class="navbar-text">
    
    <ul class="navbar-nav mr-auto p-1">
      
    
            <li class="nav-item mr-3">
                <a class="nav-link" href="?action=logout"> Logout</a>
            </li >
           
            
           
    </ul>
   
    </span>
  </div>
</nav>
    
<br><br><br>
    <!--contenu -->
    <div class="col-sm-6">
    
    <form  action="?action=getnbDemande" class="shadow" id="ddt" method="POST">
            <div class="container">
              
              <label for="date1"><b>Date 1 </b></label>
              <input type="date" placeholder="date1" name="date1" required>
              <br>
              <label for="date2"><b>Date 2 </b></label>
              <input type="date" placeholder="date2" name="date2" required>
              <br>
              <label for="choix"><b>Choisir un des trois: </b></label>
              <br>
              <input id="select1" type="radio" name="choix" value="1">Nombre de traduction<br>
              <input id="select2" type="radio" name="choix" value="2">Nombre de traduction faite par un traducteur<br>
              <input id="select3" type="radio" name="choix" value="3">Nombre de traductions faites pour un client
              <br>
             
              <label id="label"for="id"><b>Introduire Id</b></label>
              <input id="input"type="text" placeholder="Id" name="id" >
              <output name="res" for=""></output>

              <br> 
              <center>
                 <div class="clearfix" style="width:50%;float:center">
              
                <button type="submit" class="signupbtn ">Valider</button>
              </div>
              </center>
              
            </div>
          </form>
          
          <?php  
          if($r!=null){echo "resultat est {$r['nb']}";} ?>
          
          <div>
          
            
          </div>
</div>




   <!--contenu-->
        <footer class="mt-2 border-top mb-5">
      
      <center>
          
          <div class="row">
              <div class="col-12 col-md">
               
                <ul class="listf p-1 d-flex mt-3">
                    <li class="   mr-3">
                        <a  href="?index.php"> Gestion des traducteurs</a>
                    </li>
                    <li class=" active mr-3">
                        <a  href="#"> Gestion des clients</a>
                    </li>
                    <li class=" mr-3">
                        <a  href=""> Gestion des documents</a>
                    </li>
                    <li class=" mr-3">
                        <a  href="">Statistiques</a>
                    </li>
                </ul>
                
                
                  <img src="././././assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                  <small class="d-block text-muted">Cpyright &ensp; &copy; 2019-2020 &ensp; Higher School Of Computer Science</small>
              </div>
      </center>


  </footer>
    </div>
   





</body>

</html>

