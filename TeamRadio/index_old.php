<?php 
session_start(); 
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=id887749_wp_723085603b459fe30d08c05c0a8314ba;charset=utf8', 'id887749_wp_723085603b459fe30d08c05c0a8314ba', 'password');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
date_default_timezone_set("Europe/Paris");
$hardconfig = $bdd->query("SELECT * FROM config");
$ligne = $hardconfig->rowCount();
$hardconfig = $hardconfig->fetchAll();
for ($i=0; $i < $ligne; $i++) { 
    $config[$hardconfig[$i]["name"]] = $hardconfig[$i]["value"];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team Radio</title>
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
    <link href="https://fonts.googleapis.com/css?family=Orbitron:700" rel="stylesheet">
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- AUDIO PLAYER -->
    <link type="text/css" href="skin/blue.monday/css/jplayer.blue.monday.css" rel="stylesheet" />
    <link type="text/css" href="css/player_style.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#jquery_jplayer_1").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            title: "<?php echo $config["nom_flux"]; ?>",
            mp3: "<?php echo $config["url_flux"]; ?>"
          });
        },
        cssSelectorAncestor: "#jp_container_1",
        cssSelector: {
          play: ".play_button",
          /*pause: ".play_button",*/
          mute: ".headphone_button",
          /*unmute: ".headphone_button",*/
          volumeBar: ".volume_bar",
          volumeBarValue: ".volume_bar_value",
          currentTime: ".jp-current-time",
          duration: ".jp-duration",
          title: ".jp-title"},

        stateClass: {
          playing: "state-playing",
          seeking: "state-seeking",
          muted: "state-muted",
        },
        swfPath: "/js",
        supplied: "mp3",
        useStateClassSkin: true,
        autoBlur: false,
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        toggleDuration: true
      });
    });
  </script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Custom ScrollBar/ScrollBox -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" />
    <!-- Tchat -->
    <script type="text/javascript" src="js/tchat.php"></script>
    <!-- Analytics -->
    <script type="text/javascript" src="js/analytics.js"></script>
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
<?php


?>
    <!-- Home Section
    ================================================== -->
    <div id="tf-home">
        <div class="overlay"> <!-- Overlay Color -->
            <div class="container"> <!-- container -->
                <div class="content-heading text-center"> <!-- Input Your Home Content Here -->
                    <img src="img/logo.png" class="intro-logo img-responsive">
                    <br>
                    <div id="jquery_jplayer_1"></div>
  <div id="jp_container_1" class="large_player"><div class="play_button"></div><div class="headphone_button"></div><div id="scrollinfo" class="scrolling_info"><?php echo $config["msg_player"]; ?></div><div class="volume_bar"><div class="volume_bar_value"></div></div></div>
</div>
</div><!-- End Input Your Home Content Here -->
</div> <!-- end container -->
</div><!-- End Overlay Color -->
</div>
    <!-- Intro Section
    ================================================== -->
          <div id="tf-intro">
            <div class="container"> <!-- container -->
                <div class="row"> <!-- row -->

                    <div class="col-md-8 col-md-offset-2"> 
                        <img src="img/logo.png" class="intro-logo img-responsive">
                        <p>Team Radio est une radio collaborative ayant pour but de réunir les nombreux acteurs de la Côte de Nacre. Nous avons la particularité d'être entièrement administrés par une équipe complète et dynamique de jeunes (14-18 ans). Notre objectif principal est de communiquer sur les projets de tous et de chacun sur l'ensemble de la Côte de Nacre.</p>
                    </div>

                </div><!-- end row -->
            </div><!-- end container -->
        </div>

    <!-- Service Section
    ================================================== -->
    <div id="tf-services">
        <div class="container"> <!-- container -->

            <div class="section-header">
                <h2>Ici sera hissé un superbe <span class="highlight"><strong>Tchat</strong></span></h2>
                <h5><em>Restez en relation permanente avec le studio !</em></h5>
                <div class="fancy"><span><img src="img/favicon.ico" alt="..."></span></div>
            </div>
            <div id="tchat">
            <div id="msgcontainer">
            </div>
            <input type="text" id="tchatinput_1" placeholder="Votre Pseudo" <?php if (isset($_SESSION['user'])){ echo 'value="'.$_SESSION['user'].'" disabled'; } ?>>
            <input type="text" id="tchatinput_2" placeholder="Votre message ..." maxlength="550">
            <span class="text-alert" id="notmsg" style="display: none;"></span>
            <button id="tchatinput_3" onclick="senddata();">Envoyer le message</button>
            </div>
            <div id="admincase"></div>
            <div id="myModal" class="modal fade">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title">Bannir un utilisateur</h4>
		            </div>
		            <div class="modal-body">
		                <p>Pour combien de temps souhaitez vous bannir cet ip ?</p>
		                <select id="selecttime">
		                	<option value="300">5 minutes</option>
		                	<option value="900">15 minutes</option>
		                	<option value="1800">30 minutes</option>
		                	<option value="3600">1 heure</option>
		                	<option value="7200">2 heures</option>
		                	<option value="14400">4 heures</option>
		                	<option value="43200">12 heures</option>
		                	<option value="86400">1 jour</option>
		                	<option value="259200">3 jours</option>
		                	<option value="604800">1 semaine</option>
		                	<option value="1209600">2 semaines</option>
		                	<option value="2419200">1 mois</option>
		                	<option value="99999999999">Définitivement</option>
		                </select>
		                <br>
		                <br>
		                <p>Supprimer tout les messages de cette ip ?</p>
		                <select id="delall">
		                	<option value="0">Non</option>
		                	<option value="1">Oui</option>
		                </select>
		                <br>
		                <i>Cette action est définitive</i>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
		                <button type="button" class="btn btn-primary" onclick="killuser()" data-dismiss="modal">Bannir l'IP</button>
		            </div>
		        </div>
		    </div>
		</div>
        </div><!-- end container -->
    </div>
    <script type="text/javascript">
        (function($){
   $(window).load(function(){
      $("#msgcontainer").mCustomScrollbar({
        axis:"y",
        theme:"minimal-dark",
        live: "on",
        advanced:{
            updateOnContentResize: true    
        }
    });
   });
})(jQuery);
    $("#tchatinput_2").keypress(function(e) {
    if(e.which == 13) {
        senddata();
    }
    });
    function adminclick(idmessage){
        $("#admincase").html($("#msgid" + idmessage).text() + "<div class='panadmin msg'><a href='#myModal' data-toggle='modal' role='button'><div class='user' idmsg='"+ idmessage +"'></div></a><div class='trash' id='delmsg' idmsg='"+ idmessage +"'></div></div>");
        $("#admincase").css("display","inline-block");
    $("#delmsg").click(function() {
  		$.post("ajax.php", "delmsg="+$( "#delmsg" ).attr("idmsg"), function(data){
			$("#admincase").html(data);
    });
	});
    }
    function killuser(){
    	$.post("ajax.php", "killuser="+$( "#delmsg" ).attr("idmsg")+"&bantime="+$("#selecttime").val()+"&delall="+$("#delall").val(), function(data){
			$("#admincase").html(data);
    });
    }
    function senddata(){
        var auth = <?php if (isset($_SESSION['admin'])) {echo (rand()*231299)+2;}else{echo 0;} ?>;
        var user = $("#tchatinput_1").val();
        var text = $("#tchatinput_2").val();
        if (postmsg(user,text,auth)) {
            getdata();
        }
    }
    getmsg();
    function callbacktchat(type,data){
        if (type==1) {
        if (data) {
            if (data != $("#msgcontainer .mCSB_container").html()) {
                $("#msgcontainer .mCSB_container").html(data);
                $("#msgcontainer").mCustomScrollbar("update");   
                $('#msgcontainer').mCustomScrollbar('scrollTo','last');
            }
        }
        else{
            $("#msgcontainer .mCSB_container").html("<div class='msg'>Aucun message à afficher</div>");
        }
        }
        else if(type==2){
            document.getElementById("notmsg").style = "display:none;";
            document.getElementById("tchatinput_1").value = data;
            document.getElementById("tchatinput_1").disabled = "disabled";
            document.getElementById("tchatinput_2").value = "";
            getmsg();
        }
        else if(type==3){
            document.getElementById("notmsg").style = "color:red;display:block;";
            document.getElementById("notmsg").innerHTML = "Vous avez été banni !";
            document.getElementById("tchatinput_1").value = "";
            document.getElementById("tchatinput_1").disabled = "disabled";
            document.getElementById("tchatinput_2").value = "";
            document.getElementById("tchatinput_2").disabled = "disabled";
        }
        else if(type==4){
            document.getElementById("notmsg").style = "color:red;display:block;";
            document.getElementById("notmsg").innerHTML = "Merci d'utiliser un autre pseudo";
            document.getElementById("tchatinput_1").value = "";
            document.getElementById("tchatinput_1").disabled = "";
        }
        else if(type==5){
            document.getElementById("notmsg").style = "color:red;display:block;";
            document.getElementById("notmsg").innerHTML = data;
        }
    }
    setInterval(function() {getmsg(0);},5000);
    </script>
    <!-- Why Us/Features Section
    ================================================== -->
    <div id="tf-features">

        <div class="container">
            <div class="section-header">
                <h2>Les émissions qui pourrait vous <span class="highlight"><strong>intéresser</strong></span></h2>
                <div class="fancy"><span><img src="img/favicon.ico" alt="..."></span></div>
            </div>
        </div>

        <div id="feature" class="gray-bg"> <!-- fullwidth gray background -->
            <div class="container"> <!-- container -->
                <div class="row" role="tabpanel"> <!-- row -->
                    <div class="col-md-4 col-md-offset-1"> <!-- tab menu col 4 -->

                        <ul class="features nav nav-pills nav-stacked" role="tablist">
                            <li role="presentation" class="active">  <!-- feature tab menu #1 -->
                                <a href="#f1" aria-controls="f1" role="tab" data-toggle="tab">
                                    <span class="fa fa-desktop"></span>
                                    La Libre Antenne<br><small>Avec Pablo, Alycia, Rémi et Lucas</small>
                                </a>
                            </li>
                            <li role="presentation"> <!-- feature tab menu #2 -->
                                <a href="#f2" aria-controls="f2" role="tab" data-toggle="tab">
                                    <span class="fa fa-pencil"></span>
                                    L'artiste incompris<br><small>Avec Pablo</small>
                                </a>
                            </li>
                            <li role="presentation"> <!-- feature tab menu #3 -->
                                <a href="#f3" aria-controls="f3" role="tab" data-toggle="tab">
                                    <span class="fa fa-space-shuttle"></span>
                                    100% Rock<br><small>Avec Alycia</small>
                                </a>
                            </li>
                            <li role="presentation"> <!-- feature tab menu #4 -->
                                <a href="#f4" aria-controls="f4" role="tab" data-toggle="tab">
                                    <span class="fa fa-automobile"></span>
                                    La Chronique Paranormale<br><small>Avec Lucas</small>
                                </a>
                            </li>
                            <li role="presentation"> <!-- feature tab menu #5 -->
                                <a href="#f5" aria-controls="f5" role="tab" data-toggle="tab">
                                    <span class="fa fa-institution"></span>
                                    L'académie<br><small>Avec les jeunes de la MJCI</small>
                                </a>
                            </li>
                        </ul>

                    </div><!-- end tab menu col 4 -->

                    <div class="col-md-6"> <!-- right content col 6 -->
                        <!-- Tab panes -->
                        <div class="tab-content features-content"> <!-- tab content wrapper -->
                            <div role="tabpanel" class="tab-pane fade in active" id="f1"> <!-- feature #1 content open -->
                                <h4>La Libre Antenne</h4>
                                <p>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec, tempor cursus vitae sit aliquet neque purus. Ultrices lacus proin conubia dictum tempus, tempor pede vitae faucibus, sem auctor, molestie diam dictum aliquam. Dolor leo, ridiculus est ut cubilia nec, fermentum arcu praesent.</p>
                                <img src="img/defaut_image.jpg" class="img-responsive" alt="...">
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="f2"> <!-- feature #2 content -->
                                <h4>L'artiste incompris</h4>
                                <p>Découvrez des artistes particuliers, incompris comme le diraient certains, et pour la plupart méconnus, dans une chronique originale présentée par Pablo. </p>
                                <img src="img/defaut_image.jpg" class="img-responsive" alt="...">
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="f3"> <!-- feature #3 content -->
                                <h4>100% Rock</h4>
                                <p>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec, tempor cursus vitae sit aliquet neque purus. Ultrices lacus proin conubia dictum tempus, tempor pede vitae faucibus, sem auctor, molestie diam dictum aliquam. Dolor leo, ridiculus est ut cubilia nec, fermentum arcu praesent.</p>
                                <img src="img/defaut_image.jpg" class="img-responsive" alt="...">
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="f4"> <!-- feature #4 content -->
                                <h4>La Chronique Paranormale</h4>
                                <p>Ecoutez et réagissez à des histoires plus terrifiantes ou étranges les unes que les autres racontées par Lucas. Des poules folles aux anges gardiens en passant par les dames blanches, venez découvrir des histoires plus folles les unes que les autres !</p>
                                <img src="img/img_paranormal.jpg" class="img-responsive" alt="...">
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="f5"> <!-- feature #5 content -->
                                <h4>L'académie</h4>
                                <p>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec, tempor cursus vitae sit aliquet neque purus. Ultrices lacus proin conubia dictum tempus, tempor pede vitae faucibus, sem auctor, molestie diam dictum aliquam. Dolor leo, ridiculus est ut cubilia nec, fermentum arcu praesent.</p>
                                <img src="img/defaut_image.jpg" class="img-responsive" alt="...">
                            </div>
                        </div> <!-- end tab content wrapper -->
                    </div><!-- end right content col 6 -->

                </div> <!-- end row -->
            </div> <!-- end container -->
        </div><!-- end fullwidth gray background -->
    </div>

    <!-- Works Section
    ================================================== -->
    <div id="tf-works">
        <div class="container">
            <div class="section-header">
                <h2>Quelques photos de nos émissions et <span class="highlight"><strong>Interventions</strong></span></h2>
                <div class="fancy"><span><img src="img/favicon.ico" alt="..."></span></div>
            </div>

            <div class="text-center">
                <ul class="list-inline cat"> <!-- Portfolio Filter Categories -->
                    <li><a href="#" data-filter="*" class="active">Toutes</a></li>
                    <li><a href="#" data-filter=".emi">Emissions</a></li>
                    <li><a href="#" data-filter=".inter">Interventions</a></li>
                </ul><!-- End Portfolio Filter Categories -->
            </div>

        </div><!-- End Container -->

        <div class="container-fluid"> <!-- fluid container -->
           <div id="itemsWork" class="row text-center"> <!-- Portfolio Wrapper Row -->

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 nopadding emi"> <!-- Works #1 col 3 -->
                <div class="box"> 
                    <div class="hover-bg">
                        <div class="hover-text off">
                            <a title="Photo 1" href="img/listimage1.jpg" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/portfolio/01@2x.jpg">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a href="#"><i class="fa fa-chain"></i></a> <!-- change # with your url to link it to another page -->
                        </div> 
                        <img src="img/listimage1.jpg" class="img-responsive" alt="Image"> <!-- Portfolio Image -->
                    </div>
                </div>
            </div><!-- end Works #1 col 3 -->


        </div> <!-- End Row -->

    </div> <!-- End Container-Fluid -->
</div>
    <!--  Blog Section
    ================================================== -->
    <div id="tf-blog">
        <div class="container"> <!-- container -->
            <div class="section-header">
                <h2>Les dernières news du <span class="highlight"><strong>Blog</strong></span></h2>
                <h5><em>Restez au courant de nos prochaines émissions</em></h5>
                <div class="fancy"><span><img src="img/favicon.ico" alt="..."></span></div>
            </div>
        </div>

        <div id="blog-post" class="gray-bg"> <!-- fullwidth gray background -->
            <div class="container"><!-- container -->

                <div class="row"> <!-- row -->
                    <div class="col-md-6"> <!-- Left content col 6 -->

                        <div class="post-wrap"> <!-- Post Wrapper -->
                            <div class="media post"> <!-- post wrap -->
                                <div class="media-left"> 
                                    <a href="#"> <!-- link to your post single page -->
                                      <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                                  </a>
                              </div>
                              <div class="media-body">
                                <p class="small">January 14, 2015</p>
                                <a href="#">
                                    <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                </a>
                                <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
                            </div>
                        </div><!-- end post wrap -->

                        <div class="post-meta"> <!-- Meta details -->
                            <ul class="list-inline metas pull-left"> <!-- post metas -->
                                <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                                <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                                <li><a href="#">Read More</a></li> <!-- read more link -->
                            </ul>
                            <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                                <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                                <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
                            </ul>
                        </div><!-- end Meta details --> 
                    </div><!-- end Post Wrapper -->

                    <div class="post-wrap"> <!-- Post Wrapper -->
                        <div class="media post"> <!-- post wrap -->
                            <div class="media-left"> 
                                <a href="#"> <!-- link to your post single page -->
                                  <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                              </a>
                          </div>
                          <div class="media-body">
                            <p class="small">January 14, 2015</p>
                            <a href="#">
                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                            </a>
                            <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
                        </div>
                    </div><!-- end post wrap -->

                    <div class="post-meta"> <!-- Meta details -->
                        <ul class="list-inline metas pull-left"> <!-- post metas -->
                            <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                            <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                            <li><a href="#">Read More</a></li> <!-- read more link -->
                        </ul>
                        <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                            <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                            <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
                        </ul>
                    </div><!-- end Meta details --> 
                </div><!-- end Post Wrapper -->

                <div class="post-wrap"> <!-- Post Wrapper -->
                    <div class="media post"> <!-- post wrap -->
                        <div class="media-left"> 
                            <a href="#"> <!-- link to your post single page -->
                              <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                          </a>
                      </div>
                      <div class="media-body">
                        <p class="small">January 14, 2015</p>
                        <a href="#">
                            <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                        </a>
                        <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
                    </div>
                </div><!-- end post wrap -->

                <div class="post-meta"> <!-- Meta details -->
                    <ul class="list-inline metas pull-left"> <!-- post metas -->
                        <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                        <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                        <li><a href="#">Read More</a></li> <!-- read more link -->
                    </ul>
                    <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                        <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                        <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
                    </ul>
                </div><!-- end Meta details --> 
            </div><!-- end Post Wrapper -->

        </div> <!-- end Left content col 6 -->

        <div class="col-md-6"> <!-- right content col 6 -->

            <div class="post-wrap"> <!-- Post Wrapper -->
                <div class="media post"> <!-- post wrap -->
                    <div class="media-left"> 
                        <a href="#"> <!-- link to your post single page -->
                          <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                      </a>
                  </div>
                  <div class="media-body">
                    <p class="small">January 14, 2015</p>
                    <a href="#">
                        <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                    </a>
                    <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
                </div>
            </div><!-- end post wrap -->

            <div class="post-meta"> <!-- Meta details -->
                <ul class="list-inline metas pull-left"> <!-- post metas -->
                    <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                    <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                    <li><a href="#">Read More</a></li> <!-- read more link -->
                </ul>
                <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                    <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                    <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
                </ul>
            </div><!-- end Meta details --> 
        </div><!-- end Post Wrapper -->

        <div class="post-wrap"> <!-- Post Wrapper -->
            <div class="media post"> <!-- post wrap -->
                <div class="media-left"> 
                    <a href="#"> <!-- link to your post single page -->
                      <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                  </a>
              </div>
              <div class="media-body">
                <p class="small">January 14, 2015</p>
                <a href="#">
                    <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                </a>
                <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
            </div>
        </div><!-- end post wrap -->

        <div class="post-meta"> <!-- Meta details -->
            <ul class="list-inline metas pull-left"> <!-- post metas -->
                <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                <li><a href="#">Read More</a></li> <!-- read more link -->
            </ul>
            <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
            </ul>
        </div><!-- end Meta details --> 
    </div><!-- end Post Wrapper -->

    <div class="post-wrap"> <!-- Post Wrapper -->
        <div class="media post"> <!-- post wrap -->
            <div class="media-left"> 
                <a href="#"> <!-- link to your post single page -->
                  <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
              </a>
          </div>
          <div class="media-body">
            <p class="small">January 14, 2015</p>
            <a href="#">
                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
            </a>
            <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
        </div>
    </div><!-- end post wrap -->

    <div class="post-meta"> <!-- Meta details -->
        <ul class="list-inline metas pull-left"> <!-- post metas -->
            <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
            <li><a href="#">20 Comments</a></li> <!-- meta comments -->
            <li><a href="#">Read More</a></li> <!-- read more link -->
        </ul>
        <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
            <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
            <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
        </ul>
    </div><!-- end Meta details --> 
</div><!-- end Post Wrapper -->

</div><!-- end right content col 6 -->
</div><!-- end row -->

<div class="text-center">
    <a href="#" class="btn btn-primary tf-btn color">Load More</a>
</div>                
</div><!-- end container -->
</div> <!-- end fullwidth gray background -->
</div>

    <!-- Contact Section
    ================================================== -->
    <div id="tf-contact">

        <div class="container"> <!-- container -->
            <div class="section-header">
                <h2>Contactez <span class="highlight"><strong>Nous</strong></span></h2>
                <h5><em>Nous serons heureux de vous répondre</em></h5>
                <div class="fancy"><span><img src="img/favicon.ico" alt="..."></span></div>
            </div>
        </div><!-- end container -->
        <div class="container"><!-- container -->
            <div class="row"> <!-- outer row -->
                <div class="col-md-10 col-md-offset-1"> <!-- col 10 with offset 1 to centered -->
                    <div class="row"> <!-- nested row -->

                        <!-- contact detail using col 4 -->
                        <div class="col-md-4">  
                            <div class="contact-detail">
                                <i class="fa fa-map-marker"></i>
                                <h4>5 Rue Grande, 14880 Colleville Montgomery</h4> <!-- address -->
                            </div>
                        </div>
                        <!-- contact detail using col 4 -->
                        <div class="col-md-4">
                            <div class="contact-detail">
                                <i class="fa fa-envelope-o"></i>
                                <h4>teamradiofm@gmail.com</h4><!-- email add -->
                            </div>
                        </div>

                        <!-- contact detail using col 4 -->
                        <div class="col-md-4">
                        <a href="skype:live:TeamRadioFM?chat">
                            <div class="contact-detail">
                                <i class="fa fa-skype"></i>
                                <h4>TeamRadioFM</h4> <!-- phone no. -->
                            </div>
                        </a>
                        </div>

                    </div> <!-- end nested row -->
                </div> <!-- end col 10 with offset 1 to centered -->
            </div><!-- end outer row -->

            <div class="row text-center"> <!-- contact form outer row with centered text-->
                <div class="col-md-10 col-md-offset-1"> <!-- col 10 with offset 1 to centered -->
                    <form id="contact-form" class="form" name="sentMessage" novalidate> <!-- form wrapper -->

                        <div class="row"> <!-- nested inner row -->

                            <!-- Input your name -->
                            <div class="col-md-4">
                                <div class="form-group"> <!-- Your name input -->
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <!-- Input your email -->
                            <div class="col-md-4">
                                <div class="form-group"> <!-- Your email input -->
                                    <input type="email" autocomplete="off" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <!-- Input your Phone no. -->
                            <div class="col-md-4">
                                <div class="form-group"> <!-- Your email input -->
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Your Phone No. *" id="phone" required data-validation-required-message="Please enter your phone no.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                        </div><!-- end nested inner row -->

                        <!-- Message Text area -->
                        <div class="form-group"> <!-- Your email input -->
                            <textarea class="form-control" rows="7" placeholder="Tell Us Something..." id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                            <div id="success"></div>
                        </div>
                        <button type="submit" class="btn btn-primary tf-btn color">Send Message</button> <!-- Send button -->

                    </form><!-- end form wrapper -->
                </div><!-- end col 10 with offset 1 to centered -->
            </div> <!-- end contact form outer row with centered text-->

        </div><!-- end container -->

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
    

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <script type="text/javascript" src="js/owl.carousel.js"></script><!-- Owl Carousel Plugin -->

    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/jquery.marquee.min.js"></script>
    <!-- Parallax Effects -->
    <script type="text/javascript" src="js/skrollr.js"></script>
    <script type="text/javascript" src="js/imagesloaded.js"></script>

    <!-- Portfolio Filter -->
    <script type="text/javascript" src="js/jquery.isotope.js"></script>

    <!-- LightBox Nivo -->
    <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>

    <!-- Contact page-->
    <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="js/contact.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>
<script>
    var $mq = $('#scrollinfo');
    $mq.marquee({
    //speed in milliseconds of the marquee
    duration: 5000,
    //gap in pixels between the tickers
    gap: 50,
    //time in milliseconds before the marquee will start animating
    delayBeforeStart: 0,
    //'left' or 'right'
    direction: 'left',
    //true or false - should the marquee be duplicated to show an effect of continues flow
    duplicated: false
});
function displaynews(data){
    $mq
        .marquee('destroy')
        .html(data)
        .marquee({duration: 10000,gap: 50,delayBeforeStart: 0,direction: 'left',duplicated: false});
}
getnews();
setInterval(function() {analytics();},30000);
setInterval(function() {getnews();},30000);
</script>
<?php

?>
</body>
</html>