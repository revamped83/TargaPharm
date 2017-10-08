<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$sql = "SELECT accname,accesslv,time FROM `accesslog` WHERE 1 ORDER BY `accesslog`.`time` DESC";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
echo "<table width='100%' border='1'>";
echo "<th>Username</th><th>Access level</th><th>Time</th>";
for($i=0;$i<10;$i++) 
{
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