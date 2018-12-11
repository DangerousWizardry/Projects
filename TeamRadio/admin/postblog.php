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
if ($_SESSION['admin']!=1) {
  header("Location:https://teamradio.000webhostapp.com/");
}
if (isset($_POST['formadd'])) {
  if (!empty($_POST['blog_titre']) && !empty($_POST['blog_texte']) && !empty($_POST['blog_date'])) {
    $blog_titre = htmlspecialchars($_POST['blog_titre']);
    $blog_texte = htmlspecialchars($_POST['blog_texte']);
    $blog_date = date('YmdHis', strtotime($_POST['blog_date']));
    if ($_FILES['blog_img']['size']) {
      $uid = time().basename($_FILES['blog_img']['name']);
      $uploadfile = "../img/blog/".$uid;
      if ($_FILES['blog_img']['type'] == "image/gif" || $_FILES['blog_img']['type'] == "image/png" || $_FILES['blog_img']['type'] == "image/x-citrix-png" || $_FILES['blog_img']['type'] == "image/x-png" || $_FILES['blog_img']['type'] == "image/jpeg" || $_FILES['blog_img']['type'] == "image/x-citrix-jpeg") {
        if (move_uploaded_file($_FILES['blog_img']['tmp_name'], $uploadfile)) {
          $query = $bdd->prepare("INSERT INTO `blog`(`titre`, `texte`, `photo`, `date`) VALUES (?,?,?,?)");
          if ($query->execute(array($blog_titre,$blog_texte,"img/blog/".$uid,$blog_date))) {
            $callback = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Requête effectuée !</h4>
                Votre article a bien été posté/programmé<br>
                <a href="https://teamradio.000webhostapp.com/admin/edit_blog.php">Retourner sur la liste des articles</a>
                </div>';
          }
          else{
            $callback = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Erreur !</h4>
                Une erreur est survenue merci de vérifier les informations rentrée !
              </div>';

          }
        } else {
                $callback = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Erreur dans l\'envoi de l\'image !</h4>
                Merci de vérifier le format et la taille du fichier
              </div>';
        }
      }
      else{
    $callback = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Format Incorrect !</h4>
                Merci d\'utiliser un format PNG/JPEG/JPG/GIF pour votre fichier
              </div>';
  }
    }
    else{
      $query = $bdd->prepare("INSERT INTO `blog`(`titre`, `texte`, `photo`, `date`) VALUES (?,?,?,?)");
          if ($query->execute(array($blog_titre,$blog_texte,"img/logo_mini.png",$blog_date))) {
            $callback = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Requête effectuée !</h4>
                Votre article a bien été posté/programmé
              </div>';
          }
          else{
            $callback = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Erreur !</h4>
                Une erreur est survenue merci de vérifier les informations rentrée !
              </div>';

          }
    }
  }
  else{
    $callback = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Erreur dans la rêquête !</h4>
                Merci de remplir tout les champs
              </div>';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <title>Team Radio - Administration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../img/apple-touch-icon-114x114.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- Custom ScrollBar/ScrollBox -->
<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" target="_blank" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TR</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>TeamRadio</b> FM</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-th"></i> <span>Panneau Principal</span>
          </a>
        </li>
        <li>
          <a href="editmp.php">
            <i class="fa fa-edit"></i> <span>Editez la page d'accueil</span>
          </a>
        </li>
        <li class="active">
          <a href="edit_blog.php">
            <i class="fa fa-newspaper-o"></i> <span>Gestion du Blog</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editez le blog
        <small>Article, texte, photos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="edit_blog.php">Gestion du Blog</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-body">
        <h3>Ajouter un article</h3>
        <br>
        <form enctype="multipart/form-data" action="" method="post">
  <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
        <p><b>Titre de l'article :</b></p>
        <input type="text" placeholder="Titre de l'article" name="blog_titre" class="form-control">
        <br>
        <p><b>Texte :</b></p>
          <div>
            <textarea class="textarea" name="blog_texte" placeholder="Texte de l'article" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>
        <br>
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <p><b>Photo (120x150) : <input type="file" name="blog_img" class="form-control"></b></p>
        <i>Format : PNG/JPEG/JPG/GIF (10Mo max)</i>
        <br>
        <br>
        <p><b>Date de publication :</b></p>
        <input type="text" name="blog_date" />
        <br>
        <br>
        <center><button type="submit" style="width:150px;" class="btn btn-block btn-primary" name="formadd">Ajouter l'article</button></center>
        </form>
        <br>
        <?php if (isset($callback)) {
          echo $callback;
        } ?>
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript">$(".textarea").wysihtml5();</script>
<script type="text/javascript">
$(function() {
    $('input[name="blog_date"]').daterangepicker({
      "singleDatePicker": true,
      "showDropdowns": true,
      "timePicker": true,
      "timePicker24Hour": true,
      "drops": "up",
      timePickerIncrement: 05,
      locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    })
});
</script>
</body>
</html>
