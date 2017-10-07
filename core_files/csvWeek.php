<?php
$year = $_GET["year"];
$month = $_GET["month"];
$week = $_GET["week"];
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
switch ($week){
	case 1: 
		$a = $year."".$month."01";
		$b = $year."".$month."08";
		break;
	case 2:
		$a = $year."".$month."08";
		$b = $year."".$month."15";
		break;
	case 3: 
		$a = $year."".$month."15";
		$b = $year."".$month."22";
		break;
	case 4:
		$a = $year."".$month."22";
		$b = $year."".$month."29";
		break;
}
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

fputcsv($output, array("TargaPharm Report - Week ".$week."/".$month."/".$year.""));
fputcsv($output, array("Popular items in Week ".$week."/".$month."/".$year.""));
fputcsv($output, array('Item Name','Sold Quantity'));
$rows = mysqli_query($conn,"SELECT b.itname,SUM(a.Quantity) FROM itemsale a INNER JOIN item b ON a.ItemID = b.ItemID INNER JOIN customersale c ON c.SaleID = a.SaleID where c.TimeDate >= ".$a." and c.TimeDate< ".$b." group by a.itemid ORDER BY SUM(a.Quantity) DESC");
// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);
$sql = "Select SUM(SubTotal) From customersale where TimeDate >= ".$a." and TimeDate< ".$b."";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
fputcsv($output, array("Revenue in Week ".$week."/".$month."/".$year." : ".$row[0].""));
?>