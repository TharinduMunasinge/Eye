<?php
require("connect.php");


if(!empty($_POST['field']) && !empty($_POST['value']) && !empty($_POST['table']) ){

	$table=$_POST['table'];
	$field=$_POST['field'];
	$value=$_POST['value'];

	$l=mysql_query("select $field  from $table where $field='".$value."'") ;

	if($r=mysql_fetch_array($l)){
	$m =trim($r[0]);
	}
	else
	{
	
	$m=0;
	}
echo($m);
}


?>

