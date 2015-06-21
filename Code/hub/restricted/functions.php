<?php

function checkEmail($str)
{
	return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}

function sanitize($in) {
 	return addslashes(htmlspecialchars(strip_tags(trim($in))));
}

function send_mail($from,$to,$subject,$body)
{
	$headers = '';
	$headers .= "From: $from\n";
	$headers .= "Reply-to: $from\n";
	$headers .= "Return-Path: $from\n";
	$headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Date: " . date('r', time()) . "\n";

	if(mail($to,$subject,$body,$headers)) return true;
	return false;
}

function getPassedLevel($dbc, $userid)
{
	$select_level = "SELECT myst_level FROM game WHERE userid='".$userid."'";	
							
	$result = mysqli_query($dbc, $select_level)
		or die ('Error querying the database - techno p ');		

	$row = mysqli_fetch_array($result);
	
	return $row['myst_level'];		
}

function alphanumericAndSpace( $string )
{
    return preg_replace('/[^a-zA-Z0-9]/', '', $string);
}



	function validateName($name){
		//if it's NOT valid
		if(strlen($name) < 4)
			return false;
		//if it's valid
		else
			return true;
	}
	function validateEmail($str){
		return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
	}
	function validatePasswords($pass1, $pass2) {
		return $pass1 == $pass2;
	}
	function validateMobile($mobile){		
		if(is_numeric($mobile) && strlen($mobile) == 10)
			return true;
		else
			return false;
	}
	
	function validateId($id){		
		if(is_numeric($id) && strlen($id) == 9)
			return true;
		else
			return false;
	}
	
	function validate($str){
		return preg_match("/[a-zA-Z]$/",$str);
	}

	
	function newPost($dbc,$level)
	{
		$newpost = "INSERT into access (owner, level) VALUES (".$_SESSION['id'].",".$level.")";
		mysqli_query($dbc, $newpost)
				or die ('Error querying the database');			

		$newpost = "SELECT max(postid) FROM access";
		$newpost = mysqli_query($dbc, $newpost)
				or die ('Error querying the database');			
		
		$newpost = mysqli_fetch_array($newpost);
		return $newpost['max(postid)'];
		
	}

?>
