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
				include('logo.php');
		?>
		<div id="content">
			<h1 id="page-title">Password Reset</h1>
			<?php
				if(isset($_SESSION['msg']['forgotpwd-success']))
						{
						?>
							<h4>Your password has been reset. The new password has been mailed to you </h4>
						<?
						
							unset($_SESSION['msg']['forgotpwd-success']);
						}
						
						else{
						
				?>
				<form action="restricted/reset_password.php" method="post">
					  
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
					<label class="grey" for="id">College id:</label>
					</td>
					<td>
					<input class="field" type="text" name="id" id="id" value="" size="50" />
					</td>
					</tr>
					<tr>
					<td>
					<label class="grey" for="email">Email:</label>
					</td>
					<td>
					<input class="field" type="text" name="email" id="email" size="50" />  
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