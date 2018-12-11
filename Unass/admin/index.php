<?php
session_start();
if (isset($_POST['sublog'])) {
	if ($_POST['login'] == "admin" && $_POST['pass'] == "motdepasse") {
		$_SESSION['admin'] = 1;
		header("Location:gestion.php");
	}
}

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
</head>
<body class="admin">
    <header class="center">
        <div class="iblock"><img id="logo" class="iblock" src="../assets/logo.jpg"></div>
    </header>
    <div id="content">
        <div class="ui center container">
            <div class="ui centered grid">
                <div class="sixteen wide mobile eight wide computer column">
                    <h1>Connexion</h1>
                    <form class="ui form" method="POST" action="">
                        <div class="field">
                            <label>Login</label>
                            <input type="text" name="login">
                        </div>
                        <div class="field">
                            <label>Mot de passe</label>
                            <input type="password" name="pass">
                        </div>
                        <input class="ui primary button" type="submit" name="sublog">
                    </form>
                </div>
            </div>    
        </div>
    </div>
</body>
</html>