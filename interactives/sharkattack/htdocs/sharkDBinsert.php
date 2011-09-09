<?
//dynamic php file that accepts information from a form. get this form working from flash. want to merge with connect to DB from output
	//first connect to the server
        $link = mysql_connect('localhost', 'reesenewsshark', 'X9unc1RFDN');

	//next, select database within the server to work with
	mysql_select_db("sharkDB");
	
	//DELETE ANY PRINT STATEMENT OTHER THAN THE XML LISTBEFORE TRYING TO HOOK UP WITH FLASH. now insert
	$insertSQL = "INSERT INTO discuss (name, comment) VALUES ('$_REQUEST[name]', '$_REQUEST[comment]')";
	$insertResult = mysql_query($insertSQL);
	
	$sql = "SELECT * FROM discuss";
	//The result of the function fetch_all_array is being stored in this variable. 
	$discuss = fetch_all_array($sql);
	
	//Call xml from our xml php
	require_once("discussXML.php");
	
	
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
?>
