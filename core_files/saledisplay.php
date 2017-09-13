<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$x = $_GET["action"];
$sql = "SELECT saleid,timedate,subtotal from customersale";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo "<table width='100%' border='1'>";
echo "<th>SaleID</th><th>Date/Time</th><th>Purchase Subtotal</th><th></th>";
for($i=0;$i<$x;$i++)
	$row = mysqli_fetch_row($result);
for($i=0;$i<10;$i++) {
	echo "<tr><td>{$row[0]}</td>";
	echo "<td>{$row[1]}</td>";
	echo "<td>{$row[2]}</td>";
	echo '<td><input type="button" value="Edit" onclick="edit(';
	echo "{$row[0]}";
	echo ')"><input type="button" value="Detail" onclick="detail(';
	echo "{$row[0]}";
	echo ')"></td></tr>';
	$row = mysqli_fetch_row($result);
}
echo "</table>";
mysqli_close($conn);
	
?>