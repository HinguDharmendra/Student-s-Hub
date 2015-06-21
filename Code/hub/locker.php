<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$LOCKER_PATH = 'l/'.$id;
	}?>
<html>
	<head>
		<title>Locker - Students' HUB</title>
		<meta name="description" content="VJTI Students' dashboard">
		<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
		<meta name="author" content="Deep Shah, Dharmendra Hingu">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		
		<script>
		function replace(rep)
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
						document.getElementById("uploadSuccess").innerHTML="The file is replaced and uploaded successfully";
					}
					else
					{
						document.getElementById("uploadSuccess").innerHTML="The file is was not replaced";
					}
					
					document.getElementById("replace").hidden=true;
				}
			}
			
			xmlhttp.open("POST","restricted/replace_file.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("replace="+rep);
		}

		</script>	
	</head>
	<body>
		<?php
				include('common.php');
		?>
		<div id="content">
			<h1 id="page-title">Locker</h1>
			<form action="restricted/upload.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><td><label for "file">Select a file to upload</label></td></tr>
					<tr><td><input type="file" name="file" id="file" /></td>
					<td><input type="submit" name="submit" value="Upload"></td></tr>
				</table>
			</form>
			<?php
				if(isset($_SESSION['msg']['locker-err']))
				{
					echo '<div id="replace" class="error">'.$_SESSION['msg']['locker-err'];
					if($_SESSION['msg']['locker-err']=='File already exists. Do you want to replace it?')
					{
					?>
					<br />
					<button onclick="replace(true)">Replace</button>
					<button onclick="replace(false)">Do no upload</button>
					
					<?php
					echo '</div>';
					}
					
					unset($_SESSION['msg']['locker-err']);
				}
				elseif(isset($_SESSION['msg']['locker-success']))
				{
					echo '<div class="success">'.$_SESSION['msg']['locker-success'].'</div>';
					unset($_SESSION['msg']['locker-success']);
				}
			?>
				<div id="uploadSuccess"></div>
				<br /><br />
				<hr>
			<?php
			//file listing
			include('filelist.php');
			?>
		</div>
	</body>
</html>