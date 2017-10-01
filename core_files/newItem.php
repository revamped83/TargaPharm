<?php
if((isset($_GET["itName"])) &&(isset($_GET["itCat"])) && (isset($_GET["price"])))
{
	if ((!empty($_GET["itName"])) && (!empty($_GET["itCat"])) && (!empty($_GET["price"])))
	{
		if ((is_numeric($_GET["price"])))
		{
			$itName = $_GET["itName"];
			$itCat = $_GET["itCat"];
			$price = $_GET["price"];
			$server = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'targapharm';
			
			$conn = mysqli_connect($server, $user, $pass, $dbname);
			/*$sql = "SELECT MAX(ItemID) FROM item";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$itemID = $row["MAX(ItemID)"]+1;*/
			$sql = "INSERT INTO item (ItName, ItCat, UnitPrice, ItStockLevel) VALUES ('$itName','$itCat', ".$price.",0)";
			//echo "$itemID,$itName,$itCat,$itStock";
			if(mysqli_query($conn, $sql))
			{
				echo "New record created successfully</br>";
			}
			else{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			
			mysqli_close($conn);
		}
		else
			echo 'Please enter Reatail Price as number';
	}
	else
		echo 'Please fill in the blank';
}
?>