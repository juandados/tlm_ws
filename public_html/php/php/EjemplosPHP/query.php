<?php
include "db.php";
if(isset($_POST['query']))
{
	$id=$_POST['id'];
	$q=mysql_query("SELECT `pregunta` FROM `preguntas` WHERE `id`=5");
	if($q)
		echo "ok";
	else
		echo "error";
}
?>