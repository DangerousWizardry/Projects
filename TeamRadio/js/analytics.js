function analytics() {
	var classlist = $("#jp_container_1").attr("class");
	if (classlist.includes("state-playing")) {
		$.post("ajax.php", "is_playing=1");
	}
	else{
		$.post("ajax.php", "is_navigating=1");
	}
}
$.getJSON('//freegeoip.net/json/?callback=?', function(data) {
  var countrycode = data['country_code'];
  var ip = data['ip'];
  $.post("ajax.php", "geotarget=1&ip="+ip+"&countrycode="+countrycode);
});