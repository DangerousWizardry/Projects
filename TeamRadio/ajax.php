<?php
session_start();
header("Access-Control-Allow-Origin: *");
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
$result = "";
function get_ip() {
	if ( function_exists( 'apache_request_headers' ) ) {
		$headers = apache_request_headers();
	} else {
		$headers = $_SERVER;
	}
	if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
		$the_ip = $headers['X-Forwarded-For'];
	} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
	) {
		$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
	} else {
		
		$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
	}
	return $the_ip;
}
//TCHAT
if (isset($_POST['requestflow'])) {
    $lignetot = $bdd->query("SELECT COUNT(*) AS c FROM tchat")->fetch();
    $lignetot = $lignetot['c'];
    if ($lignetot <= 50) {
    $lignemin = 0;
    }
    else{
    $lignemin = $lignetot - 50;
    }
    $query = $bdd->query("SELECT * FROM tchat ORDER BY idmessage ASC LIMIT $lignemin, $lignetot");
    $ligne = $query->rowCount();
    $query = $query->fetchAll();
    $bdd = false;
    $array = array();
    if (isset($_SESSION['admin'])) {
        for ($i=0; $i < $ligne; $i++) { 
        $array[$i] = array("msg" => array("idmessage" => $query[$i]["idmessage"],"user" => $query[$i]["user"],"text" => $query[$i]["text"],"auth"=>$query[$i]["auth"],"ipuser"=>$query[$i]["ip"],"realtime"=>$query[$i]["realtime"]));
    }
    }
    else{
        for ($i=0; $i < $ligne; $i++) { 
        $array[$i] = array("msg" => array("idmessage" => $query[$i]["idmessage"],"user" => $query[$i]["user"],"text" => $query[$i]["text"],"auth"=>$query[$i]["auth"],"ipuser"=>$query[$i]["ip"],"realtime"=>$query[$i]["realtime"]));
    }
    }
    
    $array[0]["row"] = $ligne;
    echo json_encode($array);
}
if (isset($_POST['postmsg'])) {
    $user = $_POST['user'];
    $text = $_POST['text'];
    $auth = $_POST['auth'];
    if ($text != "" && $text != " " && $text != "%20" && $text != "  " && $text != "   ") {
    $time = time();
    $realtime = date("H:i");
    $ipaddress = get_ip();
    if (strtolower($user) != strtolower("TeamRadio") AND strtolower($user) != strtolower("Team Radio") AND strtolower($user) != strtolower("TeamRadioFM")) {
    $testban = $bdd->query("SELECT * FROM banned WHERE ip = '$ipaddress' AND bannedtime > ".time())->rowCount();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
    else{
        $user = $_POST['user'];
        $_SESSION['user'] = $user;
    }
    if ($testban == 0) {
        $lasttime = $bdd->query("SELECT posttime FROM tchat WHERE ip = '$ipaddress' ORDER BY idmessage DESC")->fetch();
        if (time()-$lasttime['posttime'] > 5) {
        $query = $bdd->prepare("INSERT INTO `tchat`(`user`, `text`, `auth`, `ip`, `posttime`,realtime) VALUES (?,?,?,?,?,?)");
        $query->execute(array($user,htmlspecialchars($text),0,$ipaddress,$time,$realtime));
        echo json_encode(array("type" => 2, "special" => $user));
        }
        else{
            echo json_encode(array("type" => 5, "special" => "Merci de patienter au moins 5 secondes avant de renvoyer un message"));
        }
    }
    else{
        echo json_encode(array("type" => 3, "special" => ""));
    }
    }
    else{
        if ($auth%231299 == 2) {
            $query = $bdd->prepare("INSERT INTO `tchat`(`user`, `text`, `auth`, `ip`, `posttime`,realtime) VALUES (?,?,?,?,?,?)");
            $query->execute(array($user,htmlspecialchars($text),1,$ipaddress,$time,$realtime));
            echo json_encode(array("type" => 2, "special" => $user));
        }
        else{
            echo json_encode(array("type" => 4, "special" => ""));
        }
    }
    }
    else{
        echo json_encode(array("type" => 5, "special" => "Merci de remplir le champ ''Message'' "));
    }
}
if (isset($_POST['delmsg']) && $_SESSION['admin']==1) {
    $idmsg = $_POST['delmsg'];
    if ($bdd->query("DELETE FROM tchat WHERE idmessage = $idmsg")) {
        echo "Le message a bien été supprimé";
    }
    else{
        echo "Le message est inexistant ou a déjà été supprimé";
    }
}
if (isset($_POST['killuser']) && $_SESSION['admin']==1) {
    $idmsg = $_POST['killuser'];
    $bantime = $_POST['bantime'] + time();
    $info = $bdd->query("SELECT ip,user FROM tchat Where idmessage = $idmsg")->fetch();
    $iptoban = $info['ip'];
    $user = $info['user'];
    if ($bdd->query("INSERT INTO `banned`(`ip`, `bannedtime`, `motif`) VALUES ('$iptoban',$bantime,'Ban de $user')")) {
        if ($_POST['delall'] == 1) {
            $bdd->query("DELETE FROM tchat WHERE ip = '$iptoban'");
            echo "Cette adresse ip a bien été bannie pour une durée de ". $_POST['bantime']. " secondes et tout ses messages ont été supprimés";
        }
        else{
            echo "Cette adresse ip a bien été bannie pour une durée de ". $_POST['bantime']. " secondes et tout ses messages ont été supprimés";
        }
        
    }
    else{
        echo "Une erreur est survenue";
    }
}
//AJAX STATS ANALYTICS
//POST
if (isset($_POST['is_playing']) || isset($_POST['is_navigating'])) {
    $ipaddress = get_ip();
    if ($_POST['is_playing'] == 1) {
        require_once 'plugins/MobileDetect/Mobile_Detect.php';
        $detect = new Mobile_Detect;
        if( $detect->isTablet() ){
            $bdd->query("INSERT INTO listener_log(ip,dates,datatime,type) VALUES('$ipaddress',NOW(),".time().",2)");
        }
        elseif( $detect->isMobile() && !$detect->isTablet() ){
            $bdd->query("INSERT INTO listener_log(ip,dates,datatime,type) VALUES('$ipaddress',NOW(),".time().",3)");
        }
        else{
            $bdd->query("INSERT INTO listener_log(ip,dates,datatime,type) VALUES('$ipaddress',NOW(),".time().",1)");
        }
        
    }
    $bdd->query("INSERT INTO viewer_log(ip,dates,datatime) VALUES('$ipaddress',NOW(),".time().")");
    
}
if (isset($_POST['geotarget'])) {
    $ipaddress = $_POST['ip'];
    $countrycode = $_POST['countrycode'];
    $bdd->query("INSERT INTO geo_log(ip,datatime,country_code) VALUES('$ipaddress',".time().",'$countrycode')");
}
//GET
if (isset($_POST['getinstantlisteners'])) {
    $timecheck = time()-30;
    $audit = $bdd->query("SELECT COUNT(*) AS a FROM listener_log WHERE datatime > $timecheck")->fetch();
    echo $audit["a"];
}
if (isset($_POST['gettotalviewer'])) {
    $audit = $bdd->query("SELECT COUNT(DISTINCT ip) AS a FROM viewer_log")->fetch();
    echo $audit["a"];
}
if (isset($_POST['getlistenersbyhour'])) {
    $date = date("Y-m-d H:00");
    $date = date_create_from_format('Y-m-d H:i', $date);
    $basetimestamp = $date->getTimestamp();
    for ($i=0; $i < 23; $i++) {
        $date = date_sub($date, date_interval_create_from_date_string("1 hours"));
        $array[$i]['time'] = date_format($date, 'Y-m-d H:i');
        $timesup = $basetimestamp - ($i*3600);
        $timemin = $basetimestamp - (($i+1)*3600);        
        $info = $bdd->query("SELECT COUNT(DISTINCT ip) AS a FROM listener_log WHERE datatime < $timesup AND datatime > $timemin")->fetch();
        $array[$i]['auditeurs'] = $info['a'];
    }
    echo json_encode($array);
}
if (isset($_POST['getlistenersbymin'])) {
    $date = date("Y-m-d H:i:00");
    $date = date_create_from_format('Y-m-d H:i:s', $date);
    $basetimestamp = $date->getTimestamp();
    for ($i=0; $i < 30; $i++) {
        $date = date_sub($date, date_interval_create_from_date_string("1 minute"));
        $timesup = $basetimestamp - ($i*60);
        $timemin = $basetimestamp - (($i+1)*60);        
        $info = $bdd->query("SELECT COUNT(DISTINCT ip) AS a FROM listener_log WHERE datatime < $timesup AND datatime > $timemin")->fetch();
        $result .= $info['a'];
        if ($i!=29) {
            $result .= ",";
        }
    }
    echo $result;
}
if (isset($_POST['getconnectedbymin'])) {
    $date = date("Y-m-d H:i:00");
    $date = date_create_from_format('Y-m-d H:i:s', $date);
    $basetimestamp = $date->getTimestamp();
    for ($i=0; $i < 30; $i++) {
        $date = date_sub($date, date_interval_create_from_date_string("1 minute"));
        $timesup = $basetimestamp - ($i*60);
        $timemin = $basetimestamp - (($i+1)*60);        
        $info = $bdd->query("SELECT COUNT(DISTINCT ip) AS a FROM viewer_log WHERE datatime < $timesup AND datatime > $timemin")->fetch();
        $result .= $info['a'];
        if ($i!=29) {
            $result .= ",";
        }
    }
    echo $result;
}
if (isset($_POST['gettchatstats'])) {
    $date = date("Y-m-d H:i:00");
    $date = date_create_from_format('Y-m-d H:i:s', $date);
    $basetimestamp = $date->getTimestamp();
    for ($i=0; $i < 30; $i++) {
        $date = date_sub($date, date_interval_create_from_date_string("1 minute"));
        $timesup = $basetimestamp - ($i*60);
        $timemin = $basetimestamp - (($i+1)*60);        
        $info = $bdd->query("SELECT COUNT(*) AS a FROM tchat WHERE posttime < $timesup AND posttime > $timemin")->fetch();
        $result .= $info['a'];
        if ($i!=29) {
            $result .= ",";
        }
    }
    echo $result;
}
if (isset($_POST['getuseragent'])) {
    $listtype = $bdd->query("SELECT DISTINCT type FROM listener_log WHERE datatime > ". time()." - 86400");//86400
    $distinct_type = $listtype->rowCount();
    $listtype = $listtype->fetchAll();
    $nbtotallog = $bdd->query("SELECT idlog FROM listener_log WHERE datatime > ". time()." - 86400")->rowCount();
    for ($i=0; $i < $distinct_type; $i++) {   
        $array["type".$listtype[$i]["type"]] = ($bdd->query("SELECT idlog FROM listener_log WHERE type = '". $listtype[$i]["type"] ."' AND datatime > ". time()." - 86400")->rowCount()/$nbtotallog)*100;
    }
    if (!isset($array["type1"])) {
        $array["type1"]=0;
    }
    if (!isset($array["type2"])) {
        $array["type2"]=0;
    }
    if (!isset($array["type3"])) {
        $array["type3"]=0;
    }
    echo json_encode($array);
}
if (isset($_POST['getnews'])) {
    $news = $bdd->query("SELECT value FROM config WHERE name ='msg_player'")->fetch();
    echo $news['value'];
}
if (isset($_POST["blog_like"])) {
    $data = $_POST['data'];
    $ipaddress = get_ip();
    $info = $bdd->query("SELECT idpost FROM blog_like_counter WHERE ip = '$ipaddress' AND idpost IN ($data) ORDER BY idpost DESC")->fetchAll();
    $i=0;
    if ($info) {
	    foreach ($info as $value) {
	    	$array[$i]["idpost"] = $value['idpost'];
	    	$i++;
	    }
	    $array[0]["totalinput"] = $i;
	    echo json_encode($array);
    }
    else{
        $array[0]["totalinput"] = $i;
    	echo json_encode($array);
    }
}
if (isset($_POST["blog_put_like"])) {
	$data = $_POST['data'];
    $ipaddress = get_ip();
    if ($_POST['active'] == 0) {
        $query = $bdd->prepare("INSERT INTO blog_like_counter(idpost,ip) VALUES (?,?)");
        $query->execute(array($data,$ipaddress));
        $nb_like = $bdd->query("SELECT COUNT(DISTINCT ip) AS c FROM blog_like_counter WHERE idpost = $data")->fetch();
        $bdd->query("UPDATE blog SET love = ". $nb_like['c'] ." WHERE idpost = $data");
    }
    else{
        $bdd->query("DELETE FROM blog_like_counter WHERE idpost = $data AND ip = '$ipaddress'");
        $nb_like = $bdd->query("SELECT COUNT(DISTINCT ip) AS c FROM blog_like_counter WHERE idpost = $data")->fetch();
        $bdd->query("UPDATE blog SET love = ". $nb_like['c'] ." WHERE idpost = $data");
    }
}
if (isset($_POST["get_total_like"])) {
    $data = $_POST['data'];
    $dataarray = explode(",", $data);
    $ipaddress = get_ip();
    $i=0;
    $array = array();
    foreach ($dataarray as $value) {
        $array[$i]["idpost"] = $value;
        $info = $bdd->query("SELECT COUNT(DISTINCT ip) AS c FROM blog_like_counter WHERE idpost = $value")->fetch();
        if ($info) {
            $array[$i]["like_count"] = $info['c'];
        }
        else{
            $array[$i]["like_count"] = 0;
        }
        $i++;
    }
    $array[0]["totalinput"] = $i;
    echo json_encode($array);
}
?>