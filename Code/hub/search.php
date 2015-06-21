<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
	}	
?>
<html>
	<head>
			<title>Search Results - Students' HUB</title>
			<meta name="description" content="VJTI Students' dashboard">
			<meta name="keywords" content="VJTI, hub, dashboard, forums, activites, events, notices">
			<meta name="author" content="Deep Shah, Dharmendra Hingu">
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
	<?php include('common.php');?>
		<div id="content">
			<h1 id="page-title">Search Results</h1>		
				<?php
				$found=false;
				if(isset($_GET['submit']))
				{
					$query=mysql_real_escape_string($_GET['query']);
					if($query != null)
					{
						$host="localhost"; // Host name
						$username="root"; // Mysql username
						$password=""; // Mysql password
						$db_name="hub"; // Database name

						$tbl_name="users";
						$db_tb_atr_name="name";
						mysql_connect("$host","$username","$password") or die("Can not connect to database");
						mysql_select_db("$db_name")or die("Can not select table");

						$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE $db_tb_atr_name like '%".$query."%'");

						while($data_fetch=mysql_fetch_array($query_for_result))
						{
							echo "<h2>User</h2><ol type='none'>";
							echo "<li>";
							if(substr($data_fetch[$db_tb_atr_name], 0,160))
								{echo substr($data_fetch[$db_tb_atr_name], 0,160);$found=true;}
							echo "</li><hr/>";
							echo "</ol>";
						}
						

						$tbl_name="forum_question";
						$db_tb_atr_name="topic";
						mysql_connect("$host","$username","$password") or die("Can not connect to database");
						mysql_select_db("$db_name")or die("Can not select table");
						$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE $db_tb_atr_name like '%".$query."%'");

						while($data_fetch=mysql_fetch_array($query_for_result))
						{
							echo "<h2>Forums</h2><ol type = 'none'>";
							echo "<li>";
							if(substr($data_fetch[$db_tb_atr_name], 0,160))
								{echo substr($data_fetch[$db_tb_atr_name], 0,160);$found=true;}
							echo "</li><hr/>";
							echo "</ol>";
						}
						

						$tbl_name="forum_question_dept";
						$db_tb_atr_name="topic";
						mysql_connect("$host","$username","$password") or die("Can not connect to database");
						mysql_select_db("$db_name")or die("Can not select table");
						$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE $db_tb_atr_name like '%".$query."%'");

						while($data_fetch=mysql_fetch_array($query_for_result))
						{
							echo "<h2>Forums</h2><ol type = 'none'>";
							echo "<li>";
							if(substr($data_fetch[$db_tb_atr_name], 0,160))
								{echo substr($data_fetch[$db_tb_atr_name], 0,160);$found=true;}
							echo "</li><hr/>";
							echo "</ol>";
						}
						

						$tbl_name="forum_question_soc";
						$db_tb_atr_name="topic";
						mysql_connect("$host","$username","$password") or die("Can not connect to database");
						mysql_select_db("$db_name")or die("Can not select table");
						$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE $db_tb_atr_name like '%".$query."%'");

						while($data_fetch=mysql_fetch_array($query_for_result))
						{
							echo "<h2>Forums</h2><ol type = 'none'>";
							echo "<li>";
							if(substr($data_fetch[$db_tb_atr_name], 0,160))
								{echo substr($data_fetch[$db_tb_atr_name], 0,160);$found=true;}
							echo "</li><hr/>";
							echo "</ol>";
						}

						$tbl_name="forum_question_fes";
						$db_tb_atr_name="topic";
						mysql_connect("$host","$username","$password") or die("Can not connect to database");
						mysql_select_db("$db_name")or die("Can not select table");
						$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE $db_tb_atr_name like '%".$query."%'");

						while($data_fetch=mysql_fetch_array($query_for_result))
						{
							echo "<h2>Forums</h2><ol type = 'none'>";
							echo "<li>";
							if(substr($data_fetch[$db_tb_atr_name], 0,160))
								{echo substr($data_fetch[$db_tb_atr_name], 0,160);$found=true;}
							echo "</li><hr/>";
							echo "</ol>";
						}
						

						$tbl_name="forum_answer";
						$db_tb_atr_name="a_answer";
						mysql_connect("$host","$username","$password") or die("Can not connect to database");
						mysql_select_db("$db_name")or die("Can not select table");
						$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE $db_tb_atr_name like '%".$query."%'");

						while($data_fetch=mysql_fetch_array($query_for_result))
						{
							echo "<h2>Forums</h2><ol type = 'none'>";
							echo "<li>";
							if(substr($data_fetch[$db_tb_atr_name], 0,160))
								{echo substr($data_fetch[$db_tb_atr_name], 0,160);$found=true;}
							echo "</li><hr/>";
							echo "</ol>";
						}
						

						$tbl_name="forum_answer_fes";
						$db_tb_atr_name="a_answer";
						mysql_connect("$host","$username","$password") or die("Can not connect to database");
						mysql_select_db("$db_name")or die("Can not select table");
						$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE $db_tb_atr_name like '%".$query."%'");

						while($data_fetch=mysql_fetch_array($query_for_result))
						{
							echo "<h2>Forums</h2><ol type = 'none'>";
							echo "<li>";
							if(substr($data_fetch[$db_tb_atr_name], 0,160))
								{echo substr($data_fetch[$db_tb_atr_name], 0,160);$found=true;}
							echo "</li><hr/>";
							echo "</ol>";
						}
						

						$tbl_name="forum_answer_soc";
						$db_tb_atr_name="a_answer";
						mysql_connect("$host","$username","$password") or die("Can not connect to database");
						mysql_select_db("$db_name")or die("Can not select table");
						$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE $db_tb_atr_name like '%".$query."%'");

						while($data_fetch=mysql_fetch_array($query_for_result))
						{
							echo "<h2>Forums</h2><ol type = 'none'>";
							echo "<li>";
							if(substr($data_fetch[$db_tb_atr_name], 0,160))
								{echo substr($data_fetch[$db_tb_atr_name], 0,160);$found=true;}
							echo "</li><hr/>";
							echo "</ol>";
						}
						

						$tbl_name="forum_answer_dept";
						$db_tb_atr_name="a_answer";
						mysql_connect("$host","$username","$password") or die("Can not connect to database");
						mysql_select_db("$db_name")or die("Can not select table");
						$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE $db_tb_atr_name like '%".$query."%'");

						while($data_fetch=mysql_fetch_array($query_for_result))
						{
							echo "<h2>Forums</h2><ol type = 'none'>";
							echo "<li>";
							if(substr($data_fetch[$db_tb_atr_name], 0,160))
								{echo substr($data_fetch[$db_tb_atr_name], 0,160);$found=true;}
							echo "</li><hr/>";
							echo "</ol>";
						}
						

						$tbl_name="notices";
						$db_tb_atr_name="content";
						mysql_connect("$host","$username","$password") or die("Can not connect to database");
						mysql_select_db("$db_name")or die("Can not select table");
						$query_for_result=mysql_query("SELECT * FROM $tbl_name WHERE $db_tb_atr_name like '%".$query."%'");

						while($data_fetch=mysql_fetch_array($query_for_result))
						{
							echo "<h2>Notices</h2><ol type = 'none'>";
							echo "<li>";
							if(substr($data_fetch[$db_tb_atr_name], 0,160))
								{echo substr($data_fetch[$db_tb_atr_name], 0,160);$found=true;}
							echo "</li><hr/>";
							echo "</ol>";
						}
						
						if($found == false)
						{
							echo "Object not found.";
						}
						mysql_close();
					}
					else
					{
						echo "Please Enter your Query";
					}
				}
				?>
						</div>	
	</body>
</html>