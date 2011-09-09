<?php


	//xml from questions questions database

        header("Content-Type: text/xml");
        print "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
	print "<questions>\n";
	foreach($questions as $scenario){
		print "<scenario>\n";
		foreach($scenario as $key=>$val){
			print "  <$key>$val</$key>\n";
		}
		print "</scenario>\n";	
	}
	print "</questions>";

?>
