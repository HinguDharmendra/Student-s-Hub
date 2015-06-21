<?php session_start();

$id=$_SESSION['id'];

require('functions.php');
require 'dbconfig.php';

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
	or die('Error establishing connection to server');		

$title = $_POST['title'];
$content = $_POST['content'];
$content = htmlentities($content);
$content = '<pre>'.$content.'</pre>';

if($_GET['edit']!="")
{
	$blogs = "SELECT filename FROM blogs WHERE id=".$id." and filename='".$_GET['edit']."';";

	$blogs = mysqli_query($dbc, $blogs)
			or die ('Error querying the database');		

	$blogs =  mysqli_fetch_array($blogs);

	$filename = $blogs['filename'];
	$url = '../blog/'.$id.'/'.$filename.'.xml';


	$file=file_get_contents('../blog/'.$id.'/'.$filename.'.xml');

	if(stripos($file,'<comments>'))
	{
		print_r(substr($file,stripos($file,'<comments>')));
		$comments = substr($file,stripos($file,'<comments>'));
	}
	else
	{
		substr($file,stripos($file,'<comments>'));
		print_r($comments);
		$comments = '</blog>';
	}

	$file='<blog><title>'.$title.'</title><content><![CDATA['.$content.']]></content>'.$comments;

	$blogs = "UPDATE blogs SET name='".$title."' WHERE id=".$id." and name='".$_GET['edit']."';";
	mysqli_query($dbc, $blogs)
		or die ('Error querying the database');		

}
else
{
	$level = $_POST['permission'];
	$postid = newPost($dbc,$level);

	$file='<blog><title>'.$title.'</title>'.'<content><![CDATA['.$content.']]></content></blog>';
	$filename = str_ireplace(' ','-',$title);
	$blogs = "SELECT count(*) FROM blogs WHERE id=".$id." and filename='".$filename."';";
	$blogs = mysqli_query($dbc,$blogs)
		or die ('Error querying the database');		
	$blogs = mysqli_fetch_array($blogs);
	if($blogs['count(*)']==1)
	{
		$filename = $filename."-2";
	}
	$blogs = "INSERT INTO blogs (id, postid, filename, name) VALUES(".$id.",".$postid.", '".$filename."','".$title."');";
	mysqli_query($dbc, $blogs)
		or die ('Error querying the database');		
}

file_put_contents('../blog/'.$id.'/'.$filename.'.xml',$file);

header("Location: ../blog.php");
?>