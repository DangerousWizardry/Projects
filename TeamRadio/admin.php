<?php
session_start();
if (isset($_POST['formconnect'])) {
	if ($_POST['user'] == "TeamRadio" && $_POST['pass'] == "azertypass") {
		$_SESSION['user']="TeamRadio";
		$_SESSION['admin']=1;
		header("Location:admin/index.php");
	}
	else{
		$erreur = "<span style='color:red'>Erreur d'identifiants</span>";
	}
}
if ($_SESSION['admin']==1) {
    header("Location:admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team Radio - Administration</title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Nivo Lightbox
    ================================================== -->
    <link rel="stylesheet" href="css/nivo-lightbox.css" >
    <link rel="stylesheet" href="css/nivo_lightbox_themes/default/default.css">

    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <!-- Google Fonts
    ================================================== -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Page Header
    ================================================== -->
    <div id="tf-header" style="margin:0;">
        <div class="container"> <!-- container -->
            <h1>Administration</h1>
        </div><!-- end container -->
    </div>

    <!-- Contact Section
    ================================================== -->
    <div id="tf-contact" class="contact" style="padding: 0;">

        <div class="container"> <!-- container -->
            <div class="section-header">
                <div class="fancy"><span><img src="img/favicon.ico" alt="..."></span></div>
            </div>
            
            <div class="row text-center"> <!-- contact form outer row with centered text-->
                     <form class="adminform form" method="POST" action=""> <!-- form wrapper -->
                        <div class="form-group"> <!-- Your name input -->
                        <label>Identifiant :</label>
                            <input type="text" class="form-control" placeholder="Identifiant" name="user" required>
                        </div>

                        <div class="form-group"> <!-- Your email input -->
                        <label>Mot de passe :</label>
                            <input type="password" class="form-control" placeholder="Mot de passe" name="pass" required>
                        </div>
                        <button type="submit" name="formconnect" class="btn btn-primary tf-btn color">Se connecter</button> <!-- Send button -->
                        <br><?php if (isset($erreur)) {echo $erreur;} ?>
                    </form>
            </div> <!-- end contact form outer row with centered text-->

        </div><!-- end container -->

    </div>

    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <script type="text/javascript" src="js/owl.carousel.js"></script><!-- Owl Carousel Plugin -->

    <script type="text/javascript" src="js/SmoothScroll.js"></script>

    <!-- Google Map -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&amp;sensor=false"></script>
    <script type="text/javascript" src="js/map.js"></script>

    <!-- Parallax Effects -->
    <script type="text/javascript" src="js/skrollr.js"></script>
    <script type="text/javascript" src="js/imagesloaded.js"></script>

    <!-- Portfolio Filter -->
    <script type="text/javascript" src="js/jquery.isotope.js"></script>

    <!-- LightBox Nivo -->
    <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>

  </body>
</html>