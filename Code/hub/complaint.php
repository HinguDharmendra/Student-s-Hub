<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}	
?>
<html>
	<head>
			<title>Complaint - Students' HUB</title>
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
			<h1 id="page-title">Complaint Box</h1>
			<form name="create-event" action="restricted/mail_complaint.php" method="POST">
			<table>
			<tr>
				<td><label for="subject">Subject:</label></td><!-- 'subject' thing in mail--> 
				<td><input type="text" id="subject" name="subject" size = "25"/></td>
			</tr>
			<tr>
				<td><label for="message">Description:</label></td>
				<td><textarea id="message" name="message" size = "50"></textarea></td>
			</tr>
			</table>
				<input type = "submit" value = "Send" name = "Send" />
			</form>
		</div>	
	</body>
</html>