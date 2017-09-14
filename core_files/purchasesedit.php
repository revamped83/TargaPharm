<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$itid = $_GET["itid"];
$itp = $_GET["itp"];
$itq = $_GET["itq"];
$sql = "UPDATE itempurchase SET WholesalePrice=".$itp.",ItQuantity=".$itq." WHERE itemid=".$itid."";
if (mysqli_query($conn, $sql)){
	echo "succeed";
}
else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
	
?>