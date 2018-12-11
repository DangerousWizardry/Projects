function getlistener() {
$.post("https://teamradio.000webhostapp.com/ajax.php", "getinstantlisteners=1", function(data){
		callback(5,data);
    },"json");
			
}
function gettotalviewer() {
$.post("https://teamradio.000webhostapp.com/ajax.php", "gettotalviewer=1", function(data){
		callback(6,data);
    },"json");
			
}
function getlistenersbyhour() {
$.post("https://teamradio.000webhostapp.com/ajax.php", "getlistenersbyhour=1", function(data){
		auditbyhour(data);
    },"json");
			
}
function getlistenersbymin() {
$.post("https://teamradio.000webhostapp.com/ajax.php", "getlistenersbymin=1", function(data){
		auditbymin(data);
    });	
}
function getconnectedbymin() {
$.post("https://teamradio.000webhostapp.com/ajax.php", "getconnectedbymin=1", function(data){
		connectedbymin(data);
    });		
}
function gettchatstats() {
$.post("https://teamradio.000webhostapp.com/ajax.php", "gettchatstats=1", function(data){
		tchatstats(data);
    });		
}
function getuseragent(){
	$.post("https://teamradio.000webhostapp.com/ajax.php", "getuseragent=1", function(data){
		useragent(data);
    });		
}