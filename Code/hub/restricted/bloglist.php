<?php
	

	if(isset($_GET['p']))
	{
		$bid = $_GET['p'];
		$user = "SELECT name FROM users WHERE id=".$bid;
		$user = mysqli_query($dbc,$user);
		$user = mysqli_fetch_array($user);
		echo '<h3>'.$user['name'].'\'s Blogs</h3>';
	}
	
	else
	{
		echo '<h3>Your Blogs</h3>';
		$bid = $id;
	}
		
	$blogs = "SELECT postid, name, filename FROM blogs WHERE id=".$bid;

	$blogs = mysqli_query($dbc, $blogs)
			or die ('Error querying the database');		
	
	if($num_row = mysqli_num_rows($blogs)==0)
	{
		echo '<p>No blogs to display!</p>';
	}
	else
	{
		echo '<table id="bloglist">';	
		while($row_blogs = mysqli_fetch_array($blogs))
		{
			if(checkAccess($dbc,$row_blogs['postid']))
			{
				echo '<tr><td><a href="?p='.$bid.'&b='.$row_blogs['filename'].'">'.$row_blogs['name'].'</a></td>';
				if($bid==$id)
				{
				echo '<td><a href="compose-blog.php?edit='.$row_blogs['filename'].'">Edit</td>';
				}
				echo '</tr>';
			}
		}
		echo '</table>';
		
	}

		echo '
			<br />
			<a href="compose-blog.php"><button>Compose Blog</button></a>
			';
	
?>