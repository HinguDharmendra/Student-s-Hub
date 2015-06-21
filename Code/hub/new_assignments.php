<?php session_start();
	$id = $_SESSION['id'];
	$ASSIGNMENT_PATH = 'l/'.$id.'/assignments/'.$id;
	$LOCKER_PATH = 'l/'.$id;
?>
<html>
<head>
<?php

function upload($ASSIGNMENT_PATH,$success)
{
	move_uploaded_file($_FILES["file"]["tmp_name"],
		'../'.$ASSIGNMENT_PATH.'/'.$_FILES["file"]["name"]);
	$success[] = $_FILES["file"]["name"].' is submitted successfully.';
	return $success;
}	  

$success = array();

mkdir('../l/'.$id.'/assignments/'.$id);


if($_FILES)
{

	if($_FILES["file"]["tmp_name"])
	{
		$path = $ASSIGNMENT_PATH.'/'.$_FILES["file"]["name"];
		$extension = end(explode(".", $_FILES["file"]["name"]));
		if (($_FILES["file"]["size"] < 8*1024*1024) and $extension != "exe")

		  {
		  if ($_FILES["file"]["error"] > 0)
			{
			$_SESSION['msg']['assignment-err'] = "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
		  else
			{
			
			if (file_exists('../'.$ASSIGNMENT_PATH.'/' . $_FILES["file"]["name"]))
			{
				mkdir('../'.$ASSIGNMENT_PATH.'/tmp');
				move_uploaded_file($_FILES["file"]["tmp_name"],
				'../'.$ASSIGNMENT_PATH.'/tmp/' . $_FILES["file"]["name"]);
				$_SESSION['msg']['assignment-err'] = 'File already exists. Do you want to replace it?';
				$_SESSION['tmp']['file-upload'] = $_SESSION['tmp']['file-upload'].$_FILES["file"]["name"].',';
				$_SESSION['tmp']['tid'] = $id;
				$_SESSION['tmp']['name'] = $_POST['name'];
				$_SESSION['tmp']['year'] = $_POST['year'];
				$_SESSION['tmp']['date'] = $_POST['date'];
				$_SESSION['tmp']['path'] = $path;
			}
			else
			{	  
				$success=upload($ASSIGNMENT_PATH,$success);
			}
			}
		  }

		else
		  {
			$_SESSION['msg']['assignment-err'] =  "Invalid file. Maximum file limit allowed is 8MB and you cannot upload .exe files.";
		  }
	}
}

else
{
	$_SESSION['msg']['assignment-err'] =  "Invalid file. Maximum file limit allowed is 8MB and you cannot upload .exe files.";
}

if($success)
{
	$_SESSION['msg']['assignment-success'] = implode('<br />',$success);
	
	require ('dbconfig.php');

	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
		or die('Error establishing connection to server');


	$assignments = "INSERT INTO assignments (name, teacher, date, year, department, path) VALUES ('".$_POST['name']."', '".$_SESSION['usr']['name']."', '".$_POST['date']."', '".$_POST['year']."', '".$_SESSION['usr']['department']."', '".$path."');";
	mysqli_query($dbc, $assignments)
		or die ('Error querying the database');		


	$emails = "SELECT hubmail FROM users WHERE year=".$_POST['year']." and department='".$_SESSION['usr']['department']."';";
	
	$emails = mysqli_query($dbc, $emails)
		or die ('Error querying the database');

	$subject = "[ASSIGNMENTS] New Assignment: ".$_POST['name'];
	$headers = "FROM: assignments@hub.com";
	$message = "A new assignment- ".$_POST['name']." has been uploaded by Prof. ".$_SESSION['usr']['name'].". You can find additional details on the assignments page: localhost/hub/assignments.php.";

	while($row_emails=mysqli_fetch_array($emails))
	{
		echo mail($row_emails['hubmail'],$subject,$message,$headers);
	}

}

header("Location: ../assignments.php");
?>
</body></html>
<?php
exit();
?>
