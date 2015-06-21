<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$LOCKER_PATH = 'l/'.$id;
	}
	if(!isset($_SESSION['msg']['registration-err']))
		$_SESSION['msg']['registration-err']="";
?>
<!DOCTYPE html />
<html>
<head>
    
			<title>Registration - Students' HUB</title>
			<meta name="description" content="VJTI Students' dashboard">
			<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
			<meta name="author" content="Deep Shah, Dharmendra Hingu">
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/main.css">
			<script language="javascript">
				function TypeInfo(type)
				{
					type = document.getElementById('type');
					if(type.value == 's')
					{
						document.getElementById("type").focus();
						document.getElementById("year").disabled=false;
						
					}
					else
					{
						document.getElementById("type").focus();
						document.getElementById("year").disabled=true;
					}
				}
				
			</script>
</head>
<body>
		<?php
		include('logo.php');
		if(!isset($_SESSION['id']))
			{
							//$_SESSION['tmp']['no-login-form'] = true;

		?>
		
			<div id="content">
			<h1 id="page-title">Registration</h1>
			
			<?php						
				if($_SESSION['msg']['registration-err'])
				{
					echo '<div class="error">'.$_SESSION['msg']['registration-err'].'</div>';
					unset($_SESSION['msg']['registration-err']);													
				}
			?>  				
			
			<?php
				if(isset($_SESSION['msg']['registration-success']))
				{
			?>
				<br />
				<h3>
				Thank you for registering with us. <br />
				Proceed to <a href=login.php title="Students'HUB Log in">Students' HUB log in page.</a>
				</h3>	
			<?php
				unset($_SESSION['msg']['registration-success']);
				}
				else
				{
			?>
			<table>
			<form method="post" id="customForm" action="restricted/do_registration.php">
				<tr>
					<td>
						<label for="name">Name</label>
					</td>
					<td>
						<input id="name" name="name" type="text" />
					</td>
				</tr>

				<tr>	
					<td>
						<label for="email">E-mail</label>
					</td>
					<td>
						<input id="email" name="email" type="text" />
					</td>
				</tr>
				
				<tr>
					<td>
						<label for="mobile">Mobile No</label>
					</td>
					<td>
						<input id="mobile" name="mobile" type="text" />
					</td>
				</tr>

				<tr>
					<td>
						<label for="id">College ID No.</label>
					</td>
					<td>
						<input id="id" name="id" type="text" />
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
						<label for="password2">Confirm Password</label>
					</td>
					<td>
						<input id="password2" name="password2" type="password" />
					</td>
				</tr>

				<tr>
					<td>
						<label for="type">Type of user</label>
					</td>
					<td>
						<select id="type" name="type" onchange=javascript:TypeInfo(this.value)>
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
						<select id="year" name="year">
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
						<select id="department" name="department">
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
						<label for="captcha">Captcha Code</label>
					</td>
					<td>
						<input id="captcha_code" name="captcha_code" type="text" size="10" maxlength="6" />
					</td>
				</tr>
				
				<tr>
					<td>
						<img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" width="150px" height="50px" />
					</td>
					<td>
						<a href="#" onClick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">&nbsp;<img src="securimage/images/refresh.png" alt="Refresh" /></a>
					</td>
				</tr>

				<tr>
					<td>
						<input id="submit" name="submit" type="submit" value="Register" />
					</td>
				</tr>
				
			</form>
			</table>
			<?php 
				}
				unset($_SESSION['user']); 
			?>
		</div>
		<?php
		}
		else
		{
			echo '<h2>You have already registered.</h2>';
		}
		
		?>
</body>
</html>