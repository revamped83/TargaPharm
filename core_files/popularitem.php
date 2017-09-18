<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$action = $_GET["action"];
$sql = "SELECT i.itemid, i.itname, sum(quantity) FROM itemsale it inner join item i on it.itemid = i.itemid  group by itemid order by sum(quantity) desc ";
$sql2 = "SELECT i.itemid, i.itname, count(i.itemid) FROM itemsale it inner join item i on it.itemid = i.itemid  group by itemid order by count(i.itemid) desc ";
if($action == 1)
{
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_row($result);
	echo "<h3>Sale Quantity</h3>";
	echo "<table width='100%' border='1'>";
	echo "<th>Item ID</th><th>Item name</th><th>Sale Quantity</th>";
	for($i=0;$i<5;$i++) {
		echo "<tr><td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		$row = mysqli_fetch_row($result);
	}
	echo "</table></br></br></br>";
}
else if($action == 2){ 
	
	$result = mysqli_query($conn, $sql2);
	$row = mysqli_fetch_row($result);
	echo "<h3>Sale Times</h3>";
	echo "<table width='100%' border='1'>";
	echo "<th>Item ID</th><th>Item name</th><th>Sale Times</th>";
	for($i=0;$i<5;$i++) {
		echo "<tr><td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		$row = mysqli_fetch_row($result);
		
	}
	echo "</table></br></br></br>";
}
else
	echo "Do nothing";



mysqli_close($conn);
	
?>