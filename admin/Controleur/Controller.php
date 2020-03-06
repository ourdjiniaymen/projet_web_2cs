<?php
    require('././Model/Model.php');
    
    function start(){
     require('././View/login_admin.php');
    }
    function home()
    {  

     $data=getListTraducteur();
     require('././View/gestion_traducteur.php');
    }
    function afficherClient()
    {  
        
         $data=getListClient();
         require('././View/gestion_client.php');

    }
    function afficherDemande()
    {  
        
         $data=getListDemande();
         require('././View/gestion_demande.php');

    }
    function logOut()
    {  
        
         header('location:../../index');

    }
    function afficherDemandeTraucteur($id){
        $data=getDemandeTraucteur($id);
        require('././View/Demande.php');
    }
    function afficherDemandeClient($id){
        $data=getDemandeClient($id);
        require('././View/Demande.php');
    }
    
    function filtrerTraducteur()
    {  
         $data=getListTraducteurFiltrer();
         require('././View/gestion_traducteur.php');

    }
    
    function filtrerClient()
    {  
         $data=getListClientFiltrer();
         require('././View/gestion_client.php');

    }
    
    function filtrerDoc()
    {  
         $data=getListDocFiltrer();
         require('././View/gestion_document.php');

    }
    function afficherDoc()
    {  
        
         $data=getListDoc();
         require('././View/gestion_document.php');

    }
    function statistique(){
     
      require('././View/stat.php');

    }
    function getnbDemande(){
     $data=getStat();
     $r = $data->fetch();
     
     require('././View/stat.php');

   }
   
    

?>    
    


   