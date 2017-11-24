<?php
include "db.php";
if(true)
{
	$nombre=$_POST['nombre'];
	$genero=$_POST['genero'];
	$edad=$_POST['edad'];
	$cargo=$_POST['cargo'];
	$password=$_POST['password'];
	$q=mysql_query("INSERT INTO `usuarios` (`nombre`,`cargo`,`sexo`,`edad`,`password`) VALUES ('$nombre','$cargo','$genero','$edad','$password')");
	if($q)
		echo "ok";
	else
		echo "error";
}
?>