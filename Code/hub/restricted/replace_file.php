<?php 
session_start();
$id = $_SESSION['id'];
$LOCKER_PATH = 'l/'.$id;

$rep = $_POST['replace'];
if ($rep=="true")
{
	copy('../'.$LOCKER_PATH.'/tmp/'.$_SESSION['tmp']['file-upload'],
	'../'.$LOCKER_PATH.'/' . $_SESSION['tmp']['file-upload']);
	unlink('../'.$LOCKER_PATH.'/tmp/'.$_SESSION['tmp']['file-upload']);
	}

else
{
	unlink('../'.$LOCKER_PATH.'/tmp/'.$_SESSION['tmp']['file-upload']);
}
$_SESSION['tmp']['file-upload'];
rmdir('../'.$LOCKER_PATH.'/tmp');
?>