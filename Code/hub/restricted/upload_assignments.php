<?php session_start();
	$id = $_SESSION['id'];
	$tid = $_POST['teacher'];
	$ASSIGNMENT_PATH = 'l/'.$tid.'/assignments/'.$id;
	$LOCKER_PATH = 'l/'.$id;


?>
<html>
<head>
<?php

function upload($ASSIGNMENT_PATH,$success)
{
	move_uploaded_file($_FILES["file"]["tmp_name"],
		'../'.$ASSIGNMENT_PATH.'/'.$_FILES["file"]["name"]);
	$success[] = $_FILES["file"]["name"].' is submitted successfully.';
	return $success;
}	  

$success = array();

mkdir('../l/'.$tid.'/assignments/'.$id);

$filelist=scandir('../'.$LOCKER_PATH);

for($i=0; $i<count($filelist); $i++)
{


	$filelist2[$i] = substr_replace($filelist[$i],'_',strrpos($filelist[$i],'.'),1);
	$filelist2[$i] = str_ireplace(' ','_',$filelist2[$i]);
	if(isset($_POST[$filelist2[$i]]))
	{	


		if (file_exists('../'.$ASSIGNMENT_PATH.'/' . $filelist[$i]))
		{
			mkdir('../'.$ASSIGNMENT_PATH.'/tmp');
			copy('../'.$LOCKER_PATH.'/'.$filelist[$i],
			'../'.$ASSIGNMENT_PATH.'/tmp/' . $filelist[$i]);
			$_SESSION['msg']['assignment-err'] = 'File already exists. Do you want to replace it?';
			$_SESSION['tmp']['file-upload'] = $_SESSION['tmp']['file-upload'].$filelist[$i].',';
			$_SESSION['tmp']['tid'] = $tid;
		}		
		else
		{
			copy('../'.$LOCKER_PATH.'/'.$filelist[$i],'../'.$ASSIGNMENT_PATH.'/'.$filelist[$i]);
			$success[] = $filelist[$i].' is submitted successfully.';
		}
	}
}

if($_FILES)
{
	if($_FILES["file"]["tmp_name"])
	{
		$extension = end(explode(".", $_FILES["file"]["name"]));
		if (($_FILES["file"]["size"] < 8*1024*1024) and $extension != "exe")

		  {
		  if ($_FILES["file"]["error"] > 0)
			{
			$_SESSION['msg']['assignment-err'] = "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
		  else
			{
			
			if (file_exists('../'.$ASSIGNMENT_PATH.'/' . $_FILES["file"]["name"]))
			{
				mkdir('../'.$ASSIGNMENT_PATH.'/tmp');
				move_uploaded_file($_FILES["file"]["tmp_name"],
				'../'.$ASSIGNMENT_PATH.'/tmp/' . $_FILES["file"]["name"]);
				$_SESSION['msg']['assignment-err'] = 'File already exists. Do you want to replace it?';
				$_SESSION['tmp']['file-upload'] = $_SESSION['tmp']['file-upload'].$_FILES["file"]["name"].',';
				$_SESSION['tmp']['tid'] = $tid;
			}
			else
			{	  
				$success=upload($ASSIGNMENT_PATH,$success);
			}
			}
		  }

		else
		  {
			$_SESSION['msg']['assignment-err'] =  "Invalid file. Maximum file limit allowed is 8MB and you cannot upload .exe files.";
		  }
	}
}

else
{
	$_SESSION['msg']['assignment-err'] =  "Invalid file. Maximum file limit allowed is 8MB and you cannot upload .exe files.";
}

if($success)
{
	$_SESSION['msg']['assignment-success'] = implode('<br />',$success);
}

header("Location: ../assignments.php");
?>
</body></html>
<?php
exit();
?>
