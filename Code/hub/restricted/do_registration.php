
<?php

if(isset($_POST['submit']))			
{
	$name = $_POST['name'];	
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$cpass = $_POST['password2'];
	$mobile = $_POST['mobile'];
	$id = $_POST['id'];
	$year = $_POST['year'];
	$department = $_POST['department'];
	$type = $_POST['type'];
	$captcha = $_POST['captcha_code'];
	
	
	require 'dbconfig.php';
	require 'functions.php';
	require('../securimage/securimage.php');
	$securimage = new Securimage();
	
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
		or die('Error establishing connection to server');
	
	session_start();
	$err = array();			
	
	if(empty($name) || empty($email) || empty($mobile) || empty($id) || empty($department) || empty($type))
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

		if($pass != $cpass)
		{
			$err[] = 'Your password did not matched.';
		}
		
		
		if ($securimage->check($captcha) == false) {
			$err[]= "The security code entered was incorrect.";
		}
			
	}
	
	if(!count($err))
	{

				
		$clean_name = mysqli_real_escape_string($dbc,$name);
		$clean_email = mysqli_real_escape_string($dbc,$email);				
		$clean_mobile = mysqli_real_escape_string($dbc,$mobile);
		$clean_id = mysqli_real_escape_string($dbc,$id);
		$clean_department = mysqli_real_escape_string($dbc,$department);
		$clean_year = mysqli_real_escape_string($dbc,$year);
		$clean_type = mysqli_real_escape_string($dbc,$type);
		

		$select_id_query = "SELECT id FROM users WHERE id='".$clean_id."'";
								
		$result_id = mysqli_query($dbc, $select_id_query)
			or die ('Error querying the database');		

		$row_id = mysqli_fetch_array($result_id);
		
		
		if($row_id['id'])
		{								
			$err[]='This id is already registered! Contact the admin if you are unable to register.';
		}
		
		
		else 
		{
			
			$insert_user_query = "INSERT INTO users (name,email,hubmail,password,mobile,id,year,department,type)
									VALUES('".$clean_name."','".$clean_email."', '".$clean_id."@hub.com', '".md5($pass)."','".$clean_mobile."','".$clean_id."','".$clean_year."',
											'".$clean_department."','".$clean_type."')";
								
			mysqli_query($dbc, $insert_user_query)
				or die ('Error querying the database');			
				
			mysqli_close($dbc);

			mkdir('../l/'.$clean_id);
			if($clean_type=='t')
			{
				mkdir('../l/'.$clean_id.'/assignments');
			}
			mkdir('../blog/'.$clean_id);

			
			unset($_SESSION['msg']['registration-err']);
			$_SESSION['msg']['registration-success']=true;
			header("Location: ../register.php");
			exit();
		}
	}
	
	if($err)
	{
		$_SESSION['msg']['registration-err'] = implode('<br />',$err);
	}
	
	mysqli_close($dbc);
	
	header("Location: ../register.php");
	exit();
	
}
else 
{
	echo "Access Forbidden.";
}	
?>