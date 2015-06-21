<?php session_start();
	if(!isset($_SESSION['msg']['change-err']))
		$_SESSION['msg']['change-err']="";
	if(!isset($_SESSION['id']))
		$_SESSION['id']=0; 
	if(!isset($_SESSION['msg']['change-success']))
		$_SESSION['msg']['change-success']=FALSE;?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Reset Password</title>
    
</head>
<body>
  
    
    <!-- Content Div Starts Below -->
    <div id="content">
    	<div class="wrapper">        
        	<div id="mainContent">
            <?php
				if($_SESSION['id'])
				{
				if($_SESSION['msg']['change-success'])
				{
			?>
				<h2>
				Password changed! <br />
				Proceed to <a href="/hub/login.php" title="Login" target="_self">Students' HUB page.</a>
				</h2>
			<?php
				unset($_SESSION['msg']['change-success']);
				}
				else
				{
				?>
            	<!-- Change Password Form -->
				<form action="restricted/change_password.php" method="post">
					<div class="showError">
                    <?php						
						if($_SESSION['msg']['change-err'])
						{
							echo '<div class="error">'.$_SESSION['msg']['change-err'].'</div>';
							unset($_SESSION['msg']['change-err']);													
						}
					?>                                
                    </div>                 
					<label class="grey" for="oldpassword">Current assword:</label>
					<input class="field" type="password" name="oldpassword" id="oldpassword" size="50" /> 
					<label class="grey" for="newpassword1">Enter new password:</label>
					<input class="field" type="password" name="newpassword1" id="newpassword1" size="50" />
					<label class="grey" for="newpassword2">Confirm password:</label>
					<input class="field" type="password" name="newpassword2" id="newpassword2" size="50" />
        			<div class="clear"></div>
                    <br />
					<input type="submit" name="submit" value="Submit" class="submit" />
					<br /><br />
                    
				</form>
                <?php
				}
				}
				else
				{
				?>
                <h1>You need to <a class="site" href="login.php">log in</a> first.</h1> 
                <?php
				}
				?>
            	
            </div>      	

        </div>
    
  
   
    
</body>
</html>