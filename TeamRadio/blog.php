<?php
session_start();
PDO::ERRMODE_SILENT;
date_default_timezone_set("Europe/Paris");
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=id887749_wp_723085603b459fe30d08c05c0a8314ba;charset=utf8', 'id887749_wp_723085603b459fe30d08c05c0a8314ba', 'password');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
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
    <meta name="author" content="ThemeForces.Com">
    
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
            <h1>Blog</h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Page Principale</a></li>
                <li><a class="active">Blog</a></li>
            </ol>
        </div><!-- end container -->
    </div>

    <!--  Blog Section
    ================================================== -->
    <div id="tf-blog" class="blog">
        <div class="container"> <!-- container -->
            <div class="section-header">
                <h2>Dernières news du <span class="highlight"><strong>Blog</strong></span></h2>
                <h5><em>Tenez vous au courant de nos dernières actualités</em></h5>
                <div class="fancy"><span><img src="img/favicon.ico" alt="..."></span></div>
            </div>
        </div>

        <div id="blog-post"> <!-- fullwidth gray background -->
            <div class="container"><!-- container -->

                <div class="row"> <!-- row -->
                <div class="col-md-9 col-md-offset-1">
                    <?php
                    if (!isset($_GET['blog_page'])) {
                      $_GET['blog_page'] = 1;
                  }
                  $totalligne = $bdd->query("SELECT * FROM blog")->rowCount();
                  $query = $bdd->query("SELECT * FROM blog ORDER BY UNIX_TIMESTAMP(date) DESC,idblog DESC LIMIT 5 OFFSET ". ($_GET['blog_page']-1)*5);
                  $ligne = $query->rowCount();
                  $data = $query->fetchAll();
                  for ($i=0; $i < $ligne; $i++) {
                    echo '<div class="post-wrap" id="post-'. $data[$i]['idblog'] .'">
                        <div class="media post">
                            <div class="media-left"> 
                                <a href="blog_post.php?id_post='. $data[$i]['idblog'] .'">
                                    <img class="media-object" width="120px" height="150px" src="'.$data[$i]['photo'].'" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <p class="small">'. date('d/m/Y H:i', strtotime($data[$i]['date'])).'</p>
                                <a href="blog_post.php?id_post='. $data[$i]['idblog'] .'">
                                    <h5 class="media-heading"><strong>'. htmlspecialchars_decode($data[$i]['titre']) .'</strong></h5>
                                </a>
                                <p>'. substr(strip_tags(htmlspecialchars_decode($data[$i]['texte'])), 0, 800)  .'...</p>
                            </div>
                        </div>

                        <div class="post-meta"> 
                            <ul class="list-inline metas pull-left"> 
                                <li><a href="#">par Team Radio</a></li>
                                <li><a href="blog_post.php?id_post='. $data[$i]['idblog'] .'">'. $data[$i]['comment'] .' Commentaires</a></li>
                                <li><a href="blog_post.php?id_post='. $data[$i]['idblog'] .'">Lire la suite</a></li>
                            </ul>
                            <ul class="list-inline meta-detail pull-right">
                                <li><a href="#" type="like" class="like_button" idpost="'.$data[$i]['idblog'].'" onclick="sendlike('. $data[$i]['idblog'] .',0)"><i class="fa fa-heart"></i></a> <span type="like_count" like_id="'. $data[$i]['idblog'] .'">'. $data[$i]['love'] .'</span></li>
                                <li><i class="fa fa-eye"></i> '. $data[$i]['vue'] .'</li> 
                            </ul>

                        </div>
                    </div>';
                }
                $nb_page = round($totalligne/5);
                $pagination = (int) $_GET['blog_page'];
                echo ' <div class="text-left"><nav><ul class="pagination">';
                if ($pagination!=1) {
                    echo '<li>
                    <a href="?blog_page='. ($pagination-1) .'" aria-label="Previous">
                        <span aria-hidden="true">Prec.</span>
                    </a>
                </li>';
            }
            for ($i=1; $i <= 5; $i++) { 
              if (($pagination + $i - 3) <= $nb_page && ($pagination + $i - 3)>0) {
                if ($i == 3) {
                    echo "<li><a href='?blog_page=". $pagination ."' class='active'>". $pagination ."</a></li>";
                }
                else{
                    echo "<li><a href='?blog_page=". ($pagination + $i - 3) ."'>". ($pagination + $i - 3) ."</a></li>";
                }
            }
        }
        if ($pagination!=$nb_page) {
          echo "<li><a href='?blog_page=". ($pagination+1) ."' aria-label='Next'><span aria-hidden='true'>Suiv.</span></a></li>";
      }
      echo "</ul>
  </nav>
</div>         
";
?>
</div>
</div> <!-- end Left content col 8 -->

</div>

</div><!-- end container -->
</div> <!-- end fullwidth gray background -->
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

    <!-- Parallax Effects -->
    <script type="text/javascript" src="js/skrollr.js"></script>
    <script type="text/javascript" src="js/imagesloaded.js"></script>

    <!-- Portfolio Filter -->
    <script type="text/javascript" src="js/jquery.isotope.js"></script>

    <!-- LightBox Nivo -->
    <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>

    <script type="text/javascript" src="js/blog.js"></script>

        <!-- Javascripts
        ================================================== -->
        <script type="text/javascript" src="js/main.js"></script>

    </body>
    </html>