<?php
include "db.php";
if(true)
{
	$id=$_POST['usuario'];
	$q=mysql_query("SELECT `password` FROM `usuarios` WHERE `nombre`='$id'");
	$row = mysql_fetch_array($q);
	if($q){
		echo utf8_encode($row['password']);
		}
	else
		echo "error";
}
?>