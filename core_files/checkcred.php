<?php
session_start();
//check credit php, return value depend on session variable
if(!isset($_SESSION["id"])) 
{
	echo 1;
}
else
{
	echo 0;
}
?>