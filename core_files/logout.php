<?php
session_start();
//logout php page 
if(!(isset($_SESSION["id"]))) 
{
	echo 1;
}
else
{
	echo 2;
	session_destroy();
}
?>