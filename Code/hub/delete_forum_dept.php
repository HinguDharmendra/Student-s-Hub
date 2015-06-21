<?php session_start();

$id = $_SESSION['id'];
$host="localhost";
$username="root";
$password=""; 
$db_name="hub"; 

$tbl_name="forum_question_dept"; 
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name ORDER BY id DESC";

$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
for($i=0; $i<count($rows); $i++)
{
	if(isset($_POST[$rows['id']]))
	{
		$sql2="DELETE FROM $tbl_name WHERE id='".$rows['id']."'";
		$result2=mysql_query($sql2);
		
		$tbl_name="forum_answer_dept"; 
		mysql_connect("$host", "$username", "$password")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");
		
		$sql3="DELETE FROM $tbl_name WHERE question_id='".$rows['id']."'";
		$result3=mysql_query($sql3);
	}
}

header("Location: main_forum_dept.php");

?>