
	<div id="content">
	<h1 id="page-title">Select User</h1>
		<table>
			<form method="post" id="customForm" action="admin_home.php">
				<tr>
					<td>
						<label for="name">College ID.</label>
					</td>
					<td>
						<?php
												
							$host="localhost";
							$username="root";
							$password="";
							$db_name="hub";

							$tbl_name="users";
							mysql_connect("$host","$username","$password") or die("Can not connect to database");
							mysql_select_db("$db_name")or die("Can not select table");
							
							$query=mysql_query("SELECT id FROM $tbl_name");
							echo '<select name="id" id="id">';
							while($row=mysql_fetch_array($query))
							{							
								echo ('<option value='.$row['id'].'>'.$row['id'].'</option>');							
							}
							echo '</select>';
							?>
					</td>
					</tr>

					<tr>
						<td>
							<input id="submit" name="submit" type="submit" value="Go" />
						</td>
					</tr>
					
			</form>
		</table>
	</div>
