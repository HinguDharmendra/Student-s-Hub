<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}	
?>
<html>
	<head>
			<title>Help - Students' HUB</title>
			<meta name="description" content="VJTI Students' dashboard">
			<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
			<meta name="author" content="Deep Shah, Dharmendra Hingu">
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php
			if(isset($_SESSION['id']))
			{
				include('common.php');
			}
			else
			{
				include('logo.php');
			}
		?>
		<div id="content">
			<h1 id="page-title">Guide</h1>
			<h2>Introduction: </h2>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;Students' HUB is a website designed to facilitate and improve the overall communication and 
			coordination amongst students and professors. The website will allow the students to plan 
			activities and events and also have open discussions. Professors can publish assignment 
			questions, while students will be able to answer them and submit them online. Results would 
			also be declared online. Users will also be able to store their personal documents which will be 
			accessible only to the themselves. Admins will be able to monitor the entire system.</p>
			
			
			<h2>Features: </h2>
			
				<ol type = "I">
					<li>  <a href = "register.php"><u>User sign up</u></a>: One time registration process for each user </li>
					<li>  <a href = "login.php"><u>User log in</u></a>: Authentication required to use the system </li>
					<li>  <a href = "index.php"><u>User HUB</u></a>: Dashboard where the user can view all the details </li>  
					<li>  <a href = "events.php"><u>Events</u></a> and <a href = "forums.php"><u>Forums</u></a>: View, add and participate in student activities, events, forums and discussion </li>
					<li>  <a href = "locker.php"><u>Locker</u></a>: A file and document manager where users can store all personal documents </li>
					<li>  <a href = "mail/"><u>Email client</u></a>: Facility to send, receive emails and save drafts </li>
					<li>  <a href = "blog.php"><u>Blogging</u></a>: Users can write have their own blogs where they can post articles written by them </li>
					<li>  <a href = "assignments.php"><u>Academics</u></a>: Publish assignments questions, timetables and results </li>
					<li>  <a href = "assignments.php"><u>Assignments</u></a>: Submit assignments online </li>
					<li>  SMS notifications: Users will be notified about events, activities and results </li>
					<li>  Email notifications: Users will be notified about any events, activities, results and other important notifications and changes as opted by the user </li>
					<li>  <a href = "complaint.php"><u>Complaint box</u></a>: users can report complaints anonymously and review those complaints filed to the them </li>
					<li>  Privacy: Users will be grouped so all the information cannot be accessed by everyone, but only a set of users</li> 
				</ol>
			
		</div>	
	</body>
</html>