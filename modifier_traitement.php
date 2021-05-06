<?php
       session_start();
       require_once 'config.php'; 
      
     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         
              //recupération variables
             
              
              $nom = $_POST['nom'];
              $prenom = $_POST['prenom'];
       
              $id = $_POST['userid'];
              $date_de_naissance = $_POST['date_de_naissance'];
              $poids = $_POST['poids'];
              $taille = $_POST['taille'];
              $maladie = $_POST['maladie'];
              $allergie = $_POST['allergie'];
              $medecin = $_POST['medecin'];
              
               // mise a jour des variables
                 $stmt = $bdd->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, poids = ?, taille = ?, date_de_naissance = ?, maladie = ?, allergie = ?, medecin = ? WHERE id = $id");
                 $stmt->execute(array($nom, $prenom, $poids, $taille, $date_de_naissance, $maladie, $allergie, $medecin));
                 header('Location: profil.php');
               
            }
    else{
           header('Location: profil.php');
           exit();
    
    }
    
    ?>