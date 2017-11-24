<?php
include "db.php";
if(true)
{
	$id=$_POST['id'];
	$q=mysql_query("SELECT `pregunta` FROM `preguntas` WHERE `id`='$id'");
	$row = mysql_fetch_array($q);
	if($q){
		echo utf8_encode($row['pregunta']);
		}
	else
		echo "error";
}
?>