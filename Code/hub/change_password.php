<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}
?>
<html>
<head>
			<title>Password Reset - Students' HUB</title>
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
			<h1 id="page-title">Password Reset</h1>
			<?php
			if(isset($_SESSION['msg']['forgotpwd-success']))
						{
						?>
							<h4>Your password has been reset.</h4>
						<?
						
							unset($_SESSION['msg']['forgotpwd-success']);
						}
						
						else{
						
				?>
            	<!-- Login Form -->
				<form action="restricted/new_password.php" method="post">
					  
					<div class="showError">
                    <?php						
						if(isset($_SESSION['msg']['forgotpwd-err']))
						{
							echo '<div class="error">'.$_SESSION['msg']['forgotpwd-err'].'</div>';
							unset($_SESSION['msg']['forgotpwd-err']);													
						}
					?>                                
                    </div>
					<table>
					<tr>
					<td>
					<label class="grey" for="password">Current Password:</label>
					</td>
					<td>
					<input class="field" type="password" name="password" id="password" value="" size="50" />
					</td>
					</tr>
					<tr>
					<td>
					<label class="grey" for="npassword1">New Password:</label>
					</td>
					<td>
					<input class="field" type="password" name="npassword1" id="npassword1" value="" size="50" />
					</td>
					</tr>
					<tr>
					<td>
					<label class="grey" for="npassword2">Confirm Password:</label>
					</td>
					<td>
					<input class="field" type="password" name="npassword2" id="npassword2" value="" size="50" />
					</td>
					</tr>
					<tr>
					<td>
					<input type="submit" name="submit" value="Submit" class="submit" />
					</td>
					</tr>

					</table>
                    
				</form>
                <?php
				}
				?>
		</div>
	</body>
</html>