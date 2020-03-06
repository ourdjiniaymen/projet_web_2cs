<?php
    require('././Model/Model.php');
    
    function home()
    {  
         session_start();
         $data = getArticleActive();
         require('././View/View.php');

    }

    function critere()
    { 
     session_start();
      if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != "") { //user authentifier
        if (ConnectDB()) {
            $lang1=(int)$_POST['tot1'];
            $lang2=(int)$_POST['tot2'];  
            $target_dir = "sources/file/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }else{
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            }
            $_SESSION['file_name']   = basename($target_file);
            $data = getTraducteur($lang1,$lang2);
            require('././View/ShowTraducteur.php');
           
            
        }
       
     }else{
        header('location:././index.php?msg=Your Are Not Logged IN'); // envoi msg d'erreur en url
    
       
     }
    

    }

   function consulter()
   {
      session_start();
      if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != "") { //user authentifier
        if (ConnectDB()) {
          if($_SESSION['sess_type']=="client"){ 
           
            $id= $_GET['id'];
            $data = getDemande($id);
            require('././View/ShowDemande.php');
          }
          if($_SESSION['sess_type']=="traducteur"){ 
           
            $id= $_GET['id'];
            $data = getDemandeTraducteur($id);
            require('././View/profileTraducteur.php');
          }
        }
     }else{
        header('location:././index.php?msg=Your Are Not Logged IN'); // envoi msg d'erreur en url
    
       
     }

   }
   
     
    
    function UpdateUser()
    {
      
       $id= $_GET['id'];
       Update($id);
    }

    
    


    