<?php
require('controleur/Controller.php');



if (isset($_GET['action'])) {
    if ($_GET['action'] == 'getListClient') {
        afficherClient();
        
    }
    if ($_GET['action'] == 'getListDemande') {
        afficherDemande();
        
    }
    if ($_GET['action'] == 'logout') {
        logOut();
        
    }
    if ($_GET['action'] == 'supprimerTraducteur') {
        supprimerTraducteur($_GET['id']);
        
    }
    if ($_GET['action'] == 'debloquerTraducteur') {
        debloquerTraducteur($_GET['id']);
        
    }
    if ($_GET['action'] == 'bloquerTraducteur') {
        bloquerTraducteur($_GET['id']);
        
    }
    if ($_GET['action'] == 'supprimerClient') {
        supprimerClient($_GET['id']);
        
    }
    if ($_GET['action'] == 'debloquerClient') {
        debloquerClient($_GET['id']);
        
    }
    if ($_GET['action'] == 'bloquerClient') {
        bloquerClient($_GET['id']);
        
    }
    if ($_GET['action'] == 'afficherDemandeTraucteur') {
        afficherDemandeTraucteur($_GET['id']);
        
    }
    if ($_GET['action'] == 'afficherDemandeClient') {
        afficherDemandeClient($_GET['id']);
        
    }
    
    if ($_GET['action'] == 'filtrerTraducteur') {
        filtrerTraducteur();
        
    }
    
    if ($_GET['action'] == 'filtrerClient') {
        filtrerClient();
        
    }
    if ($_GET['action'] == 'modifierTraducteur') {
        modifierTraducteur($_GET['id']);
        
    }
    if ($_GET['action'] == 'getListDoc') {
        afficherDoc();
        
    }
    if ($_GET['action'] == 'supprimerDoc') {
        supprimerDoc($_GET['id']);
        
    }
    
    if ($_GET['action'] == 'filtrerDoc') {
        filtrerDoc();
        
    }
    if ($_GET['action'] == 'afficherStat') {
        statistique();
        
    }
    if ($_GET['action'] == 'getnbDemande') {
        getnbDemande();
        
    }
    if ($_GET['action'] == 'login') {
        login();
        
    }
    if ($_GET['action'] == 'home') {
        home();
        
    }
    if ($_GET['action'] == 'accepter'){
        accepter($_GET['demande_id']);
     }
     if ($_GET['action'] == 'refuser'){
        refuser($_GET['demande_id']);
     }
}    
else {

    start();
}
    

