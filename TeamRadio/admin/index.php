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
if (!isset($_SESSION['admin'])||$_SESSION['admin']!=1) {
        header("Location:/");
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
        <li class="active">
          <a href="index.php">
            <i class="fa fa-th"></i> <span>Panneau Principal</span>
          </a>
        </li>
        <li>
          <a href="editmp.php">
            <i class="fa fa-edit"></i> <span>Editez la page d'accueil</span>
          </a>
        </li>
        <li>
          <a href="edit_blog.php">
            <i class="fa fa-newspaper-o"></i> <span>Gestion du Blog</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><span id="listenersvalue"><div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div></span></h3>

              <p>Auditeurs</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-headphones" style="font-size: 30px"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><span id="totalviewervalue"><div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div></span></h3>

              <p>Visiteurs uniques</p>
            </div>
            <div class="icon">
              <i class="fa fa-eye" style="font-size: 35px"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div></h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Graphique des Auditeurs</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" id="knob1" class="knob" data-readonly="true" value="100" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Ordinateur</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" id="knob2" class="knob" data-readonly="true" value="100" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Téléphone</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <input type="text" id="knob3" class="knob" data-readonly="true" value="100" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Tablette</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>
              <h3 class="box-title">Chat</h3>
            </div>
            <center>
                        <div id="tchat">
            <div id="msgcontainer">
            </div>
            <input type="text" id="tchatinput_1" placeholder="Votre Pseudo" <?php if (isset($_SESSION['user'])){ echo 'value="'.$_SESSION['user'].'" disabled'; } ?>>
            <input type="text" id="tchatinput_2" placeholder="Votre message ..." maxlength="550">
            <span class="text-alert" id="notmsg" style="display: none;"></span>
            <button id="tchatinput_3" onclick="senddata();">Envoyer le message</button>
            </div></center>
            <div id="admincase"></div>
            <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Bannir un utilisateur</h4>
                </div>
                <div class="modal-body">
                    <p>Pour combien de temps souhaitez vous bannir cet ip ?</p>
                    <select id="selecttime">
                      <option value="300">5 minutes</option>
                      <option value="900">15 minutes</option>
                      <option value="1800">30 minutes</option>
                      <option value="3600">1 heure</option>
                      <option value="7200">2 heures</option>
                      <option value="14400">4 heures</option>
                      <option value="43200">12 heures</option>
                      <option value="86400">1 jour</option>
                      <option value="259200">3 jours</option>
                      <option value="604800">1 semaine</option>
                      <option value="1209600">2 semaines</option>
                      <option value="2419200">1 mois</option>
                      <option value="99999999999">Définitivement</option>
                    </select>
                    <br>
                    <br>
                    <p>Supprimer tout les messages de cette ip ?</p>
                    <select id="delall">
                      <option value="0">Non</option>
                      <option value="1">Oui</option>
                    </select>
                    <br>
                    <i>Cette action est définitive</i>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="killuser()" data-dismiss="modal">Bannir l'IP</button>
                </div>
            </div>
        </div>
    </div>
            <div class="box-footer">
            </div>
          </div>
          <!-- /.box (chat box) -->
          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Auditeurs
              </h3>
            </div>
            <div class="box-body">
              <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-1"></div>
                  <div class="knob-label">Auditeurs</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-2"></div>
                  <div class="knob-label">Connectés</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <div id="sparkline-3"></div>
                  <div class="knob-label">Activité Tchat</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="config.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Tchat -->
<script type="text/javascript" src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="../js/tchat.php"></script>
<script type="text/javascript" src="getanalytics.js"></script>
<script type="text/javascript">
  function callback(id,data){
    if (id == 5) {
      document.getElementById("listenersvalue").innerHTML = data;
    }
    else if (id == 6){
    	document.getElementById("totalviewervalue").innerHTML = data;
    }
  }
        (function($){
   $(window).load(function(){
      $("#msgcontainer").mCustomScrollbar({
        axis:"y",
        theme:"minimal-dark",
        live: "on",
        advanced:{
            updateOnContentResize: true    
        }
    });
   });
})(jQuery);
    $("#tchatinput_2").keypress(function(e) {
    if(e.which == 13) {
        senddata();
    }
    });
    function adminclick(idmessage){
        $("#admincase").html($("#msgid" + idmessage).text() + "<div class='panadmin msg'><a href='#myModal' data-toggle='modal' role='button'><div class='user' idmsg='"+ idmessage +"'></div></a><div class='trash' id='delmsg' idmsg='"+ idmessage +"'></div></div>");
        $("#admincase").css("display","inline-block");
    $("#delmsg").click(function() {
      $.post("/ajax.php", "delmsg="+$( "#delmsg" ).attr("idmsg"), function(data){
      $("#admincase").html(data);
    });
  });
    }
    function killuser(){
      $.post("/ajax.php", "killuser="+$( "#delmsg" ).attr("idmsg")+"&bantime="+$("#selecttime").val()+"&delall="+$("#delall").val(), function(data){
      $("#admincase").html(data);
    });
    }
    function senddata(){
        var auth = <?php if ($_SESSION['admin']==1) {echo (rand()*231299)+2;}else{echo 0;}?>;
        var user = $("#tchatinput_1").val();
        var text = $("#tchatinput_2").val();
        if (postmsg(user,text,auth)) {
            getdata();
        }
    }
    getmsg();
    function callbacktchat(type,data){
        if (type==1) {
        if (data) {
            if (data != $("#msgcontainer .mCSB_container").html()) {
                $("#msgcontainer .mCSB_container").html(data);
                $("#msgcontainer").mCustomScrollbar("update");   
                $('#msgcontainer').mCustomScrollbar('scrollTo','last');
            }
        }
        else{
            $("#msgcontainer .mCSB_container").html("<div class='msg'>Aucun message à afficher</div>");
        }
        }
        else if(type==2){
            document.getElementById("notmsg").style = "display:none;";
            document.getElementById("tchatinput_1").value = data;
            document.getElementById("tchatinput_1").disabled = "disabled";
            document.getElementById("tchatinput_2").value = "";
            getmsg();
        }
        else if(type==3){
            document.getElementById("notmsg").style = "color:red;display:block;";
            document.getElementById("notmsg").innerHTML = "Vous avez été banni !";
            document.getElementById("tchatinput_1").value = "";
            document.getElementById("tchatinput_1").disabled = "disabled";
            document.getElementById("tchatinput_2").value = "";
            document.getElementById("tchatinput_2").disabled = "disabled";
        }
        else if(type==4){
            document.getElementById("notmsg").style = "color:red;display:block;";
            document.getElementById("notmsg").innerHTML = "Merci d'utiliser un autre pseudo";
            document.getElementById("tchatinput_1").value = "";
            document.getElementById("tchatinput_1").disabled = "";
        }
        else if(type==5){
            document.getElementById("notmsg").style = "color:red;display:block;";
            document.getElementById("notmsg").innerHTML = data;
        }
    }
    getlistener();
    getlistenersbyhour();
    getlistenersbymin();
    getconnectedbymin();
    gettchatstats();
    getuseragent();
    gettotalviewer();
    setInterval(function() {getmsg(0);},5000);
    setInterval(function() {getlistener();},35000);
    setInterval(function() {gettotalviewer();},60000);
    setInterval(function() {getlistenersbyhour();},900000);
    setInterval(function() {getlistenersbymin();},60000);
    setInterval(function() {getconnectedbymin();},60000);
    setInterval(function() {gettchatstats();},60000);
    setInterval(function() {getuseragent();},60000);
    var visitorsData = <?php 
    $country_code = $bdd->query("SELECT DISTINCT country_code FROM geo_log WHERE datatime > ". time()." - 86400");
    $distinct_geo = $country_code->rowCount();
    $country_code = $country_code->fetchAll();
    $nbtotallog = $bdd->query("SELECT idgeo FROM geo_log WHERE datatime > ". time()." - 86400")->rowCount();
    for ($i=0; $i < $distinct_geo; $i++) {   
        $array[$country_code[$i]["country_code"]] = ($bdd->query("SELECT idgeo FROM geo_log WHERE country_code = '". $country_code[$i]["country_code"] ."' AND datatime > ". time()." - 86400")->rowCount()/$nbtotallog)*100 . "%";
    }
    echo json_encode($array);
     ?>;
    $('#world-map').vectorMap({
    map: 'world_mill_en',
    backgroundColor: "transparent",
    regionStyle: {
      initial: {
        fill: '#e4e4e4',
        "fill-opacity": 1,
        stroke: 'none',
        "stroke-width": 0,
        "stroke-opacity": 1
      }
    },
    series: {
      regions: [{
        values: visitorsData,
        scale: ["#92c1dc", "#ebf4f9"],
        normalizeFunction: 'polynomial'
      }]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != "undefined")
        el.html(el.html() + ': ' + visitorsData[code] + ' des visiteurs');
    }
  });
    </script>
</body>
</html>
