<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$x = $_GET["action"];
$sql = "SELECT a.itemid, b.itname, a.Timedate, a.WholesalePrice, a.ItQuantity from itempurchase a inner join item b on a.itemid = b.itemid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo "<table width='100%' border='1'>";
echo "<th>ItID</th><th>ItName</th><th>Date/Time</th><th>Purchase Price</th><th>Quantity</th><th></th>";
for($i=0;$i<$x;$i++)
	$row = mysqli_fetch_row($result);
for($i=0;$i<10;$i++) {
	echo "<tr><td>{$row[0]}</td>";
	echo "<td>{$row[1]}</td>";
	echo "<td>{$row[2]}</td>";
	echo "<td>{$row[3]}</td>";
	echo "<td>{$row[4]}</td>";
	echo '<td><input type="button" value="Edit" onclick="edit(';
	echo "{$row[0]}";
	echo ')"></td></tr>';
	$row = mysqli_fetch_row($result);
}
echo "</table>";
mysqli_close($conn);
	
?>