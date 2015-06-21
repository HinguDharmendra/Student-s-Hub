<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}	
	$host="localhost";
	$username="root";
	$password="";
	$db_name="hub"; 
	$tbl_name="notices"; 
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");

	$Exams=Null;
	$Results=Null;
	$Holidays=Null;
	$Other=Null;
	
	$Exams=$_POST['Exams'];
	$Results=$_POST['Results'];
	$Holidays=$_POST['Holidays'];
	$Other=$_POST['Other'];
	
	$date=date("y/m/d"); //create date time
	if($_POST['Exams'])
	{
		$sql="INSERT INTO $tbl_name VALUES('-- ".$_POST['ContentE']." --','e','".$date."')";
		$result=mysql_query($sql);
	}
	elseif($_POST['Results'])
	{
		$sql="INSERT INTO $tbl_name VALUES('-- ".$_POST['ContentR']." --','r','".$date."')";
		$result=mysql_query($sql);
	}
	elseif($_POST['Holidays'])
	{
		$sql="INSERT INTO $tbl_name VALUES('-- ".$_POST['ContentH']." --','h','".$date."')";
		$result=mysql_query($sql);
	}
	elseif($_POST['Other'])
	{
		$sql="INSERT INTO $tbl_name VALUES('-- ".$_POST['ContentO']." --','o','".$date."')";
		$result=mysql_query($sql);
	}
	else
	{
		header('Refresh:3; URL=notices_admin.php');
	}

	if($result)
	{
		echo "Successful";
		//header('Refresh:0; URL=notices_admin.php');
		header('Location:notices_admin.php');
	}	
	else 
	{
		echo "Error";
		//header('Refresh:0; URL=notices_admin.php');
		header('Location:notices_admin.php');
	}	

	mysql_close();
	
?>
