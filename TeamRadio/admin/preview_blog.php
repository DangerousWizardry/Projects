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
if (isset($_GET['blog_id'])) {
  $query = $bdd->query("SELECT * FROM blog WHERE idblog = ".$_GET['blog_id']);
  $ligne = $query->rowCount();
  $data = $query->fetch();
  if ($ligne != 0) {
    $preview = "
    <div class='box-body'>
      <h1>". htmlspecialchars_decode($data['titre']) ."</h1>
      <img src='../". $data['photo'] ."' width='100px' height='120px' style='float:left;margin:10px;'>
      <p>". htmlspecialchars_decode($data['texte'])  ."</p>          
    </div>
    <div class='box-header with-border'>
      <h3 class='box-title'><i class='fa fa-tag'></i> Date de Publication : ".  $blog_date = date('d/m/Y H:i', strtotime($data['date']))."</h3>
      <div style='float:right;'><div class='btn-group'>
        <form method='POST' action='edit_post.php' style='display:inline-block;float:left;'><input type='hidden' name='edit_id' value='". $_GET['blog_id'] ."'>
          <button type='submit' class='btn btn-warning' style='border-radius: 0;'><i class='fa fa-pencil'></i></button>
          </form>
        <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deletemodal". $_GET['blog_id'] ."'><i class='fa fa-trash'></i></button>
      </div></div>
    </div>";
    $preview .= '
          <div class="modal modal-danger fade" id="deletemodal'. $_GET['blog_id'] .'" tabindex="-1" role="dialog" aria-labelledby="myLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Suppression de l\'article</h4>
              </div>
              <div class="modal-body">
                <p>Êtes vous sûr de vouloir supprimer cet article ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <form method="POST" action="" style="display:inline-block;"><input type="hidden" name="delete_id" value="'. $_GET['blog_id'] .'">
                <button type="submit" class="btn btn-outline">Valider la suppression</button>
                </form>
              </div>
            </div>
          </div>
        </div>';
  }
  else{
    $preview = '<br><div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Erreur</h4>
                Merci de donner un Blog_Id valide pour pouvoir obtenir un aperçu...
              </div>';
  }
}
else{
  header("Location:edit_blog.php");
}
if (isset($_POST['delete_id'])) {
  $bdd->query("DELETE FROM blog WHERE idblog = ". $_POST['delete_id']);
  $preview = '<br><div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Information</h4>
                Le post a bien été supprimé !
              </div><br>';
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
          Mode Apercu
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
            <a style="width:230px;" class="btn btn-block btn-primary" href="edit_blog.php"><i class="fa fa-arrow-circle-left"></i> Retourner sur la liste des articles</a>
            <?php
              echo $preview;
            ?>
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
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
</body>
</html>
