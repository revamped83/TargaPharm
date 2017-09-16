<?php
if((isset($_GET["itName"])) &&(isset($_GET["itCat"])) && (isset($_GET["itStock"])))
{
	if ((!empty($_GET["itName"])) && (!empty($_GET["itCat"])) && (!empty($_GET["itStock"])))
	{
		if((is_numeric($_GET["itStock"])))
		{
			$itName = $_GET["itName"];
			$itCat = $_GET["itCat"];
			$itStock = $_GET["itStock"];
			
			$server = 'localhost';
			$user = 'root';
			$pass = '';
			$dbname = 'targapharm';
			
			$conn = mysqli_connect($server, $user, $pass, $dbname);
			/*$sql = "SELECT MAX(ItemID) FROM item";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$itemID = $row["MAX(ItemID)"]+1;*/
			$sql = "INSERT INTO item (ItName, ItCat, ItStockLevel) VALUES ('$itName','$itCat',$itStock)";
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
			echo 'Please insert number for Item stock';
	}
	else
		echo 'Please fill in the blank';
}
?>