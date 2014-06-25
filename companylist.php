<?php
?>
<html>
<head>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
</script>
<script> 
$(document).ready(function(){


  $(".compname").toggle(
function(){
    	
     $(this).next().slideDown(750);	
     $(this).children("img").attr("src","images/arrowup.png");
	}

, 

function(){
    	
     $(this).next().fadeOut(1000);	
     $(this).children("img").attr("src","images/arrowdown.png");
	});

	  	

});






</script>




	



<style>
body{
font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
}
.center
{
margin:auto;
width:920px;;


}

.company{
width:900px;

margin:15px;
border:1px solid #0f0f0f;

border-bottom-color:black;
box-shadow:0px 1px 2px rgb(159, 159, 159);
padding:10px;
}

.compname{
font-size: 20px;
	margin:0px;
	cursor: pointer;
text-transform:capitalize;
padding-top:auto;
padding-left:20px;
padding-bottom:auto;
height:60px;
color: #1f1f1f;

}
.compdes{

padding-left:20px;

font-size:15px;
height:130px;

display:none;

color:#555555;

}
.compdes a{
text-decoration:none;
color:

}

.compname img{
float:right;
margin:0px 10px;
width:20px;
height:20px;
}

</style>
</head>

<body>
<div class="center">


<?php
require("connect.php");
$a="Select name,url,country,address,description from comp_Reg order by name asc";
$result=mysql_query($a);
while($row=mysql_fetch_array($result)){?>

<div class="company">
	<div class="compname">
	<?php echo $row['name']?>


<img src="images/arrowdown.png">
	
	</div>
	<div class="compdes"><p><?php 

echo $row['description'];

?></p>
<br>
Address:<?php echo $row['address']?><br>
<a href="<?php echo $row['url']?>" target="_blank">Click me to visit</a>


	</div>

</div>





<?php
}

mysql_free_result($result);
mysql_close($link);

?>





</div>






</body></html>
