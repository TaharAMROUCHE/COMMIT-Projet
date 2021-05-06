<?php 
    session_start();
    require_once 'config.php';
    if(!isset($_SESSION['user'])){
        header('Location:connexion.php');
        die();
   
    }
    $email= $_SESSION['user'];
    $check = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mon Espace Santé</title>
	
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="css/nivo-lightbox.css" rel="stylesheet" />
	<link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet">

	
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<link id="t-colors" href="color/default.css" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


<div id="wrapper">
	
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

            <!-- Bare des taches -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#intro"></a></li>
				<li><a href="profil.php">MON AGENDAT</a></li>
				<li><a href="paramètres_du_compte">PARAMETTRES</a></li>
                <li><a href="deconnexion.php">SE DÉCONNECTER</a></li>
				<li><a href="#Pied-de-page"></a></li>
				<li<b><?php echo '<span style="font-weight : bold;">'.($data['prenom']).'</span>'?> <?php echo '<span style="font-weight : bold;">'.($data['nom']).'</span>' ?></b><img src="img/profil.jpg" class="img-profil" alt="" /></li>
			  </ul>
            </div>
            
        </div>
    
    </nav>            
</div> 
        

        
<div class="panelplus" id= "panelplus">
<h1 class="text-center">Modifier Mes Paramètres </h1>
<div class="information block">
    <div class="container">

     <form class="signup" action="modif_paramètres_traitement.php" method="post">
     <input type="hidden" name="userid" value="<?php echo $data['id'] ?>"/>
        <div class="input-container">
        <input class="form-control" type="text" name="nom" autocomplete="off" placeholder="Entrez Un Pseudo" value="<?php echo $data['nom']?>"/>
        </div>
        <div class="input-container">
        <input class="form-control" type="text" name="prenom" autocomplete="off" placeholder="Entrez Un Pseudo" value="<?php echo $data['prenom']?>"/>
        </div>
        
         <div class="input-container">
        <input class="form-control" type="text" name="email" placeholder="Entrez Un Email" value="<?php echo $data['email']?>" />
        </div>
        <div class="input-container">
        <input class="form-control" type="text" disabled name="date_de_naissance" placeholder="Votre date d'inscrition" value="<?php echo $data['date_inscription']?>" />
        </div>
        
        <input class="btn btn-success btn-block" name ="signup" type="submit" value="Envoyer" />
    </form>
   
   
    </div>
</div>
</div> 
 </div>
 


        

                                
        <!-- Modal 
        <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer mon mot de passe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                            <div class="modal-body">
                                <form action="layouts/change_password.php" method="POST">
                                    <label for='current_password'>Mot de passe actuel</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control" required/>
                                    <br />
                                    <label for='new_password'>Nouveau mot de passe</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control" required/>
                                    <br />
                                    <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                                    <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required/>
                                    <br />
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Changer mon avatar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form action="layouts/change_avatar.php" method="POST" enctype="multipart/form-data">
                                <label for="avatar">Images autorisées : png, jpg, jpeg, gif - max 20Mo</label>
                                <input type="file" name="avatar_file">
                                <br />
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </form>
                        </div>
                        <br />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <style>
    .img-profil{
	width: 35px;
	height: 35px;
    },
    .panelplus{
        top: 200px;
        position: relative;
    }
    
</style>
</html>
