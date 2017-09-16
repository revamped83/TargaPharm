<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$x = $_GET["action"];
$sql = "SELECT timedate,subtotal from customersale where saleid = ".$x."";
$result = mysqli_query($conn, $sql);
while ($row=mysqli_fetch_row($result))
{
echo '<label for="time"><span id="txt">Date/Time : </span>'.$row[0].'</label></br>';
echo '<label for="total"><span id="txt">Subtotal : </span>'.$row[1].'</label></br>';
echo '<p>Item list</p>';
}
mysqli_free_result($result);
$sql = "SELECT a.itname,b.quantity,b.unitprice from itemsale b INNER JOIN item a ON a.ItemID = b.ItemID where saleid = ".$x."";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo "<table width='100%' border='1'>";
echo "<th>Item Name</th><th>Quantity</th><th>Unit Price</th>";
while($row){
	if($row[0]!=null){
	echo "<tr><td>{$row[0]}</td>";
	echo "<td>{$row[1]}</td>";
	echo "<td>{$row[2]}</td></tr>";
	$row = mysqli_fetch_row($result);
	}
}
echo "</table>";
mysqli_close($conn);
	
?>