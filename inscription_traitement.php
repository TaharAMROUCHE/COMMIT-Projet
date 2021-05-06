<?php 
    require_once 'config.php';

    // Récupération des données saisies par l'utilisateur

    if(!empty($_POST['prenom']) && !empty($_POST['nom'])&& !empty($_POST['email']) && !empty($_POST['conf_email']) &&  !empty($_POST['mdp']) && !empty($_POST['conf_mdp']))
    {
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $conf_email = htmlspecialchars($_POST['conf_email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $conf_mdp = htmlspecialchars($_POST['conf_mdp']);

    //  Séléctionner des données de la base 

        $check = $bdd->prepare('SELECT prenom, nom, email, mdp FROM utilisateur WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        // Vérification de la conformité des données saisie par l'utilisateur
        if($row == 0){ 
            if(strlen($prenom) <= 100){
               if(strlen($nom) <= 100){
                if(strlen($email) <= 100){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                      if($email == $conf_email){
                        if($mdp == $conf_mdp){

                            $cost = ['cost' => 12];
                            $mdp = password_hash($mdp, PASSWORD_BCRYPT, $cost);
                            
                            $ip = $_SERVER['REMOTE_ADDR'];
                            
                        
                            
                            $insert = $bdd->prepare('INSERT INTO utilisateur(prenom, nom, email, mdp, ip) VALUES (:prenom, :nom, :email, :mdp, :ip)');
                            $insert->execute(array(
                                'prenom' => $prenom,
                                'nom' => $nom,
                                'email' => $email,
                                'mdp' => $mdp,
                                'ip' => $ip
                                
                                
                            ));

                            header('Location:connexion.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                     }else{header('Location: inscription.php?reg_err=email_conf'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
              }else{header('Location: inscription.php?reg_err=nom_length'); die();}
            }else{ header('Location: inscription.php?reg_err=prenom_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }
