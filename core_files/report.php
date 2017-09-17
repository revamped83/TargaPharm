<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$month = $_GET["month"];
$year = $_GET["year"];
echo "<h3>TargaPharm Report - ".$month."/".$year."</h3>";
echo "<p>Popular items in ".$month."/".$year."</p>";
$sql = "SELECT b.itname,SUM(a.Quantity) FROM itemsale a INNER JOIN item b ON a.ItemID = b.ItemID INNER JOIN customersale c ON c.SaleID = a.SaleID where Year(c.TimeDate) = ".$year." and Month(c.TimeDate) = ".$month." group by a.itemid ORDER BY SUM(a.Quantity) DESC";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo "<table width='100%' border='1'>";
echo "<th>Item Name</th><th>Sold Quantity</th>";
for($i=0;$i<6;$i++)
{
	if ($row[0]!= null)
	{
	echo "<tr><td>{$row[0]}</td>";
	echo "<td>{$row[1]}</td></tr>";
	$row = mysqli_fetch_row($result);
	}
}
echo "</table>";
$sql = "Select SUM(SubTotal) From customersale where Year(TimeDate) = ".$year." and Month(TimeDate) = ".$month."";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo "<p>Revenue in ".$month."/".$year." : ".$row[0]."</p>";
?>