<?php


session_start();
if(isset($_SESSION['id']))
{
	if(isset($_GET['reg']))
	{	
		if($_SESSION['id']==$_GET['reg'])
		{	
			require("connect.php");
			

$name=$_SESSION['name'];
$add=$_SESSION['address'];
$tel=$_SESSION['tele'];
$url=$_SESSION['url'];
$des=$_SESSION['description'];
$conname=$_SESSION['con_name'];
$email=$_SESSION['email'];
$country=$_SESSION['country'];
$conpost=$_SESSION['con_post'];
$conemail=$_SESSION['con_email'];
$contel=$_SESSION['con_tele'];
	$query="Insert into comp_Reg values('','$name','$add','$email','$tel','$country','$url','$des','$conname','$conpost','$conemail','$contel')";
			$insert=mysql_query($query) or die("couln't enter any records!".mysql_error());

			if(mysql_affected_rows()>0){
			
				$m="Succesfully registered";
			session_destroy();
			}
			else
			{
				$m="Record was not inserted";
			}
		
		}else
		{
		
			session_destroy();
			header("Location: company.php?notequal");
		}
	}
	else
	{
		session_destroy();
		header("Location: company.php?notget");
	
	}
}
else
{
	session_destroy();
header("Location: company.php?notid");


}


echo($m);
?>

