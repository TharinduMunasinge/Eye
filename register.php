<?php
	


if(!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['tele']) &&!empty($_POST['url']) && !empty($_POST['description']) && !empty($_POST['con_name']) && !empty($_POST['con_post']) && !empty($_POST['con_email']) && !empty($_POST['con_tele']) && !empty($_POST['email']) && !empty($_POST['country'])){

session_start();

	$_SESSION['name']=$_POST['name'];
	$_SESSION['address']=$_POST['address'];
	$_SESSION['tele']=$_POST['tele'];
	$_SESSION['url']=$_POST['url'];
	$_SESSION['description']=$_POST['description'];
	$_SESSION['con_name']=$_POST['con_name'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['country']=$_POST['country'];
	$_SESSION['con_post']=$_POST['con_post'];
	$_SESSION['con_email']=$_POST['con_email'];
	$_SESSION['con_tele']=$_POST['con_tele'];
	$temp=md5(mt_rand());
	$_SESSION['id']=$temp;

	require("email.php");

	$msg="Thanks For register with Yesl.com .To complete the registration please click the link below \n http://www.rabits.ingenslk.com/yesl/confirm.php?reg=$temp";


$ms=send($_SESSION['email'],"Confirm Registratin",$msg);
	if($ms=="sent")
	{
	setcookie('PHPSESSID',$_COOKIE['PHPSESSID'],time()+3600*24,"/");

	echo("Confirmation Email has been sent to your email address.complete the next steps withing 24 hours");

	}
	else
	{
	echo("email can not send to :".$_SESSION['email']);
	}


}

?>
