<?php

session_start();
$c_subject=$_POST['subject'];
$c_message=$_POST['message'];

$subject='[Complaints] New Complaint: '.$c_subject;
$message='A new complaint has been lodged by '.$_SESSION['usr']['name'].' (id no.: '.$_SESSION['id'].' ). The complaint says "'.$c_message.'".';
$headers='FROM: complaints@hub.com';

mail('hubadmin@hub.com',$subject,$message,$headers);
header("Location: ../complaint.php");

?>