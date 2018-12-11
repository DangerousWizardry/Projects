$.ajaxSetup({
error: function(xhr, status, error) {
alert("An AJAX error occured: " + status + "\nError: " + error + "\nError detail: " + xhr.responseText);
     } 
    });
function getliked(){
	var idpost;
	var senddata = '';
	$( "a[type='like']" ).each(function() {
	if (typeof $( this ).attr("idpost") !== 'undefined') {
		senddata += $( this ).attr("idpost") + ",";
	}
	});
	senddata = senddata.slice(0, -1);
	$.post("ajax.php", "blog_like=1&data=" + senddata, function(data){
		for (i = 0; i <= data[0].totalinput-1; i++) { 
			$("a[idpost='"+ data[i].idpost +"']")
			.attr("class","isliked like_button")
			.attr("onclick","sendlike("+ data[i].idpost +",1)")
			;
			}
},"json");
}
getliked();
$(".like_button").click(function(){
        return false;
})
function sendlike(data,like){
	$.post("ajax.php", "blog_put_like=1&data=" + data +"&active=" + like, function(other){
		$("a[idpost='"+ data +"']").attr("class","like_button")
		.attr("onclick","sendlike("+ data +",0)")
		;
		getliked();
		gettotalliked();
});
}
function gettotalliked(){
	var idpost;
	var senddata = '';
	$( "span[type='like_count']" ).each(function() {
	if (typeof $( this ).attr("like_id") !== 'undefined') {
		senddata += $( this ).attr("like_id") + ",";
	}
	});
	senddata = senddata.slice(0, -1);
	$.post("ajax.php", "get_total_like=1&data=" + senddata, function(data){
		for (i = 0; i <= data[0].totalinput-1; i++) {
			$("span[like_id='"+ data[i].idpost +"']").html(data[i].like_count);
			}
},"json");
}
gettotalliked();