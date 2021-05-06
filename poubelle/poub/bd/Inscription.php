<?php
  include('bd/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD
  session_start();
   
      // S'il y a une session alors on ne retourne plus sur cette page
      if (isset($_SESSION['id'])){
          header('Location: Inscription.php'); 
          exit;
      }
   
      // Si la variable "$_Post" contient des informations alors on les traitres
      if(!empty($_POST)){
          extract($_POST);
          $valid = true;
   
          // On se place sur le bon formulaire grâce au "name" de la balise "input"
          if (isset($_POST['inscription'])){
              $nom  = htmlentities(trim($nom)); // On récupère le nom
              $prenom = htmlentities(trim($prenom)); // on récupère le prénom
              $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail
              $mdp = trim($mdp); // On récupère le mot de passe 
              $confmdp = trim($confmdp); //  On récupère la confirmation du mot de passe
   
              //  Vérification du nom
              if(empty($nom)){
                  $valid = false;
                  $er_nom = ("Le nom d' utilisateur ne peut pas être vide");
              }       
   
              //  Vérification du prénom
              if(empty($prenom)){
                  $valid = false;
                  $er_prenom = ("Le prenom d' utilisateur ne peut pas être vide");
              }       
   
              // Vérification du mail
              if(empty($mail)){
                  $valid = false;
                  $er_mail = "Le mail ne peut pas être vide";
   
                  // On vérifit que le mail est dans le bon format
              }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
                  $valid = false;
                  $er_mail = "Le mail n'est pas valide";
   
              }else{
                  // On vérifit que le mail est disponible
                  $req_mail = $DB->query("SELECT mail FROM utilisateur WHERE mail = ?",
                      array($mail));
   
                  $req_mail = $req_mail->fetch();
   
                  if ($req_mail['mail'] <> ""){
                      $valid = false;
                      $er_mail = "Ce mail existe déjà";
                  }
              }
   
              // Vérification du mot de passe
              if(empty($mdp)) {
                  $valid = false;
                  $er_mdp = "Le mot de passe ne peut pas être vide";
   
              }elseif($mdp != $confmdp){
                  $valid = false;
                  $er_mdp = "La confirmation du mot de passe ne correspond pas";
              }
   
              // Si toutes les conditions sont remplies alors on fait le traitement
              if($valid){
   
                  $mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
                  $date_creation_compte = date('Y-m-d H:i:s');
   
                  // On insert nos données dans la table utilisateur
                  $DB->insert("INSERT INTO utilisateur (nom, prenom, mail, mdp, date_creation_compte) VALUES 
                      (?, ?, ?, ?, ?)", 
                      array($nom, $prenom, $mail, $mdp, $date_creation_compte));
   
                  header('Location: index.php');
                  exit;
              }
          }
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inscription</title>
	
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
	
    <link href="css/style.css" rel="stylesheet">

	<!-- boxed bg -->
	<link  id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="color/default.css" rel="stylesheet"> 


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<div id="wrapper">
	<!--<form method="post"---->
	
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
					<p class="bold text-left">Lundi - Samedi, de 8am à 8pm </p>
					</div>
					<div class="col-sm-6 col-md-6">
					<p class="bold text-right">Contactez-nous au +33 1 64 79 00 45</p>
					</div>
				</div>
			</div>
		</div>
        <div class="container navigation">
		
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="img/monlogo.jpg" alt="" width="200" height="80" /> 
                </a>
            </div>

           
        </div>
        <!-- /.container -->
    </nav>
	<!--Section: intro -->
    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container" >
				

	
					<div class="col-lg-6">
						<div class="form-wrapper">
							
                            <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Inscription</h3>
									</div>
									<div class="panel-body">
									<form method="POST" action="insertion.php" >
										<div class="row">
											<div id="formulaire" class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Prénom</label>
													<input type="text" name="prenom" id="first_name" class="form-control input-md">
												</div>
											</div>
											<div id="formulaire" class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Nom</label>
													<input type="text" name="nom" id="last_name" class="form-control input-md">
												</div>
											</div>
										</div>

										<div class="row">
											<div id="formulaire"class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="mail" id="email" class="form-control input-md">
												</div>
											</div>
											<div id="formulaire"class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Confirmez votre email</label>
													<input type="email" name="mail" id="email" class="form-control input-md">
												</div>
											</div>
											<div id="formulaire" class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Mot de passe</label>
													<input type="password" name="mdp" id="phone" class="form-control input-md">
												</div>
											</div>
											<div id="formulaire" class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Confirmez votre mot de passe</label>
													<input type="password" name="confmdp" id="phone" class="form-control input-md">
												</div>
											</div>
											
										</div>
										
										<input type="submit" value="Envoyer" class="inscription" name="inscription">
										
										<p class="lead-footer">Vous avez un compte, connectez-vous <a href="connexion.html"><u>ici</u></a></p>
									
									</form>
								</div>
							</div>				
						
						</div>
						</div>
					</div>					
				</div>		
			</div>
		</div>		
    </section>
	
	
	


</body>


</html>



