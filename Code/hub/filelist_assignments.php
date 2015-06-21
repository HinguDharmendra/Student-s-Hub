<?php
$current_folder = '.';

if(!isset($_GET['sid']))
{
	$_GET['sid']='';
}

$filelist=scandir($LOCKER_PATH.$current_folder.'/assignments/'.$_GET['sid']);
?>
<script>
function create_folder(c)
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
	
	var folder_name = document.getElementById("folder-name").value;
	
	xmlhttp.open("POST","restricted/new_folder.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("parent="+c+"&child="+folder_name);
}

</script>	
<?php
echo '<form name="remove-files" action="restricted/remove_files.php" method="POST">';

echo '<table id="filelist">';
echo '<tr>';
echo '<th>Username</th>';
echo '<th>Filetpye</th>';
echo '<th>Last Modified</th>';
echo '</tr>';
for($i=0; $i<count($filelist); $i++)
{

	$file = explode(".",$filelist[$i]);
	if($filelist[$i]=='.' or $filelist[$i]=='..' or $filelist[$i]=='tmp' or $filelist[$i]=='assignments')
		continue;	
	
	$mod_time = date('F d, Y',filemtime($LOCKER_PATH.'/assignments/'.$_GET['sid'].'/'.$filelist[$i]));
	if(filetype($LOCKER_PATH.'/assignments/'.$_GET['sid'].'/'.$filelist[$i])=='file')
	{
		echo '<tr><td><a target="_blank" href="'.$LOCKER_PATH.'/assignments/'.$_GET['sid'].'/'.$filelist[$i].'">'.$file[0].'</a></td><td>'.$file[1].'</td><td>'.$mod_time.'</td><td></tr>';
	}
	else
	{
		echo '<tr><td><a href="assignments.php?sid='.$filelist[$i].'">'.$file[0].'</a></td><td>DIR</td><td>'.$mod_time.'</td><td></tr>';
	}
	
	echo '';
}

echo '</table>';

echo '<br />';
echo '';

?>