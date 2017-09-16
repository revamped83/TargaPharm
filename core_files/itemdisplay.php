<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$x = $_GET["action"];
$sql = "SELECT ItemID,ItName,ItCat, ItStockLevel from item";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo "<table width='100%' border='1'>";
echo "<th>Item ID</th><th>Item Name</th><th>Category</th><th>Stock Remain</th><th></th>";
for($i=0;$i<$x;$i++)
	$row = mysqli_fetch_row($result);
for($i=0;$i<10;$i++) {
	if($row[0]!=null){
	echo "<tr><td>{$row[0]}</td>";
	echo "<td>{$row[1]}</td>";
	echo "<td>{$row[2]}</td>";
	echo "<td>{$row[3]}</td>";
	echo '<td><input type="button" value="Edit" onclick="edit(';
	echo "{$row[0]}";
	echo ')"></td></tr>';
	$row = mysqli_fetch_row($result);
	}
}
echo "</table>";
mysqli_close($conn);
	
?>