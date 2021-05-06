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
				<li><a href="profil.php">MON AGENDA</a></li>
				<li><a href="paramètres_du_compte.php">PARAMÈTRES</a></li>
				<li><a href="Acceuil.html">SE DÉCONNECTER</a></li>
				<li<b><?php echo '<span style="font-weight : bold;">'.($data['prenom']).'</span>'?> <?php echo '<span style="font-weight : bold;">'.($data['nom']).'</span>' ?></b><img src="img/profil.jpg" class="img-profil" alt="" /></li>
			  </ul>
            </div>
            
        </div>
        
        
         
    </nav>            
</div> 
        

        
<div class="panelplus" id= "panelplus">
<div class="information block">
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">Mes Informations</div>
            <div class="panel-body">
            <ul class="list-unstyled">
            <li>
            <i class="fa fa-user fa-fw"></i>
            <span> Prénom</span> : <?php echo $data['prenom']?>
             </li>
             <li>
            <i class="fa fa-user fa-fw"></i>
            <span> Nom</span> : <?php echo $data['nom']?>
             </li>
             <li>
            <i class="fa fa-envelope-o fa-fw"></i>
            <span> Email</span> : <?php echo $data['email']?> 
            </li>
            <li>
            <i class="fa fa-calendar fa-fw"></i>
            <span>Date d'enregistrement</span> : <?php echo $data['date_inscription']?> 
            </li>
             </ul>
             <a href="modifier.php" class="btn btn-default">Modifier Mes Information</a>
            </div>
        </div>
    </div>
</div> 
</div> 
 </div>
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
