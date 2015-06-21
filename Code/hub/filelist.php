<?php
$current_folder = '.';
$filelist=scandir($LOCKER_PATH.$current_folder);

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
echo '<th>Filename</th>';
echo '<th>Filetpye</th>';
echo '<th>Last Modified</th>';
echo '<th>Remove</th>';
echo '</tr>';
for($i=0; $i<count($filelist); $i++)
{
	if($filelist[$i]=='.' or $filelist[$i]=='..' or $filelist[$i]=='tmp' or $filelist[$i]=='assignments')
		continue;	
	$file = explode(".",$filelist[$i]);
	$mod_time = date('F d, Y',filemtime($LOCKER_PATH.'/'.$filelist[$i]));
	echo '<tr><td><a target="_blank" href="'.$LOCKER_PATH.'/'.$filelist[$i].'">'.$file[0].'</a></td><td>'.$file[1].'</td><td>'.$mod_time.'</td><td><input type="checkbox" name="'.$filelist[$i].'" value="'.$filelist[$i].'" /></td></tr>';
	echo '';
}
echo '<tr><td>&nbsp;</td></tr>';
echo '<tr><td></td><td></td><td></td><td><input type="submit" name="submit" value="Remove files" /></td></tr>';
echo '</table>';

echo '<br />';
echo '';

?>