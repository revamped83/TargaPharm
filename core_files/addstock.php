<?php
if ((isset($_GET["itID"])) && (isset($_GET["itQuan"])) && (isset($_GET["sPrice"])))
{
	if ((!empty($_GET["itID"])) && (!empty($_GET["itQuan"])) && (!empty($_GET["sPrice"])))
	{
		if ((is_numeric($_GET["itQuan"])) && (is_numeric($_GET["sPrice"])))
		{
			$itID = $_GET["itID"];
			$itQuan =  $_GET["itQuan"];
			$sPrice =  $_GET["sPrice"];
			$server = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'targapharm';
			$conn = mysqli_connect($server, $user, $pass, $dbname);
			$sql = "UPDATE Item SET ItStockLevel = ItStockLevel + ".$itQuan." WHERE ItemID = ".$itID."";
			if (mysqli_query($conn, $sql)){
				$sql = "INSERT INTO itempurchase (itemID, Itquantity, WholesalePrice) VALUES (".$itID.", ".$itQuan." ,".$sPrice.")";
				if (mysqli_query($conn, $sql)){
						echo "New record created successfully</br>";
					}
					else{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				}
				else{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		mysqli_close($conn);
		}
		else
		{
			echo "<p>Plese enter number value for Price and Quantity fields.</p>";
		}
	}
	else
	{
		echo "<p>Plese fill all the required fields.</p>";
	}
}
?>