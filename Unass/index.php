<!DOCTYPE html>
<html>
<head>
	<title>UNASS Calvados</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="icon" type="image/png" href="assets/logo_mini.png" />
    <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/container.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/header.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/menu.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/image.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/icon.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/grid.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/segment.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/button.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="semantic/semantic.min.js"></script>
    <script type="text/javascript" src="js/util.js"></script>
</head>
<body>
<?php include_once("sidebar.php"); ?>
<div class="pusher">
	<?php include_once("header.php"); ?>
<div id="intro"><h1 class="ui header">L'Union Nationale des Associations de Sauveteurs Secouristes du Calvados, à vos cotés depuis 1972...</h1></div>
<div id="chapter">
<div class="ui three column stackable grid" style="margin: 0 1em !important;">
	<div class="column center"><div class="ui segment">
		<div class="segbody">
			<i class="ambulance huge icon"></i><br>
			<h2>Faire une demande de D.P.S.</h2>
			<p>Vous organisez une manifestation et vous souhaitez la présence d'une de nos équipes bénévoles de secouristes ? Nous vous tentons de vous proposer des solutions 	adaptées à vos besoins ! Faites une demande dès maintenant !</p>
		</div>
		<a class="ui primary button" href="demandedeposte.php">Faites votre demande</a>
	</div></div>
	<div class="column center"><div class="ui segment">
		<div class="segbody">
			<i class="heartbeat huge icon"></i><br>
			<h2>Vous former au secourisme</h2>
			<p>Vous êtes un individuel, une entreprise, et vous souhaitez vous et vos équipes vous former au secourisme ? Nous proposons de nombreuses formations (PSC1,SST,...). N'hésitez pas à consulter notre calendrier de formation ou à nous contacter pour des besoins spécifiques.</p>
		</div>
		<a class="ui primary button" href="formation.php">Formez vous !</a>
	</div></div>
	<div class="column center"><div class="ui segment">
		<div class="segbody">
			<i class="user md huge icon"></i><br>
			<h2>Rejoindre nos équipes</h2>
			<p>Tu es secouriste, infirmier, formateur ou simple civil et tu souhaites rejoindres nos équipes ? N'hésite surtout pas et rejoins la grande famille de l'UNASS ! Nous assurons ta formation complète !</p>
		</div>
		<a class="ui primary button" href="joinus.php">Dépose une candidature</a>
	</div></div>
</div>
</div>
<div id="team">
<h1>L'UNASS Calvados, une association, des générations, des milieux sociaux et des compétences</h1>
</div>
<?php include_once("footer.php"); ?>
</div>
</body>
<script type="text/javascript">
	$(window).scroll(function() {
		if ($(document).scrollTop()<130) {
			$("#header").css("height",123-($(document).scrollTop())/3);
			$("#logo").css("height",120-($(document).scrollTop())/3);
			$("header > .column > div").css("font-size",20-($(document).scrollTop())/10)
			$("#col1").show("slow");
			$("#col3").show("slow");
		}
		else{
			$("#header").css("height",75);
			$("#logo").css("height",70);
			$("#col1").hide("slow");
			$("#col3").hide("slow");
		}
		
		console.log($(document).scrollTop());
	});
	
</script>
</html>