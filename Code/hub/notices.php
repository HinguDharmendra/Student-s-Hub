<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}
	$host="localhost";
	$username="root";
	$password="";
	$db_name="hub"; 
	$tbl_name="notices"; 
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");	
?>
<html>
	<head>
			<title>Notices - Students' HUB</title>
			<meta name="description" content="VJTI Students' dashboard">
			<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
			<meta name="author" content="Deep Shah, Dharmendra Hingu">
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php
				include('common.php');
		?>
		<div id="content">
			<h1 id="page-title">Notices</h1>
				<div id="notices">
				<table border=1 width = "100%">
					<tr>
						<th width = "50%"><h3>Exams</h3></th>
						<th width = "50%"><h3>Results</h3></th>
					</tr>
					<tr>
						<td align ="center">
							<ul type="none">
								<?php 						
									$sql="SELECT content FROM $tbl_name WHERE type='e' ORDER BY date DESC";
									$result=mysql_query($sql);						
									$var = 4;
									while($var != 0)
									{
										$rows=mysql_fetch_array($result)
										?>
											<li><?php echo $rows['content'];?></li>
										<?php
										$var = $var - 1;
									}
								?>
							</ul>
						</td>
						
						<td align ="center">
							<ul type="none">
								<?php 						
									$sql="SELECT content FROM $tbl_name WHERE type='r' ORDER BY date DESC";
									$result=mysql_query($sql);						
									$var = 4;
									while($var != 0)
									{
										$rows=mysql_fetch_array($result)
										?>
											<li><?php echo $rows['content'];?></li>
										<?php
										$var = $var - 1;
									}
								?>
							</ul>
						</td>
					</tr>
					
					<tr>
						<th width = "50%"><h3>Public Holidays</h3></th>
						<th width = "50%"><h3>Other Notices</h3></th>
					</tr>
					<tr>
						<td align ="center">
							<ul type="none">
								<?php 						
									$sql="SELECT content FROM $tbl_name WHERE type='h' ORDER BY date DESC";
									$result=mysql_query($sql);						
									$var = 4;
									while($var != 0)
									{
										$rows=mysql_fetch_array($result)
										?>
											<li><?php echo $rows['content'];?></li>
										<?php
										$var = $var - 1;
									}
								?>
							</ul>
						</td>

						<td align ="center">
							<ul type="none">
								<?php 						
									$sql="SELECT content FROM $tbl_name WHERE type='o' ORDER BY date DESC";
									$result=mysql_query($sql);						
									$var = 4;
									while($var != 0)
									{
										$rows=mysql_fetch_array($result)
										?>
											<li><?php echo $rows['content'];?></li>
										<?php
										$var = $var - 1;
									}
								?>
							</ul>
						</td>						
					</tr>
				</table>
			</div>
		</div>	
		<?php mysql_close();?>
	</body>
</html>