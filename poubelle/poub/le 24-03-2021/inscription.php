<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NoS1gnal">
    <meta name="author" content="">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->

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
	Section: intro -->
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
									<?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

						case 'email_conf':
							?>
								<div class="alert alert-danger">
									<strong>Erreur</strong> email différent
								</div>
							<?php
							break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'nom_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> nom trop long
                            </div>
                        <?php 
						break;

						case 'prenom_length':
							?>
								<div class="alert alert-danger">
									<strong>Erreur</strong> prenom trop long
								</div>
							<?php 
							break;
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
									<form action="inscription_traitement.php" method="post">
										<div class="row">
											<div id="formulaire" class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Prénom</label>
													<input type="text" name="prenom" id="first_name" class="form-control input-md" placeholder="Prenom" required="required">
												</div>
											</div>
											<div id="formulaire" class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Nom</label>
													<input type="text" name="nom" id="last_name" class="form-control input-md" placeholder="nom" required="required">
												</div>
											</div>
										</div>

										<div class="row">
											<div id="formulaire"class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="email" id="email" class="form-control input-md" placeholder="Email" required="required">
												</div>
											</div>
											<div id="formulaire"class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Confirmez votre email</label>
													<input type="email" name="conf_email" id="email" class="form-control input-md" placeholder="Re-tapez Email" required="required">
												</div>
											</div>
											<div id="formulaire" class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Mot de passe</label>
													<input type="password" name="mdp" id="phone" class="form-control input-md" placeholder="Mot de passe" required="required">
												</div>
											</div>
											<div id="formulaire" class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Confirmez votre mot de passe</label>
													<input type="password" name="conf_mdp" id="phone" class="form-control input-md" placeholder="Re-tapez le mot de passe" required="required">
												</div>
											</div>
											
										</div>
										
										<input type="submit" value="Envoyer" class="btn btn-skin btn-block btn-lg" name="inscription">
										
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
	<style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
	
    

</body>

</html>
