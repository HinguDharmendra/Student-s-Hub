<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}	
?>
<html>
	<head>
			<title>Forums - Students' HUB</title>
			<meta name="description" content="VJTI Students' dashboard">
			<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
			<meta name="author" content="Deep Shah, Dharmendra Hingu">
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php
				include('common.php');
		?>
		<div id="content">
			<h1 id="page-title">Forums</h1>

		<?php
			include('main_forum.php');
		?>	
		<br /><br /><br /><br />
		</div>	
	</body>
</html>