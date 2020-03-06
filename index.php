<?php
require('controleur/Controller.php');



if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listtc') {
        critere();
        
    }
    if ($_GET['action'] == 'login') {
        login();
    }
    if ($_GET['action'] == 'Signaler') {
        Signlier();
    }
    if ($_GET['action'] == 'upuser') {
        UpdateUser();
    }
    if ($_GET['action'] == 'signup'){
        Signup();
    }
    if ($_GET['action'] == 'logout'){
        Logout();
    }
    if ($_GET['action'] == 'choisir'){
        
       SaveDemande ($_GET['user_id'],$_GET['traducteur_id'],$_GET['nom'],$_GET['prenom'],$_GET['email'],$_GET['numero'],$_GET['adress'],$_GET['origine'],$_GET['source'],$_GET['type'],$_GET['assermente'],$_GET['com']);
      
    }
    if ($_GET['action'] == 'consulter'){
        consulter();
    }
    
    if ($_GET['action'] == 'ajouterTraducteur'){
        ajouterTraducteur();
    }
    if ($_GET['action'] == 'terminer'){
        terminerDemande($_GET['traducteur_id'],$_GET['demande_id']);
    }
    if ($_GET['action'] == 'signaler'){
       signaler($_GET['id'],$_GET['type']);
    }
    if ($_GET['action'] == 'accepter'){
        accepter($_GET['demande_id']);
     }
     if ($_GET['action'] == 'refuser'){
        refuser($_GET['demande_id']);
     }
     if ($_GET['action'] == 'setPrix'){
        setPrix($_GET['demande_id']);
     }
     if ($_GET['action'] == 'refuserPrix'){
        refuserPrix($_GET['demande_id']);
     }
     if ($_GET['action'] == 'accepterPrix'){
        accepterPrix($_GET['demande_id']);
     }
     if ($_GET['action'] == 'EnvoyerPrix'){
        EnvoyerPrix($_GET['demande_id'],$_GET['id'],$_GET['id_traducteur']);
     }
     if ($_GET['action'] == 'terminerTraduction'){
        terminerTraduction($_GET['demande_id'],$_GET['id'],$_GET['id_client']);
     }
     if ($_GET['action'] == 'setNote'){
        setNote($_GET['demande_id']);
     }
     if ($_GET['action'] == 'signalerTraducteur'){
        signalerTraducteur($_GET['id']);
     }

}
else {

    home();
}
    

