<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$sql = "SELECT itemid,itname,itcat,itstocklevel from item where itstocklevel < 10 order by ItStockLevel asc";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo "<h2>These Item is running low in stock. </h2><table width='100%' border='1'>";
echo "<th>Item ID</th><th>Item Name</th><th>Item Category</th><th>Stock</th>";
for($i=0;$i<100;$i++) {
	if($row[0]!=null){
	echo "<tr><td>{$row[0]}</td>";
	echo "<td>{$row[1]}</td>";
	echo "<td>{$row[2]}</td>";
	echo "<td><font color='red'>{$row[3]}</font></td></tr>";
	$row = mysqli_fetch_row($result);
	}
}
echo "</table></br></br></br>";


mysqli_close($conn);
	
?>