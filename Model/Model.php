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

function getTraducteur($lang1,$lang2)
{
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "SELECT * FROM traducteur WHERE id in(SELECT id_traducteur FROM traduire WHERE   id_langue= ?)AND id in(SELECT id_traducteur FROM traduire WHERE   id_langue= ?)And  asserment=? and type_traduction=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$lang1,$lang2, $_POST['tot3'], $_POST['type']]);
    return $stmt; 
     
}

function login()
    {
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
        if($_POST['choix']=="client"){
            $stmt = $conn->prepare("select * from `users` where `email`=:email and `password`=:password");
            $stmt->bindValue('email', $_POST['uname'], PDO::PARAM_STR);
            $stmt->bindValue('password', $_POST['psw'], PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if($count == 1 && !empty($row)) {
                if($row['suppr']==1){
                    header('location:././index.php?msg=* Vous n\'avez pas un compte !');
                }else{
                if( $row['bloquer']==1){
                    header('location:././index.php?msg=* Vous etes bloque !');

                }else{
                    $_SESSION['sess_user_id']   = $row['id'];
                    $_SESSION['sess_user_name'] = $row['nom'];
                    $_SESSION['sess_prenom'] = $row['prenom'];
                    $_SESSION['sess_email'] = $row['email'];
                    $_SESSION['sess_type'] = "client";
                    $_SESSION['sess_errormsg']="";
                    header('location:././index.php');
                }
            }
            }else {
        
                    header('location:././index.php?msg=* Invalid username and password !');
            }
        }if($_POST['choix']=="traducteur"){
            $stmt = $conn->prepare("select * from `traducteur` where `email`=:email and `password`=:password");
            $stmt->bindValue('email', $_POST['uname'], PDO::PARAM_STR);
            $stmt->bindValue('password', $_POST['psw'], PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
           
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if($count == 1 && !empty($row)) {
                if($row['suppr']==1){
                    header('location:././index.php?msg=* Vous n\'avez pas un compte !');

                }else{
                if($row['bloquer']==1){
                    header('location:././index.php?msg=* Vous etes bloque !');
                }else{
                    $_SESSION['sess_user_id']   = $row['id'];
                    $_SESSION['sess_user_name'] = $row['nom'];
                    $_SESSION['sess_prenom'] = $row['prenom'];
                    $_SESSION['sess_email'] = $row['email'];
                    $_SESSION['sess_type'] = "traducteur";
                    $_SESSION['sess_errormsg']="";
                    $data = getDemandeTraducteur($_SESSION['sess_user_id']);
                    require('././View/profileTraducteur.php');
                }
            }
            }else {
        
                header('location:././index.php?msg=* Invalid username and password !');
            }
        }
       
    } 
      
        
    

    function Signup()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
        /**************** */
        $sql = "SELECT * FROM users WHERE email=? and suppr=1";
        $stmt= $conn->prepare($sql);
        $stmt->execute([ $_POST['email']]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)) {
            header('location:././index.php?msg=* Vous ne pouvez pas créer un compte !');

        }else{

        $sql = "INSERT INTO users ( nom , prenom , wilaya , commune , adresse , telephone , fax , email , password ) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([ $_POST['nom'], $_POST['prenom'],$_POST['wilaya'], $_POST['commune'],$_POST['adresse'],$_POST['telephone'],$_POST['fax'],$_POST['email'],$_POST['psw']]);
        header('location:././index.php');
        }
        
    }
    
    function logout()
    {
        session_start();
        $_SESSION['sess_user_id']   = "";
        $_SESSION['sess_user_name'] = "";
        $_SESSION['sess_prenom'] ="";
        $_SESSION['sess_email'] = "";

       
        if(empty($_SESSION['sess_user_id'])) header("location: ././index.php");
        
    }


    function SaveDemande ($user_id,$traducteur_id,$nom,$prenom,$email,$numero,$adress,$origin,$source,$type,$assermante,$com)
    {   
        
        /**************** */
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
        $sql="SELECT nb_demande FROM users WHERE id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$user_id]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        $sql="UPDATE users SET nb_demande=? WHERE id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$row['nb_demande']+1,$user_id]);
        $sql = "INSERT INTO demende  ( id_client,nom , prenom , e_mail,tel,adresse,langue_ourigine,langue_source,type_traduction,assurmente,commentaire,id_traducteur) VALUES (?,?,?,?,?,?,?,?,?,?,?,?) ";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$user_id, $nom,$prenom,$email,$numero,$adress,$origin,$source,$type,$assermante,$com,$traducteur_id]);
        $id_demande = $conn->lastInsertId();
        $sql="INSERT INTO document (id_demande,nom,type,id_client,id_traducteur,date) VALUES(?,?,?,?,?,?)";
        $stmt= $conn->prepare($sql);
        session_start();

        $stmt->execute([$id_demande,$_SESSION['file_name'],$type,$user_id,$traducteur_id,date("Y-m-d")]);
        /********************* */
       
        header('location:././index.php');
        critere();
    }

    
    function Update($id)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $nom=   $_POST['nom'];
        $prenom=  $_POST['prenom'];
        $email=  $_POST['email'];
        $psw= $_POST['psw'];
        $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
        $sql = "update users set nom=? ,prenom=?, email=?, password=? WHERE id=? ";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$nom,$prenom,$email,$psw,$id ]);
        header('location:././index.php');
    }
    function getDemande($id_client)
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "SELECT * FROM demende where id_client=? ";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id_client]);
    
    return $stmt; 
     
}
function getDemandeTraducteur($id_traducteur)
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "SELECT * FROM demende where id_traducteur=? ";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id_traducteur]);
    return $stmt; 
     
}
    function  ajouterTraducteur()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
           /*********** */
        $sql = "SELECT * FROM traducteur WHERE email=? and suppr=1";
        $stmt= $conn->prepare($sql);
        $stmt->execute([ $_POST['email']]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)) {
            header('location:./View/Recrutement.php?msg=* Vous ne pouvez pas créer un compte !');
        }else{

        $sql = "INSERT INTO traducteur ( nom , prenom , wilaya , commune , adresse , telephone , fax , email ,type_traduction,asserment,password ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([ $_POST['nom'], $_POST['prenom'],$_POST['wilaya'], $_POST['commune'],$_POST['adresse'],$_POST['telephone'],$_POST['fax'],$_POST['email'],$_POST['type'],$_POST['assermente'],$_POST['psw']]);
        
        $id = $conn->lastInsertId();
        if( !empty($_POST['langue1']) ) {
            $sql = "INSERT INTO traduire (id_traducteur,id_langue) VALUES (?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([ $id, 1]);
            
        }
        if( !empty($_POST['langue2']) ) {
            $sql = "INSERT INTO traduire (id_traducteur,id_langue) VALUES (?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([ $id, 2]);
            
        }
        if( !empty($_POST['langue3']) ) {
            $sql = "INSERT INTO traduire (id_traducteur,id_langue) VALUES (?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([ $id, 3]);
            
        }
        if( !empty($_POST['langue4']) ) {
            $sql = "INSERT INTO traduire (id_traducteur,id_langue) VALUES (?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([ $id, 4]);
            
        }
        if( !empty($_POST['langue5']) ) {
            $sql = "INSERT INTO traduire (id_traducteur,id_langue) VALUES (?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([ $id, 5]);
            
        }
        if( !empty($_POST['langue6']) ) {
            $sql = "INSERT INTO traduire (id_traducteur,id_langue) VALUES (?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([ $id, 6]);
            
        }


    

        header('location:././index.php');
}
        
    }
function getArticleActive(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "SELECT * FROM article where etat=? ";
    $stmt= $conn->prepare($sql);
    $stmt->execute([1]);
    return $stmt; 
}      
function terminerDemande($id_traducteur,$demande_id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql="SELECT nb_doc FROM traucteur WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id_traducteur]);
    $row   = $stmt->fetch(PDO::FETCH_ASSOC);
    $sql="UPDATE traducteur SET nb_doc=? WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$row['nb_doc']+1,$id_traducteur]);
    $sql = "UPDATE demende SET etat=1 where id=? ";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$demande_id]);
    header('location:././index.php');

}
function signaler($id,$type){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "INSERT INTO signaler (id_user,type_user,contenu) VALUES (?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id,$type,$_POST['contenu']]);
    header('location:././index.php');


}
function refuser($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE demende SET etat='refuse'WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    consulter();


}
function accepter($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE demende SET etat='accepte'WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    consulter();


}
function setPrix($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE demende SET prix=?WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$_POST['prix'],$id]);
    /*************** */
    $sql = "UPDATE demende SET etat='prix-envoye'WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    consulter();


}
function setNote($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE demende SET note=?WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$_POST['note'],$id]);
    /*************** */
   
    consulter();


}
function refuserPrix($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE demende SET etat='refuse'WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    consulter();
}
function accepterPrix($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE demende SET etat='accepte-par-client'WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id]);
    consulter();


}
function EnvoyerPrix($id_demande,$id_client,$id_traducteur){
    $target_dir = "sources/recu/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }else{
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    }
    /********** */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE demende SET etat='payant' WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id_demande]);
    /**************** */
    $sql = "INSERT INTO document (id_demande,nom,type,id_client,id_traducteur,date) VALUES(?,?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id_demande,basename($target_file),"bon-recu",$id_client,$id_traducteur,date("Y-m-d")]);
    consulter();


}
function terminerTraduction($id_demande,$id_traducteur,$id_client){
    $target_dir = "sources/traduise/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }else{
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    }
    /********** */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "UPDATE demende SET etat='traduise' WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id_demande]);
    /**************** */
    $sql = "INSERT INTO document (id_demande,nom,type,id_client,id_traducteur,date) VALUES(?,?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id_demande,basename($target_file),"fichier-traduise",$id_client,$id_traducteur,date("Y-m-d")]);
    consulter();


}
function signalerTraducteur($id){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
    $sql = "INSERT INTO signaler (id_user,type_user,contenu) VALUES (?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$id,"client","probleme dans la traduction"]);
    consulter();

}