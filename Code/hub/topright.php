		<table id="topright" align="right">
		<tr>
		<?php
			if(isset($_SESSION['id']))
			{
				echo '<td><a href="logout.php">Logout</a></td>';
			}
			else
			{
				echo '<td><a href="register.php">Register</a></td>';
				echo '<td><a href="login.php">Login</a></td>';
			}
		?>
		<td><form name="search" action="restricted/search.php" method="GET">
			<input type="text" name="query" />
			<input type="submit" name="submit" value="Search" />
			</form></td>
		</tr>
		</table>
