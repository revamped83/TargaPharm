<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$itid = $_GET["itid"];
$itname = $_GET["itname"];
$stock = $_GET["stock"];
//$sql = "UPDATE item SET ItName=".$itname.",ItStockLevel=".$stock." WHERE ItemID=".$itid."";
$sql = "UPDATE item SET ItName='$itname',ItStockLevel= $stock WHERE ItemID=$itid";
if (mysqli_query($conn, $sql)){
	echo "succeed";
}
else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
	
?>