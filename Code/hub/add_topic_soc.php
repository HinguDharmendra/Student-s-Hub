<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}	
?>
<html>
	<head>
			<title>Forums - Students' HUB</title>
			<meta name="description" content="VJTI Students' dashboard">
			<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
			<meta name="author" content="Deep Shah, Dharmendra Hingu">
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
	<?php include('common.php');?>
		<div id="content">
			<h1 id="page-title">Forums</h1>
			<?php
			$host="localhost"; // Host name
			$username="root"; // Mysql username
			$password=""; // Mysql password
			$db_name="hub"; // Database name
			$tbl_name="forum_question_soc"; // Table name

			// Connect to server and select database.
			mysql_connect("$host", "$username", "$password")or die("cannot connect");
			mysql_select_db("$db_name")or die("cannot select DB");

			// get data that sent from form
			$topic=$_POST['topic'];
			$detail=$_POST['detail'];
			if(empty($topic) || empty($detail))
			{
				echo "All the fields must be filled in!";
				header('Refresh:3; URL=create_topic_soc.php');
				exit();
			}
			$name=$_SESSION['name'];
			$email=$_SESSION['email'];
			$datetime=date("d/m/y"); //create date time
			$sql="INSERT INTO forum_question_soc (topic, detail, name, email, datetime)VALUES('".$topic."','".$detail."','".$name."','".$email."','".$datetime."')";
			$result=mysql_query($sql);
			if($result)
			{
				echo "Successful<BR>";
				header('Refresh:3; URL=main_forum_soc.php');
			}
			else 
			{
				echo "ERROR";
			}
			mysql_close();
			?>
		</div>	
	</body>
</html>