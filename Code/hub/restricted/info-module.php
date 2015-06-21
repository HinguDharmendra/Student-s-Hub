<?php

	echo '<h3 align="center">Profile</h3>';
	$user = 'SELECT name, email, hubmail, mobile, id, year, department FROM users WHERE id='.$_SESSION['id'];
	
	$user = mysqli_query($dbc, $user)
				or die ('Error querying the database');			
	$user = mysqli_fetch_array($user);
	echo '<ul type = "square">';	
	echo '<li>Veermata Jijabai Technological Institute</li>';
	echo '<li>'.$user['department'].' Department</li>';
	if($_SESSION['usr']['type']=='s')
	{
		echo '<li>Year '.$user['year'].'</li>';
	}
	echo '<li>'.$user['id'].'</li>';
	echo '<li>'.$user['name'].'</li>';
	echo '<li>'.$user['email'].'</li>';
	echo '<li>'.$user['hubmail'].'</li>';
	echo '<li>'.$user['mobile'].'</li>';
	echo '<li><a href="change_password.php">Change Password</a></li>';
	echo '</ul>';
	
?>