<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="././sources/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="././sources/Js.js"></script>


    <title>TP2CS</title>
</head>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable2");
  switching = true;
  dir = "asc";
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
         shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
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
      <li class="nav-item  mr-3">
        <a class="nav-link" href="?action=home">Gestion des traducteurs </a>
      </li>
      <li class="nav-item  mr-3">
                <a class="nav-link" href="?action=getListClient"> Gestion des clients </a>
            </li>
            <li class="nav-item active mr-3">
                <a class="nav-link" href="#"> Gestion des documents <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="?action=getListDemande"> Gestion des demandes </a>
            </li>
            <li class="nav-item  mr-3">
                <a class="nav-link" href="?action=afficherStat">Statistique </a>
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
    
          <form style="display:block;margin-top:0em;margin-block-end:1em"action="?action=filtrerDoc" class="shadow" id="ddt" method="POST">
            
            <center>
            <button style="width:20%;margin-left:15px;margin-right:15px"type="submit" >Filtrer selon</button>

                <SELECT name="filtrer" size="1" required>
                  <OPTION value="1">Document traité
                  <OPTION value="2">Document non traité
                  
                </SELECT>
              </center>
          </form>
   <br><br>
        <!--contenu de la page-->
        <div class="col-sm-12">
        
        <table id="myTable2"class="table table-striped table-bordered">
            <thead>
            <tr>
                <td style="cursor: pointer;"onclick="sortTable(0)">Nom du document</td>
                <td style="cursor: pointer;"onclick="sortTable(1)">Type</td>
                <td style="cursor: pointer;"onclick="sortTable(2)">Date de soumission</td>
                <td style="cursor: pointer;"onclick="sortTable(3)"> numéro de la demande </td>
                <td style="cursor: pointer;"onclick="sortTable(4)">client</td>
                <td style="cursor: pointer;"onclick="sortTable(5)">traducteur </td>
             </tr>
             </thead>
             <tbody>
             <?php while ($r = $data->fetch()): 
                   $servername = "localhost";
                   $username = "root";
                   $password = "";
                   $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
                   $sql = "SELECT nom FROM traducteur where id=? ";
                   $stmt= $conn->prepare($sql);
                   $stmt->execute([$r['id_traducteur']]);
                   $r1 = $stmt->fetch(PDO::FETCH_ASSOC);
                   $r['id_traducteur']=$r1['nom'];
                   /********************** */
                   $sql = "SELECT nom FROM users where id=? ";
                   $stmt= $conn->prepare($sql);
                   $stmt->execute([$r['id_client']]);
                   $r1 = $stmt->fetch(PDO::FETCH_ASSOC);
                   $r['id_client']=$r1['nom'];
             ?>      
                <tr>
                    <td><?php echo htmlspecialchars($r['nom']) ?></a></td>
                    <td><?php echo htmlspecialchars($r['type']) ?></td>
                    <td><?php echo htmlspecialchars($r['date']) ?></td>
                    <td><?php echo htmlspecialchars($r['id_demande']) ?></td>
                    <td><?php echo htmlspecialchars($r['id_client']) ?></td>
                    <td><?php echo htmlspecialchars($r['id_traducteur']) ?></td>
                    

                    <td><button><a href="?action=supprimerDoc&id=<?=$r['id'] ?>">Supprimer</a></button></td>
                   
                         
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>    
            
           </div> 
        
        <div>   
        <div class="row mt-5 mb-5 ">
        <div class="col-sm-4"></div>
      
        <div class="col-sm-7">
           

        </div>
        
        
     
    </div>
    
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
                
                
                  <small class="d-block text-muted">Cpyright &ensp; &copy; 2019-2020 &ensp; Higher School Of Computer Science</small>
              </div>
      </center>


  </footer>
    </div>
   





</body>

</html>

