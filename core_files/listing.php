<?php
if ((isset($_GET["itID"])) && (isset($_GET["itQuan"])) && (isset($_GET["sPrice"])))
{
	if ((!empty($_GET["itID"])) && (!empty($_GET["itQuan"])) && (!empty($_GET["sPrice"])))
	{
		if ((!is_numeric($_GET["itQuan"]) && (!is_numeric($_GET["sPrice"])))
		{
			$saleID = $_GET["saleid"];
			$itID = $_GET["itID"];
			$itQuan =  $_GET["itQuan"];
			$sPrice =  $_GET["sPrice"];
			$sid = $_GET["sid"];
			$total = $itQuan*$sPrice;
			$server = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'targapharm';
			$conn = mysqli_connect($server, $user, $pass, $dbname);
			if ($sid == 1)
			{
				$sql = "INSERT INTO CustomerSale (SaleID, SubTotal) VALUES (".$saleID.", ".$total.")";
				if (mysqli_query($conn, $sql)){
						$sql = "INSERT INTO itemsale (itemID, saleID, unitprice, Quantity) VALUES (".$itID.", ".$saleID.",".$sPrice." ,".$itQuan.")";
						if (mysqli_query($conn, $sql)){
							$sql = "UPDATE item SET ItStockLevel = ItStockLevel - ".$itQuan." WHERE itemID = ".$itID."";
							if (mysqli_query($conn, $sql)){
								echo "New record created successfully</br>";
							}
							else{
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
					}
					else{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
			}
			else
			{
				$sql = "UPDATE CustomerSale SET SubTotal = SubTotal + ".$total." WHERE SaleID = ".$saleID."";
				if (mysqli_query($conn, $sql)){
						$sql = "INSERT INTO itemsale (itemID, saleID, unitprice, Quantity) VALUES (".$itID.", ".$saleID.",".$sPrice." ,".$itQuan.")";
						if (mysqli_query($conn, $sql)){
							$sql = "UPDATE item SET ItStockLevel = ItStockLevel - ".$itQuan." WHERE itemID = ".$itID."";
							if (mysqli_query($conn, $sql)){
								echo "New record created successfully</br>";
							}
							else{
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
						else{
							echo "Error: Duplicate items <br>" ;
						}
					}
					else{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
			}
			mysqli_close($conn);
		}
		else
		{
			echo "<p>Plese enter number value for price and quantiy fields.</p>";
		}
	}
	else
	{
		echo "<p>Plese fill all the required fields.</p>";
	}
}
?>