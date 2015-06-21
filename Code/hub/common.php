<?php
require('restricted/access_control.php');
?>

<div id="logo"><font size="5">VJTI's &nbsp;&nbsp;&nbsp;&nbsp;</font><font size="7">Students' HUB</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

<div id="topright">
	<table>
		<tr>
			<?php
				if(checkAccess($dbc,1))
				{
					echo '<td><a href="logout.php">Logout</a></td>';
				}
				else
				{
					echo '<td><a href="register.php">Register</a></td>';
					echo '<td><a href="login.php">Login</a></td>';
				}
			?>
			<td><form name="search" action="search.php" method="GET">
				<input type="text" name="query"/>
				<input type="submit" name="submit" value="Search"/>
				</form></td>
		</tr>
	</table>
</div>


<table id="navbar">
	<tr>
		<td><a href="/hub">Home</a></td>
		<?php 
		if(isset($_SESSION['usr']))
		{
			if($_SESSION['usr']['type']=='t' or $_SESSION['usr']['type']=='a')
			{
				echo '<td><a href="notices_admin.php">Notices</a></td>';
			}
			
			else
			{
				echo '<td><a href="notices.php">Notices</a></td>';
			}
		}
		else
		{
			echo '<td><a href="notices.php">Notices</a></td>';
		}
		?>
		<td><a href="assignments.php">Assignments</a></td>
		<td><a href="events.php">Events</a></td>
		<td><a href="forum_home.php">Forums</a></td>
		<td><a href="results.php">Results</a></td>
	</tr>
</table>

<table id="tab-bar">
		<tr><td><a href="mail" target="_blank">Mail</a></td></tr>
		<tr><td><a href="locker.php">Locker</a></td></tr>
		<tr><td><a href="blog.php">Blog</a></td></tr>
		<tr><td><a href="complaint.php">Complaint</a></td></tr>	
		<tr><td><a href="help.php">Guide</a></td></tr>		
		
</table>
		

<div id="bottom-right">
<h4>Popular Links</h4>
<a href="http://www.technovanza.org">Technovanza</a>&nbsp;&nbsp;
<a href="http://www.pratibimb.org">Pratibimb</a>&nbsp;&nbsp;
<a href="http://www.enthusia.org">Enthusia</a>&nbsp;&nbsp;
<hr>
<a href="http://www.sra.vjti.info">SRA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.dla.vjti.info">DLA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.csi.vjti.info">CSI</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.sae.vjti.info">SAE</a>
<hr>
<a href="https://www.facebook.com/fb.vjti"><img src="images/fb.png" alt="Facebook Page" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://twitter.com/vjti"><img src="images/twitter.png" alt="Twitter Page" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://github.com/vjti"><img src="images/github.png" alt="GitHub Repo" /></a>
</div>

<?php

	if(isset($_SESSION['tmp']['no-login-form']))
	{	
		unset($_SESSION['tmp']['no-login-form']);
		exit();
	}
		
	if(!isset($_SESSION['id']))
	{
		include('login-module.php');
		exit();
	}

if(checkAccess($dbc,2))
{
	include 'notifs.php';
}
?>