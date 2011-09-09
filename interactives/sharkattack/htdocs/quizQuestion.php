<?
	//first connect to the server
        $link = mysql_connect('localhost', 'reesenewsshark', 'X9unc1RFDN');
	//next, select database within the server to work with
	mysql_select_db("sharkDB");
	//command for database. * collects all the information rather than something like: id,first 
	$sql = "SELECT * FROM questions INNER JOIN answers ON questions.id=answers.question_id";
	
	
	//create a place to store the result of the fetch array function below
	$questions = fetch_all_array($sql);
	

	//Call xml from our xml php
	require_once("quizQuestionXML.php");
	
	
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
