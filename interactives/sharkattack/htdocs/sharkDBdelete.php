<?
        $link = mysql_connect('localhost', 'reesenewsshark', 'X9unc1RFDN');
	mysql_select_db("sharkDB");

	//to delete somethng from the table. can also say something like: WHERE age <20. deleting will not change other id numbers. once 1 is deleted, it is gone forever
	$sql = "DELETE FROM discuss WHERE id = '$_REQUEST[id]'";
	$delete = mysql_query($sql);
	
	//Call xml from our xml php
	require_once("discussXML.php");
	
	function fetch_all_array($query){
		$data = array();
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$data[] = $row;	
		}	
		return $data;
	}
?>
