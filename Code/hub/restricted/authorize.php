<?php

if(isset($_POST['submit']))			
{
	$id = $_POST['id'];
	$password = $_POST['password'];
	
	require 'dbconfig.php';
	require 'functions.php';
	
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
		or die('Error establishing connection to server');		
		
	session_start();
	
	$err = array();

	if(empty($id) || empty($password))
	{
		$err[] = 'All the fields must be filled in!';
	}

	if(!count($err))
	{
		$clean_id = mysqli_real_escape_string($dbc,$id);
		$clean_password = mysqli_real_escape_string($dbc,$password);
		
		$select_user_query = "SELECT name, email, department, year, type FROM users WHERE id='".$clean_id."' AND password='".md5($clean_password)."'";
			
								
		$result_user = mysqli_query($dbc, $select_user_query)
			or die ('Error querying the database');		
		
		if(mysqli_num_rows($result_user)==1)
		{
		
		
			$row_user = mysqli_fetch_array($result_user);
					
			$_SESSION['id'] = $id;
			$_SESSION['usr']['name']=$row_user['name'];
			$_SESSION['usr']['email']=$row_user['email'];
			$_SESSION['usr']['department']=$row_user['department'];
			$_SESSION['usr']['year']=$row_user['year'];
			$_SESSION['usr']['type']=$row_user['type'];
			$_SESSION['usr']['hubmail']=$id.'@hub.com';
			$_SESSION['name'] = $row_user['name'];
			$_SESSION['email'] = $row_user['email'];
			mysqli_close($dbc);
			header("Location: ../");
			exit();
						
		}
		
		else 
		{
			$err[]='Wrong email id and/or password!';
		}
	}
	
	if($err)
	{
		$_SESSION['msg']['login-err'] = implode('<br />',$err);
	}
	
	mysqli_close($dbc);
	
	header("Location: ../login.php");
	exit();

}
else 
{
	echo "Access Forbidden.";
}	
?>