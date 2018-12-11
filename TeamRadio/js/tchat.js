function getmsg(){
	$.post("/ajax.php", "requestflow=1", function(data){
			var datatoreturn = "";
			for (i = 0; i <= data[0].row-1; i++) { 
				if (data[i].msg.auth == 0) {
					datatoreturn = datatoreturn + "<div class='msg' msgid='"+ data[i].msg.idmessage +"'><span>"+ data[i].msg.user +" : </span>"+ data[i].msg.text +"<div class='posttime'>"+ data[i].msg.realtime +"</div></div>";
				}
				else{
					datatoreturn = datatoreturn + "<div class='msg' msgid='"+ data[i].msg.idmessage +"'><i>"+ data[i].msg.user +" : </i>"+ data[i].msg.text +"<div class='posttime'>"+ data[i].msg.realtime +"</div></div>";
				}
			}
			callback(1,datatoreturn);
    },"json");
			
}
//idmessage,user,text,auth
function postmsg(user,posttext,auth){
	var text = encodeURIComponent(posttext);
	$.post("../ajax.php","postmsg=1&user="+ user +"&text="+ text+"&auth="+auth,function(data){
			callback(data.type,data.special);
    },"json")
}