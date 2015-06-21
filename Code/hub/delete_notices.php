<?php session_start();
	$host="localhost";
	$username="root";
	$password="";
	$db_name="hub"; 
	$tbl_name="notices"; 
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	
	$id = $_SESSION['id'];

$filelist=scandir('../'.$LOCKER_PATH);
for($i=0; $i<count($filelist); $i++)
{
	if(isset($_POST[$filelist2[$i]]))
	{
		
	}
}

header("Location: ../locker.php");

?>