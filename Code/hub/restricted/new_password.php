<?php

if(isset($_POST['submit']))			
{
	$password = $_POST['password'];
	$password1 = $_POST['npassword1'];
	$password2 = $_POST['npassword2'];
	
	require 'dbconfig.php';
	require 'functions.php';
	
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
		or die('Error establishing connection to server');		
		
	session_start();
	
	$id=$_SESSION['id'];
	
	$err = array();

	if(empty($password) || empty($password1) || empty($password2))
	{
		$err[] = 'All the fields must be filled in!';
	}

	if(!count($err))
	{
		$clean_password = mysqli_real_escape_string($dbc,$password1);
		
		if($password1 != $password2)
		{
			$err[] = 'Your password did not matched.';
		}
		
		else if(!count($err))
		{		
			
			$password = "UPDATE users SET password='".md5($clean_password)."' WHERE id='".$id."'";
		
								
			mysqli_query($dbc, $password)
				or die ('Error querying the database');		

			$email=$_SESSION['usr']['hubmail'];
			$subject='Password Reset';
			$message='Your password for Students\' HUB has been reset.'; 
			$headers='FROM: hubadmin@hub.com';													
			mail($email, $subject, $message, $headers);
						
			mysqli_close($dbc);
			$_SESSION['msg']['forgotpwd-success']=true;
			header("Location: ../change_password.php");
			exit();
					
		}
		else 
		{
			$err[]='Wrong email id and/or password!';
		}
	}
	
	if($err)
	{
		$_SESSION['msg']['forgotpwd-err'] = implode('<br />',$err);
	}
	
	mysqli_close($dbc);
	
	header("Location: ../change_password.php");
	exit();

}
else 
{
	echo "Access Forbidden.";
}	
?>