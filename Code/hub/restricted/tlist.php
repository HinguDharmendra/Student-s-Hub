<?php

require 'dbconfig.php';
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
	or die('Error establishing connection to server');	

$select_teacher_query = "SELECT id, name FROM users WHERE department=(SELECT department FROM users WHERE id=".$id.") and type='t'";
								
$result_teacher = mysqli_query($dbc, $select_teacher_query)
	or die ('Error querying the database');
	
?>