<?php
session_start();
if ($_SESSION['admin']!=1) {
	header("Location:index.php");
}
include_once("../config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>UNASS Calvados</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="../assets/logo_mini.png" />
    <link rel="stylesheet" type="text/css" href="../semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../semantic/components/container.min.css">
    <link rel="stylesheet" type="text/css" href="../semantic/components/header.min.css">
    <link rel="stylesheet" type="text/css" href="../semantic/components/menu.min.css">
    <link rel="stylesheet" type="text/css" href="../semantic/components/image.min.css">
    <link rel="stylesheet" type="text/css" href="../semantic/components/icon.min.css">
    <link rel="stylesheet" type="text/css" href="../semantic/components/grid.min.css">
    <link rel="stylesheet" type="text/css" href="../semantic/components/segment.min.css">
    <link rel="stylesheet" type="text/css" href="../semantic/components/button.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../semantic/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/jquery.datetimepicker.css"/ >
	<script src="../js/jquery.datetimepicker.full.min.js"></script>
</head>
<body class="admin">
    <header class="center">
        <div class="iblock"><img id="logo" class="iblock" src="../assets/logo.jpg"></div>
    </header>
    <div class="pusher">
        <div class="ui center container">
        	<div class="ui three item stackable tabs menu">
			  <a class="active item" data-tab="first">Gestion du calendrier</a>
			  <a class="item" data-tab="second">Gestion des formations</a>
			  <a class="item" data-tab="third">Gestion des demandes</a>
			</div>
		</div>
		<div class="main ui container mtop50">
			<div class="ui tab <?php if((isset($_GET['page']) && $_GET['page'] == "calendar")|| !isset($_GET['page'])) echo "active"; ?>" data-tab="first">
				<h3>Gestion du calendrier</h3>
				<hr>
				<?php include "calendar.php"; ?>
			</div>
			<div class="ui tab" data-tab="second">
				<h3>Gestion des formations</h3>
				<hr>
			</div>
			<div class="ui tab" data-tab="third">
				<h3>Gestion des demandes</h3>
				<hr>
			</div>
        </div>
    </div>
</body>
<script type="text/javascript">
	$('.menu .item').tab();
</script>
</html>