<?php 
    require_once 'connexion_bdd.php';

    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['conf_mail'])&& isset($_POST['mdp']) && isset($_POST['conf_mdp']))
     {
        $prenom= htmlspecialchars($_POST["prenom"]);
        $nom=htmlspecialchars($_POST["nom"]);
        $mail=htmlspecialchars($_POST["mail"]);
        $conf_mail=htmlspecialchars($_POST["conf_mail"]);
        $mdp= htmlspecialchars($_POST["mdp"]);
        $conf_mdp= htmlspecialchars($_POST["conf_mdp"]);

        $check = $bdd->prepare('SELECT nom, prenom, mail, mdp FROM utilisateur WHERE mail = ?');
        $check->execute(array($mail));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0){ 
            if(strlen($nom) <= 100){
                if(strlen($prenom) <= 100){
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                       if($mail == $conf_mail){
                        if($mdp == $conf_mdp){

                            $cost = ['cost' => 12];
                            $mdp = password_hash($mdp, PASSWORD_BCRYPT, $cost);
                            
                            

                            /*
                                Pour ceux qui souhaite mettre en place un système de mot de passe oublié, pensez à mettre le champ token dans votre requête
                                $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password, ip, token) VALUES(:pseudo, :email, :password, :ip, :token)');
                                $insert->execute(array(
                                    'pseudo' => $pseudo,
                                    'email' => $email,
                                    'password' => $password,
                                    'ip' => $ip,
                                    'token' =>  bin2hex(openssl_random_pseudo_bytes(24))
                                ));
                              */
                            
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(nom, prenom, mail, mdp) VALUES(:nom, :prenom, :mail, :mdp)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'mail' => $mail,
                                'mdp' => $mdp
                            ));

                            header('Location:inscription.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                      }else{header('Location: inscription.php?reg_err=email'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }
