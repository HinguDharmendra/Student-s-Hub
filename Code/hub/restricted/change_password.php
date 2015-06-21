<?php

if(isset($_POST['submit']))			
{
	$oldpassword = $_POST['oldpassword'];
	$newpassword1 = $_POST['newpassword1'];
	$newpassword2 = $_POST['newpassword2'];
	
	require 'dbconfig.php';
	require 'functions.php';
	
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
		or die('Error establishing connection to server');		
		
	session_start();
	
	$err = array();

	if(empty($oldpassword) || empty($newpassword1)|| empty($newpassword2))
	{
		$err[] = 'All the fields must be filled in!';
	}
	
	if(!validatePasswords($newpassword1, $newpassword2))
	{
			$err[] = 'Your passwords do not match.';
	}
		

	if(!count($err))
	{
		$clean_password = mysqli_real_escape_string($dbc,$newpassword1);
		
		$update_query = "UPDATE users SET password = '".md5($clean_password)."'WHERE id =".$_SESSION['id'];
			
		mysqli_query($dbc, $update_query)
			or die ('Error querying the database');
		
		mysqli_close($dbc);
		$_SESSION['msg']['change-success'] = TRUE;
		header("Location: ../new_password.php");
		exit();
	}
	
	if($err)
	{
		$_SESSION['msg']['change-err'] = implode('<br />',$err);
	}
	
	mysqli_close($dbc);
	
	header("Location: ../new_password.php");
	exit();

}
else 
{
	echo "Access Forbidden.";
}	
?>