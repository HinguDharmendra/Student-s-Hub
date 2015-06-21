<?php

if(isset($_POST['submit']))			
{
	$id = $_POST['id'];
	$email = $_POST['email'];
	
	require 'dbconfig.php';
	require 'functions.php';
	
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
		or die('Error establishing connection to server');		
		
	session_start();
	
	$err = array();

	if(empty($id) || empty($email))
	{
		$err[] = 'All the fields must be filled in!';
	}

	if(!count($err))
	{
		$clean_id = mysqli_real_escape_string($dbc,$id);
		$clean_email = mysqli_real_escape_string($dbc,$email);
		
		$select_user_query = "SELECT email FROM users WHERE id='".$clean_id."'";
		
								
		$result_user = mysqli_query($dbc, $select_user_query)
			or die ('Error querying the database');		
		
		$row_user = mysqli_fetch_array($result_user);
		
		if(!$row_user['email'] == $email)
		{
			$err[] = 'Wrong id no/email id.';
		}
		

		
		if(!count($err))
		{		
			$pass= substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);		
			
			$password = "UPDATE users SET password='".md5($pass)."' WHERE id='".$clean_id."'";
		
								
			mysqli_query($dbc, $password)
				or die ('Error querying the database');		

			$email=$_SESSION['usr']['hubmail'];
			$subject='Password Reset';
			$message='Your password for Students\' HUB has been reset. Your new password is '.$pass.'. You may change it at localhost/hub/change_passowrd.php'; 
			$headers='FROM: hubadmin@hub.com';													
			mail($email, $subject, $message, $headers);
						
			mysqli_close($dbc);
			$_SESSION['msg']['forgotpwd-success']=true;
			header("Location: ../forgot_password.php");
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
	
	header("Location: ../forgot_password.php");
	exit();

}
else 
{
	echo "Access Forbidden.";
}	
?>