<?php 
    session_start();
    require_once 'config.php'; 

    // Récupération des données saisie par l'utilisateur
    if(!empty($_POST['email']) && !empty($_POST['mdp']))
    {
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
    // Récupération des données de la base
        $check = $bdd->prepare('SELECT email, mdp FROM utilisateur WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) // Validation du mail
            {
                
                if(password_verify($mdp, $data['mdp'])) // Validation du mot de passe(mdp)
                {
                    $_SESSION['user'] = $data['email'];
                    header('Location: profil.php');
                    die();
                }else{ header('Location: connexion.php?login_err=password'); die(); }
            }else{ header('Location: connexion.php?login_err=email'); die(); }
        }else{ header('Location: connexion.php?login_err=already'); die(); }
    }
