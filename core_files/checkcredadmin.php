<?php
session_start();
//check credit php, return value depend on session variable
if((isset($_SESSION["id"]))&& ($_SESSION["isAdmin"]==1)) 
{
	echo 0;
}
else if ((isset($_SESSION["id"])))
{
	echo 2;
}
else 
{
	echo 3;
}
?>