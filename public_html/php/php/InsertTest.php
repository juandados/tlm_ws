<?php
include "db.php";
if(isset($_POST['insert']))
{
	$usuario="juan";
	$pregunta="pregunta";
	$contenido="contenido";
	$q=mysql_query("INSERT INTO `respuestas` (`idUsuario`,`idPregunta`,`respuesta`) VALUES ('$usuario','$pregunta','$contenido')");
	if($q)
		echo "ok";
	else
		echo "error";
}
?>