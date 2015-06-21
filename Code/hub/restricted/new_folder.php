<?php session_start();
	$id = $_SESSION['id'];
	$LOCKER_PATH = 'l/'.$id;
	$parent = $_POST['parent'];
	$child = $_POST['child'];
	
	mkdir('../'.$LOCKER_PATH.'/'.$child);
	
?>