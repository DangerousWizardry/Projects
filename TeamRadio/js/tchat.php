<?php
session_start();
header("Content-Type:application/javascript");
if (isset($_SESSION['admin'])) {
?>
function getmsg(){
	$.post("https://teamradio.000webhostapp.com/ajax.php", "requestflow=1", function(data){
			var datatoreturn = "";
			for (i = 0; i <= data[0].row-1; i++) { 
				if (data[i].msg.auth == 0) {
					datatoreturn = datatoreturn + "<div class='msg' id='msgid"+ data[i].msg.idmessage +"'><span onclick='adminclick(\""+ data[i].msg.idmessage +"\")'>"+ data[i].msg.user + " (" + data[i].msg.ipuser +") : </span>"+ data[i].msg.text +"<div class='posttime'>"+ data[i].msg.realtime +"</div></div>";
				}
				else{
					datatoreturn = datatoreturn + "<div class='msg' msgid='"+ data[i].msg.idmessage +"'><i>"+ data[i].msg.user + " (" + data[i].msg.ipuser +") : </i>"+ data[i].msg.text +"<div class='posttime'>"+ data[i].msg.realtime +"</div></div>";
				}
			}
			callbacktchat(1,datatoreturn);
    },"json");
			
}
//idmessage,user,text,auth
function postmsg(user,posttext,auth){
	var text = encodeURIComponent(posttext);
	$.post("https://teamradio.000webhostapp.com/ajax.php","postmsg=1&user="+ user +"&text="+ text+"&auth="+auth,function(data){
			callbacktchat(data.type,data.special);
    },"json")
}
<?php
}
else{
?>
function getmsg(){
	$.post("https://teamradio.000webhostapp.com/ajax.php", "requestflow=1", function(data){
			var datatoreturn = "";
			for (i = 0; i <= data[0].row-1; i++) { 
				if (data[i].msg.auth == 0) {
					datatoreturn = datatoreturn + "<div class='msg'><span>"+ data[i].msg.user +" : </span>"+ data[i].msg.text +"<div class='posttime'>"+ data[i].msg.realtime +"</div></div>";
				}
				else{
					datatoreturn = datatoreturn + "<div class='msg'><i>"+ data[i].msg.user +" : </i>"+ data[i].msg.text +"<div class='posttime'>"+ data[i].msg.realtime +"</div></div>";
				}
			}
			callbacktchat(1,datatoreturn);
    },"json");
			
}
//idmessage,user,text,auth
function postmsg(user,posttext,auth){
	var text = encodeURIComponent(posttext);
	$.post("https://teamradio.000webhostapp.com/ajax.php","postmsg=1&user="+ user +"&text="+ text+"&auth="+auth,function(data){
			callbacktchat(data.type,data.special);
    },"json")
}
<?php
}
?>