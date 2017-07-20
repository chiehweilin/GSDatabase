<?php

$a = $_POST['pID1'];
$b = $_POST['pID2'];

include 'connect.php';
$conn = OpenCon();

$sql = "SELECT SUM(Price) FROM PRODUCTS WHERE Product_ID IN ($a,$b)";
// $sql = "SELECT SUM(Price) FROM PRODUCTS GROUP BY Product_ID HAVING Product_ID = $a OR Product_ID = $b";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Sum is ".$row["SUM(Price)"]."<br>";
    }
}

CloseConn($conn);

?>