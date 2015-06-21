<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}	
?>
<html>
	<head>
			<title>Login - Students' HUB</title>
			<meta name="description" content="VJTI Students' dashboard">
			<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
			<meta name="author" content="Deep Shah, Dharmendra Hingu">
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		
		<?php include('logo.php'); ?>

		<div id="content">

		<?php
		if(!isset($_SESSION['id']))
			{
							//$_SESSION['tmp']['no-login-form'] = true;

		?>

		<table>
			<tr>
				<td>
				<form action="restricted/authorize.php" method="post">
					<h1>Member Login</h1>     
					<div class="showError">
                    <?php						
						if(isset($_SESSION['msg']['login-err']))
						{
							echo '<div class="error">'.$_SESSION['msg']['login-err'].'</div>';
							unset($_SESSION['msg']['login-err']);													
						}
					?>                                
                    </div>  
				</td>
			</tr>
			<tr>
				<td>
					<label class="grey" for="id">College id:</label>
				</td>
				<td>
					<input class="field" type="text" name="id" id="id" value="" size="20" />
				</td>
			</tr>
			<tr>
				<td>
					<label class="grey" for="password">Password:</label>
				</td>
				<td>
					<input class="field" type="password" name="password" id="password" size="20" />                   
                </td>
			</tr>
			<tr>
				<td>
					<br />
					<input type="submit" name="submit" value="Login" class="submit" />
					<br /><br />
				</td>
			</tr>
			<tr>
				<td>
					<a href="forgot_password.php" target="_blank">Forgot Password</a>
                    <br /><br /><br />
                </td>
			</tr>
			</form>
		</table>	
				<?php
		}
		else
		{
			echo '<h2>You have already logged in.</h2>';
		}
		echo '</div>';
		?>

	</body>
</html>