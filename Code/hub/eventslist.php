<?php


$events = "SELECT postid, name, creator, date, description FROM events";

$events = mysqli_query($dbc,$events)
	or die ('Error querying the database');		


echo '<table id="events">';
echo '<th>Event</th><th>Date</th><th>Description</th><th>Created by</th>';
while($row_events=mysqli_fetch_array($events))
{
	if(checkAccess($dbc,$row_events['postid']))
	{
		echo '<tr><td>'.$row_events['name'].'</td><td>'.$row_events['date'].'</td><td>'.$row_events['description'].'</td><td>'.$row_events['creator'].'</td></tr>';
	}
}
	echo '</table>';

?>