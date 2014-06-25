<?php

if(isset($_COOKIE['so'])){
$m="You have succefully logout";
setcookie("so","",time()-3600,"/");
}
if(isset($_COOKIE['id']))
header("Location:application.php?id=".$_COOKIE['id']);
else{
if (isset($_POST['login'])){
$u=$_POST['uname1'];
$p=$_POST['pass1'];

	if(!empty($u) && !empty($p)){
	require("connect.php");
	$p=md5($p);
	$l=mysql_query("select id from registration where uname='$u' and pass='$p'") ;
	
		if($row=mysql_fetch_array($l)){
		setcookie("id",$row[0],0,"/");
		header("Location:application.php?id=$row[0]");
		
		}
		else{
		$m="Incorect username or password";		
		}
	
	
	}
	else{
	
	$m="Insert user name and password to login";
	
	
	}

}

}
?>


