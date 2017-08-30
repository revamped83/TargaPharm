<?php
if ((isset($_GET["itName"])) && (isset($_GET["itQuan"])) && (isset($_GET["sPrice"])))
{
	if ((!empty($_GET["itName"])) && (!empty($_GET["itQuan"])) && (!empty($_GET["sPrice"])))
	{	
		$itName = $_GET["itName"] ;
		$itQuan =  $_GET["itQuan"];
		$sPrice =  $_GET["sPrice"];
		$server = 'localhost';
		$user = 'root';
		$pass = '';
		$dbname = '100984311';
		$conn = mysqli_connect($server, $user, $pass, $dbname);
		$sql = "INSERT INTO sale (ItID, Date, ItQuantity, SalePrice) VALUES ('".$itName."',NOW(),".$itQuan." ,".$sPrice.")";
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
	else
	{
		echo "<p>Plese fill all the required fields.</p>";
	}
}
?>