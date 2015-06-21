<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$LOCKER_PATH = 'l/'.$id;
	}
?>
<!DOCTYPE html />
<html>
<head>
    
			<title>Modification - Students' HUB</title>
			<meta name="description" content="VJTI Students' dashboard">
			<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
			<meta name="author" content="Deep Shah, Dharmendra Hingu">
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/main.css">
			<script language="javascript">
				function TypeInfo(type)
				{
					if(type.value == 's')
					{
						document.getElementById("year").disabled=false;
					}
					else
					{
						document.getElementById("year").disabled=true;
						document.getElementById("department").focus();
					}
				}
				
			</script>
</head>
<body>
	<?php
		include('common.php');
		
		$id=$_POST['id'];
		$host="localhost";
		$username="root";
		$password="";
		$db_name="hub";

		$tbl_name="users";
		mysql_connect("$host","$username","$password") or die("Can not connect to database");
		mysql_select_db("$db_name")or die("Can not select table");
		
		$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE id='".$id."'");

		while($data=mysql_fetch_array($query_for_result))
		{
	?>
	<div id="content">
	<h1 id="page-title">Modification to User details</h1>
		<table>
			<form method="post" id="customForm" action="restricted/update_info.php">
				<tr>
					<td>
						<label for="name">Name</label>
					</td>
					<td>
						<input id="name" name="name" type="text" value="<?php echo $data['name']?>" />
					</td>
				</tr>

				<tr>	
					<td>
						<label for="email">E-mail</label>
					</td>
					<td>
						<input id="email" name="email" type="text" value="<?php echo $data['email']?>"/>
					</td>
				</tr>
				
				<tr>	
					<td>
						<label for="password">Password</label>
					</td>
					<td>
						<input id="password" name="password" type="password" />
					</td>
				</tr>
				
				<tr>	
					<td>
						<label for="cpassword">Confirm Password</label>
					</td>
					<td>
						<input id="cpassword" name="cpassword" type="password" />
					</td>
				</tr>
				
				<tr>
					<td>
						<label for="mobile">Mobile No</label>
					</td>
					<td>
						<input id="mobile" name="mobile" type="text" value="<?php echo $data['mobile']?>"/>
					</td>
				</tr>

				<tr>
					<td>
						<label for="id">College ID No.</label>
					</td>
					<td>
						<input id="id" name="id" type="text" value="<?php echo $data['id']?>"/>
					</td>
				</tr>

				<tr>
					<td>
						<label for="type">Type of user</label>
					</td>
					<td>
						<select id="type" name="type" onchange=javascript:TypeInfo(this.value) value="<?php echo $data['type']?>">
							<option value="s">Student</option>
							<option value="t">Teacher</option>
						</select> 
					</td>
				</tr>

				<tr>
					<td>
						<label for="year">Year</label>
					</td>
					<td>
						<select id="year" name="year" value="<?php echo $data['year']?>">
							  <option value="1">1st Year</option>
							  <option value="2">2nd Year</option>
							  <option value="3">3rd Year</option>
							  <option value="4">4th Year</option>
						</select> 
					</td>
				</tr>

				<tr>
					<td>
						<label for="department">Department</label>
					</td>
					<td>
						<select id="department" name="department" value="<?php echo $data['department']?>">
							<option value="IT">Information Technology</option>
							<option value="CS">Computer Science</option>
							<option value="MECH">Mechanical </option>
							<option value="ETELECOM">Electronics and Telecommunication </option>
							<option value="TRONIX">Electronics</option>
							<option value="TRICAL">Electrical</option>
							<option value="PROD">Production</option>
							<option value="TEXTILE">Textile</option>
						</select>
					</td>
				</tr>

				<tr>
					<td>
						<input id="submit" name="submit" type="submit" value="Change" />
					</td>
				</tr>
				
			</form>
		</table>
	</div>
	<?php }	mysql_close(); ?>
</body>
</html>