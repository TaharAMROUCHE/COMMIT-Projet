<!DOCTYPE html>
<html lang="fr">
<?php
?>
<head>
	<title>Connexion</title>
    <meta charset="utf-8">
   
   
	
    <!- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
	
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

           
        </div>
        <!-- Entete -->
    </nav>
	Section: intro -->
    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container" >
				

	
					<div class="col-lg-6">
						<div class="form-wrapper">
							
                            <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Connexion </h3>
									</div>
									<div class="panel-body">
									<?php 
                 // Gestion des erreur 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?>    <!-- Bloc de connexion-->
									<form role="form" class="lead" action="connexion_traitement.php" method="post">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="email" id="email_co" class="form-control input-md" placeholder="Email" required="required">
													
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												
											</div>
										</div>

										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Mot de passe</label>
													<input type="password" name="mdp" id="mot_de_passe_co" class="form-control input-md" placeholder="Mot de passe" required="required" autocomplete="off">
													
												</div>
											</div>
											
										</div>
										
										<input type="submit" value="Se connecter" class="btn btn-skin btn-block btn-lg">
										
										<p class="lead-footer"><a href="Acceuil.html"><u>Revenir à la page d'accueil</u></a></p>
										<p class="lead-footer">Je n'est pas de compte, <a href="inscription.php"><u>m'inscrire</u></a></p>
									
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
