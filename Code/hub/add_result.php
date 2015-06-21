<?php session_start();
	$id = $_SESSION['id'];

require ('dbconfig.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
	or die('Error establishing connection to server');

for($i=1;$i<=10;$i++)
{
	$sid = $_POST['id'.$i];
	$code = $_POST['code'.$i];
	$grade = $_POST['grade'.$i];
	
	if($id!='' and $code!='' and $grade!='')
		{
		$results = "DELETE FROM results WHERE id=".$sid." and subject='".$code."'";
		$results = mysqli_query($dbc, $results)
			or die ('Error querying the database');

		$results = "INSERT INTO results (id, subject, grade) 
			VALUES (".$sid.",'".$code."',".$grade.")";
		mysqli_query($dbc, $results)
			or die ('Error querying the database');		
	}
}

header('Location: ../results.php');
?>