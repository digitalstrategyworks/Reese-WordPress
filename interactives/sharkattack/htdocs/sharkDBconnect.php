<?



	//first connect to the server
	$link = mysql_connect('localhost', 'reesenewsshark', 'X9unc1RFDN');
	//next, select database within the server to work with
	mysql_select_db("sharkDB");
	//command for database. * collects all the information rather than something like: id,first 
	$sql = "SELECT * FROM discuss";
	//create a place to store the result of the fetch array function below
	$discuss = fetch_all_array($sql);

        //xml from shark discuss database
        header("Content-Type: text/xml");
        print "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n\n";
        print "<discuss>\n";
        foreach($discuss as $entry){
                print "<entry>\n";
                foreach($entry as $key=>$val){
                        print "  <$key>$val</$key>\n";
                }
                print "</entry>\n";
        }
        print "</discuss>";
	
	
	function fetch_all_array($query){
		$data = array();
		//create a result for the query passed 
		$result = mysql_query($query);
		//create a while loop that says: while there is still more info, continue to loop and store in data
		while($row = mysql_fetch_assoc($result)){
			$data[] = $row;	
		}	
		return $data;
	}

        mysql_close($link);


// John's test stuff
$outfile = "/var/www/vhosts/reesefelts.org/httpdocs/interactives/sharkattack/htdocs/johntest.txt";
$content = "john clark\n";

$handle = fopen($outfile, 'a');
fwrite($handle, $content);
fclose($handle);


?>
