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
			$tbl_name="forum_answer"; // Table name

			// Connect to server and select databse.
			mysql_connect("$host", "$username", "$password")or die("cannot connect");
			mysql_select_db("$db_name")or die("cannot select DB");

			// Get value of id that sent from hidden field
			$id=$_POST['id'];

			// Find highest answer number.
			$sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE question_id='$id'";
			$result=mysql_query($sql);
			$rows=mysql_fetch_array($result);

			// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1
			if ($rows) 
			{
				$Max_id = $rows['Maxa_id']+1;
			}
			else 
			{
				$Max_id = 1;
			}

			// get values that sent from form
			$a_name=$_SESSION['name'];
			$a_email=$_SESSION['email'];
			$a_answer=$_POST['a_answer'];
			if(empty($a_answer))
			{
				echo "Field must be filled in!";
				header("Refresh:3; URL=view_topic.php?id=$id");
				exit();
			}
			$datetime=date("d/m/y"); // create date and time


			// Insert answer
			$sql2="INSERT INTO $tbl_name(question_id, a_id, a_name, a_email, a_answer, a_datetime)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$datetime')";
			$result2=mysql_query($sql2);

			if($result2)
			{
				echo "Successful<BR>";
				header("Refresh: 2; URL=view_topic.php?id=$id");

				// If added new answer, add value +1 in reply column
				$tbl_name2="forum_question";
				$sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
				$result3=mysql_query($sql3);
/*				
	
				$to = $cid.'@hub.com';
				$subject = "[FORUMS] New Reply";
				$headers = "FROM: forums@hub.com";
				$message = "".$_SESSION['usr']['name']." has replied to one of the topics posted by you in the forum.";

				if($_POST['p']!=$id)
				{
					mail($to,$subject,$message,$headers);
				}

*/
			}
			else 
			{
				echo "ERROR";
			}

			// Close connection

			mysql_close();
			?>
		</div>	
	</body>
</html>