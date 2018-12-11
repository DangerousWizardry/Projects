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
    <script type="text/javascript" src="semantic/semantic.min.js"></script>
    <script type="text/javascript" src="js/util.js"></script>

</head>
<body>
    <?php include_once("sidebar.php"); ?>
    <?php include_once("header.php"); ?>
    <div id="content">
        <div class="ui container">
            <h1>Nous rejoindre</h1>
                <img class="ui medium right floated image" src="assets/joinus.jpg">
                <p>Vous êtes étudiants, salarié, fonctionnaires, artisan ou à la recherche d'un emploi ?</p>
                <p>Vous avez au moins 16 ans et vous souhaitez vous rendre utile ?</p>
                <p>Que vous soyez formé ou non, rejoignez la grande famille de l'UNASS et participez à l'aventure secourisme avec nous !</p>
                <p>Venez vivre une nouvelle expérience et rencontrer des gens passionnés. Nous vous formerons aux missions qui vous intéressent et nous vous accompagnerons tout au long de l’évolution de votre engagement à nos côtés.</p>
                <form class="ui form" method="POST" action="" id="recform">
                <div class="field">
                    <label>Identité</label>
                    <input type="text" name="name" required placeholder="Nom, Prénom">
                </div>
                <div class="field">
                    <label>Adresse mail</label>
                    <input type="text" name="mail" required placeholder="________@____.__">
                </div>
                <div class="field">
                    <label>Autres Informations</label>
                    <textarea form="recform" placeholder="Quelques lignes pour soutenir vos motivations"></textarea>
                </div>
                <input class="ui button" type="submit" name="subrec" value="Envoyer ma candidature">
            </form>
        </div>
    </div>
    <?php include_once("footer.php"); ?>
    <script type="text/javascript">
    </script>
</body>
</html>