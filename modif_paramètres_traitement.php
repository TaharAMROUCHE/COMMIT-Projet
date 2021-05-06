<?php
       session_start();
       require_once 'config.php'; 
      
     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         
              //récupération des variables
             
              
              $nom = $_POST['nom'];
              $prenom = $_POST['prenom'];
       
              $id = $_POST['userid'];
              $email = $_POST['email'];
       

                 $stmt = $bdd->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, email = ? WHERE id = $id");
                 $stmt->execute(array($nom, $prenom, $email));
                 header('Location: paramètres_du_compte.php');
                
            }
    else{
           header('Location: profil.php');
           exit();
    
    }
    
    ?>