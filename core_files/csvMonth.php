<?php
$year = $_GET["action"];
$month = $_GET["month"];
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

fputcsv($output, array("TargaPharm Report - ".$month."/".$year.""));
fputcsv($output, array("Popular items in ".$month."/".$year.""));
fputcsv($output, array('Item Name','Sold Quantity'));
$rows = mysqli_query($conn,"SELECT b.itname,SUM(a.Quantity) FROM itemsale a INNER JOIN item b ON a.ItemID = b.ItemID INNER JOIN customersale c ON c.SaleID = a.SaleID where Year(c.TimeDate) = ".$year." and Month(c.TimeDate) = ".$month." group by a.itemid ORDER BY SUM(a.Quantity) DESC");
// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);
$sql = "Select SUM(SubTotal) From customersale where Year(TimeDate) = ".$year." and Month(TimeDate) = ".$month."";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
fputcsv($output, array("Revenue in ".$month."/".$year." : ".$row[0].""));
?>