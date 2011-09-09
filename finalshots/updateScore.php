<?php

	$flashRAW = file_get_contents("php://input");
		
	$flashXML = simplexml_load_string($flashRAW);
	
	$xmlFile = "HighScores.xml";
	$xmlHandle = fopen($xmlFile, "w");
	
	$xmlString = $flashXML->asXML();
	
	echo($xmlString);
	
	fwrite($xmlHandle, $xmlString);

?>
