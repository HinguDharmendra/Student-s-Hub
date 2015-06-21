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
		<table>
			<tr>
				<table width = "100%" bgcolor="#CCCCCC">
					<caption><b><a href = "main_forum_dept.php">Departments</a></b></caption>
					<tr>
						<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
						<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
						<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
						<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
						<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
						<!--<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Delete</strong></td>-->
					</tr>
					<?php
						$host="localhost"; // Host name
						$username="root"; // Mysql username
						$password=""; // Mysql password
						$db_name="hub"; // Database name
						$tbl_name="forum_question_dept"; // Table name

						// Connect to server and select databse.
						mysql_connect("$host", "$username", "$password")or die("cannot connect");
						mysql_select_db("$db_name")or die("cannot select DB");
						$dept=$_SESSION['usr']['department'];

						$sql="SELECT * FROM $tbl_name WHERE dept='".$dept."' ORDER BY id DESC";
						// OREDER BY id DESC is order result by descending

						$result=mysql_query($sql);						
						$var = 2;
						while($var != 0)
						{
							$rows=mysql_fetch_array($result)
							?>
							<tr>
								<td><?php echo $rows['id']; ?></td>
								<td><?php echo $rows['topic']; ?><BR></td>
								<td align="center"><?php echo $rows['view']; ?></td>
								<td align="center"><?php echo $rows['reply']; ?></td>
								<td align="center"><?php echo $rows['datetime']; ?></td>
								<!--<?php// if($rows){?><td><input type="button" name="delete.<?php// echo $rows['id'];?>" value="Delete" /></td><?php //} ?> -->
							</tr>
							<?php
							$var = $var - 1;
						}
						mysql_close();
					?>
				<tr>
				<td colspan="6" align="right" bgcolor="#E6E6E6"><a href="create_topic_dept.php"><strong>Create New Topic</strong> </a></td>
				</tr>	
				</table>
			</tr>				
			<br />
			<tr>
				<table width = "100%" bgcolor="#CCCCCC">
					<caption><b><a href = "main_forum_fes.php">Festivals</a></b></caption>
					<tr>
						<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
						<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
						<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
						<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
						<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
						<!--<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Delete</strong></td>-->
					</tr>
					<?php
						$host="localhost"; // Host name
						$username="root"; // Mysql username
						$password=""; // Mysql password
						$db_name="hub"; // Database name
						$tbl_name="forum_question_fes"; // Table name

						// Connect to server and select databse.
						mysql_connect("$host", "$username", "$password")or die("cannot connect");
						mysql_select_db("$db_name")or die("cannot select DB");

						$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
						// OREDER BY id DESC is order result by descending

						$result=mysql_query($sql);						
						$var = 2;
						while($var != 0)
						{
							$rows=mysql_fetch_array($result)
							?>
							<tr>
								<td><?php echo $rows['id']; ?></td>
								<td><?php echo $rows['topic']; ?><BR></td>
								<td align="center"><?php echo $rows['view']; ?></td>
								<td align="center"><?php echo $rows['reply']; ?></td>
								<td align="center"><?php echo $rows['datetime']; ?></td>
								<!--<?php// if($rows){?><td><input type="button" name="delete.<?php// echo $rows['id'];?>" value="Delete" /></td><?php //} ?> -->
							</tr>
							<?php
							$var = $var - 1;
						}
						mysql_close();
					?>
				<tr>
				<td colspan="6" align="right" bgcolor="#E6E6E6"><a href="create_topic_fes.php"><strong>Create New Topic</strong> </a></td>
				</tr>	
				</table>
			</tr>
			<br />
			<tr>
				<table width = "100%" bgcolor="#CCCCCC">
					<caption><b><a href = "main_forum_soc.php">Societies</a></b></caption>
					<tr>
						<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
						<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
						<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
						<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
						<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
						<!--<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Delete</strong></td>-->
					</tr>
					<?php
						$host="localhost"; // Host name
						$username="root"; // Mysql username
						$password=""; // Mysql password
						$db_name="hub"; // Database name
						$tbl_name="forum_question_soc"; // Table name

						// Connect to server and select databse.
						mysql_connect("$host", "$username", "$password")or die("cannot connect");
						mysql_select_db("$db_name")or die("cannot select DB");

						$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
						// OREDER BY id DESC is order result by descending

						$result=mysql_query($sql);						
						$var = 2;
						while($var != 0)
						{
							$rows=mysql_fetch_array($result)
							?>
							<tr>
								<td><?php echo $rows['id']; ?></td>
								<td><?php echo $rows['topic']; ?></a><BR></td>
								<td align="center"><?php echo $rows['view']; ?></td>
								<td align="center"><?php echo $rows['reply']; ?></td>
								<td align="center"><?php echo $rows['datetime']; ?></td>
								<!--<?php// if($rows){?><td><input type="button" name="delete.<?php// echo $rows['id'];?>" value="Delete" /></td><?php //} ?> -->
							</tr>
							<?php
							$var = $var - 1;
						}
						mysql_close();
					?>
				<tr>
				<td colspan="6" align="right" bgcolor="#E6E6E6"><a href="create_topic_soc.php"><strong>Create New Topic</strong> </a></td>
				</tr>	
				</table>
			</tr>	
			<br />
			<tr>
				<table width = "100%" bgcolor="#CCCCCC">
				<table width = "100%" bgcolor="#CCCCCC">
				<table width = "100%" bgcolor="#CCCCCC">
					<caption><b><a href = "main_forum.php">General</a></b></caption>
					<tr>
						<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
						<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
						<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
						<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
						<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
						<!--<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Delete</strong></td>-->
					</tr>
					<?php
						$host="localhost"; // Host name
						$username="root"; // Mysql username
						$password=""; // Mysql password
						$db_name="hub"; // Database name
						$tbl_name="forum_question"; // Table name

						// Connect to server and select databse.
						mysql_connect("$host", "$username", "$password")or die("cannot connect");
						mysql_select_db("$db_name")or die("cannot select DB");

						$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
						// OREDER BY id DESC is order result by descending

						$result=mysql_query($sql);						
						$var = 2;
						while($var != 0)
						{
							$rows=mysql_fetch_array($result)
							?>
							<tr>
								<td><?php echo $rows['id']; ?></td>
								<td><?php echo $rows['topic']; ?><BR></td>
								<td align="center"><?php echo $rows['view']; ?></td>
								<td align="center"><?php echo $rows['reply']; ?></td>
								<td align="center"><?php echo $rows['datetime']; ?></td>
								<!--<?php// if($rows){?><td><input type="button" name="delete.<?php// echo $rows['id'];?>" value="Delete" /></td><?php //} ?> -->
							</tr>
							<?php
							$var = $var - 1;
						}
						mysql_close();
					?>
				<tr>
				<td colspan="6" align="right" bgcolor="#E6E6E6"><a href="create_topic.php"><strong>Create New Topic</strong> </a></td>
				</tr>	
				</table>
			</tr>	
			<br />
			
		</table>		
		</div>	
	</body>
</html>