<?php

	//xml from shark discuss database
        header("Content-Type: text/xml");
        print "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
        print "<discuss>\n";
	foreach($discuss as $entry){
		print "<entry>\n";
		foreach($entry as $key=>$val){
			print "  <$key>$val</$key>\n";
		}
		print "</entry>\n";	
	}
	print "</discuss>";

?>
