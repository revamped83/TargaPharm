<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass,$dbname) or die("Can't connect");
$sql = "SELECT MAX(SaleID) FROM CustomerSale";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	$row = mysqli_fetch_array($result);
	echo $row["MAX(SaleID)"]+1;
} 
else {
    echo "";
}
?>