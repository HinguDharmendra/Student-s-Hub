<?php
	if(!isset($_SESSION['msg']['login-err']))
		$_SESSION['msg']['login-err']="";
?>
<!DOCTYPE html />
<html>
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    
</head>
<body>
  
    
    <!-- Content Div Starts Below -->
    <div id="content">
    	    <?php
				if(!isset($_SESSION['id']))
				{
			?>
					<h2>You need to log in first!</h2>
					<!-- Login Form -->
					<form action="restricted/authorize.php" method="post">
						<h1>Member Login</h1>     
						<div class="showError">
						<?php						
							if($_SESSION['msg']['login-err'])
							{
								echo '<div class="error">'.$_SESSION['msg']['login-err'].'</div>';
								unset($_SESSION['msg']['login-err']);													
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
									<label class="grey" for="password">Password:</label>
								</td>
								<td>
									<input class="field" type="password" name="password" id="password" size="50" />                   
								</td>
							</tr>
						</table>
						<div class="clear"></div>
						<br />
						<input type="submit" name="submit" value="Login" class="submit" />
						<br /><br />
						<a class="error" href="forgot_password.php" target="_blank">Forgot Password ???</a>
						<br /><br /><br />
						
					</form>
					<?php
				}
				else
				{
					?>
					<h1>You already are logged in.</h1>
					<?php
				}
					?>
            	
            </div>      	

        </div>
    
  
   
    
</body>
</html>