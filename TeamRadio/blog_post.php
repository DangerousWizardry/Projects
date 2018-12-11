<?php
session_start();
PDO::ERRMODE_SILENT;
date_default_timezone_set("Europe/Paris");
setlocale(LC_TIME, 'fr_FR.UTF8');
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=id887749_wp_723085603b459fe30d08c05c0a8314ba;charset=utf8', 'id887749_wp_723085603b459fe30d08c05c0a8314ba', 'password');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
function get_ip() {
	if ( function_exists( 'apache_request_headers' ) ) {
		$headers = apache_request_headers();
	} else {
		$headers = $_SERVER;
	}
	if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
		$the_ip = $headers['X-Forwarded-For'];
	} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) {
		$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
	} else {
		
		$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
	}
	return $the_ip;
}
if (isset($_POST['validcom'])) {
	$com = htmlspecialchars($_POST['com']);
	$email = htmlspecialchars($_POST['email']);
	$name = htmlspecialchars($_POST['name']);
	if (!empty($email) && !empty($name) && !empty($com))
	{
		$ligne = $bdd->query("SELECT idcomment FROM blog_comment WHERE idpost = ". $_GET['id_post'] ." AND ip = '". get_ip() ."'")->rowCount();
		if ($ligne<6) {
			$domain = ltrim(stristr($email, '@'), '@');
			$user   = stristr($email, '@', TRUE);
			if (!empty($user) && !empty($domain) && checkdnsrr($domain)){
				if (strlen($name)<50) {
					if (strlen($com)<1000) {
						$query = $bdd->prepare("INSERT INTO blog_comment(idpost,name,email,comment,ip,datatime) VALUES (?,?,?,?,?,?)");
						if ($query->execute(array($_GET['id_post'],$name,$email,$com,get_ip(),time()))) {
							$bdd->query("UPDATE blog SET comment = comment + 1 WHERE idblog =".$_GET['id_post']);
						}
						else{
							$error = "Une erreur est survenue, merci de vérifier votre message et de réessayer";
						}
					}
					else{
						$error = "Les commentaires sont limités à 1000 caractères";
					}
				}
				else{
				$error = "Votre nom fait plus de 50 caractères";
				}
			}
			else{
				$error = "Merci d'utiliser une adresse mail valide";
			}
		}
		else{
			$error = "5 commentaires maximum sont autorisés par article et par personne";
		}

	}
	else{
		$error = "Merci de remplir tout les champs";
	}
}
$text = '<p>Une erreur est survenue, merci de réessayer d\'accéder à cet article plus tard...</p>';
$photo = "";
$titre = "Erreur !";
$like = "";
$vue = "";
$date = "";
$ispost = 0;
$idpost = "?";
if (isset($_GET['id_post'])) {
	$query = $bdd->prepare("SELECT * FROM blog WHERE idblog = ?");
	$query->execute(array($_GET['id_post']));
	$ligne = $query->rowCount();
	$data = $query->fetch();
	if ($ligne != 0) {
		$ipadress = get_ip();
		$query = $bdd->query("SELECT * FROM blog_view_counter WHERE ip = '$ipadress' AND idpost = ".$_GET['id_post']);
		if (!$query->fetch()) {
			$bdd->query("INSERT INTO blog_view_counter(idpost,ip,datatime) VALUES (".$_GET['id_post'].",'$ipadress',".time().")");
			$bdd->query("UPDATE blog SET vue = vue + 1 WHERE idblog = ".$_GET['id_post']);
		}
		$date = date('d/m/Y H:i', strtotime($data['date']));
		$photo = $data['photo'];
		$titre = htmlspecialchars_decode($data['titre']);
		$text = htmlspecialchars_decode($data['texte']);
		$like = $data['love'];
		$vue = $data['vue'];
		$comment_count = $data['comment'];
		$ispost = 1;
		$idpost = $_GET['id_post'];
	}
	else{
		$text = '<p>Une erreur est survenue, merci de réessayer d\'accéder à cet article plus tard...</p>';
		$photo = "";
		$titre = "Erreur !";
		$like = "";
		$vue = "";
		$date = "";
		$comment_count = 0;
	}
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
    <title>Team Radio - Blog</title>
    <meta name="description" content="TeamRadio, la première radio de la côte de nacre ! Venez écouter la webradio en direct depuis Colleville Montgomery">
    <meta name="keywords" content="Team Radio, Team, Radio, TeamRadio, FM, TeamRadioFM, webradio, caen, colleville, hermanville, normandie">
    
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

    <!-- Main Navigation 
    ================================================== -->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
    	<div class="container">
    		<!-- Brand and toggle get grouped for better mobile display -->
    		<div class="navbar-header">
    			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    				<span class="sr-only">Toggle navigation</span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    			</button>
    			<a class="navbar-brand" href="#"><img src="img/logo-header.png" alt="..."></a>
    		</div>

    		<!-- Collect the nav links, forms, and other content for toggling -->
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    			<ul class="nav navbar-nav navbar-right">
    				<li><a href="index.php" class="scroll">La Radio</a></li>
    				<li><a href="blog.php" class="scroll">Les Actus</a></li>
    				<li><a href="#tf-about" class="scroll">Replay</a></li>
    				<li><a href="#tf-works" class="scroll">Calendrier</a></li>
    				<li><a href="#tf-process" class="scroll">Nous rejoindre</a></li>
    				<li><a href="#tf-contact" class="scroll">Contact</a></li>
    			</ul>
    		</div><!-- /.navbar-collapse -->
    	</div><!-- /.container-fluid -->
    </nav>


    <!-- Page Header
    ================================================== -->
    <div id="tf-header">
    	<div class="container"> <!-- container -->
    		<h1>Article n°<?php echo $idpost; ?></h1>
    		<ol class="breadcrumb">
    			<li><a href="index.php">Page Principale</a></li>
    			<li><a href="blog.php">Blog</a></li>
    			<li><a class="active">Article n°<?php echo $idpost; ?></a></li>
    		</ol>
    	</div><!-- end container -->
    </div>

    <!--  Blog Section
    ================================================== -->
    <div id="tf-blog" class="blog-post">
    	<div id="blog-post"> <!-- fullwidth gray background -->
    		<div class="container"><!-- container -->

    			<div class="row"> <!-- row -->
    				<div class="col-md-9 col-md-offset-1"> <!-- Left Blogrol col 8 -->

    					<div class="post-wrap"> <!-- Post Wrapper -->
    						<p class="small"><?php $date; ?></p>
    						<a href="#">
    							<h5 class="media-heading"><strong><?php echo $titre; ?></strong></h5>
    						</a>
    						<?php
    						if ($ispost ==1) {
    							?>
    							<ul class="list-inline metas pull-left">
    								<li><a href="#">Par Team Radio</a></li>
    							</ul>
    							<br>
    							<div style="clear:both"></div>
    							<img src="<?php echo $photo; ?>" width="100px" height="120px" class="img-responsive" alt="..." style='float: left; margin-right: 20px'>
    							<?php
    						}
    						echo $text;
    						if ($ispost ==1) {
    							?>
    							<ul class="list-inline metas pull-left">
    								<li><a href="#">Par Team Radio</a></li>
    							</ul>
    							<div class="post-meta"> <!-- Meta details -->
    								<ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
    									<li><a href="#" type="like" class="like_button" idpost="<?php echo $idpost; ?>" onclick="sendlike(<?php echo $idpost; ?>,0)"><i class="fa fa-heart"></i></a> <span type="like_count" like_id="<?php echo $idpost; ?>"><?php echo $like; ?></span></li>
    									<li><i class="fa fa-eye"></i> <?php echo $vue; ?></li> <!-- no. of views -->
    								</ul>
    							</div>
    							<?php
    						}
    						?>
    					</div><!-- end Post Wrapper -->
    					<?php
    					if ($ispost ==1) {
    						$more_com = 10;
    						if (isset($_GET['more_comment']) && is_int($_GET['more_comment'])) {
    							$more_com = 10 + 10*$_GET['more_comment'];
    						}
    						$info = $bdd->query("SELECT * FROM blog_comment WHERE idpost = ". $_GET['id_post']." ORDER BY datatime DESC,idcomment DESC LIMIT ". $more_com);
    						$ligne = $info->rowCount();
    						$info = $info->fetchAll();
    						$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"); 
    						?>
    						<div id="comments" class="comment">
                            <h4 class="text-uppercase">Commentaires <span class="comments">(<?php echo $comment_count; ?>)</span></h4>
                            <?php
                            for ($i=0; $i < $ligne; $i++) { 
                            	echo "<div class='media comment-block'>
                                <div class='media-body'>
                                    <small class='pull-right'>". date('\L\e d ', $info[$i]['datatime']) . $mois[date('n', $info[$i]['datatime'])] . date(' Y \à H:i', $info[$i]['datatime']) ."</small>
                                    <h5 class='media-heading'>Posté par <a href='#'>". htmlspecialchars_decode($info[$i]['name']) ."</a></h5> 
                                    <div class='clearfix'></div>
                                    ". htmlspecialchars_decode($info[$i]['comment']) ."
                                    <div class='clearfix'></div>
                                </div>
                            </div>";
                            }
                            ?>

    						<div class="comment">
    							<h4 class="text-uppercase">Laisser un commentaire</h4>
    							<form id="com-form" class="form" action="" method="POST">
    								<div class="row">
    									<div class="col-md-6">
    										<input type="text" class="form-control" name="name" placeholder="Votre Nom" value="<?php if(isset($name)){echo htmlspecialchars_decode($name);} ?>">
    									</div>
    									<div class="col-md-6">
    										<input type="text" class="form-control" name="email" placeholder="Votre Email" value="<?php if(isset($email)){echo htmlspecialchars_decode($email);} ?>">
    									</div>
    								</div>
    								<textarea form="com-form" name="com" class="form-control" rows="6" placeholder="Votre commentaire..." value="<?php if(isset($com)){echo htmlspecialchars_decode($com);} ?>"></textarea>
    							<?php
    								if (isset($error)) {
    							?>
    							<br>
    							<div class="col-md-9 col-md-offset-1" style="margin-bottom: 30px">
    								<div class="post-wrap">
			    						<p class="small"></p>
			    						<a href="#">
			    							<h5 class="media-heading"><strong>Erreur !</strong></h5>
			    						</a>
			    						<p class="text-danger"><?php echo $error; ?></p>    					
		    						</div>
								</div>
    							<?php
	    						}
	    						?>
    								<button type="submit" name="validcom" class="btn btn-default en-btn">Enregistrer le commentaire</button>
    							</form>
    						</div>
    						<?php
    					}
    					?>
    				</div> <!-- end Left content col 8 -->

    			</div><!-- end row -->

    		</div><!-- end container -->
    	</div> <!-- end fullwidth gray background -->
    </div>
</div>
    <!-- Footer 
    ================================================== -->
    <div id="tf-footer">
    	<div class="container"><!-- container -->
    		<p class="pull-left">© 2017 Team Radio. Tout droit réservés. Design par Rudhi Sasmito en collaboration avec Team Radio</p> <!-- copyright text here-->
    		<ul class="list-inline social pull-right">
    			<li><a href="https://www.facebook.com/TeamRadioFM" target="_blank"><i class="fa fa-facebook"></i></a></li> 
    			<li><a href="https://twitter.com/TeamRadioFM"><i class="fa fa-twitter"></i></a></li>
    			<li><a href="#"><i class="fa fa-google-plus"></i></a></li> 
    			<li><a href="#"><i class="fa fa-youtube"></i></a></li> 
    		</ul>
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

    <!-- Contact page-->
    <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>

    <script type="text/javascript" src="js/blog.js"></script>
  
    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>

</body>
</html>