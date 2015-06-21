<?php session_start();
	$id = $_SESSION['id'];

require('functions.php');
require ('dbconfig.php');
	
$name = $_POST['name'];
$date = $_POST['date'];
$description = $_POST['description'];
$level = $_POST['permission'];


$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
	or die('Error establishing connection to server');

$postid = newPost($dbc,$level);

$create_event = "INSERT INTO events (postid, name, creator, date,description) 
	VALUES (".$postid.",'".$name."',".$id.",'".$date."','".$description."')";
	
$insert_event = mysqli_query($dbc, $create_event)
	or die ('Error querying the database');		

$subject = "[EVENTS] New Event: ".$name;
$headers = "FROM: events@hub.com";
$message = "A new event- ".$name." has been created by ".$_SESSION['usr']['name'].". You can find additional details on the events page: localhost/hub/events.php.";

switch($level)
{
	case 1: $emails = "SELECT hubmail FROM users WHERE year=".$_SESSION['usr']['year']." and department='".$_SESSION['usr']['department']."';";
			break;

	case 2: $emails = "SELECT hubmail FROM users WHERE year=".$_SESSION['usr']['year'].";";
			break;
	
	case 3: $emails = "SELECT hubmail FROM users WHERE department='".$_SESSION['usr']['department']."';";
			break;
	
	case 4: $emails = "SELECT hubmail FROM users WHERE year=".$_SESSION['usr']['year']." or department='".$_SESSION['usr']['department']."';";
			break;
			
	case 5: ;		
	case 6: $emails = "SELECT hubmail FROM users";
}

$emails = mysqli_query($dbc, $emails)
	or die ('Error querying the database');

while($row_emails=mysqli_fetch_array($emails))
{
	mail($row_emails['hubmail'],$subject,$message,$headers);
}

header('Location: ../events.php');
?>