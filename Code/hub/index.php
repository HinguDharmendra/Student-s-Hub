<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$LOCKER_PATH = 'l/'.$id;
	}
	else
	{
		$id = 0;
	}
?>
<!DOCTYPE HTML />
<html>
	<head>
		<title>Home - Students' HUB</title>
		<meta name="description" content="VJTI Students' dashboard">
		<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
		<meta name="author" content="Deep Shah, Dharmendra Hingu">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	
	<body>
	<?php
		if(!$id)
		{
			include('welcomepage.php');
		}	
		else if($_SESSION['usr']['type']=='s'||$_SESSION['usr']['type']=='t')
		{
			include('common.php');
	?>
		
		<div id="content">
			<table>
			<tr><td style="border-radius:15px; border: 5px solid #6f1717; width:440px; height:300px;">
			<div id="info-module">
				<?php include('restricted\info-module.php');
				?>
			</div>
			</td>
			<td style="border-radius:15px; border: 5px solid #6f1717; width:440px; height:300px;">
			<div>
				<img src = "VJTI_Main_Entrance.jpg" style="position:relative; left:7%;"/>
			</div>
			</td></tr>
<tr><td style="border-radius:15px; border: 5px solid #6f1717; min-height:300px;">			
			<div id="locker-module">
			<h3 align="center">Locker</h3>
			<?php
			
				$filelist=scandir($LOCKER_PATH);
				echo '<table>';
				echo '<tr>';
				echo '<td><b>Filename</b></td>';
				echo '</tr>';
				for($i=0; $i<count($filelist); $i++)
				{
					if($filelist[$i]=='.' or $filelist[$i]=='..' or $filelist[$i]=='tmp')
						continue;	
					$file = explode(".",$filelist[$i]);
					echo '<tr><td>'.$file[0].'</td></tr>';
				}
				echo '</table>';
			?>
			</div>
			</td><td style="border-radius:15px; border: 5px solid #6f1717; height:300px;">
			<div>
				<h3 align="center">Notifications</h3>
				<?php include('notifs_home.php'); ?>
			</div>
			</td></tr></table>
			
		</div>
		<?php
		}
		else if($_SESSION['usr']['type']=='a')
		{
			include('common.php');
			include('admin.php');
		}
		?>
	</body>
</html>