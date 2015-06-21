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
			<?php //connection
			$host="localhost"; // Host name
			$username="root"; // Mysql username
			$password=""; // Mysql password
			$db_name="hub"; // Database name
			$tbl_name="forum_question_soc"; // Table name

			// Connect to server and select databse.
			mysql_connect("$host", "$username", "$password")or die("cannot connect");
			mysql_select_db("$db_name")or die("cannot select DB");

			// get value of id that sent from address bar
			$id=$_GET['id'];

			$sql="SELECT * FROM forum_question_soc WHERE id='$id'";
			$result=mysql_query($sql);

			$rows=mysql_fetch_array($result);
			?>
			<hr />
			<a href = "main_forum_soc.php">Back to Discussion</a>
			<hr />
			<table width="400" border="0" cellpadding="0" cellspacing="1">
			<tr>
			<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1">
			<tr>
			<td><strong><?php echo $rows['topic']; ?></strong></td>
			</tr>

			<tr>
			<td><?php echo $rows['detail']; ?></td>
			</tr>

			<tr>
			<td><strong>By :</strong> <?php echo $rows['name']; ?> <strong>Email : </strong><?php echo $rows['email'];?></td>
			</tr>

			<tr>
			<td><strong>Date : </strong><?php echo $rows['datetime']; ?></td>
			</tr>
			</table></td>
			</tr>
			</table>
			<BR>

			<?php

			$sql2="SELECT * FROM forum_answer_soc WHERE question_id='$id'";
			$result2=mysql_query($sql2);

			while($rows=mysql_fetch_array($result2)){
			?>

			<table width="400" border="0" cellpadding="0" cellspacing="1">
			<tr>
			<td><table width="100%" border="0" cellpadding="3" cellspacing="1">
			<tr>
			<td><strong>ID</strong></td>
			<td>:</td>
			<td><?php echo $rows['a_id']; ?></td>
			</tr>
			<tr>
			<td width="18%"><strong>Name</strong></td>
			<td width="5%">:</td>
			<td width="77%"><?php echo $rows['a_name']; ?></td>
			</tr>
			<tr>
			<td><strong>Email</strong></td>
			<td>:</td>
			<td><?php echo $rows['a_email']; ?></td>
			</tr>
			<tr>
			<td><strong>Answer</strong></td>
			<td>:</td>
			<td><?php echo $rows['a_answer']; ?></td>
			</tr>
			<tr>
			<td><strong>Date</strong></td>
			<td>:</td>
			<td><?php echo $rows['a_datetime']; ?></td>
			</tr>
			</table></td>
			</tr>
			</table><br>

			 

			<?php
			}

			$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
			$result3=mysql_query($sql3);

			$rows=mysql_fetch_array($result3);
			$view=$rows['view'];

			 

			// if have no counter value set counter = 1
			if(empty($view)){
			$view=1;
			$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
			$result4=mysql_query($sql4);
			}

			 

			// count more value
			$addview=$view+1;
			$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
			$result5=mysql_query($sql5);

			mysql_close();
			?>


			<BR>
			<table width="400" border="0" cellpadding="0" cellspacing="1">
			<tr>
			<form name="form1" method="post" action="add_answer_soc.php">
			<td>
			<table width="100%" border="0" cellpadding="3" cellspacing="1">
			<tr>
			<td valign="top"><strong>Answer</strong></td>
			<td valign="top">:</td>
			<td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
			<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
			</tr>
			</table>
			</td>
			</form>
			</tr>
			</table>
		</div>	
	</body>
</html>