<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$LOCKER_PATH = 'l/'.$id;
	}	
?>
<html>
	<head>
			<title>Assignments - Students' HUB</title>
			<meta name="description" content="VJTI Students' dashboard">
			<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
			<meta name="author" content="Deep Shah, Dharmendra Hingu">
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/main.css">
			
		<script>
		function replace(rep,filename,tid,i,c)
		{
			var xmlhttp;
			
			if (window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					if(rep)
					{
						document.getElementById("uploadSuccess").innerHTML="The file is replaced and submitted successfully";
					}
					else
					{
						document.getElementById("uploadSuccess").innerHTML="The file is was not replaced";
					}
					
					document.getElementById("replacet"+i).hidden=true;
					document.getElementById("replacef"+i).hidden=true;
					for(var j=0; j<c;j++)
						if(!document.getElementById("replacef"+j.toString()).hidden)
							break;
					if(j==c)
						document.getElementById("replace").hidden=true;
				}
			}
			
			xmlhttp.open("POST","restricted/replace_assignment.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("replace="+rep+"&filename="+filename+"&teacher="+tid);
		}

		</script>	
	</head>
	<body>
		<?php
				include('common.php');
		?>
		<div id="content">
			<h1 id="page-title">Assignments</h1>

			<?php include('restricted/assignmentslist.php'); ?>
			
			<hr />
			
			<?php
			
			if($_SESSION['usr']['type']=='s')  //for students
			{
			?>
				<h3>Submit an assignment:</h3>

				<form action="restricted/upload_assignments.php" method="post" enctype="multipart/form-data">

					<table>
						<tr><td><label for="teacher">Select teacher</label></td>
						<td><select id="teacher" name="teacher">
						
						<?php
							
							require('restricted/tlist.php');		
							$i=0;
							while($tlist = mysqli_fetch_array($result_teacher,MYSQL_ASSOC))
							{				
								echo '<option value="'.$tlist['id'].'">'.$tlist['name'].'</option>';
								$i++;
							}
						?>
						</select></td></tr>
						<tr><td><label for "file">Select an assignment to submit</label></td>
						<td><input type="file" name="file" id="file"><br /></td></tr>
					</table>
					<br />
					<hr>
				<?php
				//file listing
				echo '<p>You can alternatively submit files from your locker. (Note that these files will be copied and any modifications made will have to be submitted again.)</p>';
				echo '<table id="filelist">';
				echo '<tr>';
				echo '<th>Filename</th>';
				echo '<th>Filetpye</th>';
				echo '<th>Last Modified</th>';
				echo '<th>Submit</th>';
				echo '</tr>';

				$filelist=scandir($LOCKER_PATH);

				for($i=0; $i<count($filelist); $i++)
				{
					if($filelist[$i]=='.' or $filelist[$i]=='..' or $filelist[$i]=='tmp' or $filelist[$i]=='assignments')
						continue;	
					$file = explode(".",$filelist[$i]);
					$mod_time = date('F d, Y',filemtime($LOCKER_PATH.'/'.$filelist[$i]));
					echo('<tr><td><a target="_blank" href="'.$LOCKER_PATH.'/'.$filelist[$i].'">'.$file[0].'</a></td><td>'.$file[1].'</td><td>'.$mod_time.'</td><td><input type="checkbox" name="'.$filelist[$i].'" value="'.$filelist[$i].'" /></td></tr>');
				}
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
					
				}
				
				//for teachers
				else if($_SESSION['usr']['type']=='t')
				{
				include('assignments_teachers.php');
				}
				?>
		</div>	
	</body>
</html>