<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$itemID =  $_GET["itemID"];
$conn = mysqli_connect($server, $user, $pass,$dbname) or die("Can't connect");
$sql = "SELECT UnitPrice FROM item where itemID = ".$itemID." ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	$row = mysqli_fetch_array($result);
	echo $row["UnitPrice"];
}
?>