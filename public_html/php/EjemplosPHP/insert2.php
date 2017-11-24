<?php
include "db.php";
if(true)
{
	$title='titulo';
	$duration='Duracion';
	$price='precio';
	$q=mysql_query("INSERT INTO `course_details` (`title`,`duration`,`price`) VALUES ('$title','$duration','$price')");
	if($q)
		echo "ok";
	else
		echo "error";
}
?>