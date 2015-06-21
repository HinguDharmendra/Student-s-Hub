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
		<form method="post" action="delete_forum_soc.php">
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
			?>

			<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
			<caption><a href = "main_forum_soc.php">Societies Discussion</a></caption> 
			<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
			<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
			<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
			<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
			<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
			<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Delete</strong></td>
			</tr>

			<?php

			 

			// Start looping table row
			while($rows=mysql_fetch_array($result)){
			?>
			<tr>
			<td><?php echo $rows['id']; ?></td>
			<td><a href="view_topic_soc.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
			<td align="center"><?php echo $rows['view']; ?></td>
			<td align="center"><?php echo $rows['reply']; ?></td>
			<td align="center"><?php echo $rows['datetime']; ?></td>
			<?php
			if($rows['name'] == $_SESSION['usr']['name'] or $_SESSION['usr']['type']=='a'){
				echo "<td align='center'><input type='checkbox' name='".$rows['id']."'/></td>";}
			
			?>
			</tr>

			<?php
			// Exit looping and close connection
			}
			mysql_close();
			?>

			<tr>
			<td colspan="2" align="left" bgcolor="#E6E6E6"><a href="forum_home.php"><strong>Forum Home</strong> </a></td>
			<td colspan="3" align="right" bgcolor="#E6E6E6"><a href="create_topic_soc.php"><strong>Create New Topic</strong> </a></td>
			<td align="right" bgcolor="#E6E6E6"><input type="submit" name="delete" value="Delete"/></td>
			</tr>
			</table>
			</form>
		</div>	
	</body>
</html>