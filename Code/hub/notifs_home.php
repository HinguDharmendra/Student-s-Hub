<?php
	$host="localhost"; // Host name
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="hub"; // Database name
	echo "<ul type='square'>";
	
	$tbl_name="forum_question";
	mysql_connect("$host","$username","$password") or die("Can not connect to database");
	mysql_select_db("$db_name")or die("Can not select table");

	$query_for_result=mysql_query("SELECT * FROM $tbl_name ORDER BY id DESC");

	if($data_fetch=mysql_fetch_array($query_for_result))
	{
		echo "<li>";
		echo "General Forum - ".$data_fetch['topic'];
		echo "</li>";
	}
	
	$tbl_name="forum_question_dept";
	mysql_connect("$host","$username","$password") or die("Can not connect to database");
	mysql_select_db("$db_name")or die("Can not select table");
	
	$dept=$_SESSION['usr']['department'];
	$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE dept='".$dept."' ORDER BY id DESC");

	if($data_fetch=mysql_fetch_array($query_for_result))
	{
		echo "<li>";
		echo "Departmental Forum - ".$data_fetch['topic'];
		echo "</li>";
	}
	
	$tbl_name="forum_question_soc";
	mysql_connect("$host","$username","$password") or die("Can not connect to database");
	mysql_select_db("$db_name")or die("Can not select table");

	$query_for_result=mysql_query("SELECT * FROM $tbl_name ORDER BY id DESC");

	if($data_fetch=mysql_fetch_array($query_for_result))
	{
		echo "<li>";
		echo "Societies Forum - ".$data_fetch['topic'];
		echo "</li>";
	}
	
	$tbl_name="forum_question_fes";
	mysql_connect("$host","$username","$password") or die("Can not connect to database");
	mysql_select_db("$db_name")or die("Can not select table");

	$query_for_result=mysql_query("SELECT * FROM $tbl_name ORDER BY id DESC");

	if($data_fetch=mysql_fetch_array($query_for_result))
	{
		echo "<li>";
		echo "Festivals Forum - ".$data_fetch['topic'];
		echo "</li>";
	}
	
	$tbl_name="notices";
	mysql_connect("$host","$username","$password") or die("Can not connect to database");
	mysql_select_db("$db_name")or die("Can not select table");

	$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE type='e' ORDER BY date DESC");

	if($data_fetch=mysql_fetch_array($query_for_result))
	{
		$data_fetch['content'] = str_ireplace('-','',$data_fetch['content']);
		echo "<li>";
		echo "Exams - ".$data_fetch['content'];
		echo "</li>";
	}
	
	$tbl_name="notices";
	mysql_connect("$host","$username","$password") or die("Can not connect to database");
	mysql_select_db("$db_name")or die("Can not select table");

	$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE type='r' ORDER BY date DESC");

	if($data_fetch=mysql_fetch_array($query_for_result))
	{
		$data_fetch['content'] = str_ireplace('-','',$data_fetch['content']);
		echo "<li>";
		echo "Results - ".$data_fetch['content'];
		echo "</li>";
	}
	
	echo "</ul>";
?>
