$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	var logLimit = getUrlVars()["logLimit"];
	if(logLimit > "1") {
		$("ul.tabs li:nth-child(2)").addClass("active").show();
		$(".tab_content:nth-child(2)").show();
	} else {
		$("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(".tab_content:first").show(); //Show first tab content
	}
	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});
	function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
	});
		return vars;
	}

});
