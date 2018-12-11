<?php
session_start();
?>
<div style="text-align:center">
<h1>REDIRECTION EN COURS</h1>
<img src="img/loading_anim.gif" width="200">
</div>
<script type="text/javascript">
	setTimeout(function() {
  document.location.href="index.php";
},5000);
</script>