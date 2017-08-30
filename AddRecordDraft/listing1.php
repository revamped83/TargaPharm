<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = '100984311';
$conn = mysqli_connect($server, $user, $pass,$dbname ) or die("Can't connect");
$sql = "SELECT ItID,ItName FROM item";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value=".$row["ItID"].">".$row["ItName"]."</option>";
    }
} 
else {
    echo "0 results";
}
?>