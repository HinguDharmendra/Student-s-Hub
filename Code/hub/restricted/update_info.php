
<?php

if(isset($_POST['submit']))			
{
	$name = $_POST['name'];	
	$email = $_POST['email'];
	$pass1 = $_POST['password'];
	$pass2 = $_POST['cpassword'];
	$mobile = $_POST['mobile'];
	$id = $_POST['id'];
	$year = $_POST['year'];
	$department = $_POST['department'];
	$type = $_POST['type'];
	
	require 'dbconfig.php';
	require 'functions.php';
	
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
		or die('Error establishing connection to server');
	
	session_start();
	$err = array();			
	
	if(empty($name) || empty($email) || empty($mobile) || empty($id) || empty($department) || empty($type) || empty($pass1) || empty($pass2))
	{
		$err[] = 'All the fields must be filled in!';
	}
	else
	{
		if(!validateName($name))
		{
			$err[] = 'Your name should have atleast 5 characters.';
		}
		
		if(!validateEmail($email))
		{
			$err[]='Your email is not valid!';
		}
				
		if(!validateMobile($mobile))
		{
			$err[] = 'Your mobile no should contain 10 digits.';
		}
		
		if(!validateID($id))
		{
			$err[] = 'Your id no should contain 9 digits.';
		}

		if($pass1!=$pass2)
		{
			$err[] = 'Passwords did not match.';
		}
	}
	
	if(!count($err))
	{

				
		$clean_name = mysqli_real_escape_string($dbc,$name);
		$clean_email = mysqli_real_escape_string($dbc,$email);				
		$clean_pass = mysqli_real_escape_string($dbc,$pass1);				
		$clean_mobile = mysqli_real_escape_string($dbc,$mobile);
		$clean_id = mysqli_real_escape_string($dbc,$id);
		$clean_department = mysqli_real_escape_string($dbc,$department);
		$clean_year = mysqli_real_escape_string($dbc,$year);
		$clean_type = mysqli_real_escape_string($dbc,$type);
		
		
		$insert_user_query = "UPDATE users SET name='".$clean_name."',email='".$clean_email."', password='".md5($clean_pass)."', mobile='".$clean_mobile."',id='".$clean_id."',year='".$clean_year."',department='".$clean_department."',type='".$clean_type."' WHERE id='".$id."'";
							
		mysqli_query($dbc, $insert_user_query)
			or die ('Error querying the database');			
			
		mysqli_close($dbc);

		header("Location: ../");
		exit();
		
	}	
}
else 
{
	echo "Access Forbidden.";
}	
?>