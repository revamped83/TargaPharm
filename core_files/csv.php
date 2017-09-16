<?php
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('SaleID','ItemID', 'Item Name', 'Quantity', 'Unit Price', 'Subtotal' ));

// fetch the data
$year = $_GET["action"];
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass, $dbname);
$rows = mysqli_query($conn,'SELECT a.saleid, a. itemid,b.itname,a.quantity,a.unitprice,c.subtotal from itemsale a INNER JOIN item b ON a.ItemID = b.ItemID INNER JOIN customersale c on a.SaleID = c.SaleID where Year(c.TimeDate) = '.$year.' ORDER BY `saleid` ASC');

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);
?>