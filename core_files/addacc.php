<?php
session_start();
if ((isset($_GET["id"])) && (isset($_GET["pw"])))
{
	if ((!empty($_GET["id"])) && (!empty($_GET["pw"])))
	{
		$id = $_GET["id"];
		$pw =  $_GET["pw"];
		$server = 'localhost';
		$user = 'root';
		$pass = '';
		$dbname = 'targapharm';
		$conn = mysqli_connect($server, $user, $pass,$dbname) or die("Can't connect");
		$sql = "Insert into staff (accName,accPw) Values ('$id','$pw')";
		if (mysqli_query($conn, $sql)){
			echo "New account created successfully</br>";
		}
		else{
			echo "This Username is already taken.";
		}
	}
	else
	{
		echo "<p>Plese fill all the required fields.</p>";
	}
}
?>