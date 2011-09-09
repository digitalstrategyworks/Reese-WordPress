$j = jQuery.noConflict();

$j(document).ready(function(){
	$j('.hja_preview_bt').live('click', function(){
		val = $j(this).attr('rel');
		openPreview($j('#' + val).val());
	});
});

function openPreview(content) {
	previewWindow = window.open('','preview','height=400,width=400');
	var tmp = previewWindow.document;
	tmp.write('<html><head><title>Preview</title></head>');
	tmp.write('<body>' + content + '</body></html>');
	previewWindow.moveTo(200,200);
	tmp.close();
}

function openSubForm(){
	subWindow = window.open('','preview','height=500,width=600');
	var tmp = subWindow.document;
	tmp.write('<html><head><title>Subscribe to Aakash Web</title>');
	tmp.write('</head><body><p><b>Select an option</b></p><ul><li><a href="http://feedburner.google.com/fb/a/mailverify?uri=aakashweb">Subscribe Now</a></li><li><a href="http://feeds2.feedburner.com/aakashweb" target="_blank">Read the feeds</a></li></ul>');
	tmp.write('</body></html>');
	subWindow.moveTo(200,200);
	tmp.close();
}

function openAddthis(){
		window.open("http://www.addthis.com/bookmark.php?v=250&username=vaakash&title=HTML Javascript Adder - Wordpress plugin&url=http://www.aakashweb.com/wordpress-plugins/html-javascript-adder/", "open_window","location=0,status=0,scrollbars=1,width=500,height=600");
}