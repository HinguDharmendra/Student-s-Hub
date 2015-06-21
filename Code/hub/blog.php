<?php session_start();
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$LOCKER_PATH = 'l/'.$id;
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
			<script>
				function comment(url,p,name)
				{
					var xmlhttp;
					
					if (window.XMLHttpRequest)
					{
						xmlhttp=new XMLHttpRequest();
					}
					else
					{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					
					var comment = document.getElementById("comment-text").value;
					
					xmlhttp.open("POST","restricted/add_comment.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send("comment-text="+comment+"&url="+url+"&p="+p+"&name="+name);
				}
			</script>

	</head>
	<body>
		<?php
				include('common.php');
		echo '<div id="content">';
			if(isset($_GET['p']) and isset($_GET['b']))
			{
			
			//get blog details
				$url = 'blog'.'/'.$_GET['p'].'/'.$_GET['b'].'.xml';
				$xml = simplexml_load_file($url);

				$title =  $xml->title;
				$content = $xml->content;
				$comments =array();

				foreach($xml->comments as $child)
					{
						$c=array();
						foreach($child->children() as $details)
						{
							$c[]=$details;
						}
						
						$comments[]=$c;
					}
			
			echo '
			<h3>'.$title.'</h3>';
			
			echo '<div id="blog-content">';
			echo '<p>'.$content.'</p>';
			echo '</div>';
			echo '<hr />';
			echo '<div id="blog-comments">';
			echo '<h4>Comments:</h4>';
			for($i=0; $i<count($comments);$i++)
			{
				echo '<p>'.$comments[$i][2].'<br /><i>&nbsp&nbsp&nbsp&nbspBy '.$comments[$i][0].' at '.$comments[$i][1].'</i></p><hr />';
			}
			echo '
			<textarea id="comment-text" rows="2" cols="50"></textarea>
			<button onclick="comment(\''.$url.'\','.$_GET['p'].',\''.$title.'\')">Comment</button>
			</div>
			';
			}
			
			else if (isset($_GET['b']))
			{
				echo '<div class="error">Invalid link!</div>';
			}
			
			else
			{
				include('restricted/bloglist.php');
			}
			?>
		</div>	
	</body>
</html>