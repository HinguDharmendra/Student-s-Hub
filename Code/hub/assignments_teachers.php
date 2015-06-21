
			
				
				
				<h3>Upload a new assignment:</h3>

				<form action="restricted/new_assignments.php" method="post" enctype="multipart/form-data">

					<table>
						<tr>
							<td><label for="newa-name">Assignment name:</label></td>
							<td><input type="text" id="newa-name" name="name" size = "25"/></td>
						</tr>
						<tr>
							<td><label for="date">Date:</label></td>
							<td><input type="date" id="date" name="date"/></td>
						</tr>

						<tr><td><label for="year">Select Year</label></td>
						<td><select id="year" name="year">
						
						<?php
							
							
							for($i=1;$i<=4;$i++)
							{				
								echo '<option value="'.$i.'">'.$i.'</option>';
							}
						?>
						</select></td></tr>
						<tr><td><label for "file">Select an assignment to upload</label></td>
						<td><input type="file" name="file" id="file"><br /></td></tr>
					</table>
					<br />
					<hr>
				<?php
				echo '<tr><td>&nbsp;</td></tr>';
				echo '<tr><td></td><td></td><td></td><td><input type="submit" name="submit" value="Submit"></td></tr>';
				echo '</table>';
				echo '</form>';

				?>

				<?php
					if(isset($_SESSION['msg']['assignment-err']))
					{
						echo '<div id="replace" class="error">'.$_SESSION['msg']['assignment-err'];
						if($_SESSION['msg']['assignment-err']=='File already exists. Do you want to replace it?')
						{
							$replace_files = explode(',',$_SESSION['tmp']['file-upload']);
							$tid = $_SESSION['tmp']['tid'];
							for($i=0; $i<count($replace_files)-1; $i++)
							{
								echo '
								<br />
								<button id="replacet'.$i.'" onclick="replace(true,\''.$replace_files[$i].'\','.$tid.','.$i.','.(count($replace_files)-1).')">Replace '.$replace_files[$i].'</button>
								<button id="replacef'.$i.'" onclick="replace(false,\''.$replace_files[$i].'\','.$tid.','.$i.','.(count($replace_files)-1).')">Do no submit</button>
								';				
							}
							unset($_SESSION['tmp']['file-upload']);
						}
						echo '</div>';
						unset($_SESSION['msg']['assignment-err']);
					}
					if(isset($_SESSION['msg']['assignment-success']))
					{
						echo '<div class="success"><p>'.$_SESSION['msg']['assignment-success'].'</p></div>';
						unset($_SESSION['msg']['assignment-success']);
					}

					echo '<div id="uploadSuccess"></div>';
					
					include('filelist_assignments.php');
					
			
				
			