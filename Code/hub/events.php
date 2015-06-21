<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}
?>
<html>
<head>
			<title>Events - Students' HUB</title>
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
			<h1 id="page-title">Events</h1>
			
			<div id="eventslist">
				<?php include('restricted/eventslist.php'); ?>
			</div>
			<br />
			<hr />
			<br />
			<div id="new-event">
				<form name="create-event" action="restricted/create_event.php" method="POST">
				<table>
				<tr>
					<td><label for="name">Event name:</label></td>
					<td><input type="text" id="name" name="name" size = "25"/></td>
				</tr>
				<tr>
					<td><label for="date">Date:</label></td>
					<td><input type="date" id="date" name="date"/></td>
				</tr>
				<tr>
					<td><label for="description">Description:</label></td>
					<td><textarea id="description" name="description" size = "50"></textarea></td>
				</tr>
				
				<?php require('permissions.php'); ?>
				<tr>
					<td><input type="submit" value="Create Event" /></td>
				</tr>

				</form>
			</div>
		</div>
	</body>
</html>