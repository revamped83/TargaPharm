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
		$sql = "Select accPw FROM admin WHERE accName = '".$id."'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) 
		{
			$row = mysqli_fetch_array($result);
			if ($row["accPw"] === $pw)
			{
				echo "<p>Login successfully, your access level: administrator</p>";
				$_SESSION["id"] = $id;
				$_SESSION["isAdmin"] = 1;
			}
			else
			{
				echo "<p>Wrong Username or Password.</p>";
			}
		} 
		else 
		{
			$sql = "Select accPw FROM staff WHERE accName = '".$id."'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_array($result);
				if ($row["accPw"] === $pw)
				{
					echo "<p>Login successfully, your access level: staff</p>";
					$_SESSION["id"] = $id;
					$_SESSION["isAdmin"] = 0;
				}
				else
				{
					echo "<p>Wrong Username or Password.</p>";
				}
			}
			else
			{
				echo "<p>Wrong Username or Password.</p>";
			}
		}
	}
	else
	{
		echo "<p>Plese fill all the required fields.</p>";
	}
}
?>