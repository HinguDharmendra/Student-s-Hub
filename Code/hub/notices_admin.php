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
		<?php
		if($_SESSION['usr']['type']=='t' or $_SESSION['usr']['type']=='a')
		{
		?>
			<h1 id="page-title">Notices</h1>
			<!-- add code for admin verification like if logged in user is admin buttons will be visible -->
			<form method="post" action="add_notices.php">
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
					<input type="text" name="ContentE" id="ContentE"/>
					<input type="submit" name="Exams" id="Exams" value="Add" />
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
					<input type="text" name="ContentR" id="ContentR"/>
					<input type="submit" name="Results" id="Results" value="Add" />
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
					<input type="text" name="ContentH" id="ContentH"/>
					<input type="submit" name="Holidays" id="Holidays" value="Add" />
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
							mysql_close();
						?>
					</ul>
					<input type="text" name="ContentO" id="ContentO"/>
					<input type="submit" name="Other" id="Other" value="Add" />
					</td>					
				</tr>
			</table>
			</form>
			
			<?php
			}
			else
			{
				header("Location: notices.php");
			}
			?>
		</div>	
	</body>
</html>