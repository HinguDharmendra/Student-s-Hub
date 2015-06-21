<?php session_start();
	$id = $_SESSION['id'];
	$LOCKER_PATH = 'l/'.$id;
?>
<html>
<head>
<?php

function upload($LOCKER_PATH)
{
move_uploaded_file($_FILES["file"]["tmp_name"],
    '../'.$LOCKER_PATH.'/'.$_FILES["file"]["name"]);
$_SESSION['msg']['locker-success'] = $_FILES["file"]["name"].' is uploaded in your locker.';
}	  

if($_FILES)
	{
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if (($_FILES["file"]["size"] < 8*1024*1024) and $extension != "exe")

	  {
	  if ($_FILES["file"]["error"] > 0)
		{
		$_SESSION['msg']['locker-err'] = "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
	  else
		{
		
		if (file_exists('../'.$LOCKER_PATH.'/' . $_FILES["file"]["name"]))
		{
			mkdir('../'.$LOCKER_PATH.'/tmp');
			move_uploaded_file($_FILES["file"]["tmp_name"],
			'../'.$LOCKER_PATH.'/tmp/' . $_FILES["file"]["name"]);
			$_SESSION['msg']['locker-err'] = 'File already exists. Do you want to replace it?';
			$_SESSION['tmp']['file-upload'] = $_FILES["file"]["name"];
		}
		else
		{	  
			upload($LOCKER_PATH);
		}
		}
	  }

	else
	  {
		$_SESSION['msg']['locker-err'] =  "Invalid file. Maximum file limit allowed is 8MB and you cannot upload .exe files.";
	  }
}

else
{
	$_SESSION['msg']['locker-err'] =  "Invalid file. Maximum file limit allowed is 8MB and you cannot upload .exe files.";
}

header("Location: ../locker.php");
?>
</body></html>
<?php
exit();
?>
