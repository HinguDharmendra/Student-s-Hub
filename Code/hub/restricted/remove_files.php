<?php session_start();

$id = $_SESSION['id'];
$LOCKER_PATH = 'l/'.$id;

$filelist=scandir('../'.$LOCKER_PATH);
for($i=0; $i<count($filelist); $i++)
{
	$filelist2[$i] = substr_replace($filelist[$i],'_',strrpos($filelist[$i],'.'),1);
	if(isset($_POST[$filelist2[$i]]))
	{
		unlink('../'.$LOCKER_PATH.'/'.$filelist[$i]);
	}
}

header("Location: ../locker.php");

?>