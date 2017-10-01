<?php
ob_start();
require 'addrecord1.php';
$output = ob_get_clean();
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$x = $_GET["action"];
$conn = mysqli_connect($server, $user, $pass,$dbname) or die("Can't connect");
$sql = "SELECT a.ItemID,b.quantity,a.unitprice from itemsale b INNER JOIN item a ON a.ItemID = b.ItemID where saleid = ".$x."";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$a =1 ;
while($row){
	$handle = $output;
	$handle = str_replace('<option value='.$row[0].'>','<option value='.$row[0].' selected="">',$handle);
	if ($a > 1)
	{
		echo '<label for="itName'.$a.'"><span id="txt">Item Name<span class="redonly">*</span></span><select id="itName'.$a.'" onchange="checkPrice(this.value,'.$a.')">'.$handle.'</select></label></br></br>
		<label for="itQuan'.$a.'"><span id="txt">Sale Quantity<span class="redonly">*</span></span><input type="number" name="itQuan'.$a.'" id="itQuan'.$a.'" size="50" onChange="calculation();" value='.$row[1].'></label></br></br>
		<label for="sPrice'.$a.'"><span id="txt">Sale Price<span class="redonly">*</span></span><input type="txt" name="sPrice'.$a.'" id="sPrice'.$a.'" size="50" value='.$row[2].' readonly></label></br><hr>';
	}
	else
	{
		echo '<label for="itName"><span id="txt">Item Name<span class="redonly">*</span></span><select id="itName" onchange="checkPrice(this.value,1)">'.$handle.'</select></label></br></br>
		<label for="itQuan"><span id="txt">Sale Quantity<span class="redonly">*</span></span><input type="number" name="itQuan" id="itQuan" size="50" onChange="calculation();" value='.$row[1].'></label></br></br>
		<label for="sPrice"><span id="txt">Sale Price<span class="redonly">*</span></span><input type="txt" name="sPrice" id="sPrice" size="50" value='.$row[2].' readonly></label></br><hr>';
	}
	$row = mysqli_fetch_row($result);
	$a += 1; 
}
for ($a;$a<10;$a++)
{
	if ($a==1){
		echo '<label for="itName"><span id="txt">Item Name<span class="redonly">*</span></span><select id="itName" onchange="checkPrice(this.value,1)">'.$output.'</select></label></br></br>
		<label for="itQuan"><span id="txt">Sale Quantity<span class="redonly">*</span></span><input type="number" name="itQuan" id="itQuan" size="50" onChange="calculation()"></label></br></br>
		<label for="sPrice"><span id="txt">Sale Price<span class="redonly">*</span></span><input type="txt" name="sPrice" id="sPrice" size="50" readonly></div></label></br><hr>'; 
	}
	echo '<label for="itName'.$a.'"><span id="txt">Item Name<span class="redonly">*</span></span><select id="itName'.$a.'" onchange="checkPrice(this.value,'.$a.')">'.$output.'</select></label></br></br>
		<label for="itQuan'.$a.'"><span id="txt">Sale Quantity<span class="redonly">*</span></span><input type="number" name="itQuan'.$a.'" id="itQuan'.$a.'" size="50" onChange="calculation()"></label></br></br>
		<label for="sPrice'.$a.'"><span id="txt">Sale Price<span class="redonly">*</span></span><input type="txt" name="sPrice'.$a.'" id="sPrice'.$a.'" size="50" readonly></div></label></br><hr>';
}
?>