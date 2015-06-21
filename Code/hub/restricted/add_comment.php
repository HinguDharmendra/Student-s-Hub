<?php
session_start();
$id=$_SESSION['id'];
mkdir('../'.$_POST['url']);
$xml = html_entity_decode(file_get_contents('../'.$_POST['url']));
$xml=str_ireplace('</blog>','',$xml);
$xml=$xml.'<comments><name>'.$_SESSION['usr']['name'].'</name><time>'.date("h:i A").' on '.date("d M, y").'</time><text>'.$_POST['comment-text'].'</text></comments></blog>';

file_put_contents('../'.$_POST['url'],$xml);

$to = $_POST['p'].'@hub.com';
$subject = "[BLOGS] New Comment: ".$_POST['name'];
$headers = "FROM: blogs@hub.com";
$message = "A new comment has been posted by ".$_SESSION['usr']['name']." on your blog ".$_POST['name'].".";

if($_POST['p']!=$id)
{
	mail($to,$subject,$message,$headers);
}

?>
