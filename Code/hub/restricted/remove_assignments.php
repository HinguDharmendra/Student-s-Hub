<?php session_start();

$id = $_SESSION['id'];
$ASSIGNMENT_PATH = 'l/'.$id.'/assignments/'.$id;

$filelist=scandir('../'.$ASSIGNMENT_PATH);

print_r($_POST);
for($i=0; $i<count($_POST['paths']); $i++)
{
//	$filelist2[$i] = substr_replace($filelist[$i],'_',strrpos($filelist[$i],'.'),1);

	if(isset($_POST['paths'][$i]))
	{
		$path=$ASSIGNMENT_PATH.'/'.$filelist[$i];
		$path=$_POST['paths'];
		echo $path;
		unlink('../'.$path);
				require ('dbconfig.php');

		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
			or die('Error establishing connection to server');


		
		$assignments = "DELETE FROM assignments WHERE path='".$path."'";
		mysqli_query($dbc, $assignments)
			or die ('Error querying the database');		

	}
}

header("Location: ../assignments.php");

?>