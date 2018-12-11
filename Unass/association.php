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
    <link rel="stylesheet" type="text/css" href="semantic/components/icon.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/grid.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/segment.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/button.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.marquee.min.js"></script>
    <script type="text/javascript" src="semantic/semantic.min.js"></script>
    <script type="text/javascript" src="js/util.js"></script>
</head>
<body>
    <?php include_once("sidebar.php"); ?>
    <?php include_once("header.php"); ?>
    <div id="content">
        <div class="ui container">
            <h1>L'association</h1>
                    <img class="ui medium right floated image" src="assets/association.jpg">
                    <p>L'Union Nationale des Associations de Sauveteurs Secouristes du Calvados est composée de plus de 60 bénévoles issus de tout corps de métier, milieux sociaux et de tout age qui après leur travail, leurs études enfile l'uniforme de secouriste le temps d'une apreès-midi ou d'un week-end</p>
                    <p>Chacun de nos membres est formé au secourisme (PSE1/PSE2) avec également pour nombre d'eux des spécialités (sauvetage aquatique, gestion d'un PC opérationnel, ...). L'UNASS est également composé de quelques membres du corps médical (interne, infirmier).</p>
                    <p>Pour compléter ces équipes, l'UNASS 14 dispose également de logisticien gérant, comme leur nom l'indique, tout l'aspect logistique de nos dispositifs les plus conséquents</p>
                    <br><br>
                    <img class="ui medium left floated image" src="assets/vpsp.png">
                    <h2>Les véhicules</h2>
                    <p>L'association dispose également de nombreux véhicules :</p>
                    <p>6 VPSP (Véhicule de Premiers Secours à Personne) totalement équipé : défibrillateur, oxygénothérapie nous permettant d'évacuer d'éventuels blessés grave vers une structure hospitalière</p>
                    <p>1 véhicule de soutien logistique et de transport</p>
                    <p>Un véhicule PC Opérationnel nous permettant d'établir un centre de gestion de crises peu importe l'environnement</p>
                    <p>2 VTT pour intervenir dans toutes les configurations possibles</p>
                    <h1 class="center">Ils nous font confiance</h1>
                    <div class="marquee">
                        <img class="iblock ui small image" src="assets/partenaire/beauregard.png">
                        <img class="iblock ui small image" src="assets/partenaire/courants.png">
                        <img class="iblock ui small image" src="assets/partenaire/caenevent.png">
                        <img class="iblock ui small image" src="assets/partenaire/smc.png">
                        <img class="iblock ui small image" src="assets/partenaire/ovalie.png">
                        <img class="iblock ui small image" src="assets/partenaire/p2n.png">
                        <img class="iblock ui small image" src="assets/partenaire/corposcience.png">
                        <img class="iblock ui small image" src="assets/partenaire/calvados.png">
                        <img class="iblock ui small image" src="assets/partenaire/nordik.png">
                        <img class="iblock ui small image" src="assets/partenaire/meeting.png">
                        <img class="iblock ui small image" src="assets/partenaire/normandie.png">
                        <img class="iblock ui small image" src="assets/partenaire/bamevent.png">
                    </div>
        </div>
    </div>
    <?php include_once("footer.php"); ?>
    <script type="text/javascript">
        $('.marquee').marquee({
    duration: 20000,
    gap: 0,
    delayBeforeStart: 0,
    startVisible : true,
    direction: 'left',
    duplicated: true
});
    </script>
</body>
</html>