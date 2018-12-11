<?php
include_once("config.php");
?>
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
    <link rel="stylesheet" type="text/css" href="semantic/components/label.min.css">
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
            <h1>Calendrier des formations</h1>
            <?php
            $mois = array('','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre');
            $listeFormation = $bdd->query("SELECT * FROM FORMATION  JOIN TYPE_FORMATION USING(ID_TYPE) WHERE DATE_DEBUT > CURRENT_DATE ORDER BY DATE_DEBUT");
            $lastformmonth = 0;
            ?>
            <table class="ui very basic collapsing celled table">
              <tbody>
            <?php
            if ($listeFormation->rowCount()>0) {
                $lastmonth;
                while ($ligne = $listeFormation->fetch()) {
                    echo "<tr>";
                    echo '<td><span class="ui label" style="background-color:#'. $ligne['COULEUR'] .' !important;"></span> '. html_entity_decode($ligne['NOM']) .'</td>';
                    if ($ligne['DATE_DEBUT'] == $ligne['DATE_FIN']) {
                        echo '<td><i class="stopwatch icon"></i> Le '. date('d/m/Y H:i',strtotime($ligne['DATE_DEBUT'])) .'</td>';
                    }
                    else{
                        echo '<td><i class="stopwatch icon"></i> Du '. date('d/m/Y H:i',strtotime($ligne['DATE_DEBUT'])) .' au '. date('d/m/Y H:i',strtotime($ligne['DATE_FIN'])) .'</td>';
                    }
                    echo '<td><i class="map marker icon"></i> à '. html_entity_decode($ligne['LIEU']) .'</td>';
                    echo '<td>'. html_entity_decode($ligne['INFORMATIONS'],ENT_QUOTES,"UTF-8") .'</td>';
                    echo '<td><a class="ui primary button" href="">M\'inscrire à cette formation</a></td>';
                    echo '<tr>';
                }
            }
            else{
                echo "Aucune formation n'est prévue pour le moment";
            }
            ?>
                </tbody>
            </table>
            <h2>Demandez une formation</h2>
            <p>Vous souhaitez suivre une formation en particulier mais aucune formation de ce type n'est programmée pour le moment ? Remplissez le formulaire ci dessous et nous prendrons contact avec vous, il se peut qu'il nous manque seulement quelques stagiaires pour pouvoir programmer une formation de ce type !</p>
            <form class="ui form" method="POST" action="" id="reqform">
                <div class="field">
                    <label>Type de formation</label>
                    <select name="type">
                        <option value="PSC1">PSC1</option>
                        <option value="SST">SST</option>
                        <option value="PSE1">PSE1</option>
                        <option value="PSE2">PSE2</option>
                        <option value="Formation Feu">Formation Feu</option>
                    </select>
                </div>
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
                    <textarea form="reqform" placeholder="Requête particulière, préférences de date, groupe, ..."></textarea>
                </div>
                <input class="ui button" type="submit" name="subreq" value="Envoyer la demande">
            </form>
        </div>
    </div>
    
    <?php include_once("footer.php"); ?>
    <script type="text/javascript">

    </script>
</body>
</html>