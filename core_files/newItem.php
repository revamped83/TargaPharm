<?php
if((isset($_GET["itName"])) &&(isset($_GET["itCat"])))
{
	if ((!empty($_GET["itName"])) && (!empty($_GET["itCat"])))
	{
		
			$itName = $_GET["itName"];
			$itCat = $_GET["itCat"];
			
			$server = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'targapharm';
			
			$conn = mysqli_connect($server, $user, $pass, $dbname);
			/*$sql = "SELECT MAX(ItemID) FROM item";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$itemID = $row["MAX(ItemID)"]+1;*/
			$sql = "INSERT INTO item (ItName, ItCat, ItStockLevel) VALUES ('$itName','$itCat',0)";
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
		echo 'Please fill in the blank';
}
?>