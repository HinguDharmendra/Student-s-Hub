<?php 
session_start();
$id = $_SESSION['id'];
$filename = $_POST['filename'];
$tid = $_POST['teacher'];
$ASSIGNMENT_PATH = 'l/'.$tid.'/assignments/'.$id;

$rep = $_POST['replace'];
if ($rep=="true")
{
	copy('../'.$ASSIGNMENT_PATH.'/tmp/'.$filename,
	'../'.$ASSIGNMENT_PATH.'/' . $filename);
	unlink('../'.$ASSIGNMENT_PATH.'/tmp/'.$filename);

	if($_SESSION['usr']['type']=='t')
	{
		require ('dbconfig.php');

		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
			or die('Error establishing connection to server');


		$path = $_SESSION['tmp']['path'];
		
		$assignments = "DELETE FROM assignments WHERE path='".$path."'";
		mysqli_query($dbc, $assignments)
			or die ('Error querying the database');		


		$assignments = "INSERT INTO assignments (name, teacher, date, year, department, path) VALUES ('".$_SESSION['tmp']['name']."', '".$_SESSION['usr']['name']."', '".$_SESSION['tmp']['date']."', '".$_SESSION['tmp']['year']."', '".$_SESSION['usr']['department']."', '".$path."');";
		mysqli_query($dbc, $assignments)
			or die ('Error querying the database');		
			
		$subject = "[ASSIGNMENTS] Changes in Assignment: ".$_SESSION['tmp']['name'];
		$headers = "FROM: assignments@hub.com";
		$message = "An assignment- ".$_SESSION['tmp']['name']." has been edited by Prof. ".$_SESSION['usr']['name'].". You can find additional details on the assignments page: localhost/hub/assignments.php.";

		$emails = "SELECT hubmail FROM users WHERE year=".$_SESSION['tmp']['year']." and department='".$_SESSION['usr']['department']."';";
		
		$emails = mysqli_query($dbc, $emails)
			or die ('Error querying the database');

		while($row_emails=mysqli_fetch_array($emails))
		{
			echo mail($row_emails['email'],$subject,$message,$headers);
		}
	
	}

}

else
{
	unlink('../'.$ASSIGNMENT_PATH.'/tmp/'.$filename);
}

unset($_SESSION['tmp']['tid']);
rmdir('../'.$ASSIGNMENT_PATH.'/tmp');
?>