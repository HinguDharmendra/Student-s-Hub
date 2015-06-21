<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$LOCKER_PATH = 'l/'.$id;
		
		$title = '';
		$content = '';
		$filename = '';
		if(isset($_GET['edit']))
		{
			$filename = $_GET['edit'];
			$url = 'blog'.'/'.$id.'/'.$filename.'.xml';
			$xml = simplexml_load_file($url);

			$title =  $xml->title;
			$content = $xml->content;

			$content = str_ireplace('<pre>','',$content);
			$content = str_ireplace('</pre>','',$content);
		}
	}

?>
<html>
	<head>
		<title>Blog - Students' HUB</title>
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
			<?php 
			echo '
			<h1 id="page-title">Blog</h1>
			<form name="blog-content" action="restricted/new_post.php?edit='.$filename.'" method="post">
			<input type="text" name="title" value = "'.$title.'"/>
			<br />
			<textarea name="content" rows="30" cols="100">'.$content.'</textarea>
			';
			if(!isset($_GET['edit']))
			{
				echo '<table>';
				include('permissions.php');
				echo '</table>';
			}
			echo '
			<input type="submit" value="Publish" />
			</form>
			';
			 ?>
		</div>
	</body>
</html>