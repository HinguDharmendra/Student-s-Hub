<?php

if($_SESSION['usr']['type']=='s')
{
$assignments = "SELECT name, teacher, date, path FROM assignments WHERE year=".$_SESSION['usr']['year']." and department='".$_SESSION['usr']['department']."';";
}

else if($_SESSION['usr']['type']=='t')
{
$assignments = "SELECT name, date, path FROM assignments WHERE year=".$_SESSION['usr']['year']." and department='".$_SESSION['usr']['department']."';";
}

else if($_SESSION['usr']['type']=='a')
{
$assignments = "SELECT name, teacher, date, path FROM assignments;";
}
	

$assignments = mysqli_query($dbc,$assignments)
	or die ('Error querying the database');		

echo '<form name="remove-assignments" action="restricted/remove_assignments.php" method="POST">';
echo '<table>';
echo '<th>Assignment</th><th>Date Due</th>';
if($_SESSION['usr']['type']=='s')
{
	echo '<th>Teacher</th>';
}
else if($_SESSION['usr']['type']=='t' or $_SESSION['usr']['type']=='a')
{
	echo '<th>Remove';
}

while($row_assignments=mysqli_fetch_array($assignments))
{
		
	echo '<tr><td><a href="'.$row_assignments['path'].'">'.$row_assignments['name'].'</a></td><td>'.$row_assignments['date'].'</td>';
	if($_SESSION['usr']['type']=='s')
	{
		echo '<td>'.$row_assignments['teacher'].'</td></tr>';
	}
	
	else if($_SESSION['usr']['type']=='t' or $_SESSION['usr']['type']=='a')
	{
		echo '<td><input type="radio" name="paths" value="'.$row_assignments['path'].'" /></td></tr>';
		
	}
}

if($_SESSION['usr']['type']=='t' or $_SESSION['usr']['type']=='a')
{
	echo '<tr><td><input type="submit" name="submit" value="Remove files" /></td></tr>';
}

	echo '</table>';
	echo '</form>';
?>