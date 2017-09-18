<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$sql = "SELECT * from item order by ItStockLevel asc";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo "<table width='100%' border='1'>";
echo "<th>Item ID</th><th>Item Name</th><th>Item Category</th><th>Stock</th>";
for($i=0;$i<5;$i++)
	$row = mysqli_fetch_row($result);
for($i=0;$i<5;$i++) {
	if($row[0]!=null){
	echo "<tr><td>{$row[0]}</td>";
	echo "<td>{$row[1]}</td>";
	echo "<td>{$row[2]}</td>";
	echo "<td>{$row[3]}</td></tr>";
	$row = mysqli_fetch_row($result);
	}
}
echo "</table></br></br></br>";


mysqli_close($conn);
	
?>