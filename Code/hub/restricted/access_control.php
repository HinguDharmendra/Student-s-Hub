<?php

	require 'dbconfig.php';
	
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
		or die('Error establishing connection to server');		

	function checkAccess($dbc,$postid)
	{

		if($_SESSION['usr']['type']=='a')
		{
			return true;
		}

		$access="SELECT owner,level FROM access WHERE postid=".$postid;
		$access = mysqli_query($dbc,$access)
			or die ('Error querying the database');

		$access = mysqli_fetch_array($access);			

		$level=$access['level'];
		
		$access = "SELECT year, department FROM users WHERE id=".$access['owner'];

		$access = mysqli_query($dbc,$access)
			or die ('Error querying the database');		

		$access = mysqli_fetch_array($access);

		$allow=false;

		switch($level)
		{
			case 1: {
					if($access['year']==$_SESSION['usr']['year'] and $access['department']==$_SESSION['usr']['department'])
					{
						$allow=true;
					}
					
					else
					{
						$allow=false;
					}
					}
					break;
			
			case 2: {
					if($access['year']==$_SESSION['usr']['year'])
					{
						$allow=true;
					}
					}
					break;
					
			case 3: {
					if($access['department']==$_SESSION['usr']['department'])
					{
						$allow=true;
					}
					}
					break;
			
			case 4: {
					if($access['year']==$_SESSION['usr']['year'] or $access['department']==$_SESSION['usr']['department'])
					{
						$allow=true;
					}
					}
					break;
			
			case 5: {
					if(isset($_SESSION['id']))
					{
						$allow=true;
					}
					}
					break;
					
			case 6: $allow=true;
					break;
			
			default: $allow=false;
					break;
			
		}
		

		return $allow;
	}
/*
only class:1
year:2
dept:3
either dept or year: 4
reg users:5
public: 6
*/
?>