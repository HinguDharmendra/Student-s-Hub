<?php

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
	or die('Error establishing connection to server');	

$results = "SELECT subject, grade FROM results WHERE id=".$id;

$results = mysqli_query($dbc,$results)
	or die ('Error querying the database');		


echo '<table id="results">';
echo '<tr><th>Course Code</th><th>Grade</th></tr>';

while($row_results=mysqli_fetch_array($results))
{
	echo '<tr><td>'.$row_results['subject'].'</td><td>'.$row_results['grade'].'</td><td>';
	
}
	echo '</table>';

?>