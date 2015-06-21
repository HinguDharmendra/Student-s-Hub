<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}
?>
<html>
<head>
			<title>Results - Students' HUB</title>
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
			<h1 id="page-title">Results</h1>
			
			<?php
			if($_SESSION['usr']['type']=='s')
			{
				include('restricted/get_results.php');
			}
			
			else
			{
			?>
				<p>Enter grades:</p>
				<div id="add-result">
					<form name="add-results" action="restricted/add_result.php" method="POST">
					<table>
					<tr><th>Student's id</th><th>Course Code</th><th>Grade</th></tr>
					<?php
					for($i=1;$i<=10;$i++)
					{
					echo '
					<tr>
						<td><input type="text" id="id'.$i.'" name="id'.$i.'" size = "9"/></td>
						<td><input type="text" id="code'.$i.'" name="code'.$i.'" size = "10"/></td>
						<td><input type="text" id="grade'.$i.'" name="grade'.$i.'" size = "3"/></td>
					</tr>
					';
					}
					?>
					<tr>
						<td><input type="submit" value="Submit Grades" /></td>
					</tr>
					</table
					</form>
				</div>
				<p><i>Note: You may enter 10 grades at a time. Any previously entered grade of the student for the same subject code will be replaced.</i></p>
			<?php
			}
			?>
		</div>
	</body>
</html>