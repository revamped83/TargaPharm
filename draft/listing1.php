<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'targapharm';
$conn = mysqli_connect($server, $user, $pass,$dbname) or die("Can't connect");
$sql = "SELECT ItemID,ItName FROM item";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
		echo '<option value="">Please select</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value=".$row["ItemID"].">".$row["ItName"]."</option>";
    }
} 
else {
    echo "0 results";
}
?>