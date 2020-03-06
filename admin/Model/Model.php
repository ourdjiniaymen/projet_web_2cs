<?php

 

 function ConnectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return true;
        }
    catch(PDOException $e)
        {
        //echo "Connection failed: " . $e->getMessage();
        return false;
        }
}
function getListTraducteur()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "SELECT * FROM traducteur ";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    return $stmt; 
     
}
function getListClient()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "SELECT * FROM users ";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    return $stmt; 
     
}
function getListDemande()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "SELECT * FROM demende ";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    return $stmt; 
     
}
function supprimerTraducteur($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE traducteur SET suppr=1 where id=? ";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    home();
    
}
function supprimerClient($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE users SET suppr=1 where id=? ";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    afficherClient();

}
function debloquerTraducteur($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE traducteur SET bloquer=0 WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    home();
}
function debloquerClient($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE users SET bloquer=0 WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    afficherClient();
}
function bloquerTraducteur($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE traducteur SET bloquer=1 WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    home();
}
function bloquerClient($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE users SET bloquer=1 WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    afficherClient();

}
function getDemandeTraucteur($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "SELECT * FROM demende WHERE id_traducteur=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt;
}
function getDemandeClient($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "SELECT * FROM demende WHERE id_client=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt;
}

function getListTraducteurFiltrer(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    if($_POST['filtrer']==1){
        $sql = "SELECT * FROM Traducteur WHERE bloquer=1";
        
    }
    if($_POST['filtrer']==2){
        $sql = "SELECT * FROM Traducteur WHERE bloquer=0";
    }
    if($_POST['filtrer']==3){
        $sql = "SELECT * FROM traducteur WHERE id IN (SELECT id_traducteur FROM demende)";
    }
    if($_POST['filtrer']==4){
        $sql = "SELECT * FROM traducteur WHERE id NOT IN (SELECT id_traducteur FROM demende)";
    }
    
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    return $stmt;
}

function getListClientFiltrer(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    if($_POST['filtrer']==1){
        $sql = "SELECT * FROM users WHERE bloquer=1";
        
    }
    if($_POST['filtrer']==2){
        $sql = "SELECT * FROM users WHERE bloquer=0";
    }
    if($_POST['filtrer']==3){
        $sql = "SELECT * FROM users WHERE id IN (SELECT id_client FROM demende)";
    }
    if($_POST['filtrer']==4){
        $sql = "SELECT * FROM users WHERE id NOT IN (SELECT id_client FROM demende)";
    }
    
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    return $stmt;
}
function modifierTraducteur($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql="UPDATE traducteur SET email=?,password=?,type_traduction=? WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$_POST['email'],$_POST['psw'],$_POST['type'],$id]);
    home();
    

}
function supprimerDoc($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "DELETE FROM document where id=? ";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    afficherDoc();

}
function getListDoc()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "SELECT * FROM document ";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    return $stmt; 
     
}

function getListDocFiltrer(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    if($_POST['filtrer']==1){//traité
        $sql = "SELECT * FROM document WHERE id_demande in(SELECT id FROM demende WHERE etat=1)";
        
    }
    if($_POST['filtrer']==2){
        $sql = "SELECT * FROM document WHERE id_demande in(SELECT id FROM demende WHERE etat=0)";
    }
   
    
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    return $stmt;
}
function getStat(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    if($_POST['choix']==1){//traité
        $sql = "SELECT COUNT(*) as nb FROM demende WHERE date BETWEEN ? AND ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$_POST['date1'],$_POST['date2']]);
    }
    if($_POST['choix']==2){
        $sql = "SELECT COUNT(*) as nb FROM demende WHERE id_traducteur=? AND date BETWEEN ? AND ? ";
        $stmt= $conn->prepare($sql);
        $stmt->execute([(int)$_POST['id'],$_POST['date1'],$_POST['date2']]);
    }
    if($_POST['choix']==3){
        $sql = "SELECT COUNT(*) as nb FROM demende WHERE id_client=? AND date BETWEEN ? AND ? ";
        $stmt= $conn->prepare($sql);
        $stmt->execute([(int)$_POST['id'],$_POST['date1'],$_POST['date2']]);
    }
    return $stmt;
    
}
function login(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $stmt = $conn->prepare("select * from `admin` where `user`=:user and `password`=:password");
    $stmt->bindValue('user', $_POST['user'], PDO::PARAM_STR);
    $stmt->bindValue('password', $_POST['psw'], PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row   = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count == 1 && !empty($row)) {
        
        home();
            
        
    }else {

            header('location:././index.php?msg=* Invalid username and password !');
    }
    

  }
  function refuser($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE demende SET etat='refuse-par-admin'WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    afficherDemande();

}
function accepter($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE demende SET etat='accepte-par-admin'WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    afficherDemande();

}
