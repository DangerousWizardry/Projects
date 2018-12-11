<?php 
include("../config.php");
if (isset($_POST['subAddFormation'])) {
	$id_type = $_POST['id_type'];
	$lieu = htmlentities($_POST['lieu'],ENT_QUOTES);
	$informations = htmlentities($_POST['informations'],ENT_QUOTES);
	$date_debut = DateTime::createFromFormat('j.m.Y H:i', $_POST['date_debut']);
	$date_fin = DateTime::createFromFormat('j.m.Y H:i', $_POST['date_fin']);
	$query = $bdd->prepare("INSERT INTO `formation`(`ID_TYPE`, `LIEU`, `DATE_DEBUT`, `DATE_FIN`, `INFORMATIONS`) VALUES (?,?,?,?,?)");
	if ($query->execute(array($id_type,$lieu,$date_debut->format('Y-m-d H:i:s'),$date_fin->format('Y-m-d H:i:s'),$informations))) {
		header("Location:gestion.php?page=calendar&result=1");
	}
	else{
		header("Location:gestion.php?page=calendar&result=0");
	}
}
if (isset($_POST['deleteFormation'])) {
	$idformation = $_POST['idformation'];
	$query = $bdd->prepare("DELETE FROM formation WHERE IDFORMATION = ?");
	if ($query->execute(array($idformation))) {
		header("Location:gestion.php?page=calendar");
	}
	else{
		header("Location:gestion.php?page=calendar");
	}
}
?>