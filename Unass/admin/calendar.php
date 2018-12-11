<?php
/*




A FAIRE SUPPRESSION FORMATION (back-end)
AJOUT TYPE FORMATION avec spectrum pour le color picking










*/

include_once("../config.php");
if ($_SESSION['admin']!=1) {
	header("Location:index.php");
}
$mois = array('','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre');
$listeFormation = $bdd->query("SELECT * FROM FORMATION  JOIN TYPE_FORMATION USING(ID_TYPE) WHERE DATE_DEBUT > CURRENT_DATE ORDER BY DATE_DEBUT");
$lastformmonth = 0;
$listeTypeFormation = $bdd->query("SELECT ID_TYPE,NOM FROM TYPE_FORMATION");
?>
<button class="ui button primary" id="openAddFormation"><i id="iconAddFormation" class='icon caret down'></i> Ajouter une formation</button><br><br>
<?php 
if (isset($_GET['result']) && isset($_GET['page']) && $_GET['result'] == 1 && $_GET['page'] == "calendar") {
?>
<div class="ui success message">
    <div class="header">Formation ajoutée</div>
    <p>Votre formation a correctement été ajoutée à la base de donnée</p>
</div>
<?php
}
else if (isset($_GET['result']) && isset($_GET['page']) && $_GET['result'] == 0 && $_GET['page'] == "calendar") {
?>
<div class="ui error message">
    <div class="header">Une erreur est survenue</div>
    <p>La formation n'a pas pu être ajoutée à la base de donnée. Merci de vérifier les données entrées ou de réessayer ultèrieurement</p>
</div>
<?php
}
?>
<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Supprimer la session
  </div>
  <div class="content">
    <div class="description">
      <div class="ui header">Êtes vous sur de vouloir supprimer cette session de formation ?</div>
      <p>Cette opération n'est pas annulable</p>
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Annuler
    </div>
    <form method="POST" action="engine.php" class="inl"><input id="hiddenIdFormation" type="hidden" name="idformation">
    <button type="submit" name="deleteFormation" class="ui negative left labeled icon button">
      <i class="trash icon"></i>
      Supprimer
    </button></form>
  </div>
</div>
<form action="engine.php" method="POST" id="addFormation" style="display: none;">
<div class="ui form">
  <div class="three fields">
    <div class="field">
      <label>Type :</label>
      <div class="ui selection dropdown">
          <input type="hidden" name="id_type">
          <i class="dropdown icon"></i>
          <div class="default text">Type de formation</div>
          <div class="menu">
            <?php
            $listeTypeFormation = $listeTypeFormation->fetchAll();
            if ($listeTypeFormation) {
                foreach ($listeTypeFormation as $row) {
                    echo "<div class='item' data-value='".$row['ID_TYPE']."'>". $row['NOM'] ."</div>";
                }
            }
            ?>
          </div>
      </div>
  </div>
  <div class="field">
      <label>Début</label>
      <input id="datetimepicker1" autocomplete="off" name="date_debut" type="text" placeholder="Date et heure de début">
    </div>
    <div class="field">
      <label>Fin</label>
      <input id="datetimepicker2" autocomplete="off" name="date_fin" type="text" placeholder="Date et heure de fin">
    </div>
</div>
<div class="three fields">
    <div class="field">
      <label>Lieu</label>
      <input type="text" name="lieu" placeholder="Lieu de la formation">
    </div>
    <div class="field">
      <label>Informations</label>
      <input type="text" name="informations" placeholder="Informations Complémentaires">
    </div>
    <div class="field">
        <label><br></label>
      <input type="submit" name="subAddFormation" value="Créer la formation" class="ui green button">
    </div>
  </div>
</div>
</form>
<table class="ui very basic collapsing celled table">
  <tbody>
<?php
if ($listeFormation->rowCount()>0) {
    $lastmonth = "00";
    while ($ligne = $listeFormation->fetch()) {
        if ($lastmonth != date('m',strtotime($ligne['DATE_DEBUT']))) {
            $lastmonth = date('m',strtotime($ligne['DATE_DEBUT']));
            echo "<tr><td colspan='5'>". $mois[(int)$lastmonth] ."</td></tr>";
        }
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
        echo '<td><a class="ui negative button" onclick="openConfirmDelete('. $ligne['IDFORMATION'] .')">Supprimer cette formation</a></td>';
        echo '<tr>';
    }
}
else{
	echo "Aucune formation n'est prévue pour le moment";
}
?>
    </tbody>
</table>
<script type="text/javascript">
    function openConfirmDelete(idformation) {
        $("#hiddenIdFormation").val(idformation);
        $('.ui.modal').modal('show');
    }
    $.datetimepicker.setLocale('fr');
    jQuery('#datetimepicker1').datetimepicker({
  format:'d.m.Y H:i',
  lang:'fr'
});
    jQuery('#datetimepicker2').datetimepicker({
  format:'d.m.Y H:i',
  lang:'fr'
});
$('.selection.dropdown').dropdown();
$( "#openAddFormation" ).click(function() {
      if ($('#addFormation').css('display') == 'none') {
        $("#iconAddFormation").removeClass("down");
        $("#iconAddFormation").addClass("up");
        $( "#addFormation" ).show(500);
    }
    else{
        $( "#addFormation" ).hide(200,function(){
            $("#iconAddFormation").removeClass("up");
            $("#iconAddFormation").addClass("down");
        });
    }
});
</script>